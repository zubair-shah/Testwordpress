<?php

/**
 * Checkout Form
 * Edited by redq
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see        http://docs.woothemes.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version   3.5.0
 */
if (!defined('ABSPATH')) {
    exit;
}
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
    <div class="rq-checkout-wrapper">

        <div class="panel-group" id="checkout-accordion" role="tablist" aria-multiselectable="true">
            <?php
            //wc_print_notices();
            do_action('woocommerce_before_checkout_form', $checkout);
            // If checkout registration is disabled and not logged in, the user cannot checkout
            if (!$checkout->enable_signup && !$checkout->enable_guest_checkout && !is_user_logged_in()) {
                echo apply_filters('woocommerce_checkout_must_be_logged_in_message', esc_html__('You must be logged in to checkout.', 'turbo'));
                return;
            }
            ?>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="billing-information-heading">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#checkout-accordion" href="#billing-information" aria-expanded="true" aria-controls="billing-information"><?php esc_html_e('Billing Information', 'turbo'); ?></a>
                    </h4>
                </div>
                <div id="billing-information" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="billing-information-heading">
                    <div class="panel-body">
                        <form name="checkout" method="post" class="checkout woocommerce-checkout rq-checkout-form" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php if (sizeof($checkout->checkout_fields) > 0) : ?>
                                        <?php do_action('woocommerce_checkout_before_customer_details'); ?>
                                        <div class="customer-details" id="customer_details">
                                            <?php do_action('woocommerce_checkout_billing'); ?>
                                            <?php do_action('woocommerce_checkout_shipping'); ?>
                                        </div>
                                        <?php do_action('woocommerce_checkout_after_customer_details'); ?>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel-subtitle">
                                        <h5 id="order_review_heading">
                                            <?php esc_html_e('Your Order Details', 'turbo'); ?>
                                        </h5>
                                    </div>
                                    <?php do_action('woocommerce_checkout_before_order_review'); ?>
                                    <div id="order_review" class="woocommerce-checkout-review-order">
                                        <?php do_action('woocommerce_checkout_order_review'); ?>
                                    </div>
                                    <?php do_action('woocommerce_checkout_after_order_review'); ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php do_action('woocommerce_after_checkout_form', $checkout); ?>
        </div>
    </div>
<?php } else { ?>
    <div class="rq-checkout-wrapper rq-turbo-listing-checkout">
        <div class="panel-group" id="checkout-accordion" role="tablist" aria-multiselectable="true">
            <?php
            wc_print_notices();
            do_action('woocommerce_before_checkout_form', $checkout);
            // If checkout registration is disabled and not logged in, the user cannot checkout
            if (!$checkout->enable_signup && !$checkout->enable_guest_checkout && !is_user_logged_in()) {
                echo apply_filters('woocommerce_checkout_must_be_logged_in_message', esc_html__('You must be logged in to checkout.', 'turbo'));
                return;
            }
            ?>
            <div id="billing-information" class="billing-information">
                <form name="checkout" method="post" class="checkout woocommerce-checkout rq-checkout-form" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
                    <div class="rq-turbo-listing-checkout-info-wrap">
                        <?php if (sizeof($checkout->checkout_fields) > 0) : ?>
                            <?php do_action('woocommerce_checkout_before_customer_details'); ?>
                            <div class="rq-turbo-listing-checkout-profile" id="customer_details">
                                <div class="rq-turbo-listing-checkout-profile-billing">
                                    <?php do_action('woocommerce_checkout_billing'); ?>
                                </div>
                                <div class="rq-turbo-listing-checkout-profile-shipping">
                                    <?php do_action('woocommerce_checkout_shipping'); ?>
                                </div>
                            </div>
                            <?php do_action('woocommerce_checkout_after_customer_details'); ?>
                        <?php endif; ?>
                    </div>
                    <div class="rq-turbo-listing-checkout-payment-wrap">
                        <div class="panel-subtitle">
                            <h5 id="order_review_heading">
                                <?php esc_html_e('Your Order Details', 'turbo'); ?>
                            </h5>
                        </div>
                        <?php do_action('woocommerce_checkout_before_order_review'); ?>
                        <div id="order_review" class="woocommerce-checkout-review-order">
                            <?php do_action('woocommerce_checkout_order_review'); ?>
                        </div>
                        <?php do_action('woocommerce_checkout_after_order_review'); ?>
                    </div>
                </form>
            </div>
            <?php do_action('woocommerce_after_checkout_form', $checkout); ?>
        </div>
    </div>
<?php } ?>