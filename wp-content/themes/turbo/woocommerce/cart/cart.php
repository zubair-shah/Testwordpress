<?php

/**
 * Cart Page
 * Edit by redq
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 4.4.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
// Single Post settings Work
global $post;
$choose_options = get_post_meta($post->ID, '_turbo_woocommerce_options_form', true);
$choose_options = $choose_options ? $choose_options : 'option_panel';
if (is_page() && $choose_options != 'option_panel') {
    $local_options = turbo_extract_page_meta_data(array(
        'choose_layout' => array('normal_layout', '_turbo_woocommerce_layout'),
    ));
    extract($local_options);
} else {
    $global_options = turbo_extract_option_data(array(
        'choose_layout' => array('normal_layout', 'turbo_woocommerce_layout'),
    ));
    extract($global_options);
}
?>

<?php if (isset($choose_layout) && $choose_layout === 'normal_layout') { ?>
    <?php
    wc_print_notices();
    do_action('woocommerce_before_cart');
    ?>
    <form action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
        <?php do_action('woocommerce_before_cart_table'); ?>
        <div class="rq-cart-items">
            <h4><?php esc_html_e('Your Cart items', 'turbo') ?></h4>
            <div class="cart-items-table">
                <div class="table-responsive">
                    <table cellspacing="0">
                        <thead>
                            <tr class="table-head">
                                <th><?php esc_html_e('CAR NAME', 'turbo') ?></th>
                                <th></th>
                                <th><?php esc_html_e('PRICE', 'turbo') ?></th>
                                <th><?php esc_html_e('QUANTITY', 'turbo') ?></th>
                                <th><?php esc_html_e('TOTAL', 'turbo') ?></th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php do_action('woocommerce_before_cart_contents'); ?>

                            <?php
                            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                                $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                                $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                                if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                            ?>
                                    <tr class="<?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

                                        <td data-title="<?php esc_html_e('Product', 'turbo'); ?>">
                                            <div class="listing-product-thumb">
                                                <?php
                                                $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image('full'), $cart_item, $cart_item_key);

                                                if (!$_product->is_visible()) {
                                                    echo esc_url($thumbnail);
                                                } else {
                                                    printf('<a href="%s">%s</a>', esc_url($_product->get_permalink($cart_item)), $thumbnail);
                                                }
                                                ?>

                                                <?php
                                                echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
                                                    '<div class="close-edit-btn"><a href="%s" title="%s" data-product_id="%s" data-product_sku="%s"><i class="fas fa-close"></i></a></div>',
                                                    esc_url(wc_get_cart_remove_url($cart_item_key)),
                                                    __('Remove this item', 'turbo'),
                                                    esc_attr($product_id),
                                                    esc_attr($_product->get_sku())
                                                ), $cart_item_key);
                                                ?>
                                            </div>
                                        </td>
                                        <td class="product-name">
                                            <div class="details">
                                                <?php
                                                if (!$_product->is_visible()) {
                                                    echo apply_filters('woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key) . '&nbsp;';
                                                } else {
                                                    echo apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($_product->get_permalink($cart_item)), $_product->get_title()), $cart_item, $cart_item_key);
                                                }

                                                // Meta data.
                                                echo wc_get_formatted_cart_item_data($cart_item);

                                                // Backorder notification
                                                if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                                                    echo '<p class="backorder_notification">' . esc_html__('Available on backorder', 'turbo') . '</p>';
                                                }
                                                ?>
                                            </div>
                                        </td>

                                        <td class="product-price" data-title="<?php esc_html_e('Price', 'turbo'); ?>">
                                            <?php
                                            echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
                                            ?>
                                        </td>

                                        <td class="product-quantity" data-title="<?php esc_html_e('Quantity', 'turbo'); ?>">
                                            <?php
                                            if ($_product->is_sold_individually()) {
                                                $product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
                                            } else {
                                                $product_quantity = woocommerce_quantity_input(array(
                                                    'input_name'  => "cart[{$cart_item_key}][qty]",
                                                    'input_value' => $cart_item['quantity'],
                                                    'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
                                                    'min_value'   => '0'
                                                ), $_product, false);
                                            }

                                            echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item);
                                            ?>
                                        </td>

                                        <td class="product-subtotal" data-title="<?php esc_html_e('Total', 'turbo'); ?>">
                                            <?php
                                            echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key);
                                            ?>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }

                            do_action('woocommerce_cart_contents');
                            ?>
                            <?php do_action('woocommerce_after_cart_contents'); ?>
                        </tbody>
                    </table>
                </div> <!-- end .table-responsive -->
            </div> <!-- end .cart-items-table -->
            <div class="checkout-btn">
                <div class="left-section">
                    <a href="<?php echo esc_url(wc_get_cart_url()); ?>?empty-cart" class="rq-btn rq-btn-transparent"><?php esc_html_e('clear shopping cart', 'turbo') ?></a>
                    <input type="submit" class="rq-btn rq-btn-transparent" name="update_cart" value="<?php esc_attr_e('Update Shopping Cart', 'turbo'); ?>" />
                </div>
                <div class="right-section">
                    <a href="<?php echo esc_url(apply_filters('woocommerce_return_to_shop_redirect', wc_get_page_permalink('shop'))); ?>" class="rq-btn rq-btn-transparent"><?php esc_html_e('continue shopping', 'turbo') ?></a>
                </div>
            </div> <!-- end .checkout-btn -->
        </div> <!-- end .rq-cart-items -->

        <div class="col-md-7 col-lg-4">
            <?php if (wc_coupons_enabled()) { ?>
                <div class="info-single">
                    <div class="rq-cart-options-title">
                        <h4><?php esc_html_e('Coupon Discounts', 'turbo') ?></h4>
                    </div>
                    <div class="rq-cart-options-content">
                        <p><?php esc_html_e('Enter your coupon code if you have', 'turbo') ?></p>
                        <input type="text" name="coupon_code" class="rq-form-control small" id="coupon_code" value="" placeholder="<?php esc_attr_e('Coupon code', 'turbo'); ?>" />
                        <input type="submit" class="rq-btn rq-btn-transparent" name="apply_coupon" value="<?php esc_attr_e('Apply Coupon', 'turbo'); ?>" />
                    </div>
                </div>
                <?php do_action('woocommerce_cart_coupon'); ?>
            <?php } ?>
        </div>
        <?php do_action('woocommerce_cart_actions'); ?>
        <?php wp_nonce_field('woocommerce-cart'); ?>
        <?php do_action('woocommerce_after_cart_table'); ?>
    </form>

    <div class="col-md-7 col-lg-4 <?php if (WC()->customer->has_calculated_shipping()) echo 'calculated_shipping'; ?>">
        <div class="info-single">
            <div class="rq-cart-options-title">
                <h4><?php esc_html_e('Calculate shipping', 'turbo'); ?></h4>
            </div>
            <div class="rq-cart-options-content">
                <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
                    <?php do_action('woocommerce_cart_totals_before_shipping'); ?>
                    <?php wc_cart_totals_shipping_html(); ?>
                    <?php do_action('woocommerce_cart_totals_after_shipping'); ?>
                <?php elseif (WC()->cart->needs_shipping() && 'yes' === get_option('woocommerce_enable_shipping_calc')) : ?>
                    <tr class="shipping">
                        <td data-title="<?php esc_html_e('Shipping', 'turbo'); ?>"><?php woocommerce_shipping_calculator(); ?></td>
                    </tr>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="cart-collaterals col-md-7 col-lg-4">
        <?php
        woocommerce_cart_totals();
        //woocommerce_button_proceed_to_checkout();
        ?>
        <?php //do_action( 'woocommerce_cart_collaterals' ); 
        ?>
    </div>
    <?php do_action('woocommerce_after_cart'); ?>
<?php } else { ?>
    <div class="rq-listing-cart-view">
        <?php
        wc_print_notices();
        do_action('woocommerce_before_cart');
        ?>

        <form action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
            <?php do_action('woocommerce_before_cart_table'); ?>

            <div class="rq-cart-items">
                <h4><?php esc_html_e('Cart', 'turbo') ?></h4>
                <div class="right-section continue-ship-msg-area">
                    <span class="continue-ship-msg">
                        <i class="far fa-question-circle"></i>
                        <?php echo esc_html__('Please check your cart item carefully before checkout.', 'turbo'); ?>
                    </span>
                    <a href="<?php echo esc_url(apply_filters('woocommerce_return_to_shop_redirect', wc_get_page_permalink('shop'))); ?>" class="continue-ship-btn">
                        <?php esc_html_e('Continue Shopping', 'turbo') ?>
                    </a>
                </div>
                <div class="cart-items-table">
                    <div class="table-responsive">
                        <table cellspacing="0">
                            <thead>
                                <tr class="table-head">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th><?php esc_html_e('Product', 'turbo') ?></th>
                                    <!-- <th></th> -->
                                    <th><?php esc_html_e('Price', 'turbo') ?></th>
                                    <th><?php esc_html_e('Quantity', 'turbo') ?></th>
                                    <th><?php esc_html_e('Total', 'turbo') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php do_action('woocommerce_before_cart_contents'); ?>
                                <?php
                                foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                                    $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                                    $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                                    if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                                ?>
                                        <tr class="<?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

                                            <td class="product-remove">
                                                <?php
                                                echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
                                                    '<div class="close-edit-btn"><a href="%s" title="%s" data-product_id="%s" data-product_sku="%s"><i class="fas fa-times"></i></a></div>',
                                                    esc_url(wc_get_cart_remove_url($cart_item_key)),
                                                    __('Remove this item', 'turbo'),
                                                    esc_attr($product_id),
                                                    esc_attr($_product->get_sku())
                                                ), $cart_item_key);
                                                ?>
                                            </td>

                                            <td data-title="<?php esc_html_e('Product', 'turbo'); ?>">
                                                <div class="listing-product-thumb">
                                                    <?php
                                                    $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

                                                    if (!$_product->is_visible()) {
                                                        echo esc_url($thumbnail);
                                                    } else {
                                                        printf('<a href="%s">%s</a>', esc_url($_product->get_permalink($cart_item)), $thumbnail);
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                            <td class="product-name">
                                                <div class="listing-product-details">
                                                    <div class="listing-cart-product-title">
                                                        <?php
                                                        if (!$_product->is_visible()) {
                                                            echo apply_filters('woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key) . '&nbsp;';
                                                        } else {
                                                            echo apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($_product->get_permalink($cart_item)), $_product->get_title()), $cart_item, $cart_item_key);
                                                        }
                                                        ?>
                                                    </div>
                                                    <?php
                                                    // Meta data.
                                                    echo wc_get_formatted_cart_item_data($cart_item);
                                                    // Backorder notification
                                                    if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                                                        echo '<p class="backorder_notification">' . esc_html__('Available on backorder', 'turbo') . '</p>';
                                                    }
                                                    ?>
                                                </div>
                                            </td>

                                            <td class="product-price" data-title="<?php esc_html_e('Price', 'turbo'); ?>">
                                                <div class="listing-product-price">
                                                    <?php
                                                    echo apply_filters(
                                                        'woocommerce_cart_item_price',
                                                        WC()->cart->get_product_price($_product),
                                                        $cart_item,
                                                        $cart_item_key
                                                    );
                                                    ?>
                                                </div>
                                            </td>

                                            <td class="product-quantity" data-title="<?php esc_html_e('Quantity', 'turbo'); ?>">
                                                <div class="listing-product-quantity">
                                                    <?php
                                                    if ($_product->is_sold_individually()) {
                                                        $product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
                                                    } else {
                                                        $product_quantity = woocommerce_quantity_input(array(
                                                            'input_name'  => "cart[{$cart_item_key}][qty]",
                                                            'input_value' => $cart_item['quantity'],
                                                            'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
                                                            'min_value'   => '0'
                                                        ), $_product, false);
                                                    }
                                                    echo apply_filters(
                                                        'woocommerce_cart_item_quantity',
                                                        $product_quantity,
                                                        $cart_item_key,
                                                        $cart_item
                                                    );
                                                    ?>
                                                </div>
                                            </td>

                                            <td class="product-subtotal" data-title="<?php esc_html_e('Total', 'turbo'); ?>">
                                                <div class="listing-product-total">
                                                    <?php
                                                    echo apply_filters(
                                                        'woocommerce_cart_item_subtotal',
                                                        WC()->cart->get_product_subtotal($_product, $cart_item['quantity']),
                                                        $cart_item,
                                                        $cart_item_key
                                                    );
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }

                                do_action('woocommerce_cart_contents');
                                ?>
                                <?php do_action('woocommerce_after_cart_contents'); ?>
                            </tbody>
                        </table>
                    </div> <!-- end .table-responsive -->
                </div> <!-- end .cart-items-table -->

                <div class="checkout-btn">
                    <div class="listing-cart-coupon">
                        <?php if (wc_coupons_enabled()) { ?>
                            <div class="rq-cart-options-content">
                                <input type="text" name="coupon_code" class="rq-form-control small" id="coupon_code" value="" placeholder="<?php esc_attr_e('Coupon code', 'turbo'); ?>" />
                                <input type="submit" class="rq-btn rq-btn-transparent" name="apply_coupon" value="<?php esc_attr_e('Apply Coupon', 'turbo'); ?>" />
                            </div>
                            <?php do_action('woocommerce_cart_coupon'); ?>
                        <?php } ?>
                    </div>

                    <div class="left-section cart-checkout-btn-wrapper">
                        <input type="submit" class="rq-btn rq-btn-transparent update-cart-btn" name="update_cart" value="<?php esc_attr_e('Update Cart', 'turbo'); ?>" />
                        <a href="<?php echo esc_url(wc_get_cart_url()); ?>?empty-cart" class="rq-btn rq-btn-transparent clear-cart-btn"><?php esc_html_e('Clear Cart', 'turbo') ?></a>
                    </div>
                </div> <!-- end .checkout-btn -->
            </div> <!-- end .rq-cart-items -->

            <?php do_action('woocommerce_cart_actions'); ?>
            <?php wp_nonce_field('woocommerce-cart'); ?>
            <?php do_action('woocommerce_after_cart_table'); ?>
        </form>

        <div class="listing-cart-area-footer">
            <div class="cart-collaterals">
                <?php
                woocommerce_cart_totals();
                // woocommerce_button_proceed_to_checkout();
                ?>
                <?php //do_action( 'woocommerce_cart_collaterals' ); 
                ?>
            </div>
        </div>

        <?php do_action('woocommerce_after_cart'); ?>
    </div>
<?php } ?>