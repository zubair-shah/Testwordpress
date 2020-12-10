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
 * @see       http://docs.woothemes.com/document/template-structure/
 * @author    WooThemes
 * @package   WooCommerce/Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


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

global $product;

$product_id = $product->get_id();
$gallery = get_post_meta($product_id, '_product_image_gallery', true);

extract(turbo_extract_option_data(array(
    'show_related'     => array('', 'show_related_product'),
    'show_upsell'      => array('', 'show_horizontal_upsell_products'),
    'show_tab'         => array('', 'show_product_tab_section'),
    'book_now_heading' => array('From', 'book_now_heading'),
    'unit_label'       => array(__('/day', 'turbo'), 'unit_label'),
    'show_gallery'     => array('on', 'turbo_show_gallery_in_container'),
)));

?>

<div itemscope id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="rq-product-page-left">
        <!-- start of page content -->
        <div class="rq-listing-details">

            <div class="rq-content-block2">
                <div class="row">

                    <div class="col-lg-4 turbo-car-sidebar">
                        <div class="sidebar rq-content-block-left">
                            <h2 class="rq-title rq-product-sidebar-heading">
                                <?php echo esc_attr($book_now_heading); ?>
                                <span class="car-price"><?php echo apply_filters('turbo_price_html', $product->get_price_html()); ?></span>
                            </h2>
                            <div class="bredcrumb-title">
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
                    </div>

                    <div class="col-lg-8 turbo-car-main-content">

                        <?php if (isset($show_gallery) && $show_gallery === 'on' && !empty($gallery)) : ?>
                            <div class="rq-listing-single turbo-content-listing-gallery">
                                <div class="rq-change-button">
                                    <span class="slide active"><i class="far fa-image" aria-hidden="true"></i></span>
                                    <span class="map"><i class="fas fa-map-marker-alt" aria-hidden="true"></i></span>
                                </div>
                                <div class="rq-custom-map" id="listing-map"></div>
                                <div class="rq-listing-gallery-post">
                                    <div class="rq-gallery-content">
                                        <div class="details-slider owl-carousel owl-theme">
                                            <?php $gallery_img_id = explode(',', $gallery); ?>
                                            <?php if (isset($gallery_img_id) && is_array($gallery_img_id)) : ?>
                                                <?php foreach ($gallery_img_id as $key => $value) : ?>
                                                    <?php $large_image = wp_get_attachment_image_src($value, 'car-gallery'); ?>
                                                    <div class="item">
                                                        <img src="<?php echo esc_url($large_image[0]); ?>" alt="img">
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="rq-title-container bredcrumb-title">
                            <h2 class="rq-title light"><?php the_title(); ?></h2>
                            <span class="car-avarage-rating"><?php woocommerce_template_single_rating(); ?></span>
                        </div>

                        <div class="car-desc">
                            <?php the_content(); ?>
                        </div>

                        <?php
                        $attributes_by_inventories = WC_Product_Redq_Rental::redq_get_rental_non_payable_attributes('attributes');
                        ?>

                        <?php if (isset($attributes_by_inventories) && !empty($attributes_by_inventories)) : ?>
                            <div class="rq-listing-promo-wrapper rq-custom">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="rq-listing-promo-content">
                                            <?php foreach ($attributes_by_inventories as $key => $attributes_by_inventory) : ?>
                                                <?php
                                                $inventory_name = $attributes_by_inventory['title'];
                                                $attributes = isset($attributes_by_inventory['attributes']) ? $attributes_by_inventory['attributes'] : [];
                                                ?>
                                                <?php if (isset($attributes) && !empty($attributes)) : ?>
                                                    <?php foreach ($attributes as $attr_key => $attribute) : ?>
                                                        <div class="rq-listing-item">
                                                            <?php if (isset($attribute['selected_icon']) && $attribute['selected_icon'] !== 'image') : ?>
                                                                <span class="attribute-icon" style="float:left"><i class="<?php echo esc_attr($attribute['icon']); ?>"></i></span>
                                                            <?php else : ?>
                                                                <?php $attribute_image = wp_get_attachment_image_src($attribute['image']); ?>
                                                                <img src="<?php echo esc_url($attribute_image['0']); ?>" alt="img">
                                                            <?php endif; ?>
                                                            <h6 class="rq-listing-item-title"><?php echo esc_attr($attribute['name']); ?></h6>
                                                            <h4 class="rq-listing-item-number"><?php echo esc_attr($attribute['value']); ?></h4>
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($show_tab) && !empty($show_tab)) : ?>
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
                            </div> <!-- ./edn feature tab -->

                            <div class="turbo-comment-template">
                                <div id="reviews">
                                    <?php wc_get_template('single-product/turbo-comment-template.php'); ?>
                                </div>
                            </div>
                        <?php endif; ?>


                    </div>
                    <!--col-lg-8  -->

                </div>
                <!--row-->

                <?php if (isset($show_upsell) && !empty($show_upsell)) : ?>
                    <div class="row">
                        <div class="turbo-upsell-products">
                            <?php woocommerce_upsell_display(); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (isset($show_related) && !empty($show_related)) : ?>
                    <div class="row">
                        <div class="turbo-related-products">
                            <?php woocommerce_output_related_products(); ?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>

        </div>
    </div> <!-- /.page-content -->

    <meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action('woocommerce_after_single_product'); ?>