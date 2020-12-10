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
    exit;
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
$_product = wc_get_product($product_id);
// location meta
$location_data = '';
if (class_exists('Redq_Reactive')) {
    $location_data = json_decode(get_post_meta($product_id, '_reactive_geobox_preview', true));
}

// settings panel work
$choose_options = get_post_meta($product_id, '_general_product_options_from', true);
$choose_options = $choose_options ? $choose_options : 'option_panel';
if (is_single() && $choose_options != 'option_panel') {
    $local_options = turbo_extract_post_meta_data(array(
        'display_attribute'   => array('true', '_turbo_product_attribute_display'),
        'display_feature'     => array('true', '_turbo_product_feature_display'),
        'display_rnb'         => array('true', '_turbo_product_rnb_display'),
        'display_location'    => array('true', '_turbo_product_location_display'),
        'display_comments'    => array('true', '_turbo_product_comment_display'),
        'display_reviews'     => array('true', '_turbo_product_review_display'),
        'display_upsell'      => array('true', '_turbo_product_upsell_display'),
        'display_related'     => array('true', '_turbo_product_related_display'),
        'choose_social_share' => array('true', '_turbo_social_share_switch'),
    ));
    extract($local_options);
} else {
    $global_options = turbo_extract_option_data(array(
        'choose_layout'       => array('normal_layout', 'turbo_woocommerce_layout'),
        'choose_social_share' => array('true', 'turbo_social_share_switch'),
        'display_attribute'   => array('true', 'turbo_product_attribute_display'),
        'display_feature'     => array('true', 'turbo_product_feature_display'),
        'display_rnb'         => array('true', 'turbo_product_rnb_display'),
        'display_location'    => array('true', 'turbo_product_location_display'),
        'display_comments'    => array('true', 'turbo_product_comment_display'),
        'display_reviews'     => array('true', 'turbo_product_review_display'),
        'display_upsell'      => array('true', 'turbo_product_upsell_display'),
        'display_related'     => array('true', 'turbo_product_related_display'),
    ));
    extract($global_options);
}

// Social Share Settings
$choose_options_social = get_post_meta($product_id, '_general_product_share_options_from', true);
$choose_options_social = $choose_options_social ? $choose_options_social : 'option_panel';
if (is_single() && $choose_options_social != 'option_panel') {
    $share_local_options = turbo_extract_post_meta_data(array(
        'choose_social_share' => array('true', '_turbo_social_share_switch'),
        'facebook'            => array('true', '_turbo_facebook_share'),
        'twitter'             => array('true', '_turbo_twitter_share'),
        'linkedin'            => array('true', '_turbo_linkedin_share'),
        'google'              => array('true', '_turbo_google_share'),
    ));
    extract($share_local_options);
} else {
    $share_global_options = turbo_extract_option_data(array(
        'choose_social_share' => array('true', 'turbo_social_share_switch'),
        'facebook'            => array('true', 'turbo_facebook_share'),
        'twitter'             => array('true', 'turbo_twitter_share'),
        'linkedin'            => array('true', 'turbo_linkedin_share'),
        'google'              => array('true', 'turbo_google_share'),
    ));
    extract($share_global_options);
}
?>

