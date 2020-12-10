<?php

/**
 * Redq rental product add to cart
 *
 * @author        redqteam
 * @package    RedqTeam/Templates
 * @version     1.0.0
 * @since       1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;
$product_id = $product->get_ID();

$displays = redq_rental_get_settings($product_id, 'display');
$conditional_data = redq_rental_get_settings($product_id, 'conditions');
$conditional_data = $conditional_data['conditions'];
$displays = $displays['display'];

// Layout choose option
$choose_options = get_post_meta(get_the_ID(), '_general_options_from', true);
$choose_options = $choose_options ? $choose_options : 'option_panel';
if (is_single() && $choose_options != 'option_panel') {
    $local_options = turbo_extract_post_meta_data(array(
        'choose_layout' => array('normal_layout', '_layout_options_settings'),
    ));
    extract($local_options);
} else {
    $global_options = turbo_extract_option_data(array(
        'choose_layout' => array('normal_layout', 'turbo_woocommerce_layout'),
    ));
    extract($global_options);
}

/**
 * rnb_before_add_to_cart_form hook.
 *
 * @hooked rnb_price_flip_box - 10
 */
do_action('rnb_before_add_to_cart_form');

?>
<form class="cart rnb-cart" method="post" enctype='multipart/form-data' novalidate>
    <?php

    if ($conditional_data['booking_layout'] === 'layout_one') :
        /**
         * rnb_before_add_to_cart_form hook.
         *
         * @hooked rnb_price_flip_box - 10
         * @hooked rnb_pickup_locations - 10
         * @hooked rnb_return_locations - 10
         * @hooked rnb_pickup_datetimes - 10
         * @hooked rnb_payable_resources - 10
         * @hooked rnb_payable_persons - 10
         * @hooked rnb_payable_deposits - 10
         */
        if (isset($choose_layout) && $choose_layout !== 'normal_layout') {
            rnb_select_inventory();
            rnb_pickup_locations();
            rnb_return_locations();
            rnb_pickup_datetimes();
            rnb_return_datetimes();
            rnb_quantity();
            rnb_payable_persons();
            rnb_payable_categories();
            rnb_payable_resources();
            rnb_payable_deposits();
        } else {
            do_action('rnb_main_rental_content');
        }
    endif;

    /**
     * woocommerce_before_add_to_cart_button hook.
     *
     */
    do_action('woocommerce_before_add_to_cart_button');
    ?>

    <input type="hidden" name="currency-symbol" class="currency-symbol" value="<?php echo get_woocommerce_currency_symbol(); ?>">
    <input type="hidden" class="product_id" name="add-to-cart" value="<?php echo esc_attr($product_id); ?>" />
    <input type="hidden" class="quote_price" name="quote_price" value="" />

    <?php
    if (($displays['book_now'] === 'open' || $displays['rfq'] === 'open') && $conditional_data['booking_layout'] === 'layout_one') :
        /**
         * rnb_plain_booking_button hook.
         *
         * @hooked rnb_direct_booking - 10
         * @hooked rnb_request_quote - 20
         */
        do_action('rnb_plain_booking_button');
    else :
        /**
         * rnb_modal_booking hook.
         *
         * @hooked rnb_modal_booking - 10
         */
        do_action('rnb_modal_booking');
    endif;

    /**
     * woocommerce_after_add_to_cart_button hook.
     *
     */
    do_action('woocommerce_after_add_to_cart_button');
    ?>
</form>

<?php do_action('woocommerce_after_add_to_cart_form'); ?>