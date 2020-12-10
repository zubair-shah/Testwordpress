<?php

/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */

if (!class_exists('Redux')) {
    return;
}

if (!defined('REDQFW_IMAGE')) {
    define('REDQFW_IMAGE', get_template_directory_uri() . '/assets/dist/images/');
}


// This is your option name where all the Redux data is stored.
$opt_name = "turbo_option_data";

// This line is only for altering the demo. Can be easily removed.
$opt_name = apply_filters('redux_demo/opt_name', $opt_name);

/*
 *
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 *
 */

$sampleHTML = '';
if (file_exists(dirname(__FILE__) . '/info-html.html')) {
    Redux_Functions::initWpFilesystem();

    global $wp_filesystem;

    $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
}

// Background Patterns Reader
$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
$sample_patterns_url = ReduxFramework::$_url . '../sample/patterns/';
$sample_patterns = array();

if (is_dir($sample_patterns_path)) {

    if ($sample_patterns_dir = opendir($sample_patterns_path)) {
        $sample_patterns = array();

        while (($sample_patterns_file = readdir($sample_patterns_dir)) !== false) {

            if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                $name = explode('.', $sample_patterns_file);
                $name = str_replace('.' . end($name), '', $sample_patterns_file);
                $sample_patterns[] = array(
                    'alt' => $name,
                    'img' => $sample_patterns_url . $sample_patterns_file
                );
            }
        }
    }
}

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name' => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name' => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version' => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type' => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu' => true,
    // Show the sections below the admin menu item or not
    'menu_title' => __('Turbo Options', 'turbo'),
    'page_title' => __('Turbo Options', 'turbo'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key' => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography' => true,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar' => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon' => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority' => 50,
    // Choose an priority for the admin bar menu
    'global_variable' => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode' => false,
    // Show the time the page took to load, etc
    'update_notice' => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer' => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority' => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent' => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions' => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon' => '',
    // Specify a custom URL to an icon
    'last_tab' => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon' => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug' => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults' => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show' => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark' => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export' => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time' => 60 * MINUTE_IN_SECONDS,
    'output' => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag' => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database' => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn' => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints' => array(
        'icon' => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color' => 'lightgray',
        'icon_size' => 'normal',
        'tip_style' => array(
            'color' => 'red',
            'shadow' => true,
            'rounded' => false,
            'style' => '',
        ),
        'tip_position' => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect' => array(
            'show' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'mouseover',
            ),
            'hide' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'click mouseleave',
            ),
        ),
    )
);

// ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
$args['admin_bar_links'][] = array(
    'id' => 'redux-docs',
    'href' => 'http://docs.reduxframework.com/',
    'title' => __('Documentation', 'turbo'),
);

$args['admin_bar_links'][] = array(
    //'id'    => 'redux-support',
    'href' => 'https://github.com/ReduxFramework/redux-framework/issues',
    'title' => __('Support', 'turbo'),
);

$args['admin_bar_links'][] = array(
    'id' => 'redux-extensions',
    'href' => 'reduxframework.com/extensions',
    'title' => __('Extensions', 'turbo'),
);

// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
$args['share_icons'][] = array(
    'url' => 'https://github.com/ReduxFramework/ReduxFramework',
    'title' => 'Visit us on GitHub',
    'icon' => 'el el-github'
    //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
);
$args['share_icons'][] = array(
    'url' => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
    'title' => 'Like us on Facebook',
    'icon' => 'el el-facebook'
);
$args['share_icons'][] = array(
    'url' => 'http://twitter.com/reduxframework',
    'title' => 'Follow us on Twitter',
    'icon' => 'el el-twitter'
);
$args['share_icons'][] = array(
    'url' => 'http://www.linkedin.com/company/redux-framework',
    'title' => 'Find us on LinkedIn',
    'icon' => 'el el-linkedin'
);

// Panel Intro text -> before the form
if (!isset($args['global_variable']) || $args['global_variable'] !== false) {
    if (!empty($args['global_variable'])) {
        $v = $args['global_variable'];
    } else {
        $v = str_replace('-', '_', $args['opt_name']);
    }
    $args['intro_text'] = sprintf(__('<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'turbo'), $v);
} else {
    $args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'turbo');
}

// Add content after the form.
$args['footer_text'] = __('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'turbo');

Redux::setArgs($opt_name, $args);

/*
 * ---> END ARGUMENTS
 */


/*
 * ---> START HELP TABS
 */

$tabs = array(
    array(
        'id' => 'redux-help-tab-1',
        'title' => __('Theme Information 1', 'turbo'),
        'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'turbo')
    ),
    array(
        'id' => 'redux-help-tab-2',
        'title' => __('Theme Information 2', 'turbo'),
        'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'turbo')
    )
);
Redux::setHelpTab($opt_name, $tabs);

// Set the help sidebar
$content = __('<p>This is the sidebar content, HTML is allowed.</p>', 'turbo');
Redux::setHelpSidebar($opt_name, $content);

Redux::setSection($opt_name, array(
    'title' => __('General Settings', 'turbo-helper'),
    'id' => 'turbowp-general-settings',
    'customizer_width' => '450px',
    'icon' => 'el el-cogs',
    'desc' => __('You can configure basic settings of turbo here', 'turbo-helper'),
    'fields' => array(

        array(
            'id' => 'turbo_demo_layout',
            'type' => 'select',
            'title' => __('Choose Demo Layout', 'turbo-helper'),
            'options' => array(
                'turbo_car_rental_1' => __('Turbo Car Rental 1', 'turbo-helper'),
                'turbo_car_rental_2' => __('Turbo Car Rental 2', 'turbo-helper'),
                'turbo_car_rental_3' => __('Turbo Car Rental 3', 'turbo-helper'),
                'turbo_car_rental_4' => __('Turbo Car Rental 4', 'turbo-helper'),
                'turbo_bike' => __('Turbo Bike', 'turbo-helper'),
                'turbo_motor_bike' => __('Turbo Motor Bike', 'turbo-helper'),
                'turbo_listing' => __('Turbo Listing', 'turbo-helper'),
            ),
            'default' => 'turbo_car_rental_1',
        ),

        array(
            'id' => 'turbo_layout_control',
            'type' => 'select',
            'title' => __('Choose Layout', 'turbo-helper'),
            'options' => array(
                'with_container' => __('With Container', 'turbo-helper'),
                'without_container' => __('Without Container', 'turbo-helper'),
            ),
            'default' => 'with_container',
        ),
        // array(
        //     'id' => 'choose_color_schema',
        //     'type' => 'select',
        //     'title' => __('Choose Color Scheme', 'turbowp-helper'),
        //     'options' => array(
        //         'specific' => __('Static color scheme', 'turbowp-helper'),
        //         'dynamic' => __('Dynamic color scheme', 'turbowp-helper'),
        //     ),
        //     'default' => 'specific',
        // ),

        array(
            'id' => 'turbo_color_scheme',
            'type' => 'select',
            'title' => __('Choose Color Scheme', 'turbo-helper'),
            // 'required' => array('choose_color_schema', '=', 'specific'),
            'options' => array(
                'yellow' => 'Yellow',
                'green' => 'Green',
                'blue' => 'Blue',
                'teal'  => 'Teal'
            ),
            'default' => 'yellow',
        ),

        // array(
        //     'id'       => 'turbo_dynamic_color_scheme_primary_bg',
        //     'type'     => 'color',
        //     'title'    => esc_html__('Primary Color', 'turbo-helper'),
        //     'subtitle' => esc_html__('Pick a primary color for the theme 	(default: #ffab51).', 'turbo-helper'),
        //     'default'  => '#ffab51',
        //     'validate' => 'color',
        //     'required' => array('choose_color_schema', '=', 'dynamic'),
        // ),
        // array(
        //     'id'       => 'turbo_dynamic_color_scheme_hover_bg',
        //     'type'     => 'color',
        //     'title'    => esc_html__('Hover Color', 'turbo-helper'),
        //     'subtitle' => esc_html__('Pick a hover color for the theme 	(default: #ff9019).', 'turbo-helper'),
        //     'default'  => '#ff9019',
        //     'validate' => 'color',
        //     'required' => array('choose_color_schema', '=', 'dynamic'),
        // ),


        array(
            'id' => 'show_breadcrubmbs',
            'type' => 'switch',
            'title' => __('Display Breadcrumbs', 'turbo-helper'),
            'default' => true,
        ),

        array(
            'id' => 'turbo-toggle-loader',
            'type' => 'select',
            'title' => __('Enable/Disable Loader', 'turbo-helper'),
            'options' => array(
                'enable' => __('Enable', 'turbo-helper'),
                'disable' => __('Disable', 'turbo-helper'),
            ),
            'default' => 'enable',
        ),
        array(
            'id' => 'loader_bg_color',
            'type' => 'color',
            'title' => __('Loader Background Color', 'turbo-helper'),
            'subtitle' => __('Choose Page Loader Background Color.', 'turbo-helper'),
            'default' => 'white',
            'validate' => 'color'
        ),
        array(
            'id' => 'loading_circle_color',
            'type' => 'color',
            'title' => __('Loading Circle Color', 'turbo-helper'),
            'subtitle' => __('Choose Page Loading Circle Color with image, color, etc.', 'turbo-helper'),
            'default' => '#000',
            'validate' => 'color'
        ),
        // array(
        //     'id' => 'loader_text_color',
        //     'type' => 'color',
        //     'title' => __('Loader Text Color', 'turbo-helper'),
        //     'subtitle' => __('Choose Page Loader Text Color with image, color, etc.', 'turbo-helper'),
        //     'default' => '#000'
        // ),
        // array(
        //     'id' => 'loader_text_msg',
        //     'type' => 'text',
        //     'title' => __('Loader text message', 'turbo-helper'),
        //     'placeholder' => __('E.X - Loading', 'turbo-helper'),
        //     'default' => 'Loading',
        // ),
    )
));



Redux::setSection($opt_name, array(
    'title' => __('Custom CSS/Scripts', 'turbo-helper'),
    'id' => 'turbowp-css-scripts-related',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'turbo-custom-css',
            'type' => 'ace_editor',
            'title' => __('Custom CSS Code', 'turbo-helper'),
            'subtitle' => __('If you have any custom CSS you would like added to the site, please enter it here.', 'turbo-helper'),
            'mode' => 'css',
            'theme' => 'monokai',
            'desc' => ''
        ),

        array(
            'id' => 'turbo-custom-js',
            'type' => 'ace_editor',
            'title' => __('Custom JS', 'turbo-helper'),
            'subtitle' => __('Paste your JS code here.', 'turbo-helper'),
            'mode' => 'javascript',
            'theme' => 'chrome',
        ),

    )
));


