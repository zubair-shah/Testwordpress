<?php

/**
 * My Account navigation
 * Edit by redq
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
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
 * @version 2.6.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// Single Post settings Work
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


// set icon for woocommerce my account nav
function turbo_woocommerce_my_account_nav_icon($icon)
{
    switch ($icon) {
        case 'Dashboard':
            return '<i class="fas fa-tachometer-alt"></i>';

        case 'Orders':
            return '<i class="fas fa-shopping-basket"></i>';

        case 'Downloads':
            return '<i class="fas fa-file-archive"></i>';

        case 'Addresses':
            return '<i class="fas fa-home"></i>';

        case 'Account details':
            return '<i class="fas fa-user"></i>';

        case 'View Collection':
            return '<i class="fas fa-chart-line"></i>';

        case 'Request Quote':
            return '<i class="fas fa-file-alt"></i>';

        case 'Logout':
            return '<i class="fas fa-sign-out-alt"></i>';

        default:
            return '<i class="fas fa-angle-right"></i>';
            break;
    }
}
?>

<?php if (isset($choose_layout) && $choose_layout === 'normal_layout') { ?>
    <?php do_action('woocommerce_before_account_navigation'); ?>
    <?php $current_user = get_current_user_id(); ?>
    <div class="col-lg-4 col-xl-3">
        <div class="rq-woo-nav">
            <div class="user-account">
                <div class="user-account-portrait">
                    <?php echo get_avatar($current_user, 64); ?>
                </div>
                <div class="user-account-name">
                    <?php
                    $user_info = get_userdata(get_current_user_id());
                    $first_name = $user_info->first_name;
                    $last_name = $user_info->last_name;
                    $nick_name = $user_info->user_nicename;
                    if (!empty($first_name) || !empty($last_name)) {
                        echo esc_attr($first_name . ' ' . $last_name);
                    } else {
                        echo esc_attr($nick_name);
                    }
                    ?>
                </div>
            </div>
            <nav class="woocommerce-MyAccount-navigation">
                <ul class="nav nav-stacked rq-elements-menu">
                    <?php foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>
                        <li class="<?php echo wc_get_account_menu_item_classes($endpoint); ?>">
                            <a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>">
                                <?php echo turbo_woocommerce_my_account_nav_icon($label) ?>
                                <?php echo esc_html($label); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </div>
    <?php do_action('woocommerce_after_account_navigation'); ?>
<?php } else { ?>
    <?php do_action('woocommerce_before_account_navigation'); ?>
    <?php $current_user = get_current_user_id(); ?>
    <div class="rq-listing-my-account-tabs-nav">
        <div class="user-account">
            <div class="user-account-portrait">
                <?php echo get_avatar($current_user, 64); ?>
            </div>
            <div class="user-account-name">
                <?php
                $user_info = get_userdata(get_current_user_id());
                $first_name = $user_info->first_name;
                $last_name = $user_info->last_name;
                $nick_name = $user_info->user_nicename;
                if (!empty($first_name) || !empty($last_name)) {
                    echo esc_attr($first_name . ' ' . $last_name);
                } else {
                    echo esc_attr($nick_name);
                }
                ?>
            </div>
        </div>
        <nav class="woocommerce-MyAccount-navigation">
            <ul class="nav nav-stacked rq-elements-menu">
                <?php foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>
                    <li class="<?php echo wc_get_account_menu_item_classes($endpoint); ?>">
                        <a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>">
                            <?php echo turbo_woocommerce_my_account_nav_icon($label) ?>
                            <?php echo esc_html($label); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
    <?php do_action('woocommerce_after_account_navigation'); ?>
<?php } ?>