<div itemscope id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="rq-listing-ps-wrapper">
        <div class="rq-listing-ps-img-wrapper ">
            <div class="ls-ps-sb-offset"></div>
            <div class="rq-listing-ps-img-inner">
                <?php woocommerce_show_product_images(); ?>
                <div class="rq-listing-ps-meta">
                    <?php if (class_exists('Redq_Alike')) { ?>
                        <div class="rq-listing-ps-alike-wrap rq-listing-ps-meta-item">
                            <?php echo do_shortcode('[alike_link text="Compare" preview="icon_text" icon_class="fa fa-exchange" parent_class=""]'); ?>
                        </div>
                    <?php } ?>
                    <?php if (class_exists('WordPress_Wishlist_Collection_Bookmark')) { ?>
                        <div class="rq-listing-ps-wwcb-wrap rq-listing-ps-meta-item">
                            <?php echo do_shortcode('[wwc_wishlist_button preview="icon_text" text="Save" after_text="Saved"]') ?>
                        </div>
                    <?php } ?>
                    <?php if (isset($choose_social_share) && $choose_social_share === 'true') { ?>
                        <div class="rq-listing-ps-share-wrap rq-listing-ps-meta-item">
                            <span class="rq-listing-ps-share-title">
                                <i class="ion-android-share"></i>
                                <?php echo esc_html__('Share', 'turbo'); ?>
                            </span>
                            <?php
                            $post_id = $product_id;
                            $wrapper_class = 'turbo-product-share-list';
                            $social_shares = array(
                                'facebook'    => array(
                                    'label'        => esc_html__('Facebook', 'turbo'),
                                    'icon'         => 'ion-social-facebook',
                                    'is_enabled'   => $facebook,
                                    'markup_class' => 'face'
                                ),
                                'twitter'     => array(
                                    'label'        => esc_html__('Twitter', 'turbo'),
                                    'icon'         => 'ion-social-twitter',
                                    'is_enabled'   => $twitter,
                                    'markup_class' => 'tw'
                                ),
                                'google_plus' => array(
                                    'label'        => esc_html__('Google+', 'turbo'),
                                    'icon'         => 'ion-social-googleplus',
                                    'is_enabled'   => $google,
                                    'markup_class' => 'gp'
                                ),
                                'linkedin'    => array(
                                    'label'        => esc_html__('Linkedin', 'turbo'),
                                    'icon'         => 'ion-social-linkedin',
                                    'is_enabled'   => $linkedin,
                                    'markup_class' => 'li'
                                ),
                            );
                            echo turbo_product_social_share($post_id, $wrapper_class, $social_shares);
                            ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="rq-listing-ps-content-wrapper">

            <!-- GENERAL AREA START -->
            <div class="rq-ps-listing-product-content-area">
                <?php if (!empty($location_data) && !empty($location_data->location->formattedAddress)) { ?>
                    <div class="rq-ps-listing-product-location">
                        <?php echo esc_attr($location_data->location->formattedAddress); ?>
                    </div>
                <?php } ?>
                <h1 class="rq-listing-ps-product-title"><?php the_title(); ?></h1>
                <div class="rq-listing-ps-product-price">
                    <?php echo apply_filters('turbo_price_html', $_product->get_price_html()); ?>
                </div>
                <div class="rq-listing-ps-product-des">
                    <?php the_content(); ?>
                </div>
            </div>
            <!-- GENERAL AREA END -->

            <!-- ATTRIBUTES AREA START -->
            <?php if (isset($display_attribute) && $display_attribute === 'true') { ?>
                <div class="rq-ps-listing-product-attributes-area">
                    <h3 class="rq-listing-ps-cell-title"><?php echo esc_html__('Specification', 'turbo'); ?></h3>
                    <?php $attributes_by_inventories = WC_Product_Redq_Rental::redq_get_rental_non_payable_attributes('attributes'); ?>

                    <?php if (isset($attributes_by_inventories) && !empty($attributes_by_inventories)) : ?>
                        <div class="rq-listing-attributes">
                            <?php foreach ($attributes_by_inventories as $key => $attributes_by_inventory) : ?>
                                <?php
                                $inventory_name = $attributes_by_inventory['title'];
                                $attributes = isset($attributes_by_inventory['attributes']) ? $attributes_by_inventory['attributes'] : [];
                                ?>
                                <?php if (isset($attributes) && !empty($attributes)) : ?>
                                    <?php foreach ($attributes as $attr_key => $attribute) : ?>
                                        <div class="rq-listing-attributes-item">
                                            <span class="rq-listing-attributes-title"><?php echo esc_attr($attribute['name']); ?></span>
                                            <span class="rq-listing-attributes-value"><?php echo esc_attr($attribute['value']); ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php } ?>
            <!-- ATTRIBUTES AREA END -->

            <!-- FEATURE AREA START -->
            <?php if (isset($display_feature) && $display_feature === 'true') { ?>
                <div class="rq-ps-listing-product-features-area">
                    <h3 class="rq-listing-ps-cell-title"><?php echo esc_html__('Features', 'turbo'); ?></h3>

                    <?php $features_by_inventories = WC_Product_Redq_Rental::redq_get_rental_non_payable_attributes('features'); ?>

                    <?php if (isset($features_by_inventories) && !empty($features_by_inventories)) : ?>
                        <div class="rq-listing-features">
                            <?php foreach ($features_by_inventories as $key => $features_by_inventory) : ?>
                                <?php
                                $inventory_name = $features_by_inventory['title'];
                                $features = isset($features_by_inventory['features']) ? $features_by_inventory['features'] : [];
                                ?>
                                <?php if (isset($features) && !empty($features)) : ?>
                                    <?php foreach ($features as $feat_key => $feature) : ?>
                                        <div class="rq-listing-features-item">
                                            <?php if ($feature['availability'] === 'yes') { ?>
                                                <span class="attribute-icon"><i class="fas fa-check-circle"></i></span>
                                            <?php } else { ?>
                                                <span class="attribute-icon close"><i class="fas fa-times-circle"></i></span>
                                            <?php } ?>
                                            <span class="rq-listing-features-name"><?php echo esc_attr($feature['name']); ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                </div>
            <?php } ?>
            <!-- FEATURE AREA END -->


            <!-- BOOKING AREA START -->
            <?php if (isset($display_rnb) && $display_rnb === 'true') { ?>
                <div class="rq-ps-listing-product-booking">
                    <h3 class="rq-listing-ps-cell-title">
                        <?php echo esc_html__('Booking & Rental', 'turbo'); ?>
                    </h3>

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
            <?php } ?>
            <!-- BOOKING AREA END -->

            <!-- CONTACT AREA START -->
            <?php if (isset($display_location) && $display_location === 'true') { ?>
                <div class="rq-ps-listing-product-contact active">
                    <h3><?php echo esc_html__('Available Pick-up & Drop-off Points', 'turbo'); ?></h3>
                    <div class="rq-custom-map" id="listing-map"></div>
                </div>
            <?php } ?>
            <!-- CONTACT AREA END -->

            <!-- REVIEW AREA START -->
            <?php if (isset($display_reviews) && $display_reviews === 'true') { ?>
                <div class="rq-ps-listing-product-review">
                    <span class="rq-ps-listing-product-review-basic">
                        <?php woocommerce_template_single_rating(); ?>
                    </span>
                    <?php
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                </div>
            <?php } ?>
            <!-- REVIEW AREA END -->

            <!-- COMMENT AREA START -->
            <?php if (isset($display_comments) && $display_comments === 'true') { ?>
                <div class="rq-ps-listing-product-comment">
                    <?php wc_get_template('single-product/turbo-listing-comment-template.php'); ?>
                </div>
            <?php } ?>
            <!-- COMMENT AREA END -->

        </div>
    </div>
    <?php if (isset($display_related) || isset($display_upsell)) { ?>
        <div class="rq-ps-listing-related-wrapper">
            <!-- UP-SELL AREA START -->
            <?php if (isset($display_upsell) && $display_upsell === 'true') { ?>
                <div class="rq-ps-listing-upsell-post">
                    <?php woocommerce_upsell_display(); ?>
                </div>
            <?php } ?>
            <!-- UP-SELL AREA END -->

            <!-- RELATED AREA START -->
            <?php if (isset($display_related) && $display_related === 'true') { ?>
                <div class="rq-ps-listing-related-post">
                    <?php woocommerce_output_related_products(); ?>
                </div>
            <?php } ?>
            <!--RELATED AREA END -->
        </div>
    <?php } ?>
</div>