/**
 * Setting for Header Options
 *
 * @since  1.0.0
 * @access public
 * @param  null
 * @return null
 */
Redux::setSection($opt_name, array(
    'title' => __('Header Options', 'turbo-helper'),
    'id' => 'turbowp-header-nav',
    'desc' => __('All header navigation related options are listed here.', 'turbo-helper'),
    'icon' => 'el el-lines',
    'fields' => array(

        array(
            'id' => 'turbo_header_view_type',
            'type' => 'image_select',
            'title' => __('Choose Header Layout', 'turbo-helper'),
            'options' => array(

                'header-menu' => array(
                    'alt' => 'Header One',
                    'img' => REDQFW_IMAGE . '/redux/header-one.png',
                ),
                'header-listing-menu' => array(
                    'alt' => 'Header Two',
                    'img' => REDQFW_IMAGE . '/redux/header-two.png',
                ),
            ),
            'default' => 'header-menu',
        ),

        array(
            'id' => 'turbo_header_type',
            'type' => 'select',
            'title' => __('Choose Header Appearance', 'turbo-helper'),
            'options' => array(
                'default-header' => esc_html__('Default Header', 'turbo-helper'),
                'transparent-header' => esc_html__('Transparent Header', 'turbo-helper'),
            ),
            'default' => 'transparent-header',
        ),

        array(
            'id' => 'turbo_blog_single_header_type',
            'type' => 'select',
            'title' => __('Choose Blog Single Header Appearance', 'turbo-helper'),
            'options' => array(
                'default-header' => esc_html__('Default Header', 'turbo-helper'),
                'transparent-header' => esc_html__('Transparent Header', 'turbo-helper'),
            ),
            'default' => 'transparent-header',
        ),

        array(
            'id' => 'turbo_show_mini_cart',
            'type' => 'select',
            'title' => esc_html__('Enable/Disable Mini Cart', 'turbo-helper'),
            'options' => array(
                'yes' => esc_html__('Yes', 'turbo-helper'),
                'no' => esc_html__('No', 'turbo-helper'),
            ),
            'default' => 'no',
        ),

        array(
            'id' => 'turbo_header_sticky',
            'type' => 'select',
            'title' => esc_html__('Header Is Sticky ?', 'turbo-helper'),
            'options' => array(
                'sticky-header' => esc_html__('Yes', 'turbo-helper'),
                'non-sticky-header' => esc_html__('No', 'turbo-helper'),
            ),
            'default' => 'sticky-header',
        ),

        array(
            'id' => 'turbo_header_sticky_with_animatioin',
            'type' => 'select',
            'title' => esc_html__('Is Header Sticky with Animation ?', 'turbo-helper'),
            'options' => array(
                'yes' => esc_html__('Yes', 'turbo-helper'),
                'no' => esc_html__('No', 'turbo-helper'),
            ),
            'default' => 'yes',
        ),

        array(
            'id' => 'turbo_header_sticky_offset',
            'type' => 'select',
            'title' => esc_html__('Enable header sticky offset ?', 'turbo-helper'),
            'options' => array(
                'yes' => esc_html__('Yes', 'turbo-helper'),
                'no' => esc_html__('No', 'turbo-helper'),
            ),
            'default' => 'no',
        ),

        array(
            'id' => 'turbo_header_sticky_offset',
            'type' => 'select',
            'title' => esc_html__('Enable header sticky offset ?', 'turbo-helper'),
            'options' => array(
                'yes' => esc_html__('Yes', 'turbo-helper'),
                'no' => esc_html__('No', 'turbo-helper'),
            ),
            'default' => 'no',
        ),

        array(
            'id' => 'header-logo',
            'type' => 'media',
            'url' => true,
            'title' => __('Header Logo', 'turbo-helper'),
            'compiler' => 'true',
            'desc' => __('Upload custom logo.', 'turbo-helper'),
        ),

        array(
            'id' => 'turbo_header_background',
            'type' => 'background',
            'title' => __('Header Background', 'turbo-helper'),
            'subtitle' => __('Header background with image, color, etc.', 'turbo-helper'),
            'default' => array(
                'background-color' => '#fff',
            )
        ),

    ),
));



