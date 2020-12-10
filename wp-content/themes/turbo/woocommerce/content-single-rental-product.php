<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

global $product;

$product_id = $product->get_id();
$product_meta = get_post_custom($product_id);
$options = turbo_get_option_data();

/**
 * woocommerce_before_single_product hook.
 *
 * @hooked wc_print_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form();
    return;
}

?>

<div itemscope itemtype="<?php //echo woocommerce_get_product_schema();
                            ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php
    /**
     * woocommerce_before_single_product_summary hook.
     *
     * @hooked woocommerce_show_product_sale_flash - 10
     * @hooked woocommerce_show_product_images - 20
     */
    //do_action( 'woocommerce_before_single_product_summary' );
    ?>

    <div class="rq-page-content">
        <!-- start of page content -->
        <div class="rq-listing-details">

            <div class="rq-content-block">
                <div class="container">
                    <div class="rq-title-container bredcrumb-title text-center">
                        <!-- start of breadcrumb -->
                        <h1 class="rq-title light"><?php the_title(); ?></h1>
                        <?php
                        if (function_exists('turbo_breadcrumb') && !empty($options['show_breadcrubmbs'])) {
                            turbo_breadcrumb('62');
                        }
                        ?>
                    </div>

                    <?php $item_attributes = WC_Product_Redq_Rental::redq_get_rental_non_payable_attributes('attributes'); ?>

                    <?php if (isset($item_attributes) && !empty($item_attributes)) : ?>
                        <div class="rq-listing-promo-wrapper">
                            <div class="row">
                                <!-- start of listing promo -->
                                <div class="col-md-12">
                                    <div class="rq-listing-promo-content">

                                        <?php foreach ($item_attributes as $key => $value) : ?>
                                            <div class="rq-listing-item">
                                                <?php if (isset($value['selected_icon']) && $value['selected_icon'] !== 'image') : ?>
                                                    <span class="attribute-icon" style="float:left"><i class="<?php echo esc_attr($value['icon']); ?>"></i></span>
                                                <?php else : ?>
                                                    <?php if (isset($value['image'])) : ?>
                                                        <?php $attribute_image = wp_get_attachment_image_src($value['image']); ?>
                                                        <img src="<?php echo esc_url($attribute_image['0']); ?>" alt="img">
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <?php if (isset($value['name'])) : ?>
                                                    <h6 class="rq-listing-item-title"><?php echo esc_attr($value['name']); ?></h6>
                                                <?php endif; ?>
                                                <?php if (isset($value['value'])) : ?>
                                                    <h4 class="rq-listing-item-number"><?php echo esc_attr($value['value']); ?></h4>
                                                <?php endif; ?>
                                            </div>
                                        <?php endforeach; ?>

                                    </div>
                                </div>
                            </div> <!-- end of listing promo -->
                        </div>
                    <?php endif; ?>


                    <?php if (isset($options['show_product_tab_section']) && !empty($options['show_product_tab_section'])) : ?>
                        <div class="rq-feature-tab">
                            <div class="rq-blog-listing">
                                <?php
                                /**
                                 * woocommerce_after_single_product_summary hook.
                                 *
                                 * @hooked woocommerce_output_product_data_tabs - 10
                                 */
                                woocommerce_output_product_data_tabs();
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div> <!-- .end rq-content-block -->


            <!-- Start rental plugin functionality -->
            <div class="rq-content-block gray-bg">
                <div class="container">
                    <?php if (isset($options['book_now_heading']) && !empty($options['book_now_heading'])) : ?>
                        <div class="listing-page-title rq-book-now-section">
                            <?php echo do_shortcode($options['book_now_heading']); ?>
                        </div>
                    <?php endif; ?>

                    <div class="rq-car-booking-section">
                        <?php
                        /**
                         * woocommerce_single_product_summary hook.
                         *
                         * @hooked woocommerce_template_single_title - 5
                         * @hooked woocommerce_template_single_rating - 10
                         * @hooked woocommerce_template_single_price - 10
                         * @hooked woocommerce_template_single_excerpt - 20
                         * @hooked woocommerce_template_single_add_to_cart - 30
                         * @hooked woocommerce_template_single_meta - 40
                         * @hooked woocommerce_template_single_sharing - 50
                         */
                        woocommerce_template_single_add_to_cart();
                        ?>
                    </div>
                </div>
            </div> <!-- /.rq-content-block -->
            <!-- End rental plugin functionality -->


            <?php if (isset($options['show_related_product']) && !empty($options['show_related_product'])) : ?>

                <?php if (isset($options['show_faqs_related_products_together']) && !empty($options['show_faqs_related_products_together'])) : ?>
                    <div class="rq-content-block">
                        <div class="related-car-faq">
                            <div class="container">
                                <div class="row">

                                    <?php
                                    $related_cars_ids = wc_get_related_products($product->get_id());
                                    $product_id = $product->get_id();
                                    $related_cars = get_related_products($related_cars_ids, $product_id);
                                    ?>

                                    <?php if (isset($related_cars) && !empty($related_cars)) : ?>

                                        <div class="col-md-6">

                                            <h3 class="section-title"><?php echo esc_attr($options['related_products_heading']); ?></h3>
                                            <div class="child-tab-wrapper related-cars">
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <?php foreach ($related_cars as $key => $value) : ?>
                                                        <?php $seats = get_post_meta($value['ID'], '_turbo_car_nice_image_seat', true); ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($value['post_permalink']) ?>">
                                                                <?php echo get_the_post_thumbnail($value['ID'], 'tab-small'); ?>
                                                                <span class="tittle"><?php echo esc_attr($value['post_title']); ?></span>
                                                                <?php if (isset($seats) && !empty($seats)) : ?>
                                                                    <span class="car-des"><?php echo esc_attr($seats); ?>&nbsp;<?php esc_html_e(' Seater Car', 'turbo'); ?></span>
                                                                <?php endif; ?>
                                                                <div class="rent-price"><?php echo wc_price($value['price']); ?>
                                                                    <b>/Day</b></div>
                                                            </a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>

                                    <?php endif; ?>


                                    <div class="col-md-6">
                                        <?php $faqs = get_the_terms(get_the_ID(), 'faq'); ?>
                                        <h3 class="section-title"><?php esc_html_e('FAQs', 'turbo'); ?></h3>
                                        <div class="rq-faqs">
                                            <?php if (isset($faqs) && !empty($faqs)) : ?>
                                                <?php foreach ($faqs as $key => $value) : ?>
                                                    <div class="faq-single">
                                                        <a href="#" class="faq-title"><?php echo esc_attr($value->name); ?></a>
                                                        <p class="hidden-content"><?php echo do_shortcode($value->description); ?></p>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> <!-- .rq-content-block -->
                <?php endif; ?>


                <div class="rq-content-block">
                    <?php if (isset($options['show_horizontal_related_products']) && !empty($options['show_horizontal_related_products'])) : ?>
                        <div class="related-car-faq">
                            <div class="container">
                                <div class="row">
                                    <?php woocommerce_output_related_products(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($options['show_horizontal_upsell_products']) && !empty($options['show_horizontal_upsell_products'])) : ?>
                        <div class="related-car-faq">
                            <div class="container">
                                <div class="row">
                                    <?php woocommerce_upsell_display(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div> <!-- .rq-content-block -->

            <?php endif; ?>

        </div>
    </div>


    <meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action('woocommerce_after_single_product'); ?>