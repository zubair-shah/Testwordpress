<?php

/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_edit_account_form'); ?>

<div class="rq-registration-content-single small-bottom-margin">
    <!-- start of registration portion -->
    <div class="rq-login-form no-border">
        <form class="woocommerce-EditAccountForm edit-account form-horizontal" action="" method="post">
            <div class="row">
                <?php do_action('woocommerce_edit_account_form_start'); ?>

                <div class="col-md-6">
                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text rq-form-control reverse" name="account_first_name" id="account_first_name" placeholder="<?php esc_attr_e('First Name', 'turbo'); ?>" value="<?php echo esc_attr($user->first_name); ?>" />
                </div>

                <div class="col-md-6">
                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text  rq-form-control reverse" name="account_last_name" id="account_last_name" placeholder="<?php esc_attr_e('Last Name', 'turbo'); ?>" value="<?php echo esc_attr($user->last_name); ?>" />
                </div>

                <div class="col-md-12">
                    <input type="email" class="woocommerce-Input woocommerce-Input--email input-text  rq-form-control reverse" name="account_email" id="account_email" placeholder="<?php esc_html_e('Email address', 'turbo'); ?>" value="<?php echo esc_attr($user->user_email); ?>" />
                </div>

                <div class="col-md-12">
                    <h4 class="rq-change-password"><?php esc_html_e('Change password', 'turbo'); ?></h4>
                </div>

                <div class="col-md-12">
                    <input type="password" class="woocommerce-Input woocommerce-Input--password input-text rq-form-control reverse" name="password_current" id="password_current" placeholder="<?php esc_attr_e('Current Password (leave blank to leave unchanged)', 'turbo'); ?>" />
                </div>

                <div class="col-md-6">
                    <input type="password" class="woocommerce-Input woocommerce-Input--password input-text rq-form-control reverse" name="password_1" id="password_1" placeholder="<?php esc_attr_e('New Password (leave blank to leave unchanged)', 'turbo'); ?>" />
                </div>

                <div class="col-md-6">
                    <input type="password" class="woocommerce-Input woocommerce-Input--password input-text rq-form-control reverse" name="password_2" id="password_2" placeholder="<?php esc_attr_e('Confirm New Password', 'turbo'); ?>" />
                </div>

                <?php do_action('woocommerce_edit_account_form'); ?>

                <div class="col-md-12">
                    <div class="register-button">
                        <?php wp_nonce_field('save_account_details'); ?>
                        <input type="submit" class="rq-btn rq-btn-primary border-radius" name="save_account_details" value="<?php esc_attr_e('Save changes', 'turbo'); ?>" />
                        <input type="hidden" name="action" value="save_account_details" />
                    </div>
                </div>

                <?php do_action('woocommerce_edit_account_form_end'); ?>
            </div>
        </form>
    </div>
</div>

<?php do_action('woocommerce_after_edit_account_form'); ?>