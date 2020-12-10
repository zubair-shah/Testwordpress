<?php
/*
 * Plugin Name: Turbo Helper
 * Plugin URI: http://demo.redq.io/turbo/
 * Description: This a helper plugin for theme-name. Theme redux option panel and short-codes files here.
 * Version: 5.0.2
 * Author: RedQ Team
 * Author URI: https://redq.io
 * Requires at least: 3.6
 * Tested up to: 4.5
 *
 * Text Domain: turbo-helper
 * Domain Path: /languages/
 *
 * Copyright: RedQ,Inc
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly
require_once(ABSPATH . 'wp-admin/includes/plugin.php');
/**
 * Class Turbowp_Helper
 */
class Turbowp_Helper
{
    /**
     * @var null
     */
    protected static $_instance = null;

    /**
     * @create instance on self
     */
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /** 
     * Init class
     */
    public function __construct()
    {
        $this->turbowp_helper_load_all_classes();
        $this->turbowp_helper_app_bootstrap();

        if (class_exists('WPBakeryVisualComposerAbstract')) {
            add_action('plugins_loaded', array($this, 'turbo_vc_component_extend'));
        }

        add_action('plugins_loaded', array(&$this, 'turbowp_file_loader'), 1);
        add_action('plugins_loaded', array(&$this, 'turbowp_helper_language_textdomain'), 1);
        add_action('rnb_after_logical_appearence', array($this, 'turbowp_rnb_after_logical_apearence'), 1);
        add_action('woocommerce_process_product_meta', array($this, 'turbowp_save_meta'), 1, 1);
        add_action('save_post', array($this, 'turbowp_purge_update_post'), 10, 2);
    }

    /**
     * Visual component Extend
     *
     * @return void
     */
    function turbo_vc_component_extend()
    {
        include_once(TNHP_TEMPLATE_PATH . 'vc_function/vc_extend_component.php');
    }

    /**
     * File loader
     *
     * @return void
     */
    function turbowp_file_loader()
    {
        include_once(plugin_dir_path(__FILE__) . 'widget/widgets.php');
    }

    /**
     * Save post hook
     *
     * @param int $ID
     * @param object $post
     * @return void
     */
    function turbowp_purge_update_post($ID, $post)
    {
        $language = turbo_helper_get_lang_prefix();

        if (in_array($post->post_type, ['post', 'page'])) {
            $blog_post_transient_id = turbo_helper_get_blog_posts_transient_id();
            delete_transient($blog_post_transient_id);
        }

        if ($post->post_type === 'product') {
            $top_rated_products_transient_id = turbo_helper_get_trp_transient_id();
            $recent_products_transient_id = turbo_helper_get_rp_transient_id();

            delete_transient($recent_products_transient_id);
            delete_transient($top_rated_products_transient_id);

            delete_transient('pickup_location' . $language);
            delete_transient('dropoff_location' . $language);
            delete_transient('product_cat' . $language);
        }

        if (in_array($post->post_type, ['testimonial', 'page'])) {
            $testimonials_transient_id = turbo_helper_get_testimonials_transient_id();
            delete_transient($testimonials_transient_id);
        }
    }

    /**
     * Add extra settings in RNB
     *
     * @return array
     */
    public function turbowp_rnb_after_logical_apearence()
    {
        $layout = get_post_meta(get_the_ID(), 'redq_choose_product_layout', true);

        woocommerce_wp_select(
            [
                'id'                => 'redq_choose_product_layout',
                'label'             => __('Choose Product Layout', 'turbo-helper'),
                'description'       => sprintf(__('This will be applicable for calendar date blocks', 'turbo-helper'), 'http: //schema.org/'),
                'options'           => array(
                    'right-sidebar' => __('Right Sidebar', 'turbo-helper'),
                    'left-sidebar'  => __('Left Sidebar', 'turbo-helper'),
                ),
                'value'             => $layout
            ]
        );
    }

    /**
     * Save product meta
     *
     * @param int $post_id
     * @return void
     */
    public function turbowp_save_meta($post_id)
    {
        if (isset($_POST['redq_choose_product_layout'])) {
            update_post_meta($post_id, 'redq_choose_product_layout', $_POST['redq_choose_product_layout']);
        }
    }

    /**
     * Constants
     *
     * @return void
     */
    public function turbowp_helper_app_bootstrap()
    {
        define('TNHP_DIR', untrailingslashit(plugin_dir_path(__FILE__)));
        define('TNHP_URL', untrailingslashit(plugins_url(basename(plugin_dir_path(__FILE__)), basename(__FILE__))));
        define('TNHP_FILE', __FILE__);
        define('SC_DIR', untrailingslashit(plugin_dir_path(__FILE__)));

        define('TNHP_CSS', TNHP_URL . '/assets/dist/css/');
        define('TNHP_FRONT_END',  TNHP_URL . '/assets/src/frontend/');
        define('TNHP_IMG',  TNHP_URL . '/assets/src/img/');
        define('TNHP_VEN', TNHP_URL . '/assets/dist/vendor/');
        define('TNHP_JS', TNHP_URL . '/assets/dist/js/');
        define('TNHP_TEMPLATE_PATH', plugin_dir_path(__FILE__) . 'templates/');

        /**
         * frontend part
         */
        new Turbowp_Helper\App\Turbowp_Helper_Frontend_Scripts();
        new Turbowp_Helper\App\Turbowp_Template_Handle();
        new Turbowp_Helper\App\Turbowp_Theme_Helper_Functionality();
        new Turbowp_Helper\Admin\RedQ_Listing();
        new Turbowp_Helper\Admin\SaveMeta();
    }

