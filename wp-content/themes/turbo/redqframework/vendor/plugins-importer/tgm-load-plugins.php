<?php

/**
 * Include the TGM_Plugin_Activation class.
 */


include_once get_template_directory() . '/redqframework/vendor/plugins-importer/class-tgm-plugin-activation.php';
include_once get_template_directory() . '/redqframework/vendor/plugins-importer/plugin-config.php';


add_action('tgmpa_register', 'turbo_register_required_plugins');

function turbo_register_required_plugins()
{
    global $turbo_option_data;

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */

    $active_demo = isset($turbo_option_data['turbo_demo_layout']) && $turbo_option_data['turbo_demo_layout'] ? $turbo_option_data['turbo_demo_layout'] : 'turbo_car_rental_1';

    $required_plugins = [
        [
            'name'     => esc_html__('Turbo Helper', 'turbo'),
            'slug'     => 'turbo-helper',
            'source'   => 'https://s3.amazonaws.com/redqteam.com/turbowp/plugins/' . TURBO_HELPER_PLUG_DIR . '/turbo-helper.zip',
            'required' => true,
            'version' => TURBO_HELPER,
        ],
        [
            'name'     => esc_html__('WooCommerce - excelling eCommerce', 'turbo'),
            'slug'     => 'woocommerce',
            'required' => true,
        ],
        [
            'name'     => esc_html__('Redux - WordPress Option Framework', 'turbo'),
            'slug'     => 'redux-framework',
            'required' => true,
        ],
        [
            'name'     => esc_html__('Reactive Pro', 'turbo'),
            'slug'     => 'reactivepro',
            'source'   => 'https://s3.amazonaws.com/redqteam.com/turbowp/plugins/' . TURBO_REACTIVE_PRO_PLUG_DIR . '/reactivepro.zip',
            'required' => true,
            'version' => TURBO_REACTIVE_PRO
        ],
        [
            'name'     => esc_html__('Reuse Builder', 'turbo'),
            'slug'     => 'redq-reuse-form',
            'source'   => 'https://s3.amazonaws.com/redqteam.com/turbowp/plugins/' . TURBO_REUSE_FORM_PLUG_DIR . '/redq-reuse-form.zip',
            'required' => true,
            'version' => TURBO_REUSE_FORM,
        ],
        [
            'name'     => esc_html__('Load Google Map', 'turbo'),
            'slug'     => 'googlemap',
            'source'   => 'https://s3.amazonaws.com/redqteam.com/turbowp/plugins/' . TURBO_GOOGLE_MAP_PLUG_DIR . '/googlemap.zip',
            'required' => true,
            'version' => TURBO_GOOGLE_MAP
        ],
        [
            'name'     => esc_html__('Contact Form 7', 'turbo'),
            'slug'     => 'contact-form-7',
            'required' => true,
        ],
        [
            'name'     => esc_html__('Visual Composer', 'turbo'),
            'slug'     => 'js_composer',
            'source'   => 'https://s3.amazonaws.com/redqteam.com/turbowp/plugins/' . TURBO_JS_COMPOSER_PLUG_DIR . '/js_composer.zip',
            'required' => true,
            'version' => TURBO_JS_COMPOSER,
        ],
        [
            'name'     => esc_html__('WooCommerce Rental & Bookings', 'turbo'),
            'slug'     => 'woocommerce-rental-and-booking',
            'source'   => 'https://s3.amazonaws.com/redqteam.com/turbowp/plugins/' . TURBO_RNB_PLUG_DIR . '/woocommerce-rental-and-booking.zip',
            'required' => true,
            'version' => TURBO_RNB,
        ],
        [
            'name'     => esc_html__('Demo Importer', 'turbo'),
            'slug'     => 'one-click-demo-import',
            'required' => true,
        ]
    ];

    if ($active_demo === 'turbo_listing') {
        $required_plugins[] = [
            'name'     => esc_html__('Alike - Post Comparison Plugin', 'turbo'),
            'slug'     => 'alike',
            'source'   => 'https: //s3.amazonaws.com/redqteam.com/turbowp/plugins/' . TURBO_ALIKE_PLUG_DIR . '/alike.zip',
            'required' => true,
            'version'  => TURBO_ALIKE,
        ];
        $required_plugins[] = [
            'name'     => esc_html__('WordPress Wishlist, Collection & Bookmark Plugin', 'turbo'),
            'slug'     => 'wwcb',
            'source'   => 'https: //s3.amazonaws.com/redqteam.com/turbowp/plugins/' . TURBO_WISHLIST_PLUG_DIR . '/wwcb.zip',
            'required' => true,
            'version'  => TURBO_WISHLIST,
        ];
    }


    $config = array(
        'id'           => 'tgmpapa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpapa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__('Install Required Plugins', 'turbo'),
            'menu_title'                      => esc_html__('Turbo Required Plugins', 'turbo'),
            'installing'                      => esc_html__('Installing Plugin: %s', 'turbo'), // %s = plugin name.
            'oops'                            => esc_html__('Something went wrong with the plugin API.', 'turbo'),
            'notice_can_install_required'     => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'turbo'), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'turbo'), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'turbo'), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'turbo'), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'turbo'), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'turbo'), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'turbo'), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'turbo'), // %1$s = plugin name(s).
            'install_link'                    => _n_noop('Begin installing plugin', 'Begin installing plugins', 'turbo'),
            'activate_link'                   => _n_noop('Begin activating plugin', 'Begin activating plugins', 'turbo'),
            'return'                          => esc_html__('Return to Required Plugins Installer', 'turbo'),
            'plugin_activated'                => esc_html__('Plugin activated successfully.', 'turbo'),
            'complete'                        => esc_html__('All plugins installed and activated successfully. %s', 'turbo'), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa($required_plugins, $config);
}
