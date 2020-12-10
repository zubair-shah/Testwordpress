<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 * Edit by redq
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see        http://docs.woothemes.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     3.4.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
get_header();
// Single Post settings Work
$style = '';
$choose_options = get_post_meta(get_the_ID(), '_turbo_woocommerce_options_form', true);
$choose_options = $choose_options ? $choose_options : 'option_panel';
if (is_page() && $choose_options != 'option_panel') {
    $local_options = turbo_extract_post_meta_data(array(
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
<?php
/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */
//do_action( 'woocommerce_before_main_content' );
?>
<?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
<?php endif; ?>

<?php
/**
 * woocommerce_archive_description hook.
 *
 * @hooked woocommerce_taxonomy_archive_description - 10
 * @hooked woocommerce_product_archive_description - 10
 */
//do_action( 'woocommerce_archive_description' );
?>
<?php if (isset($choose_layout) && $choose_layout !== 'normal_layout') { ?>
    <div class="turbo-listing-shop-wrapper">
        <?php if (have_posts()) : ?>

            <?php
            /**
             * redq_shop_page_search_form hook.
             *
             * @hooked redq_shop_page_search_form
             */
            do_action('redq_shop_page_search_form');
            ?>
            <div class="result-count result-ordering turbo-listing-shop-result">
                <div class="row">
                    <?php
                    /**
                     * woocommerce_before_shop_loop hook.
                     *
                     * @hooked woocommerce_result_count - 20
                     * @hooked woocommerce_catalog_ordering - 30
                     */
                    do_action('woocommerce_before_shop_loop');
                    ?>
                </div>
            </div>
            <?php woocommerce_product_loop_start(); ?>
            <?php woocommerce_product_subcategories(); ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php wc_get_template_part('content', 'listing-product'); ?>
            <?php endwhile; // end of the loop. 
            ?>
            <?php woocommerce_product_loop_end(); ?>
            <?php
            /**
             * woocommerce_after_shop_loop hook.
             *
             * @hooked woocommerce_pagination - 10
             */
            // do_action( 'woocommerce_after_shop_loop' );
            ?>
            <?php
            if (function_exists('redq_listings_pagination')) {
                redq_listings_pagination();
            }
            ?>
        <?php
        elseif (
            !woocommerce_product_subcategories(
                array(
                    'before' => woocommerce_product_loop_start(false),
                    'after'  => woocommerce_product_loop_end(false)
                )
            )
        ) :
        ?>
            <?php wc_get_template('loop/no-products-found.php'); ?>

        <?php endif; ?>
    </div>
<?php } else { ?>
    <?php if (have_posts()) : ?>
        <?php
        /**
         * redq_shop_page_search_form hook.
         *
         * @hooked redq_shop_page_search_form
         */
        do_action('redq_shop_page_search_form');
        ?>
        <div class="result-count result-ordering">
            <div class="row">
                <?php
                /**
                 * woocommerce_before_shop_loop hook.
                 *
                 * @hooked woocommerce_result_count - 20
                 * @hooked woocommerce_catalog_ordering - 30
                 */
                do_action('woocommerce_before_shop_loop');
                ?>
            </div>
        </div>
        <?php woocommerce_product_loop_start(); ?>
        <?php woocommerce_product_subcategories(); ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php wc_get_template_part('content', 'product'); ?>
        <?php endwhile; // end of the loop. 
        ?>
        <?php woocommerce_product_loop_end(); ?>
        <?php
        /**
         * woocommerce_after_shop_loop hook.
         *
         * @hooked woocommerce_pagination - 10
         */
        //do_action( 'woocommerce_after_shop_loop' );
        ?>
        <?php
        if (function_exists('redq_listings_pagination')) {
            redq_listings_pagination();
        }
        ?>
    <?php
    elseif (
        !woocommerce_product_subcategories(
            array(
                'before' => woocommerce_product_loop_start(false),
                'after'  => woocommerce_product_loop_end(false)
            )
        )
    ) :
    ?>
        <?php wc_get_template('loop/no-products-found.php'); ?>
    <?php endif; ?>
<?php } ?>



<?php
/**
 * woocommerce_after_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');
?>
<?php
/**
 * woocommerce_sidebar hook.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action('woocommerce_sidebar');
?>
<?php get_footer(); ?>