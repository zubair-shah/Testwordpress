<?php

/**
 * The template for displaying product content within loops
 * Edit by redq
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
global $product, $woocommerce_loop;
// Store loop count we're currently on
if (empty($woocommerce_loop['loop'])) {
    $woocommerce_loop['loop'] = 0;
}
// Store column count for displaying the grid
if (empty($woocommerce_loop['columns'])) {
    $woocommerce_loop['columns'] = apply_filters('loop_shop_columns', 4);
}
// Ensure visibility
if (!$product || !$product->is_visible()) {
    return;
}
// Increase loop count
$woocommerce_loop['loop']++;
// Extra post classes
$classes = array();
if (0 === ($woocommerce_loop['loop'] - 1) % $woocommerce_loop['columns'] || 1 === $woocommerce_loop['columns']) {
    $classes[] = 'first';
}
if (0 === $woocommerce_loop['loop'] % $woocommerce_loop['columns']) {
    $classes[] = 'last';
}
$classes[] = 'col-lg-4 col-md-6';
?>

<div <?php post_class($classes); ?>>
    <?php $product_type = wc_get_product(get_the_ID())->get_type(); ?>
    <?php if (isset($product_type) && $product_type === 'redq_rental') : ?>
        <?php
        /**
         * redq_before_shop_loop_item hook.
         *
         * @hooked woocommerce_template_loop_product_link_open - 10
         */
        do_action('redq_before_shop_loop_item');
        ?>
        <div class="listing-single">
            <div class="listing-img">
                <a href="<?php the_permalink(); ?>">
                    <?php
                    /**
                     * woocommerce_before_shop_loop_item_title hook.
                     *
                     * @hooked woocommerce_show_product_loop_sale_flash - 10
                     * @hooked woocommerce_template_loop_product_thumbnail - 10
                     */
                    do_action('woocommerce_before_shop_loop_item_title');
                    ?>
                </a>
            </div>
            <div class="listing-details">
                <?php

                /**
                 * redq_shop_loop_item_car_company hook.
                 *
                 * @hooked woocommerce_template_loop_product_car_company
                 */
                do_action('redq_shop_loop_item_car_company');


                /**
                 * redq_shop_loop_item_title hook.
                 *
                 * @hooked redq_shop_loop_item_title - 10
                 */
                do_action('redq_shop_loop_item_title');

                /**
                 * redq_shop_loop_attributes hook.
                 *
                 * @hooked redq_shop_loop_attributes - 10
                 */
                do_action('redq_shop_loop_attributes');
                ?>

                <div class="listing-footer">
                    <?php

                    /**
                     * redq_after_shop_loop_item_details_page hook.
                     *
                     * @hooked redq_after_shop_loop_item_details_page - 10
                     */
                    do_action('redq_after_shop_loop_item_details_page');

                    /**
                     * redq_after_shop_loop_item_title hook.
                     *
                     * @hooked woocommerce_template_loop_price - 10
                     */
                    do_action('redq_after_shop_loop_item_title');
                    ?>
                </div>

            </div>
        </div>
    <?php else : ?>
        <div class="listing-single">
            <?php
            /**
             * woocommerce_before_shop_loop_item hook.
             *
             * @hooked woocommerce_template_loop_product_link_open - 10
             */
            do_action('woocommerce_before_shop_loop_item');
            ?>
            <div class="listing-img">
                <?php
                /**
                 * woocommerce_before_shop_loop_item_title hook.
                 *
                 * @hooked woocommerce_show_product_loop_sale_flash - 10
                 * @hooked woocommerce_template_loop_product_thumbnail - 10
                 */
                do_action('woocommerce_before_shop_loop_item_title');
                ?>
            </div>
            <div class="listing-details">
                <?php
                /**
                 * woocommerce_shop_loop_item_title hook.
                 *
                 * @hooked woocommerce_template_loop_product_title - 10
                 */
                do_action('redq_shop_loop_item_title');

                /**
                 * woocommerce_after_shop_loop_item_title hook.
                 *
                 * @hooked woocommerce_template_loop_rating - 5
                 * @hooked woocommerce_template_loop_price - 10
                 */
                do_action('woocommerce_after_shop_loop_item_title');

                /**
                 * woocommerce_after_shop_loop_item hook.
                 *
                 * @hooked woocommerce_template_loop_product_link_close - 5
                 * @hooked woocommerce_template_loop_add_to_cart - 10
                 */
                do_action('woocommerce_after_shop_loop_item');
                ?>
            </div>
        </div>
    <?php endif; ?>
</div>