Redux::setSection($opt_name, array(
    'title' => __('Menu Settings', 'turbo-helper'),
    'id' => 'turbowp-menu-settings',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'show_header_login',
            'type' => 'select',
            'title' => __('Header Login/Registration', 'turbo-helper'),
            'options' => array(
                'yes' => __('Yes', 'turbo-helper'),
                'no' => __('No', 'turbo-helper'),
            ),
            'default' => 'no',
        ),

        array(
            'id' => 'show_header_language',
            'type' => 'select',
            'title' => __('Header Language', 'turbo-helper'),
            'options' => array(
                'yes' => __('Yes', 'turbo-helper'),
                'no' => __('No', 'turbo-helper'),
            ),
            'default' => 'no',
        ),

        array(
            'id' => 'turbo-wpml-select',
            'type' => 'select',
            'title' => __('WPML language show type', 'turbo-helper'),
            'subtitle' => __('Select the type how you want to show language selector', 'turbo-helper'),
            'desc' => __('This select type will only work if WPML activated in your theme', 'turbo-helper'),
            'required' => array('show_header_language', '=', 'yes'),
            'options' => array(
                'code' => __('Language Code', 'turbo-helper'),
                'name' => __('Language Name', 'turbo-helper'),
                'flag' => __('Flag', 'turbo-helper'),
            ),
            'default' => 'name',
        ),

        // array(
        //     'id' => 'show_header_currency_switcher',
        //     'type' => 'select',
        //     'title' => __('Header Currency Switcher', 'turbo-helper'),
        //     'options' => array(
        //         'yes' => __('Yes', 'turbo-helper'),
        //         'no' => __('No', 'turbo-helper'),
        //     ),
        //     'default' => 'yes',
        // ),
    ),
));




/**
 * Setting for car sections
 *
 * @since  1.0.0
 * @access public
 * @param  null
 * @return null
 */
Redux::setSection($opt_name, array(
    'title' => __('Car Settings', 'turbo-helper'),
    'id' => 'turbowp-car-settings',
    'desc' => __('All header navigation related options are listed here.', 'turbo-helper'),
    'icon' => 'el el-car',
    'fields' => array()
));

Redux::setSection($opt_name, array(
    'title' => __('Options For Listing Page', 'turbo-helper'),
    'id' => 'turbowp-car-listing-options',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'listing_details_link_text',
            'type' => 'text',
            'title' => __('Listing Details Link Text', 'turbo-helper'),
            'placeholder' => __('E.X - Details', 'turbo-helper'),
            'default' => 'Details',
        ),

        array(
            'id' => 'listing_book_now_btn_text',
            'type' => 'text',
            'title' => __('Book Now Button Text', 'turbo-helper'),
            'placeholder' => __('E.X - Book Now', 'turbo-helper'),
            'default' => 'Book Now',
        ),

        array(
            'id' => 'listing_total_cost_text',
            'type' => 'text',
            'title' => __('Total Cost Text', 'turbo-helper'),
            'placeholder' => __('E.X - Total Cost', 'turbo-helper'),
            'default' => 'Total Cost',
        ),
    ),
));



/**
 * Setting for car sections
 *
 * @since  1.0.0
 * @access public
 * @param  null
 * @return null
 */
Redux::setSection($opt_name, array(
    'title' => __('Blog Settings', 'turbo-helper'),
    'id' => 'turbowp-blog-settings',
    'desc' => __('All blog related options are listed here.', 'turbo-helper'),
    'icon' => 'el el-list-alt',
    'fields' => array(
        array(
            'id' => 'featured-img',
            'type' => 'media',
            'url' => true,
            'title' => __('Blog Default Featured Image', 'turbo-helper'),
            'subtitle' => __('Default image choose for Blog Single page', 'turbo-helper'),
            'compiler' => 'true',
            'desc' => __('Upload Blog Featured Image', 'turbo-helper')
        ),
        array(
            'id' => 'turbo_single_post_header',
            'type' => 'select',
            'title' => esc_html__('Hide single post avatar part', 'turbo-helper'),
            'options' => array(
                'yes' => esc_html__('Yes', 'turbo-helper'),
                'no' => esc_html__('No', 'turbo-helper'),
            ),
            'default' => 'single-post-header-active',
        ),
    ),
));


/**
 * Setting for Banners
 *
 * @since  1.0.0
 * @access public
 * @param  null
 * @return null
 */
Redux::setSection($opt_name, array(
    'title' => __('Banner Options', 'turbo-helper'),
    'id' => 'turbowp-banner-settings',
    'desc' => __('All banner related options are listed here.', 'turbo-helper'),
    'icon' => 'el el-bold',
    'fields' => array(

        array(
            'id' => 'turbo_banner_switch',
            'type' => 'select',
            'title' => __('Show Banner', 'turbo'),
            'subtitle' => __('Do you want to active the banner area?', 'turbo'),
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'default' => 'true',
        ),

        array(
            'id' => 'turbo_multi_banner',
            'type' => 'image_select',
            'title' => __('Turbo Choose Banner', 'turbo'),
            'options' => array(
                'banner-one' => array(
                    'alt' => 'Banner',
                    'img' => REDQFW_IMAGE . '/redux/general-banner.png',
                ),
            ),
            'default' => 'banner-one',
        ),

        array(
            'id' => 'turbo_banner_background',
            'type' => 'background',
            'title' => __('Banner Background', 'turbo-helper'),
            'subtitle' => __('Banner background with image, color, etc.', 'turbo-helper'),
            'default' => array(
                'background-color' => '#212020',
            )
        ),

        array(
            'id' => 'banner_height',
            'type' => 'text',
            'title' => __('Banner Height', 'turbowp-helper'),
            'placeholder' => __('Enter your banner height Ex. 50vh or 50px', 'turbowp-helper'),
            'default' => '35vh'
        ),

        array(
            'id' => 'banner_padding',
            'type' => 'text',
            'title' => __('Banner Padding', 'turbowp-helper'),
            'placeholder' => __('Enter your banner padding Ex. 10px 12px 10px 12px ', 'turbowp-helper'),
            'default' => '10px'
        ),

        array(
            'id' => 'banner_height_mobile',
            'type' => 'text',
            'title' => __('Banner Height For Mobile', 'turbowp-helper'),
            'placeholder' => __('Enter your banner height Ex. 50vh or 50px', 'turbowp-helper'),
            'default' => '35vh'
        ),

        array(
            'id' => 'banner_padding_mobile',
            'type' => 'text',
            'title' => __('Banner Padding For Mobile', 'turbo-helper'),
            'placeholder' => __('Enter your banner padding Ex. 10px 12px 10px 12px ', 'turbo-helper'),
            'default' => '10px'
        ),

        array(
            'id' => 'turbo_banner_overlay',
            'type' => 'select',
            'title' => __('Enable/Disable Banner Overlay', 'turbo'),
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'default' => 'false',
        ),

        array(
            'id' => 'turbo_banner_overlay_bg',
            'type' => 'color',
            'title' => __('Overlay Color', 'turbo-helper'),
            'subtitle' => __('Choose Banner Overlay Background.', 'turbo-helper'),
            'default' => 'white',
            'validate' => 'color',
            'required' => array('turbo_banner_overlay', '=', 'true'),
        ),

        array(
            'id' => 'turbo_breadcrumbs_switch',
            'type' => 'select',
            'title' => __('Show Breadcrumbs', 'turbo'),
            'subtitle' => __('Do you want to active the breadcrumbs area?', 'turbo'),
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'default' => 'true',
        ),

        array(
            'id' => 'turbo_breadcrumbs_alignment',
            'type' => 'select',
            'title' => __('Breadcrumbs Alignment', 'turbo'),
            'subtitle' => __('Set your breadcrumbs alignment ? ', 'turbo'),
            'options' => array(
                'text-left' => __('Left Alignment', 'turbo'),
                'text-center' => __('Center Alignment', 'turbo'),
            ),
            'default' => 'text-left',
        ),


    ),
));


