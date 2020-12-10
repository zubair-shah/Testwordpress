<?php
if (!function_exists('turbo_add_styles')) {
    function turbo_add_styles()
    {
        // extract(turbo_extract_option_data(array(
        //     'color' => array('yellow', 'turbo_color_scheme'),
        // )));

        // $protocol = is_ssl() ? 'https' : 'http';

        // wp_enqueue_style('google_lato_font', "$protocol://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i");
        // wp_enqueue_style('google_play_fair_font', "$protocol://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i");

        wp_register_style('owl.carousel.min', REDQFW_CSS . 'owl.carousel.min.css', array(), $ver = false, $media = 'all');
        wp_enqueue_style('owl.carousel.min');

        wp_register_style('select2.min', REDQFW_CSS . 'select2.min.css', array(), $ver = false, $media = 'all');
        wp_enqueue_style('select2.min');

        // wp_register_style('css-loader', REDQFW_CSS . 'css-loader.min.css', array(), $ver = false, $media = 'all');
        // wp_enqueue_style('css-loader');

        wp_register_style('fontawesome.min', REDQFW_CSS . 'fontawesome.min.css', array(), $ver = false, $media = 'all');
        wp_enqueue_style('fontawesome.min');

        // prev version
        // wp_register_style('turbo-style', REDQFW_CSS . 'turbo.style.css', array(), $ver = false, $media = 'all');
        // wp_enqueue_style('turbo-style');

        // current version
        wp_register_style('turbo-style', REDQFW_CSS . 'turbo-style.css', array(), $ver = false, $media = 'all');
        wp_enqueue_style('turbo-style');
        wp_style_add_data('turbo-style', 'rtl', 'replace');

        wp_register_style('custom-style', REDQFW_CSS . 'custom-style.css', array(), $ver = false, $media = 'all');
        wp_enqueue_style('custom-style');

        // wp_register_style('turbo-color-scheme', REDQFW_CSS . '' . $color . '.css', array(), $ver = false, $media = 'all');
        // wp_enqueue_style('turbo-color-scheme');
    }
}
add_action('wp_enqueue_scripts', 'turbo_add_styles');


/**
 * Enqueued Admin Stylesheets
 *
 * @param null
 * @return template files that are located assets/dist/style directory
 * @version 1.0.0
 * @since 1.0.0
 * @access public
 */
function turbo_admin_stylesheets()
{
    wp_enqueue_style('admin-style', REDQFW_CSS . 'admin-style.css', array(), $ver = false, $media = 'all');
}

add_action('admin_enqueue_scripts', 'turbo_admin_stylesheets');
