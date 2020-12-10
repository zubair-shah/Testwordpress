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
 * @version 3.4.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
global $product, $woocommerce_loop;
// grab product ID
$product_id = $product->get_id();
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
$classes[] = 'col-lg-3 col-md-4 col-sm-6';

// location meta
$location_data = '';
if (class_exists('Redq_Reactive')) {
    $location_data = json_decode(get_post_meta($product_id, '_reactive_geobox_preview', true));
}

?>


<div <?php post_class($classes); ?>>
    <div class="turbo-airbnb-grid">
        <?php
        /**
         * woocommerce_before_shop_loop_item hook.
         *
         * @hooked woocommerce_template_loop_product_link_open - 10
         */
        do_action('woocommerce_template_loop_product_link_open');
        ?>
        <div class="reactive-product-listing-item">
            <div class="product-image-wrapper">
                <?php if (class_exists('WordPress_Wishlist_Collection_Bookmark')) { ?>
                    <div class="rq-listing-ps-wwcb-wrap">
                        <?php echo do_shortcode('[wwc_wishlist_button]') ?>
                    </div>
                <?php } ?>
                <?php woocommerce_template_loop_product_thumbnail(); ?>
            </div>
            <div class="product-short-info">
                <?php if (!empty($location_data) && !empty($location_data->location->formattedAddress)) { ?>
                    <div class="rq-ps-listing-product-location">
                        <?php echo esc_attr($location_data->location->formattedAddress); ?>
                    </div>
                <?php } ?>
                <a href="<?php the_permalink(); ?>">
                    <?php woocommerce_template_loop_product_title(); ?>
                </a>
                <p class="price"><?php woocommerce_template_loop_price(); ?></p>
                <div class="listing-btn-area">
                    <a class="view-details-btn" href="<?php the_permalink(); ?>">
                        <?php echo esc_html__('View Details', 'turbo'); ?>
                    </a>
                </div>
            </div>
        </div>
        <?php
        /**
         * woocommerce_after_shop_loop_item hook.
         *
         * @hooked woocommerce_template_loop_product_link_open - 10
         */
        do_action('woocommerce_template_loop_product_link_open');
        ?>
    </div>
</div>