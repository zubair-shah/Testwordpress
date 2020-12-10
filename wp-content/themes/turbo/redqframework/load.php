<?php

/**
 * Required all php files
 *
 * @author   RedQTeam
 * @package  Trubowp/redqframework
 * @since     turbo 1.0
 */
if (!defined('ABSPATH')) exit;


include_once get_template_directory() . '/redqframework/constant/constants.php';


// #load plugins
include_once REDQFW_EX . 'plugins-importer/tgm-load-plugins.php';

// #load demos
include_once REDQFW_EX . 'demo-importer/demo-importer.php';

// #lib files
include_once REDQFW_LIB . 'theme-stylesheets.php';
include_once REDQFW_LIB . 'theme-scripts.php';

// #admin files
include_once REDQFW_ADMIN . 'redq-admin-function.php';

// #Theme functions
include_once REDQFW_LIB . 'redq-function.php';
include_once REDQFW_LIB . 'redq-breadcrumb.php';
include_once REDQFW_LIB . 'redq-wpml-integration.php';
include_once REDQFW_LIB . 'redq-image-resizer.php';

include_once REDQFW_LIB . 'redq-helper-func.php';
include_once REDQFW_LIB . 'redq-dynamic-css.php';
include_once REDQFW_LIB . 'class-redq-templates-hook.php';

// #pagination
include_once REDQFW_LIB . 'redq-pagination-blog.php';
include_once REDQFW_LIB . 'class-comments-walker.php';

// #Woocommerce functions
include_once REDQFW_LIB . 'redq-woo-functions.php';
// include_once REDQFW_LIB . 'redq-reactive-templates.php';
