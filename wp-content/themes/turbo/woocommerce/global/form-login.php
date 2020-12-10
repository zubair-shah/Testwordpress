<?php
/**
 * Login form
 * Edited by redq
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see        http://docs.woothemes.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     3.6.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (is_user_logged_in()) {
    return;
}

?>


<form method="post" class="login rq-checkout-form">

    <?php do_action('woocommerce_login_form_start'); ?>

    <?php if ($message) echo wpautop(wptexturize($message)); ?>


    <div class="form-row form-row-first form-group">
        <label for="username"><?php esc_html_e('Username or Email', 'turbo'); ?> <span class="required">*</span></label>
        <input type="text" class="input-text rq-form-control small" name="username" id="username"
               placeholder="<?php esc_attr_e('Email', 'turbo') ?><"/>
    </div>

    <div class="form-row form-row-last form-group">
        <label for="password"><?php esc_html_e('Password', 'turbo'); ?> <span class="required">*</span></label>
        <input class="input-text rq-form-control small" type="password" name="password" id="password"
               placeholder="<?php esc_attr_e('Password', 'turbo') ?>"/>
    </div>

    <div class="clear"></div>

    <?php do_action('woocommerce_login_form'); ?>

    <div class="form-row form-group checkout-login-form">
        <?php wp_nonce_field('woocommerce-login'); ?>
        <span class="rq-checkbox">
        <input name="rememberme" type="checkbox" id="rememberme"
               value="forever"/> <?php esc_html_e('forever', 'turbo'); ?>
        <label for="rememberme" class="inline"><?php esc_html_e('Remember me', 'turbo') ?></label>
        <input type="hidden" name="redirect" value="<?php echo esc_url($redirect) ?>"/>
      </span>

        <input type="submit" class="rq-btn rq-btn-primary btn-large" name="login"
               value="<?php esc_attr_e('Login', 'turbo'); ?>"/>


    </div>
    <p class="lost_password">
        <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'turbo'); ?></a>
    </p>

    <div class="clear"></div>

    <?php do_action('woocommerce_login_form_end'); ?>

</form>
