<?php

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see        http://docs.woothemes.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header();

/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */
//do_action( 'woocommerce_before_main_content' );
while (have_posts()) : the_post();
    $product = wc_get_product(get_the_ID());
    $style = '';
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

    if (isset($choose_layout) && $choose_layout === 'normal_layout') {
        if ($product->get_type() === 'redq_rental') {
            $single_page_layout = get_post_meta(get_the_ID(), 'redq_choose_product_layout', true);
            switch ($single_page_layout) {
                case 'full-width':
                    wc_get_template_part('content', 'single-rental-product');
                    break;
                case 'left-sidebar':
                    wc_get_template_part('content', 'single-rental-product-left');
                    break;
                case 'right-sidebar':
                    wc_get_template_part('content', 'single-rental-product-right');
                    break;
                default:
                    wc_get_template_part('content', 'single-rental-product');
                    break;
            }
        } else {
            wc_get_template_part('content', 'single-product');
        }

        /**
         * woocommerce_after_main_content hook.
         *
         * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
         */
        do_action('woocommerce_after_main_content');

        /**
         * woocommerce_sidebar hook.
         *
         * @hooked woocommerce_get_sidebar - 10
         */
        do_action('woocommerce_sidebar');
    } else {
        wc_get_template_part('content', 'single-listing-product');
    }
endwhile;
get_footer();
