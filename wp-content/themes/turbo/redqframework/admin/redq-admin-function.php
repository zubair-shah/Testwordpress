<?php

/**
 * Register admin menu for turbo
 *
 * @return turbo menu for turbo.
 * @since Trubowp 1.0
 * @author   RedQTeam
 */
if (!function_exists('trubowp_custom_navigation_menus')) {
    function trubowp_custom_navigation_menus()
    {
        $locations = array(
            'primary_navigation' => __('Primary Menu', 'turbo'),
            'footer_navigation'  => __('Footer Menu (Optional : For listing demo view.) ', 'turbo')
        );
        register_nav_menus($locations);
    }
}

add_action('init', 'trubowp_custom_navigation_menus');


/**
 * Editor style addd
 *
 * @return turbo menu for turbo.
 * @since Trubowp 1.0
 * @author   RedQTeam
 */
if (!function_exists('turbo_theme_add_editor_styles')) {
    function turbo_theme_add_editor_styles()
    {
        add_editor_style('custom-editor-style.css');
    }
}
add_action('init', 'turbo_theme_add_editor_styles');


/**
 * Register theme supported features
 *
 * @return supported features for turbo.
 * @since Trubowp 1.0
 * @author   RedQTeam
 */
if (!function_exists('turbo_theme_features')) {
    function turbo_theme_features()
    {
        global $wp_version;

        if (version_compare($wp_version, '3.0', '>=')) :
            add_theme_support('automatic-feed-links');
        endif;

        $formats = array('gallery', 'image', 'video', 'audio', 'link');
        add_theme_support('post-formats', $formats);
        add_theme_support('post-thumbnails');
        add_theme_support('custom-header');
        add_theme_support("title-tag");
        add_theme_support('custom-background');
        add_image_size('tab-small', 170, 111, true);
        add_image_size('tab-big', 500, 230, true);
        add_image_size('car-gallery', 1200, 546, true);
        add_image_size('blog-listings', 1173, 609, true);
        add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');

        load_theme_textdomain('turbo', get_template_directory() . '/languages');
    }
}

add_action('after_setup_theme', 'turbo_theme_features');


/**
 * Register image sizes
 *
 * @return supported features for turbo.
 * @since Trubowp 1.0
 * @author   RedQTeam
 */
if (!function_exists('turbo_custom_image_sizes_choose')) {
    function turbo_custom_image_sizes_choose($sizes)
    {
        $custom_sizes = array(
            'tab-small'     => __('Tab Small', 'turbo'),
            'tab-big'       => __('Tab Big', 'turbo'),
            'tips-tricks'   => __('Tips & Tricks', 'turbo'),
            'car-gallery'   => __('Car Gallery', 'turbo'),
            'blog-listings' => __('Blog Listings', 'turbo')
        );
        return array_merge($sizes, $custom_sizes);
    }
}

add_filter('image_size_names_choose', 'turbo_custom_image_sizes_choose');


/**
 * Register sidebars
 *
 * @return supported sidebars for turbo.
 * @since Trubowp 1.0
 * @author   RedQTeam
 */
if (!function_exists('trubo_register_sidebar')) {
    function trubo_register_sidebar()
    {

        $footer_widget = array(
            'id'            => 'turbo_footer_widget',
            'name'          => __('Footer widgets', 'turbo'),
            'description'   => __('Put your widgets here that show on footer area', 'turbo'),
            'before_widget' => '<div class="col-lg-3 col-sm-6 widget-list">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        );

        register_sidebar($footer_widget);
    }
}

add_action('widgets_init', 'trubo_register_sidebar');
