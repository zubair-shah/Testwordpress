<?php

/**
 * Checkout login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

defined('ABSPATH') || exit;

if (is_user_logged_in() || 'no' === get_option('woocommerce_enable_checkout_login_reminder')) {
    return;
}

$info_message = apply_filters('woocommerce_checkout_login_message', esc_html__('Returning customer?', 'turbo'));
$info_message .= ' <a href="#" class="showlogin">' . esc_html__('Click here to login', 'turbo') . '</a>';
//wc_print_notice( $info_message, 'notice' );
?>


<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="checkout-method-heading">
        <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#checkout-accordion" href="#checkout-method" aria-expanded="true" aria-controls="checkout-method">
                <span><?php esc_html_e('Returning customer?', 'turbo'); ?></span><span><?php esc_html_e('Click here to login', 'turbo'); ?></span>
            </a>
        </h4>
    </div>
    <div id="checkout-method" class="panel-collapse collapse" role="tabpanel" aria-labelledby="checkout-method-heading">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel-subtitle">
                        <h5><?php esc_html_e('Returning customer?', 'turbo'); ?><?php esc_html_e('Check as a guest or register', 'turbo'); ?></h5>
                        <p><?php esc_html_e('Register with us for future convenience:', 'turbo'); ?></p>
                    </div>
                    <div class="rq-radiobox-content">
                        <span class="rq-radiobox">
                            <input type="radio" name="checkout-login-method" id="checkout-login-method" value="guest" checked>
                            <label for="checkout-login-method"><?php esc_html_e('Check as guest', 'turbo'); ?></label>
                        </span>
                        <span class="rq-radiobox">
                            <input checked type="radio" name="checkout-login-method" id="checkout-login-method-two" value="guest">
                            <label for="checkout-login-method-two"><?php esc_html_e('Register', 'turbo'); ?></label>
                        </span>
                    </div>
                    <div class="panel-subtitle">
                        <h5><?php esc_html_e('Register and save time !', 'turbo'); ?></h5>
                        <p><?php esc_html_e('Register with us for future convenience:', 'turbo'); ?></p>
                    </div>

                    <div class="widget-categories">
                        <ul>
                            <li><?php esc_html_e('Fast and easy check out', 'turbo'); ?></li>
                            <li><?php esc_html_e('Easy access to your order history and status', 'turbo'); ?></li>
                        </ul>
                    </div>
                    <div class="guest-btn">
                        <button class="rq-btn rq-btn-transparent"><?php esc_html_e('Continue', 'turbo'); ?></button>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="panel-subtitle">
                        <h5><?php esc_html_e('Already Registered ?', 'turbo'); ?></h5>
                        <p><?php esc_html_e('Please login below :', 'turbo'); ?></p>
                    </div>
                    <?php
                    woocommerce_login_form(
                        array(
                            'message'  => '',
                            'redirect' => wc_get_page_permalink('checkout'),
                            'hidden'   => true
                        )
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>