    /**
     * Load all the classes with composer auto loader
     *
     * @return void
     */
    public function turbowp_helper_load_all_classes()
    {
        include_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
        if (!class_exists('ReduxFramework') && file_exists(dirname(__FILE__) . '/vendor/redux-framework/ReduxCore/framework.php')) {
            require_once(dirname(__FILE__) . '/vendor/redux-framework/ReduxCore/framework.php');
        }
        if (!isset($theme_name_option_data) && file_exists(dirname(__FILE__)  . '/vendor/redux-config/config.php')) {
            require_once(dirname(__FILE__) . '/vendor/redux-config/config.php');
        }
        if (file_exists(dirname(__FILE__)  . '/vendor/cuztom/cuztom.php')) {
            require_once(dirname(__FILE__) . '/vendor/cuztom/cuztom.php');
        }
    }

    /**
     * Get the template path.
     * @return string
     */
    public function template_path()
    {
        return apply_filters('Turbowp_Helper_template_path', 'theme-name-helper-plugin/');
    }

    /**
     * Get the plugin path.
     * @return string
     */
    public function plugin_path()
    {
        return untrailingslashit(plugin_dir_path(__FILE__));
    }

    /**
     * Get the plugin textdomain for multilingual.
     * @return null
     */
    public function turbowp_helper_language_textdomain()
    {
        load_plugin_textdomain('turbo-helper', false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }

    /**
     * Get recent and popular products
     * @return null
     */
    public static function turbowp_get_product_type($type, $post_type = 'post', $orderby = 'date', $order = 'desc', $posts_per_page = 10, $taxonomy = null, $term = null)
    {
        switch ($type) {

            case 'top_rated_product':

                $transient_id = turbo_helper_get_trp_transient_id();
                $results      = get_transient($transient_id);

                if ($results === false) :

                    $results = [];
                    $tr_products = turbo_helper_get_top_rated_products($post_type, $orderby, $order, $posts_per_page);

                    if (!count($tr_products)) {
                        set_transient($transient_id, $results, YEAR_IN_SECONDS);
                    }

                    foreach ($tr_products as $key => $product) {

                        $product_id    = $product->ID;
                        $feature_image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'full');

                        $results[$key] = [
                            'ID'                       => $product_id,
                            'post_title'               => $product->post_title,
                            'post_permalink'           => get_permalink($product_id),
                            'thumbnail_id'             => get_post_thumbnail_id($product_id),
                            'thumbnail_image'          => isset($feature_image[0]) && !empty($feature_image[0]) ? $feature_image[0] : '',
                            'price'                    => get_post_meta($product_id, '_price', true),
                            'rating'                   => $product->average_rating,
                            'no_of_seat'               => get_post_meta($product_id, '_turbowp_car_nice_image_seat', true),
                            'brand_logo'               => get_post_meta($product_id, '_turbowp_car_nice_image_brand_logo', true),
                            'rotate_image'             => get_post_meta($product_id, '_turbowp_car_nice_image_product_nice_image_rotate', true),
                            'transparent_img_bg_color' => get_post_meta($product_id, '_turbowp_car_nice_image_bg_color', true),
                        ];
                    }

                    set_transient($transient_id, $results, YEAR_IN_SECONDS);

                endif;

                return $results;
                break;

            case 'recent_products':

                $transient_id = turbo_helper_get_rp_transient_id();
                $results      = get_transient($transient_id);

                if ($results === false) :

                    $results = [];
                    $recent_products = turbo_helper_get_recent_products($post_type, $orderby, $order, $posts_per_page);

                    if (!count($recent_products)) {
                        set_transient($transient_id, $results, YEAR_IN_SECONDS);
                    }

                    foreach ($recent_products as $key => $product) {

                        $product_id    = $product['ID'];
                        $feature_image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'full');

                        $results[$key] = [
                            'ID'                       => $product_id,
                            'post_title'               => $product['post_title'],
                            'post_permalink'           => get_permalink($product_id),
                            'thumbnail_id'             => get_post_thumbnail_id($product_id),
                            'thumbnail_image'          => isset($feature_image[0]) && !empty($feature_image[0]) ? $feature_image[0] : '',
                            'price'                    => get_post_meta($product_id, '_price', true),
                            'no_of_seat'               => get_post_meta($product_id, '_turbowp_car_nice_image_seat', true),
                            'brand_logo'               => get_post_meta($product_id, '_turbowp_car_nice_image_brand_logo', true),
                            'rotate_image'             => get_post_meta($product_id, '_turbowp_car_nice_image_product_nice_image_rotate', true),
                            'transparent_img_bg_color' => get_post_meta($product_id, '_turbowp_car_nice_image_bg_color', true),
                        ];
                    }

                    set_transient($transient_id, $results, YEAR_IN_SECONDS);
                endif;

                return $results;
                break;

            case 'tips_and_tricks':
                $transient_id = turbo_helper_get_blog_posts_transient_id();
                $results = get_transient($transient_id);

                if ($results === false) {
                    $results = turbo_helper_get_posts($post_type, $orderby, $order, $posts_per_page, $taxonomy = 'category', $term = null);
                    set_transient($transient_id, $results, YEAR_IN_SECONDS);
                }

                return $results;
                break;

            case 'testimonial':

                $transient_id = turbo_helper_get_testimonials_transient_id();
                $results      = get_transient($transient_id);

                if ($results === false) {

                    $results = [];
                    $testimonials = turbo_helper_get_posts('testimonial', $orderby, $order, $posts_per_page);

                    if (!count($testimonials)) {
                        set_transient($transient_id, $results, YEAR_IN_SECONDS);
                    }

                    foreach ($testimonials as $key => $testimonial) {
                        $post_id = $testimonial->ID;
                        $results[$key] = [
                            'id'          => $post_id,
                            'title'       => $testimonial->post_title,
                            'content'     => $testimonial->post_content,
                            'image'       => get_the_post_thumbnail_url($post_id),
                            'author'      => get_post_meta($post_id, '_turbowp_testimonial_author', true),
                            'designation' => get_post_meta($post_id, '_turbowp_testimonial_designation', true),
                            'rating'      => get_post_meta($post_id, '_turbowp_testimonial_rating', true)
                        ];
                    }

                    set_transient($transient_id, $results, YEAR_IN_SECONDS);
                }

                return $results;
                break;

            default:
                break;
        }
    }

    /**
     * Get product non-payable attributes and features
     *
     * @version     1.7.0
     * @access public
     * @param string $taxonomy
     * @return WC_Product or WC_Product_Rental_product
     */
    public static function turbowp_get_non_payable_attributes($taxonomy, $product_id = null)
    {

        if (empty($product_id)) {
            $product_id = get_the_ID();
        } else {
            $product_id = $product_id;
        }

        $payable_attributes_identifiers = get_post_meta($product_id, 'resource_identifier', true);
        $selected_terms = array();

        if (is_array($payable_attributes_identifiers) && !empty($payable_attributes_identifiers)) {
            foreach ($payable_attributes_identifiers as $resource_key => $resource_value) {
                $args = array(
                    'orderby' => 'name',
                    'order'   => 'ASC',
                    'fields'  => 'all',
                );
                if (taxonomy_exists($taxonomy)) {
                    $terms = wp_get_post_terms($resource_value['inventory_id'], $taxonomy, $args);
                }

                if (isset($terms) && is_array($terms)) {
                    foreach ($terms as $term_key => $term_value) {
                        $selected_terms[] = $term_value;
                    }
                }
            }
        }


        $unique = array_map("unserialize", array_unique(array_map("serialize", $selected_terms)));
        $unique_selected_terms = array();

        foreach ($unique as $key => $value) {
            $unique_selected_terms[] = $value;
        }


        switch ($taxonomy) {

            case 'attributes':
                $attributes = array();

                if (isset($unique_selected_terms) && is_array($unique_selected_terms)) {
                    foreach ($unique_selected_terms as $key => $value) {
                        $term_id = $value->term_id;
                        $name = get_term_meta($term_id, 'inventory_attribute_name', true);
                        $avalue = get_term_meta($term_id, 'inventory_attribute_value', true);
                        $icon = get_term_meta($term_id, 'inventory_attribute_icon', true);
                        $attributes[$key]['name'] = $name;
                        $attributes[$key]['value'] = $avalue;
                        $attributes[$key]['icon'] = $icon;
                    }
                }

                return apply_filters('turbowp_non_payable_attributes', $attributes);

                break;

            case 'features':
                $features = array();

                if (isset($unique_selected_terms) && is_array($unique_selected_terms)) {
                    foreach ($unique_selected_terms as $key => $value) {
                        $term_id = $value->term_id;
                        $features[$key] = $value->name;
                    }
                }

                return apply_filters('turbowp_non_payable_features', $features);

                break;

            default:
                return 'something goes wrong';
                break;
        }
    }
}

/**
 * Main instance of Turbowp_Helper.
 *
 * Returns the main instance of TNHP to prevent the need to use globals.
 *
 * @since  1.0
 * @return Turbowp_Helper
 */
function TWPHP()
{
    return Turbowp_Helper::instance();
}

// Global for backwards compatibility.
$GLOBALS['turbo_helper'] = TWPHP();