/**
 * Setting for car WooCommerce
 *
 * @since  1.0.0
 * @access public
 * @param  null
 * @return null
 */
Redux::setSection($opt_name, array(
    'title' => __('WooCommerce', 'turbo-helper'),
    'id' => 'turbowp-woocommerce-settings',
    'customizer_width' => '450px',
    'icon' => 'el el-shopping-cart',
    'desc' => __('You will find all woocommerce related templates settings', 'turbo-helper'),
    'fields' => array()
));


Redux::setSection($opt_name, array(
    'title' => __('Product Settings', 'turbo-helper'),
    'id' => 'turbowp-product-page',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'turbo_woocommerce_layout',
            'type' => 'select',
            'title' => __('WooCommerce Layout', 'turbo'),
            'subtitle' => __('Set your wooCommerce layout ? ', 'turbo'),
            'options'       => array(
                'normal_layout'     => __('Normal Layout', 'turbo-helper'),
                'listing_layout'    => __('Listing Layout', 'turbo-helper'),
            ),
            'default' => 'normal_layout',
        ),

        array(
            'id' => 'turbo_product_attribute_display',
            'type' => 'select',
            'title' => esc_html__('Enable/Disable Product Attribute Area', 'turbo-helper'),
            'subtitle' => __('Set your product attribute area ', 'turbo'),
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'default' => 'true',
            'required' => array('turbo_woocommerce_layout', '=', 'listing_layout'),
        ),

        array(
            'id' => 'turbo_product_feature_display',
            'type' => 'select',
            'title' => esc_html__('Enable/Disable Product Feature Area', 'turbo-helper'),
            'subtitle' => __('Set your product feature area ', 'turbo'),
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'default' => 'true',
            'required' => array('turbo_woocommerce_layout', '=', 'listing_layout'),
        ),

        array(
            'id' => 'turbo_product_rnb_display',
            'type' => 'select',
            'title' => esc_html__('Enable/Disable Product Booking Area', 'turbo-helper'),
            'subtitle' => __('Set your product booking area ', 'turbo'),
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'default' => 'true',
            'required' => array('turbo_woocommerce_layout', '=', 'listing_layout'),
        ),

        array(
            'id' => 'turbo_product_location_display',
            'type' => 'select',
            'title' => esc_html__('Enable/Disable Product Location Area', 'turbo-helper'),
            'subtitle' => __('Set your product location area ', 'turbo'),
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'default' => 'true',
            'required' => array('turbo_woocommerce_layout', '=', 'listing_layout'),
        ),

        array(
            'id' => 'turbo_product_comment_display',
            'type' => 'select',
            'title' => esc_html__('Enable/Disable Product Comment Area', 'turbo-helper'),
            'subtitle' => __('Set your product comment area ', 'turbo'),
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'default' => 'true',
            'required' => array('turbo_woocommerce_layout', '=', 'listing_layout'),
        ),

        array(
            'id' => 'turbo_product_review_display',
            'type' => 'select',
            'title' => esc_html__('Enable/Disable Product Review Area', 'turbo-helper'),
            'subtitle' => __('Set your product review area ', 'turbo'),
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'default' => 'true',
            'required' => array('turbo_woocommerce_layout', '=', 'listing_layout'),
        ),

        array(
            'id' => 'turbo_product_upsell_display',
            'type' => 'select',
            'title' => esc_html__('Enable/Disable Product Up-Sell Area', 'turbo-helper'),
            'subtitle' => __('Set your product review area ', 'turbo'),
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'default' => 'true',
            'required' => array('turbo_woocommerce_layout', '=', 'listing_layout'),
        ),
        array(
            'id' => 'turbo_product_related_display',
            'type' => 'select',
            'title' => esc_html__('Enable/Disable Product Cross-Sell Area', 'turbo-helper'),
            'subtitle' => __('Set your product review area ', 'turbo'),
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'default' => 'true',
            'required' => array('turbo_woocommerce_layout', '=', 'listing_layout'),
        ),

        array(
            'id' => 'show_product_top_banner',
            'type' => 'switch',
            'title' => __('Display Top Banner Sections', 'turbo-helper'),
            'default' => true,
            'required' => array('turbo_woocommerce_layout', '=', 'normal_layout'),
        ),

        array(
            'id' => 'show_product_location_map',
            'type' => 'switch',
            'title' => __('Display Location Map', 'turbo-helper'),
            'default' => true,
            'required' => array('turbo_woocommerce_layout', '=', 'normal_layout'),
        ),

        array(
            'id' => 'location_map_heading',
            'type' => 'text',
            'title' => __('Location Section Heading', 'turbo-helper'),
            'placeholder' => __('Location Heading', 'turbo-helper'),
            'default' => 'Location',
            'required' => array('turbo_woocommerce_layout', '=', 'normal_layout'),
        ),

        array(
            'id' => 'book_now_heading',
            'type' => 'text',
            'title' => __('Book Now Section Heading', 'turbo-helper'),
            'placeholder' => __('Book Now Section Heading (HTML allows here)', 'turbo-helper'),
            'default' => 'Book Car Now',
            'required' => array('turbo_woocommerce_layout', '=', 'normal_layout'),
        ),

        array(
            'id' => 'show_related_product',
            'type' => 'switch',
            'title' => __('Display Related & Upsell Products Sections', 'turbo-helper'),
            'default' => true,
            'required' => array('turbo_woocommerce_layout', '=', 'normal_layout'),
        ),

        array(
            'id' => 'show_product_tab_section',
            'type' => 'switch',
            'title' => __('Display Tab Section', 'turbo-helper'),
            'default' => true,
            'required' => array('turbo_woocommerce_layout', '=', 'normal_layout'),
        ),

        array(
            'id' => 'show_faqs_related_products_together',
            'type' => 'switch',
            'title' => __('Display Vertical Related Products & FAQ Sections', 'turbo-helper'),
            'default' => true,
            'required' => array('turbo_woocommerce_layout', '=', 'normal_layout'),
        ),

        // array(
        //     'id' => 'divider_2',
        //     'type' => 'divide'
        // ),

        array(
            'id' => 'show_horizontal_related_products',
            'type' => 'switch',
            'title' => __('Display Horizontal Related Products', 'turbo-helper'),
            'default' => false,
            'required' => array('turbo_woocommerce_layout', '=', 'normal_layout'),
        ),

        array(
            'id' => 'related_products_heading',
            'type' => 'text',
            'title' => __('Related Products Heading', 'turbo-helper'),
            'placeholder' => __('Entr no. of related products', 'turbo-helper'),
            'default' => 'Related Cars',
            'required' => array('turbo_woocommerce_layout', '=', 'normal_layout'),
        ),

        array(
            'id' => 'no_of_related_product',
            'type' => 'text',
            'title' => __('No. of related Products ', 'turbo-helper'),
            'placeholder' => __('Enter no. of related products', 'turbo-helper'),
            'required' => array('turbo_woocommerce_layout', '=', 'normal_layout'),
        ),

        // array(
        //     'id' => 'divider_2',
        //     'type' => 'divide'
        // ),

        array(
            'id' => 'show_horizontal_upsell_products',
            'type' => 'switch',
            'title' => __('Display Horizontal Up-Sell Products', 'turbo-helper'),
            'default' => false,
            'required' => array('turbo_woocommerce_layout', '=', 'normal_layout'),
        ),

        array(
            'id' => 'upsell_products_heading',
            'type' => 'text',
            'title' => __('Up-Sell Products Heading', 'turbo-helper'),
            'placeholder' => __('Entr no. of up-sell products', 'turbo-helper'),
            'default' => 'You may also like !',
            'required' => array('turbo_woocommerce_layout', '=', 'normal_layout'),
        ),

        array(
            'id' => 'no_of_upsell_product',
            'type' => 'text',
            'title' => __('No. of Up-Sell Products ', 'turbo-helper'),
            'placeholder' => __('Enter no. of up-sell products', 'turbo-helper'),
            'required' => array('turbo_woocommerce_layout', '=', 'normal_layout'),
        ),

        // array(
        //     'id' => 'divider_2',
        //     'type' => 'divide'
        // ),

        array(
            'id' => 'show_horizontal_cross_sell_products',
            'type' => 'switch',
            'title' => __('Display Horizontal Cross-sell Products', 'turbo-helper'),
            'default' => false,
            'required' => array('turbo_woocommerce_layout', '=', 'normal_layout'),
        ),

        array(
            'id' => 'cross_sell_products_heading',
            'type' => 'text',
            'title' => __('Cross-sell Products Heading', 'turbo-helper'),
            'placeholder' => __('Entr no. of Cross-sell products', 'turbo-helper'),
            'default' => 'You may also like !',
            'required' => array('turbo_woocommerce_layout', '=', 'normal_layout'),
        ),

        array(
            'id' => 'no_of_cross_sell_product',
            'type' => 'text',
            'title' => __('No. of Cross-sell Products ', 'turbo-helper'),
            'placeholder' => __('Enter no. of Cross-sell products', 'turbo-helper'),
            'required' => array('turbo_woocommerce_layout', '=', 'normal_layout'),
        ),
    ),
));

