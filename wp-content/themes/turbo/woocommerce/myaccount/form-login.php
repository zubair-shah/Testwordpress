<?php

/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.1.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$option_data = get_option('turbo_option_data');


?>

<?php wc_print_notices(); ?>

<?php do_action('woocommerce_before_customer_login_form'); ?>

<?php if (get_option('woocommerce_enable_myaccount_registration') === 'yes') { ?>
    <div class="rq-login-registration-from-area">
    <?php } else { ?>
        <div class="rq-login-registration-from-area rq-form-center">
        <?php } ?>

        <div class="rq-registration-content-single rq-sign-in">
            <?php if (isset($option_data['login_title']) && !empty($option_data['login_title'])) : ?>
                <h4><?php echo do_shortcode($option_data['login_title']); ?></h4>
            <?php endif; ?>
            <?php if (isset($option_data['login_sub_title']) && !empty($option_data['login_sub_title'])) : ?>
                <p class="subtitle"><?php echo do_shortcode($option_data['login_sub_title']); ?></p>
            <?php endif; ?>

            <div class="rq-login-form">
                <form method="post" class="login">
                    <div class="row">
                        <?php do_action('woocommerce_login_form_start'); ?>

                        <div class="form-group col-md-12">
                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text rq-form-control" name="username" id="username" placeholder="<?php esc_html_e('Email or username', 'turbo'); ?>" value="<?php if (!empty($_POST['username'])) echo esc_attr($_POST['username']); ?>" />
                        </div>

                        <div class="form-group col-md-12">
                            <input class="woocommerce-Input woocommerce-Input--text input-text rq-form-control" type="password" name="password" placeholder="<?php esc_html_e('Password', 'turbo'); ?>" id="password" />
                        </div>

                        <?php do_action('woocommerce_login_form'); ?>

                        <div class="col-md-12">
                            <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
                            <input type="submit" class="rq-btn rq-btn-primary turbo-woo-login fluid border-radius" name="login" value="<?php esc_attr_e('Login', 'turbo'); ?>" />
                        </div>

                        <div class="col-md-12"></div>

                        <div class="col-md-12">
                            <div class="remember-me">
                                <span class="rq-checkbox">
                                    <input class="woocommerce-Input woocommerce-Input--checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" />
                                    <label for="rememberme"><?php esc_html_e('Keep me loged in', 'turbo'); ?></label>
                                </span>
                                <span class="forgotpass woocommerce-LostPassword lost_password">
                                    <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Forgot your password ?', 'turbo'); ?></a>
                                </span>
                            </div>
                        </div>
                        <?php do_action('woocommerce_login_form_end'); ?>
                    </div>
                </form>
            </div>
            <!-- </div> -->
        </div>
        <!--  end of login form -->

        <?php if (get_option('woocommerce_enable_myaccount_registration') === 'yes') : ?>
            <div class="rq-registration-content-single rq-sign-up">
                <div class="rq-login-form">
                    <?php
                    if (isset($option_data['login_reg_promotion_text']) && !empty($option_data['login_reg_promotion_text'])) {
                    ?>
                        <h4>
                            <?php echo do_shortcode($option_data['login_reg_promotion_text']); ?>
                        </h4>
                    <?php } ?>

                    <?php
                    if (isset($option_data['signup_promotion_title']) && !empty($option_data['signup_promotion_title'])) {
                    ?>
                        <p class="subtitle">
                            <?php echo do_shortcode($option_data['signup_promotion_title']); ?>
                        </p>
                    <?php } ?>

                    <?php if (isset($option_data['log_reg_multi_feature_text']) && !empty($option_data['log_reg_multi_feature_text'])) : ?>
                        <ul class="rq-feature-list">
                            <?php foreach ($option_data['log_reg_multi_feature_text'] as $key => $value) : ?>
                                <li><?php echo do_shortcode($value); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <form method="post" class="register">
                        <div class="row">

                            <?php do_action('woocommerce_register_form_start'); ?>

                            <?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>
                                <div class="col-md-12">
                                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text rq-form-control reverse" name="username" id="reg_username" value="<?php if (!empty($_POST['username'])) echo esc_attr($_POST['username']); ?>" />
                                </div>
                            <?php endif; ?>

                            <div class="col-md-12">
                                <input type="email" class="woocommerce-Input woocommerce-Input--text input-text rq-form-control reverse" name="email" id="reg_email" placeholder="<?php esc_html_e('Email Address', 'turbo'); ?>" value="<?php if (!empty($_POST['email'])) echo esc_attr($_POST['email']); ?>" />
                            </div>

                            <?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

                                <div class="col-md-12">
                                    <input type="password" class="woocommerce-Input woocommerce-Input--text input-text rq-form-control reverse" name="password" id="reg_password" placeholder="<?php esc_html_e('Password', 'turbo'); ?>" />
                                </div>

                            <?php endif; ?>

                            <div class="col-md-12">
                                <!-- Spam Trap -->
                                <div style="<?php echo ((is_rtl()) ? 'right' : 'left'); ?>: -999em; position: absolute;"><label for="trap"><?php esc_html_e('Anti-spam', 'turbo'); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" />
                                </div>
                            </div>

                            <?php do_action('woocommerce_register_form'); ?>
                            <?php do_action('register_form'); ?>

                            <div class="col-md-12">
                                <div class="register-button">
                                    <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
                                    <input type="submit" class="rq-btn rq-btn-primary border-radius" name="register" value="<?php esc_attr_e('Register', 'turbo'); ?>" />
                                </div>
                            </div>

                            <?php do_action('woocommerce_register_form_end'); ?>
                        </div>
                    </form>
                </div>
            </div>
            <!--  end of registration form -->
        </div>
    <?php endif; ?>








    <?php do_action('woocommerce_after_customer_login_form'); ?>