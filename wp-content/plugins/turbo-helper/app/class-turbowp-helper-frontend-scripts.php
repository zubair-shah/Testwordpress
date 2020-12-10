<?php

namespace Turbowp_Helper\App;

use Turbowp_Helper\Admin\RedQ_Admin_Lacalize;

/**
 * Turbowp_Helper_Frontend_Scripts
 * @package Turbowp_Helper/App
 * @author RedQ Team
 * @since 1.0
 * @version 1.0
 */
class Turbowp_Helper_Frontend_Scripts
{

    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'turbowp_helper_load_scripts'), 20);
        add_action('admin_enqueue_scripts', array($this, 'turbowp_helper_load_admin_scripts'), 20);
        add_filter('scholar_admin_generator_localize_args', array($this, 'scholar_admin_generator_localize_args'), 10, 1);
    }

    public function turbowp_helper_load_scripts()
    {
        wp_register_script('tnhp-counter', TNHP_FRONT_END . 'countDownTimer.js', array('jquery'), $ver = true, true);
        wp_enqueue_script('tnhp-counter');
    }

    public function turbowp_helper_load_admin_scripts($hook)
    {
        if ($hook === 'post.php') {
            wp_register_script('form-builder-variable', TNHP_VEN . 'scholar-form-builder-variable.js', array(), false, false);
            wp_enqueue_script('form-builder-variable');
            wp_register_script('react', TNHP_VEN . 'react.min.js', array(), $ver = true, true);
            wp_enqueue_script('react');
            wp_register_script('react-dom', TNHP_VEN . 'react-dom.min.js', array(), $ver = true, true);
            wp_enqueue_script('react-dom');
            wp_register_script('turbo-page-settings', TNHP_JS . 'turbo_dynamic_page_settings.js', array(), $ver = true, true);
            wp_enqueue_script('turbo-page-settings');
        }

        if ($this->turbo_helper_allowed_post_setting($hook)) {
            wp_register_script('turbo-post-settings', TNHP_JS . 'turbo_dynamic_post_settings.js', array(), $ver = true, true);
            wp_enqueue_script('turbo-post-settings');
        }

        wp_register_style('turbo-admin-style', TNHP_CSS . 'turbo-admin-style.css', array(), $ver = false, $media = 'all');
        wp_enqueue_style('turbo-admin-style');
    }

    public function scholar_admin_generator_localize_args($args)
    {
        $args['postTypes']         = RedQ_Admin_Lacalize::redq_get_all_posts();
        $args['taxonomies']        = RedQ_Admin_Lacalize::redq_get_all_taxonomies();
        $args['LANG']              = RedQ_Admin_Lacalize::redq_admin_language();
        $args['ERROR_MESSAGE']     = RedQ_Admin_Lacalize::redq_admin_error();
        $args['DYNAMIC_TABS']      = RedQ_Admin_Lacalize::dynamic_page_builder_tab_list();
        $args['DYNAMIC_PAGE']      = RedQ_Admin_Lacalize::dynamic_page_builder_data_provider();
        $args['DYNAMIC_POST_TABS'] = RedQ_Admin_Lacalize::dynamic_post_builder_tab_list();
        $args['DYNAMIC_POST']      = RedQ_Admin_Lacalize::dynamic_post_builder_data_provider();

        return $args;
    }

    /**
     * Allowed page for post settings
     *
     * @return void
     */
    public function turbo_helper_allowed_post_setting($hook)
    {
        $post_type = get_post_type();
        $allowed_types = ['post'];

        if ($post_type && $hook == 'post.php' && in_array($post_type, $allowed_types)) {
            return true;
        }

        return false;
    }
}