Redux::setSection($opt_name, array(
    'title' => __('Product Banner', 'turbo-helper'),
    'desc' => __('This banner settings will be applicable only for product single page', 'turbo-helper'),
    'id' => 'turbo-product-page-banner',
    'subsection' => true,
    'fields' => array(

        array(
            'id' => 'turbo_product_banner_switch',
            'type' => 'select',
            'title' => __('Show Product Banner', 'turbo'),
            'subtitle' => __('Do you want to active the banner area?', 'turbo'),
            'options' => array(
                'on' => __('ENABLE', 'turbo'),
                'off' => __('DISABLE', 'turbo'),
            ),
            'default' => 'on',
        ),

        array(
            'id' => 'turbo_product_multi_banner',
            'type' => 'image_select',
            'title' => __('Choose Product Banner', 'turbo'),
            'options' => array(
                'product-banner-one' => array(
                    'alt' => 'Banner One',
                    'img' => REDQFW_IMAGE . '/redux/details-banner-one.png',
                ),
                'product-banner-two' => array(
                    'alt' => 'Banner Two',
                    'img' => REDQFW_IMAGE . '/redux/details-banner-two.png',
                ),
            ),
            'default' => 'product-banner-two',
        ),

        array(
            'id' => 'turbo_set_product_banner_bg',
            'type' => 'select',
            'title' => __('Set Banner Background As', 'turbo'),
            'options' => array(
                'feature_image' => __('Product Feature Image', 'turbo'),
                'color' => __('Color', 'turbo'),
                'image' => __('Image', 'turbo'),
            ),
            'default' => 'feature_image',
        ),

        array(
            'id' => 'turbo_product_banner_background',
            'type' => 'background',
            'title' => __('Product Banner Background', 'turbo-helper'),
            'subtitle' => __('Product Banner background with image, color, etc.', 'turbo-helper'),
            'default' => array(
                'background-color' => '#FFF',
            )
        ),

        array(
            'id' => 'turbo_product_banner_overlay',
            'type' => 'select',
            'title' => __('Enable/Disable Product Banner Overlay', 'turbo'),
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'default' => 'false',
        ),

        array(
            'id' => 'turbo_product_banner_overlay_bg',
            'type' => 'color',
            'title' => __('Overlay Color', 'turbo-helper'),
            'subtitle' => __('Choose Banner Overlay Background.', 'turbo-helper'),
            'default' => 'white',
            'validate' => 'color',
            'required' => array('turbo_product_banner_overlay', '=', 'true'),
        ),

        array(
            'id' => 'turbo_show_gallery_in_container',
            'type' => 'select',
            'title' => __('Show Gallery In Main Content Area', 'turbo'),
            'options' => array(
                'on' => __('Enabale', 'turbo'),
                'off' => __('Disable', 'turbo'),
            ),
            'default' => 'on',
        ),

        array(
            'id' => 'product_banner_height',
            'type' => 'text',
            'title' => __('Banner Height', 'turbo-helper'),
            'placeholder' => __('Enter your banner height Ex. 50', 'turbo-helper'),
            'default' => '50'
        ),

        array(
            'id' => 'turbo_product_breadcrumbs_alignment',
            'type' => 'select',
            'title' => __('Breadcrumbs Alignment', 'turbo'),
            'subtitle' => __('Set your breadcrumbs alignment ? ', 'turbo'),
            'options' => array(
                'text-left' => __('Left Alignment', 'turbo'),
                'text-center' => __('Center Alignment', 'turbo'),
            ),
            'default' => 'text-center',
        ),


    ),
));

Redux::setSection($opt_name, array(
    'title'       => __('Social Share Settings', 'turbo-helper'),
    'id'          => 'turbo_social_share',
    'subsection' => true,
    'fields'    => array(
        array(
            'id'       => 'turbo_social_share_switch',
            'type'     => 'select',
            'title'    => __('Enable/Disable Social Share', 'turbowp-helper'),
            'options'  => array(
                'true' => __('Enable', 'turbo-helper'),
                'false' => __('Disable', 'turbo-helper'),
            ),
            'default'  => 'true',
        ),
        array(
            'id'       => 'turbo_facebook_share',
            'type'     => 'select',
            'title'    => __('Facebook Share', 'turbowp-helper'),
            'subtitle' => __('Do you want to display facebook share button', 'turbowp-helper'),
            'desc'     => __('Do you want to display facebook share button', 'turbowp-helper'),
            'options'  => array(
                'true' => 'Enable',
                'false' => 'Disable',
            ),
            'default'  => 'true',
        ),
        array(
            'id'       => 'turbo_twitter_share',
            'type'     => 'select',
            'title'    => __('Twitter Share', 'turbowp-helper'),
            'subtitle' => __('Do you want to display twitter share button', 'turbowp-helper'),
            'desc'     => __('Do you want to display twitter share button', 'turbowp-helper'),
            'options'  => array(
                'true' => 'Enable',
                'false' => 'Disable',
            ),
            'default'  => 'true',
        ),
        array(
            'id'       => 'turbo_linkedin_share',
            'type'     => 'select',
            'title'    => __('Linkedin Share', 'turbowp-helper'),
            'subtitle' => __('Do you want to display linkedin share button', 'turbowp-helper'),
            'desc'     => __('Do you want to display linkedin share button', 'turbowp-helper'),
            'options'  => array(
                'true' => 'Enable',
                'false' => 'Disable',
            ),
            'default'  => 'true',
        ),
        array(
            'id'       => 'turbo_google_share',
            'type'     => 'select',
            'title'    => __('Google Share', 'turbowp-helper'),
            'subtitle' => __('Do you want to display google share button', 'turbowp-helper'),
            'desc'     => __('Do you want to display google share button', 'turbowp-helper'),
            'options'  => array(
                'true' => 'Enable',
                'false' => 'Disable',
            ),
            'default'  => 'true',
        ),
    ),
));

