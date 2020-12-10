<?php

/**
 * My Account page
 * Edit by redq
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
    exit;
}
// Single Post settings Work
global $post;
$choose_options = get_post_meta($post->ID, '_turbo_woocommerce_options_form', true);
$choose_options = $choose_options ? $choose_options : 'option_panel';
if (is_account_page()) {
    if ($choose_options != 'option_panel') {
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
}
?>

<?php if (isset($choose_layout) && $choose_layout === 'normal_layout') { ?>
    <?php
    wc_print_notices();
    /**
     * My Account navigation.
     * @since 2.6.0
     */
    do_action('woocommerce_account_navigation');
    ?>

    <div class="col-lg-8 col-xl-9">
        <div class="woocommerce-MyAccount-content">
            <?php
            /**
             * My Account content.
             * @since 2.6.0
             */
            do_action('woocommerce_account_content');
            ?>
        </div>
    </div>
<?php } else { ?>

    <?php
    wc_print_notices();
    /**
     * My Account navigation.
     * @since 2.6.0
     */
    do_action('woocommerce_account_navigation');
    ?>

    <div class="rq-listing-my-account-tabs-content">
        <div class="woocommerce-MyAccount-content">
            <?php
            /**
             * My Account content.
             * @since 2.6.0
             */
            do_action('woocommerce_account_content');
            ?>
        </div>
    </div>
<?php } ?>