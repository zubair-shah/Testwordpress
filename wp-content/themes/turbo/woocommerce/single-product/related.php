<?php

/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.9.0
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<?php
// Single Post settings Work
global $post;
$choose_options     = get_post_meta($post->ID, '_general_options_from', true);
$choose_options        = $choose_options ? $choose_options : 'option_panel';
if (is_single() && $choose_options != 'option_panel') {
    $local_options = turbo_extract_post_meta_data(array(
        'choose_layout'     => array('normal_layout', '_layout_options_settings'),
    ));
    extract($local_options);
} else {
    $global_options = turbo_extract_option_data(array(
        'choose_layout'     => array('normal_layout', 'turbo_woocommerce_layout'),
    ));
    extract($global_options);
}
?>
<?php if (isset($choose_layout) && $choose_layout === 'normal_layout') { ?>
    <?php if ($related_products) : ?>
        <?php
        extract(turbo_extract_option_data(array(
            'related_product_label' => array('Related Cars', 'related_products_heading'),
        )));
        ?>
        <section class="related products">
            <h2 class="rq-title rq-title-related">
                <?php echo esc_attr($related_product_label); ?>
            </h2>
            <?php woocommerce_product_loop_start(); ?>
            <?php foreach ($related_products as $related_product) : ?>
                <?php
                $post_object = get_post($related_product->get_id());
                setup_postdata($GLOBALS['post'] = &$post_object);
                wc_get_template_part('content', 'product'); ?>
            <?php endforeach; ?>
            <?php woocommerce_product_loop_end(); ?>
        </section>
    <?php endif;
    wp_reset_postdata();
    ?>
<?php } else { ?>
    <?php if ($related_products) : ?>
        <?php
        extract(turbo_extract_option_data(array(
            'related_product_label' => array('Related Cars', 'related_products_heading'),
        )));
        ?>
        <section class="related products">
            <h2 class="rq-title rq-title-related">
                <?php echo esc_attr($related_product_label); ?>
            </h2>
            <?php woocommerce_product_loop_start(); ?>
            <?php foreach ($related_products as $related_product) : ?>
                <?php
                $post_object = get_post($related_product->get_id());
                setup_postdata($GLOBALS['post'] = &$post_object);
                wc_get_template_part('content-listing', 'product'); ?>
            <?php endforeach; ?>
            <?php woocommerce_product_loop_end(); ?>
        </section>
    <?php endif;
    wp_reset_postdata();
    ?>
<?php } ?>