Redux::setSection($opt_name, array(
    'title' => __('Login/Registration', 'turbo-helper'),
    'id' => 'turbowp-login-regis-settings',
    // 'subsection' => true,
    'fields' => array(

        array(
            'id' => 'login_title',
            'type' => 'text',
            'title' => __('Login Title', 'turbo-helper'),
            'placeholder' => __('Enter your login title', 'turbo-helper'),
            'default' => 'Login Your Account'
        ),

        array(
            'id' => 'login_sub_title',
            'type' => 'textarea',
            'title' => __('Login Sub-Title', 'turbo-helper'),
            'placeholder' => __('Enter your login sub-title', 'turbo-helper'),
            'default' => 'Login to your accounts to discover the great features in this template'
        ),

        array(
            'id' => 'login_reg_promotion_text',
            'type' => 'textarea',
            'title' => __('Login/Registration Promotion Text ', 'turbo-helper'),
            'placeholder' => __('Write your promotion text here', 'turbo-helper')
        ),

        array(
            'id' => 'signup_promotion_title',
            'type' => 'text',
            'title' => __('Signup Promotion Text ', 'turbo-helper'),
            'placeholder' => __('Write your promotion text here', 'turbo-helper')
        ),

        array(
            'id' => 'log_reg_multi_feature_text',
            'type' => 'multi_text',
            'title' => __('Login/Registration Feature List', 'turbo-helper'),
        ),
    ),
));


/**
 * Setting for Google Map
 *
 * @since  1.0.0
 * @access public
 * @param  null
 * @return null
 */
Redux::setSection($opt_name, array(
    'title' => __('Google Map', 'turbo-helper'),
    'id' => 'turbowp-google-map-settings',
    'desc' => __('Google map related setting are available here', 'turbo-helper'),
    'icon' => 'el el-map-marker-alt',
    'fields' => array(
        // array(
        //     'id' => 'google-map-key',
        //     'type' => 'text',
        //     'title' => __('Google Map Key', 'turbo-helper'),
        //     'subtitle' => __('Please enter in your google map key here', 'turbo-helper'),
        //     'desc' => __('', 'turbo-helper')
        // ),

        array(
            'id' => 'map_marker',
            'type' => 'media',
            'url' => true,
            'title' => __('Google Map Marker', 'turbo-helper'),
            'compiler' => 'true',
            'desc' => __('Upload google map marker', 'turbo-helper'),
        ),
    ),
));


/**
 * Setting for Social Profile
 *
 * @since  1.0.0
 * @access public
 * @param  null
 * @return null
 */
Redux::setSection($opt_name, array(
    'title' => __('Social Profile', 'turbo-helper'),
    'id' => 'turbowp-social-settings',
    'icon' => 'el el-group-alt',
    'fields' => array(

        array(
            'id' => 'turbo_social_profile_switch',
            'type' => 'select',
            'title' => __('Show Social Profile ? ', 'turbo-helper'),
            'subtitle' => __('Enable/Disable social profile section', 'turbo-helper'),
            'options' => array(
                'true' => __('ENABLE', 'turbo-helper'),
                'false' => __('DISABLE', 'turbo-helper'),
            ),
            'default' => 'true',
        ),

        array(
            'id' => 'turbo_open_social_link',
            'type' => 'select',
            'title' => __('Open Social Profile Link', 'turbo-helper'),
            'options' => array(
                '_blank' => __('New Tab', 'turbo-helper'),
                'current' => __('Current Tab', 'turbo-helper'),
            ),
            'default' => '_blank',
        ),

        array(
            'id' => 'turbo_social_profile',
            'type' => 'slides',
            'title' => __('Social Profiles', 'turbo-helper'),
            'placeholder' => array(
                'title' => __('Social Profile Name', 'turbo-helper'),
                'description' => __('Font Awesome Icon Name (Ex. fa fa-facebook)', 'turbo-helper'),
                'url' => __('Profile Link', 'turbo-helper'),
            ),
        ),

    ),
));


/**
 * Setting for Footer
 *
 * @since  1.0.0
 * @access public
 * @param  null
 * @return null
 */
Redux::setSection($opt_name, array(
    'title' => __('Footer Options', 'turbo'),
    'id' => 'turbo_footer_nav',
    'desc' => __('All footer options are listed here.', 'turbo'),
    'icon' => 'el el-hand-down',
    'fields' => array(

        array(
            'id' => 'turbo_footer_switch',
            'type' => 'select',
            'title' => __('Show Footer', 'turbo'),
            'subtitle' => __('Do you want to active the footer area that contains all the widgets?', 'turbo'),
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'default' => 'true',
        ),

        array(
            'id' => 'footer-logo',
            'type' => 'media',
            'url' => true,
            'title' => __('Footer Logo', 'turbo-helper'),
            'compiler' => 'true',
            'desc' => __('Upload custom logo.', 'turbo-helper'),
        ),

        array(
            'id' => 'turbo_footer_background',
            'type' => 'background',
            'title' => __('Footer Background', 'turbo-helper'),
            'subtitle' => __('Footer background with image, color, etc.', 'turbo-helper'),
            'default' => array(
                'background-color' => '#212020',
            )
        ),

        array(
            'id' => 'turbo_multi_footer',
            'type' => 'image_select',
            'title' => __('Footer images', 'turbo'),
            'subtitle' => __('Footer layout one works for the widgets which are attached in footer widgets area(Dashboard->Widgets) and  Footer layout three works for the widgets which are attached in footer widgets area two(Dashboard->Widgets)', 'turbo'),
            'options' => array(
                'footer-one' => array(
                    'alt' => 'Footer One',
                    'img' => REDQFW_IMAGE . '/redux/footer-one.png',
                ),

                'footer-two' => array(
                    'alt' => 'Footer Two',
                    'img' => REDQFW_IMAGE . '/redux/footer-two.png',
                ),

                'footer-three' => array(
                    'alt' => 'Footer Three',
                    'img' => REDQFW_IMAGE . '/redux/footer-listing.png',
                ),
            ),
            'default' => 'footer-one',

        ),

        array(
            'id' => 'turbo_footer_widget_onoff',
            'type' => 'select',
            'title' => __('Show Footer Widgets', 'turbo'),
            'subtitle' => __('Do you want to active the footer widget?', 'turbo'),
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'default' => 'true',
        ),

        array(
            'id' => 'turbo_footer_widget_mobile_display',
            'type' => 'select',
            'title' => __('Footer Widgets Mobile Display', 'turbo'),
            'subtitle' => __('Do you want to active the footer toggle widget in mobile devices?', 'turbo'),
            'options' => array(
                'normal' => __('Normal', 'turbo'),
                'toggle' => __('Toggle', 'turbo'),
            ),
            'default' => 'toggle',
        ),

    ),
));


/**
 * Setting for Copyright
 *
 * @since  1.0.0
 * @access public
 * @param  null
 * @return null
 */
