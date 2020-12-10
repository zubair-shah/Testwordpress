<?php

/**
 * Defination of all constants
 *
 * @author   RedQTeam
 * @package  Trubowp/redqfw
 * @since    turbo 1.0
 */

if (!defined('turbo_THEME_NAME')) {
    define('turbo_THEME_NAME', 'turbo');
}
if (!defined('SHORT_NAME')) {
    define('SHORT_NAME', 'turbo');
}
if (!defined('THEME_NICE_NAME')) {
    define('THEME_NICE_NAME', "turbo");
}

if (!defined('THEME_HAS_PANEL')) {
    define('THEME_HAS_PANEL', TRUE);
}

if (!defined('REDQFW')) {
    define('REDQFW', get_template_directory() . '/redqframework/');
}

if (!defined('REDQFW_ADMIN')) {
    define('REDQFW_ADMIN', get_template_directory() . '/redqframework/admin/');
}

if (!defined('REDQFW_LIB')) {
    define('REDQFW_LIB', get_template_directory() . '/redqframework/includes/');
}

if (!defined('REDQFW_VC_DIR')) {
    define('REDQFW_VC_DIR', 'redqframework/turbo-vc-addons/');
}

if (!defined('REDQFW_WE')) {
    define('REDQFW_WE', get_template_directory() . '/redqframework/widget/');
}

if (!defined('REDQFW_EX')) {
    define('REDQFW_EX', get_template_directory() . '/redqframework/vendor/');
}

if (!defined('REDQFW_JS')) {
    define('REDQFW_JS', get_template_directory_uri() . '/assets/dist/js/');
}

if (!defined('REDQFW_SRC_JS')) {
    define('REDQFW_SRC_JS', get_template_directory_uri() . '/assets/src/js/');
}

if (!defined('REDQFW_CSS')) {
    define('REDQFW_CSS', get_template_directory_uri() . '/assets/dist/css/');
}

if (!defined('REDQFW_COMPONENT_JS')) {
    define('REDQFW_COMPONENT_JS', get_template_directory_uri() . '/components/assets/dist/js/');
}

if (!defined('REDQFW_COMPONENT_CSS')) {
    define('REDQFW_COMPONENT_CSS', get_template_directory_uri() . '/components/assets/dist/css/');
}

if (!defined('REDQFW_IMAGE')) {
    define('REDQFW_IMAGE', get_template_directory_uri() . '/assets/dist/images/');
}

if (!defined('REDQFW_VIDEO')) {
    define('REDQFW_VIDEO', get_template_directory_uri() . '/assets/dist/videos/');
}

if (!defined('TURBO_TEMPLATE_DIR')) {
    define('TURBO_TEMPLATE_DIR', '/templates/');
}
