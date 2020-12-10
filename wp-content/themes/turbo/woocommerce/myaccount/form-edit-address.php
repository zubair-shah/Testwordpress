<?php
/**
 * Edit address form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-address.php.
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

$page_title = ('billing' === $load_address) ? __('Billing address', 'turbo') : __('Shipping address', 'turbo');

do_action('woocommerce_before_edit_account_address_form'); ?>

<?php if (!$load_address) : ?>
    <?php wc_get_template('myaccount/my-address.php'); ?>
<?php else : ?>

    <form method="post" class="checkout woocommerce-checkout rq-checkout-form">

        <h3><?php echo apply_filters('woocommerce_my_account_edit_address_title', $page_title); ?></h3>

        <?php do_action("woocommerce_before_edit_address_form_{$load_address}"); ?>


        <?php foreach ($address as $key => $field) : ?>

            <?php woocommerce_form_field($key, $field, !empty($_POST[$key]) ? wc_clean($_POST[$key]) : $field['value']); ?>

        <?php endforeach; ?>

        <?php do_action("woocommerce_after_edit_address_form_{$load_address}"); ?>

        <div class="save-changes">
            <input type="submit" class="rq-btn rq-btn-primary btn-large" name="save_address"
                   value="<?php echo esc_attr_e('Save Address', 'turbo'); ?>"/>
            <?php wp_nonce_field('woocommerce-edit_address'); ?>
            <input type="hidden" name="action" value="edit_address"/>
        </div>

    </form>

<?php endif; ?>

<?php do_action('woocommerce_after_edit_account_address_form'); ?>