Redux::setSection($opt_name, array(
    'title' => __('Copyright Options', 'turbo'),
    'id' => 'turbo_copyright_settings',
    'icon' => 'el el-cc',
    'fields' => array(

        array(
            'id' => 'turbo_footer_copyright_switch',
            'type' => 'select',
            'title' => __('Copyright Section', 'turbo'),
            'subtitle' => __('Enable/Disable Copyright section', 'turbo'),
            'options' => array(
                'true' => __('ENABLE', 'turbo-helper'),
                'false' => __('DISABLE', 'turbo-helper'),
            ),
            'default' => 'true',
        ),

        array(
            'id' => 'turbo_footer_copyright_view',
            'type' => 'select',
            'title' => __('Choose Copyright Section', 'turbo'),
            'subtitle' => __('Choose copyright section for the footer', 'turbo'),
            'options' => array(
                'site-copyright' => __('Copyright View One', 'turbo-helper'),
                'site-listing-copyright' => __('Copyright View Two', 'turbo-helper'),
            ),
            'default' => 'site-copyright',
        ),


        array(
            'id' => 'turbo_copyright_image',
            'type' => 'media',
            'url' => true,
            'title' => __('Copyright Image', 'turbo-helper'),
            'compiler' => 'true',
            'desc' => __('Upload Copyright Image', 'turbo-helper'),
        ),

        array(
            'id' => 'turbo_copyright_background',
            'type' => 'background',
            'title' => __('Copyright Background', 'turbo'),
            'subtitle' => __('Copyright background with image, color, etc.', 'turbo'),
            'default' => array(
                'background-color' => '#191919',
            )
        ),

        array(
            'id' => 'turbo_copyright_text',
            'type' => 'editor',
            'title' => __('Copyright Text', 'turbo'),
            'subtitle' => __('Insert Copyright description', 'turbo'),
        ),

    ),
));


/**
 * Setting for Background
 *
 * @since  1.0.0
 * @access public
 * @param  null
 * @return null
 */
Redux::setSection($opt_name, array(
    'title' => __('Background Options', 'turbo'),
    'id' => 'basic',
    'desc' => __('These are really basic fields!', 'turbo'),
    'customizer_width' => '400px',
    'icon' => 'el el-picture',
    'fields' => array(

        array(
            'id' => 'turbo_body_background',
            'type' => 'background',
            'title' => __('Body Background', 'turbo-helper'),
            'subtitle' => __('Body background with image, color, etc.', 'turbo-helper'),
            'default' => array(
                'background-color' => '#f5f5f5',
            )
        ),


        array(
            'id' => 'turbo_container_background',
            'type' => 'background',
            'title' => __('Container Background', 'turbo-helper'),
            'subtitle' => __('Container background with image, color, etc.', 'turbo-helper'),
            'default' => array(
                'background-color' => '#FFF',
            )
        ),

        array(
            'id' => 'turbo_sidebar_background',
            'type' => 'background',
            'title' => __('Sidebar Background', 'turbo-helper'),
            'subtitle' => __('Sidebar background with image, color, etc.', 'turbo-helper'),
            'default' => array(
                'background-color' => '#FFF',
            )
        ),

        array(
            'id' => 'turbo_main_content_background',
            'type' => 'background',
            'title' => __('Main Content Background', 'turbo-helper'),
            'subtitle' => __('Main Content background with image, color, etc.', 'turbo-helper'),
            'default' => array(
                'background-color' => '#FFF',
            )
        ),


    )
));



/**
 * Setting for Typography
 *
 * @since  1.0.0
 * @access public
 * @param  null
 * @return null
 */
Redux::setSection($opt_name, array(
    'icon' => 'el-icon-website',
    'title' => __('Typography Options', 'turbo-helper'),
    'icon' => 'el el-font',
    'fields' => array(

        array(
            'id' => 'turbo_body_typography',
            'type' => 'typography',
            'title' => __('Body', 'turbo-helper'),
            'google' => true,    // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup' => true,    // Select a backup non-google font in addition to a google font
            'font-style' => false, // Includes font-style and weight. Can use font-style or font-weight to declare
            'subsets' => false, // Only appears if google is true and subsets not set to false
            'font-size' => false,
            'all_styles' => true,    // Enable all Google Font style/weight variations to be added to the page
            'output' => array('body'), // An array of CSS selectors to apply this font style to dynamically
            'units' => 'px', // Defaults to px
            'default' => '',
        ),

        array(
            'id' => 'turbo_header_typography',
            'type' => 'typography',
            'title' => __('Header Typography', 'turbo-helper'),
            'google' => true,
            'font-backup' => true,
            'default'     => array(
                'color'       => '#333',
            ),
            'output' => array('
                .navbar .container .navbar-nav li a,
                .navbar .container-fluid .navbar-nav li a,
                header.header.transparent-header nav.navbar.navbar-default .navbar-nav li a
            '),
            'units' => 'px',
            'subtitle' => __('Typography option with each property can be called individually.', 'turbo-helper'),
        ),

        array(
            'id' => 'turbo_header_menu_dropdown_typography',
            'type' => 'typography',
            'title' => __('Header Menu Dropdown Typography', 'turbo-helper'),
            'google' => true,
            'font-backup' => true,
            'output' => array('
                                    .navbar .container .navbar-nav li .dropdown-menu li a,
                                    .navbar .container .navbar-nav .dropdown-menu li a,
                                    .navbar .container-fluid .navbar-nav .dropdown-menu li a,
                                    .headroom-sticky.sticky-scroll .navbar.navbar-default .navbar-nav li .dropdown-menu a
                                '),
            'units' => 'px',
            'subtitle' => __('Typography option with each property can be called individually.', 'turbo-helper'),
        ),


        array(
            'id' => 'turbo_banner_title_typography',
            'type' => 'typography',
            'title' => __('Banner Title Typography', 'turbo-helper'),
            'google' => true,
            'font-backup' => true,
            'output' => array('.inner-page-banner .rq-title-container .rq-title'),
            'units' => 'px',
            'subtitle' => __('Typography option with each property can be called individually.', 'turbo-helper'),
        ),

        array(
            'id' => 'turbo_content_typography',
            'type' => 'typography',
            'title' => __('Typography For Main Content', 'turbo-helper'),
            'google' => true,
            'font-backup' => true,
            'output' => array(
                '.select2-container--default',
                '.woocommerce .woocommerce-thankyou-order-details li strong',
                '.turbo-listing-woocommerce .rq-listing-page .woocommerce .rq-listing-cart-view .listing-cart-area-footer .cart-collaterals .cart_totals .wc-proceed-to-checkout .checkout-button',
                '.rq-btn-transparent',
                '.rq-title.rq-title-upsell, .rq-title.rq-title-related',
                '.turbo-airbnb-grid .reactive-product-listing-item .product-short-info a .woocommerce-loop-product__title',
                '.turbo-airbnb-grid .reactive-product-listing-item .product-short-info .listing-btn-area a.view-details-btn',
                'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'a',
                '.rq-listing-ps-cell-title',
                '.rq-page-content p',
                '.rq-page-content h1',
                '.rq-page-content h2',
                '.rq-page-content h3',
                '.rq-page-content h4',
                '.rq-page-content h5',
                '.rq-page-content h6',
                '.rq-page-content a',
                // '.rq-page-content span',
                '.rq-listing-wrapper .rq-listing-single .rq-listing-meta a',
                '.rq-contact-us-grid-block .grid-block-single h3',
                '.inner-page-banner .rq-title-container .rq-title',
                '.rq-btn-primary',
                '.rq-subtitle.breadcrumb a',
                '.rq-car-listing-wrapper .rq-listing-choose.rq-listing-grid-two .listing-single .listing-details-two .listing-title a',
                '.rq-car-listing-wrapper .rq-listing-choose.rq-listing-grid-two .listing-single .listing-details-two .listing-attributes ul li',
                '.rq-car-listing-wrapper .rq-listing-choose.rq-listing-grid-two .listing-single .listing-details-two .listing-attributes ul li span',
                '.rq-car-listing-wrapper .rq-listing-choose.rq-listing-grid-two .listing-single .listing-details-two .listing-footer .book-now-text .price .total-text',
                '.react-grid-layout .reactiveDocWrapper .reactiveNormSearchGridContents___ .reuseElementBlock___ .reuseLabelsWrapper___ h3.reuseLabel___, .react-grid-layout .turbo-grid-newSidebar .reactiveNormSearchGridContents___ .reuseElementBlock___ .reuseLabelsWrapper___ h3.reuseLabel___, .viewSearchBlock .reactiveDocWrapper .reactiveNormSearchGridContents___ .reuseElementBlock___ .reuseLabelsWrapper___ h3.reuseLabel___, .viewSearchBlock .turbo-grid-newSidebar .reactiveNormSearchGridContents___ .reuseElementBlock___ .reuseLabelsWrapper___ h3.reuseLabel___',
                '.react-grid-layout .reactiveDocWrapper .reactiveNormSearchGridContents___ .reuseElementBlock___ div label>span, .react-grid-layout .turbo-grid-newSidebar .reactiveNormSearchGridContents___ .reuseElementBlock___ div label>span, .viewSearchBlock .reactiveDocWrapper .reactiveNormSearchGridContents___ .reuseElementBlock___ div label>span, .viewSearchBlock .turbo-grid-newSidebar .reactiveNormSearchGridContents___ .reuseElementBlock___ div label>span',
                '.turbo-how-it-work-content-wrapper .rq-how-it-work-content .how-it-work-single .content',

            )
        ),
        array(
            'id' => 'turbo_blog_widget_title_typography',
            'type' => 'typography',
            'title' => __('Widgets Blog Title Typography', 'turbo-helper'),
            'google' => true,
            'font-backup' => true,
            'output' => array('.rq-sidebar h4.widget-title'),
            'units' => 'px',
            'subtitle' => __('Typography option with each property can be called individually.', 'turbo-helper'),
        ),

        array(
            'id' => 'turbo_blog_widget_content_typography',
            'type' => 'typography',
            'title' => __('Widgets Blog Content Typography', 'turbo-helper'),
            'google' => true,
            'font-backup' => true,
            'output' => array('.rq-sidebar ul li a'),
            'units' => 'px',
            'subtitle' => __('Typography option with each property can be called individually.', 'turbo-helper'),
        ),



        array(
            'id' => 'turbo_widgets_title_typography',
            'type' => 'typography',
            'title' => __('Widgets Title Typography', 'turbo-helper'),
            'google' => true,
            'font-backup' => true,
            'output' => array('.rq-main-footer h4.widget-title'),
            'units' => 'px',
            'subtitle' => __('Typography option with each property can be called individually.', 'turbo-helper'),
        ),

        array(
            'id' => 'turbo_widgets_content_typography',
            'type' => 'typography',
            'title' => __('Widgets Content Typography', 'turbo-helper'),
            'google' => true,
            'font-backup' => true,
            'output' => array('.rq-main-footer ul li a'),
            'units' => 'px',
            'subtitle' => __('Typography option with each property can be called individually.', 'turbo-helper'),
        ),

        array(
            'id' => 'turbo_copyright_typography',
            'type' => 'typography',
            'title' => __('Copyright Typography', 'turbo-helper'),
            'google' => true,
            'font-backup' => true,
            'output' => array('.copyright-content p'),
            'units' => 'px',
            'subtitle' => __('Typography option with each property can be called individually.', 'turbo-helper'),
        ),

    )
));



if (file_exists(dirname(__FILE__) . '/../README.md')) {
    $section = array(
        'icon' => 'el el-list-alt',
        'title' => __('Documentation', 'turbo'),
        'fields' => array(
            array(
                'id' => '17',
                'type' => 'raw',
                'markdown' => true,
                'content_path' => dirname(__FILE__) . '/../README.md', // FULL PATH, not relative please
                //'content' => 'Raw content here',
            ),
        ),
    );
    Redux::setSection($opt_name, $section);
}
/*
 * <--- END SECTIONS
 */


/*
 *
 * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
 *
 */

/*
 *
 * --> Action hook examples
 *
 */

// If Redux is running as a plugin, this will remove the demo notice and links
//add_action( 'redux/loaded', 'remove_demo' );

// Function to test the compiler hook and demo CSS output.
// Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
//add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

// Change the arguments after they've been declared, but before the panel is created
//add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

// Change the default value of a field after it's been set, but before it's been useds
//add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

// Dynamically add a section. Can be also used to modify sections/fields
//add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

/**
 * This is a test function that will let you see when the compiler hook occurs.
 * It only runs if a field    set with compiler=>true is changed.
 * */
if (!function_exists('compiler_action')) {
    function compiler_action($options, $css, $changed_values)
    {
        echo '<h1>The compiler hook has run!</h1>';
        echo "<pre>";
        print_r($changed_values); // Values that have changed since the last save
        echo "</pre>";
        //print_r($options); //Option values
        //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
    }
}

/**
 * Custom function for the callback validation referenced above
 * */
if (!function_exists('redux_validate_callback_function')) {
    function redux_validate_callback_function($field, $value, $existing_value)
    {
        $error = false;
        $warning = false;

        //do your validation
        if ($value == 1) {
            $error = true;
            $value = $existing_value;
        } elseif ($value == 2) {
            $warning = true;
            $value = $existing_value;
        }

        $return['value'] = $value;

        if ($error == true) {
            $return['error'] = $field;
            $field['msg'] = 'your custom error message';
        }

        if ($warning == true) {
            $return['warning'] = $field;
            $field['msg'] = 'your custom warning message';
        }

        return $return;
    }
}

/**
 * Custom function for the callback referenced above
 */
if (!function_exists('redux_my_custom_field')) {
    function redux_my_custom_field($field, $value)
    {
        print_r($field);
        echo '<br/>';
        print_r($value);
    }
}

/**
 * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
 * so you must use get_template_directory_uri() if you want to use any of the built in icons
 * */
if (!function_exists('dynamic_section')) {
    function dynamic_section($sections)
    {
        //$sections = array();
        $sections[] = array(
            'title' => __('Section via hook', 'turbo'),
            'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'turbo'),
            'icon' => 'el el-paper-clip',
            // Leave this as a blank section, no options just some intro text set above.
            'fields' => array()
        );

        return $sections;
    }
}

/**
 * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
 * */
if (!function_exists('change_arguments')) {
    function change_arguments($args)
    {
        //$args['dev_mode'] = true;

        return $args;
    }
}

/**
 * Filter hook for filtering the default value of any given field. Very useful in development mode.
 * */
if (!function_exists('change_defaults')) {
    function change_defaults($defaults)
    {
        $defaults['str_replace'] = 'Testing filter hook!';

        return $defaults;
    }
}

/**
 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
 */
if (!function_exists('remove_demo')) {
    function remove_demo()
    {
        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if (class_exists('ReduxFrameworkPlugin')) {
            remove_filter('plugin_row_meta', array(
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks'
            ), null, 2);

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
        }
    }
}
