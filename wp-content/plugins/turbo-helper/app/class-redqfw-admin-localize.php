<?php

namespace Turbowp_Helper\Admin;

class RedQ_Admin_Lacalize
{
    public static function redq_admin_language()
    {
        /**
         * Localize language files for js rendering
         */
        $lang = array(
            'POST_TYPE' => esc_html__('Post Type', 'turbo-helper'),
            'TAXONOMY' => esc_html__('Taxonomy', 'turbo-helper'),
            'PLEASE_SELECT_ANY_POST_TYPE_YOU_WANT_TO_ADD_THIS_TAXONOMY' => esc_html__('Please select any post type you want to add this taxonomy', 'turbo-helper'),
            'PLEASE_SELECT_ANY_POST_TYPE_YOU_WANT_TO_ADD_THIS_METABOX' => esc_html__('Please select any post type you want to add this metabox', 'turbo-helper'),
            'PLEASE_SELECT_ANY_TAXONOMT_YOU_WANT_TO_ADD_THIS_TERM_META' => esc_html__('Please select any taxonomy you want to add this term meta', 'turbo-helper'),
            'ENABLE_HIERARCHY' => esc_html__('Enable Hierarchy', 'turbo-helper'),
            'IF_YOU_WANT_TO_ENABLE_THE_TAXONOMY_HIERARCHY_SET_TRUE' => esc_html__('If you want to enable the taxonomy hierarchy set true', 'turbo-helper'),
            'POST_FORMATS' => esc_html__('Post Formats', 'turbo-helper'),
            'ENABLE_POST_FORMATS_INTO_THIS_POST' => esc_html__('Enable post formats into this post.', 'turbo-helper'),
            'PAGE_ATTRIBUTES' => esc_html__('Page Attributes', 'turbo-helper'),
            'ENABLE_PAGE_ATTRIBUTES_INTO_THIS_POST' => esc_html__('Enable page attributes into this post.', 'turbo-helper'),
            'REVISIONS' => esc_html__('Revisions', 'turbo-helper'),
            'ENABLE_REVISIONS_INTO_THIS_POST' => esc_html__('Enable revisions into this post.', 'turbo-helper'),
            'COMMENTS' => esc_html__('Comments', 'turbo-helper'),
            'ENABLE_COMMENTS_INTO_THIS_POST' => esc_html__('Enable comments into this post.', 'turbo-helper'),
            'CUSTOM_FIELDS' => esc_html__('Custom Fields', 'turbo-helper'),
            'ENABLE_CUSTOM_FIELDS_INTO_THIS_POST' => esc_html__('Enable custom fields into this post.', 'turbo-helper'),
            'TRACKBACKS' => esc_html__('Trackbacks', 'turbo-helper'),
            'ENABLE_TRACKBACKS_INTO_THIS_POST' => esc_html__('Enable trackbacks into this post.', 'turbo-helper'),
            'EXCERPT' => esc_html__('Excerpt', 'turbo-helper'),
            'ENABLE_EXCERPT_INTO_THIS_POST' => esc_html__('Enable excerpt into this post.', 'turbo-helper'),
            'THUMBNAIL' => esc_html__('Thumbnail', 'turbo-helper'),
            'ENABLE_THUMBNAIL_INTO_THIS_POST' => esc_html__('Enable thumbnail into this post.', 'turbo-helper'),
            'AUTHOR' => esc_html__('Author', 'turbo-helper'),
            'ENABLE_AUTHOR_INTO_THIS_POST' => esc_html__('Enable author into this post.', 'turbo-helper'),
            'EDITOR' => esc_html__('Editor', 'turbo-helper'),
            'ENABLE_EDITOR_INTO_THIS_POST' => esc_html__('Enable editor into this post.', 'turbo-helper'),
            'TITLE' => esc_html__('Title', 'turbo-helper'),
            'ENABLE_TITILE_INTO_THIS_POST' => esc_html__('Enable title into this post.', 'turbo-helper'),
            'ALL_ITEMS' => esc_html__('All Items', 'turbo-helper'),
            'SINGULAR_NAME' => esc_html__('Singular Name', 'turbo-helper'),
            'POST_SLUG' => esc_html__('Post Slug', 'turbo-helper'),
            'IF_WANT_TO_CHANGE_THE_DEFAULT_ALL_ITEMS_NAME_ADD_THE_NAME_HERE' => esc_html__('If want to change the default all items name, add the name here', 'turbo-helper'),
            'IF_WANT_TO_CHANGE_THE_DEFAULT_SINGULAR_NAME_ADD_THE_NAME_HERE' => esc_html__('If want to change the default singular name, add the name here', 'turbo-helper'),
            'IF_WANT_TO_CHANGE_THE_DEFAULT_POST_SLUG_ADD_THE_NAME_HERE' => esc_html__('If want to change the default post slug, add the slug here', 'turbo-helper'),
            'MENU_POSITION' => esc_html__('Menu Position', 'turbo-helper'),
            'SELECT_THE_POST_TYPE_MENU_POSITION' => esc_html__('Select the post type menu position.', 'turbo-helper'),
            'MENU_ICON' => esc_html__('Menu Icon', 'turbo-helper'),
            'SELECT_MENU_ICON' => esc_html__('Select a menu icon.', 'turbo-helper'),
            'BELOW_FIRST_SEPARATOR' => esc_html__('Below First Separator', 'turbo-helper'),
            'BELOW_POSTS' => esc_html__('Below Posts', 'turbo-helper'),
            'BELOW_MEDIA' => esc_html__('Below Media', 'turbo-helper'),
            'BELOW_LINKS' => esc_html__('Below Links', 'turbo-helper'),
            'BELOW_PAGES' => esc_html__('Below Pages', 'turbo-helper'),
            'BELOW_COMMENTS' => esc_html__('Below Comments', 'turbo-helper'),
            'BELOW_SECOND_SEPARATOR' => esc_html__('Below Second Separator', 'turbo-helper'),
            'BELOW_PLUGINS' => esc_html__('Below Plugins', 'turbo-helper'),
            'BELOW_USERS' => esc_html__('Below Users', 'turbo-helper'),
            'BELOW_TOOLS' => esc_html__('Below Tools', 'turbo-helper'),
            'BELOW_SETTINGS' => esc_html__('Below Settings', 'turbo-helper'),
            'DEFAULT_ICON' => esc_html__('Default Icon', 'turbo-helper'),
            'UPLOAD_ICON' => esc_html__('Upload Icon', 'turbo-helper'),
            'ICON_TYPE' => esc_html__('Icon Type', 'turbo-helper'),
            'SELECT_THE_DEFAULT_ICON_TYPE_OR_UPLOAD_A_NEW' => esc_html__('Select the default icon type or upload a new.', 'turbo-helper'),
            'UPLOAD_CUSTOM_ICON' => esc_html__('Upload Custom Icon', 'turbo-helper'),
            'YOU_CAN_UPLOAD_ANY_CUSTOM_IMAGE_ICON' => esc_html__('You can upload any custom image icon.', 'turbo-helper'),
            'BUNDLE_COMPONENT' => esc_html__('Bundle Component', 'turbo-helper'),
            'PICK_COLOR' => esc_html__('Pick Color', 'turbo-helper'),
            'NO_RESULT_FOUND' => esc_html__('No result found', 'turbo-helper'),
            'SEARCH' => esc_html__('search', 'turbo-helper'),
            'OPEN_ON_SELECTED_HOURS' => esc_html__('Open on selected hours', 'turbo-helper'),
            'ALWAYS_OPEN' => esc_html__('Always open', 'turbo-helper'),
            'NO_HOURS_AVAILABLE' => esc_html__('No hours available', 'turbo-helper'),
            'PERMANENTLY_CLOSE' => esc_html__('Permanently closed', 'turbo-helper'),
            'MONDAY' => esc_html__('Monday', 'turbo-helper'),
            'TUESDAY' => esc_html__('Tuesday', 'turbo-helper'),
            'WEDNESDAY' => esc_html__('Wednesday', 'turbo-helper'),
            'THURSDAY' => esc_html__('Thursday', 'turbo-helper'),
            'FRIDAY' => esc_html__('Friday', 'turbo-helper'),
            'SATURDAY' => esc_html__('Saturday', 'turbo-helper'),
            'SUNDAY' => esc_html__('Sunday', 'turbo-helper'),
            'WRONG_PASS' => esc_html__('Wrong Password', 'turbo-helper'),
            'PASS_MATCH' => esc_html__('Password Matched', 'turbo-helper'),
            'CONFIRM_PASS' => esc_html__('Confirm Password', 'turbo-helper'),
            'CURRENTLY_WORK' => esc_html__('I currently work here', 'turbo-helper'),
            'TEMPLATE_DESIGN_TYPE' => esc_html__('Template Design Type', 'turbo-helper'),
            'PLEASE_SELECT_THE_TEMPLATE_DESIGN_TYPE' => esc_html__('Please select the template design type', 'turbo-helper'),
            'DEFAULT' => esc_html__('Default', 'turbo-helper'),
            'ALTERNATIVE' => esc_html__('Alternatve', 'turbo-helper'),
        );

        return $lang;
    }

    public static function redq_admin_error()
    {
        /**
         * Localize Error Message files for js rendering
         */
        $error_message_list = array(
            'notNull' => esc_html__('The field should not be empty', 'turbo-helper'),
            'email' => esc_html__('The field should be email', 'turbo-helper'),
            'isNumeric' => esc_html__('The field should be numeric', 'turbo-helper'),
            'isURL' => esc_html__('The field should be Url', 'turbo-helper'),
        );

        return $error_message_list;
    }

    // ************************ POST SETTINGS ************************************

    public static function dynamic_post_builder_tab_list()
    {
        $tabs_in_dynamic_post = array();
        $tabs_in_dynamic_post['layout'] = esc_html__('Layout Options', 'turbo-helper');
        $tabs_in_dynamic_post['header'] = esc_html__('Header Options', 'turbo-helper');
        $tabs_in_dynamic_post['banner'] = esc_html__('Banner Options', 'turbo-helper');
        $tabs_in_dynamic_post['product'] = esc_html__('Product Options', 'turbo-helper');
        $tabs_in_dynamic_post['social'] = esc_html__('Social Share Options', 'turbo-helper');
        $tabs_in_dynamic_post['footer'] = esc_html__('Footer Options', 'turbo-helper');
        return $tabs_in_dynamic_post;
    }

    public static function dynamic_post_builder_data_provider()
    {
        $fields[] = array(
            'menuId'    => 'layout',
            'id'        => '_turbo_general_layout',
            'type'      => 'select',
            'label'     => esc_html__('Choose Layout Options Settings', 'turbo-helper'),
            'param'     => 'select',
            'multiple'  => false,
            'clearable' => false,
            'options'   => array(
                'option_panel'  => __('Theme Options Panel', 'turbo-helper'),
                'local_panel'   => __('Current Page Options', 'turbo-helper'),
            ),
            'value'     => 'option_panel',
        );
        $fields[] = array(
            'menuId'    => 'layout',
            'id'        => '_turbo_layout_control',
            'type'      => 'select',
            'label'     => esc_html__('Choose Layout', 'turbo-helper'),
            'param'     => 'select',
            'multiple'  => false,
            'clearable' => false,
            'options'   => array(
                'with_container'    => __('With Container', 'turbo-helper'),
                'without_container' => __('Without Container', 'turbo-helper'),
            ),
            'value'     => 'with_container',
        );

        // General options
        $fields[] = array(
            'menuId'         => 'general',
            'id'             => '_general_options_from',
            'type'             => 'select',
            'label'         => esc_html__('Choose Settings Options', 'turbo-helper'),
            'param'         => 'select',
            'multiple'         => false,
            'clearable'     => false,
            'options'       => array(
                'option_panel'  => __('Global Options Panel', 'turbo-helper'),
                'local_panel'   => __('Current Post Options Panel', 'turbo-helper'),
            ),
            'value'         => 'option_panel',
        );
        $fields[] = array(
            'menuId'         => 'general',
            'id'             => '_layout_options_settings',
            'type'             => 'select',
            'label'         => esc_html__('Choose WooCommerce Layout Options', 'turbo-helper'),
            'param'         => 'select',
            'multiple'         => false,
            'clearable'     => false,
            'options'       => array(
                'normal_layout'     => __('Normal Layout', 'turbo-helper'),
                'listing_layout'    => __('Listing Layout', 'turbo-helper'),
            ),
            'value'         => 'normal_layout',
        );

        // $fields[] = array(
        //     'menuId' => 'general',
        //     'id' => '_choose_color_schema',
        //     'type' => 'select',
        //     'param' 		=> 'select',
        //     'multiple' 	    => false,
        //     'clearable'     => false,
        //     'label' => __('Choose Color Scheme', 'turbowp-helper'),
        //     'options' => array(
        //         'specific' => __('Static color scheme', 'turbowp-helper'),
        //         'dynamic' => __('Dynamic color scheme', 'turbowp-helper'),
        //     ),
        //     'value' => 'specific',
        // );

        // $fields[] = array(
        //     'menuId' => 'general',
        //     'id' => '_turbo_color_scheme',
        //     'type' => 'select',
        //     'param' 		=> 'select',
        //     'multiple' 	    => false,
        //     'clearable'     => false,
        //     'label' => __('Choose Color Scheme', 'turbowp-helper'),
        //     'options' => array(
        //         'yellow' => 'Yellow',
        //         'green' => 'Green',
        //         'blue' => 'Blue',
        //         'teal'  => 'Teal'
        //     ),
        //     'value' => 'yellow',
        // );

        // $fields[] = array(
        //     'menuId' => 'general',
        //     'id' => '_turbo_dynamic_color_scheme_primary_bg',
        //     'type' => 'colorpicker',
        //     'label' => esc_html__('Background Color', 'turbo-helper'),
        //     'param' => 'Color',
        //     'name' => '_turbo_dynamic_color_scheme_primary_bg',
        //     'default_color' => 'true',
        //     'data_default_color' => '#ffab51',
        //     'palettes' => 'true',
        //     'hide_control' => 'true',
        // );

        // $fields[] = array(
        //     'menuId' => 'general',
        //     'id' => '_turbo_dynamic_color_scheme_hover_bg',
        //     'type' => 'colorpicker',
        //     'label' => esc_html__('Hover Color', 'turbo-helper'),
        //     'param' => 'Color',
        //     'name' => '_turbo_dynamic_color_scheme_hover_bg',
        //     'default_color' => 'true',
        //     'data_default_color' => '#ff9019',
        //     'palettes' => 'true',
        //     'hide_control' => 'true',
        // );

        // $fields[] = array(
        // 	'menuId' 		=> 'general',
        // 	'id' 			=> '_choose_custom_post_class',
        //     'type' 			=> 'text',
        //     'label' 		=> esc_html__( 'Choose Custom Post Class', 'turbo-helper' ),
        //     'param' 		=> 'text',
        //     'placeholder' 	=> esc_html__( 'Enter custom css class here...', 'turbo-helper' ),
        // );

        // Header options
        $fields[] = array(
            'menuId'    => 'header',
            'id'        => '_turbo_header_options_from',
            'type'      => 'select',
            'label'     => esc_html__('Choose Header Options From', 'turbo-helper'),
            'param'     => 'select',
            'multiple'  => false,
            'clearable' => false,
            'options'   => array(
                'option_panel'  => esc_html__('Theme Option Panel', 'turbo-helper'),
                'local_panel'   => esc_html__('Current Page Settings', 'turbo-helper'),
            ),
            'value'     => 'option_panel',
        );
        $fields[] = array(
            'id' => '_turbo_display_header',
            'type' => 'switch', // switchalt
            'menuId' => 'header',
            'label' => esc_html__(' Display Header ', 'turbo-helper'),
            'param' => 'enable',
            'value' => true,
        );
        $fields[] = array(
            'menuId' => 'header',
            'id' => '_turbo_header_view',
            'type' => 'select',
            'label' => esc_html__('Choose Header View Layout', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'header-menu' => esc_html__('Header Default Type View', 'turbo-helper'),
                'header-listing-menu' => esc_html__('Header Listing Type View', 'turbo-helper'),
            ),
            'value' => 'header-menu',
        );
        $fields[] = array(
            'menuId' => 'header',
            'id' => '_turbo_header_type',
            'type' => 'select',
            'label' => esc_html__('Choose Header Layout', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'default-header' => esc_html__('Default Header', 'turbo-helper'),
                'transparent-header' => esc_html__('Transparent Header', 'turbo-helper'),
            ),
            'value' => 'default-header',
        );
        $fields[] = array(
            'menuId' => 'header',
            'id' => '_turbo_header_sticky',
            'type' => 'select',
            'label' => esc_html__('Is Header Is Sticky?', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'sticky-header' => esc_html__('Yes', 'turbo-helper'),
                'non-sticky-header' => esc_html__('No', 'turbo-helper'),
            ),
            'value' => 'sticky-header',
        );
        $fields[] = array(
            'menuId' => 'header',
            'id' => '_turbo_header_sticky_with_animatioin',
            'type' => 'select',
            'label' => esc_html__('Is Header Sticky with Animation?', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'yes' => esc_html__('Yes', 'turbo-helper'),
                'no' => esc_html__('No', 'turbo-helper'),
            ),
            'value' => 'yes',
        );
        $fields[] = array(
            'menuId' => 'header',
            'id' => '_turbo_header_sticky_offset',
            'type' => 'select',
            'label' => esc_html__('Is header sticky offset?', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'yes' => esc_html__('Yes', 'turbo-helper'),
                'no' => esc_html__('No', 'turbo-helper'),
            ),
            'value' => 'no',
        );
        $fields[] = array(
            'id' => '_turbo_header_logo',
            'type' => 'imageupload',
            'label' => esc_html__('Header Logo', 'turbo-helper'),
            'param' => 'imageupload',
            'multiple' => false,
            'menuId' => 'header',
        );
        $fields[] = array(
            'menuId' => 'header',
            'id' => '_turbo_header_bg_as',
            'type' => 'select',
            'label' => esc_html__('Header Background Type', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'color' => esc_html__('Color', 'turbo-helper'),
                'image' => esc_html__('Image', 'turbo-helper'),
            ),
            'value' => 'color',
        );
        $fields[] = array(
            'id' => '_turbo_header_bg_image',
            'type' => 'imageupload',
            'label' => esc_html__('Background Image', 'turbo-helper'),
            'param' => 'imageupload',
            'subtitle' => esc_html__('Background Image', 'turbo-helper'),
            'multiple' => false,
            'menuId' => 'header',
        );
        $fields[] = array(
            'menuId' => 'header',
            'id' => '_turbo_header_bg_color',
            'type' => 'colorpicker',
            'label' => esc_html__('Background Color', 'turbo-helper'),
            'param' => 'Color',
            'name' => '_header_bg_color',
            'default_color' => 'true',
            'data_default_color' => '#000000',
            'palettes' => 'true',
            'hide_control' => 'true',
        );
        $fields[] = array(
            'menuId' => 'header',
            'id' => '_turbo_show_right_menu',
            'type' => 'select',
            'label' => esc_html__('Header Right Menu', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => true,
            'options' => array(
                'yes' => __('Yes', 'turbo-helper'),
                'no' => __('No', 'turbo-helper'),
            ),
            'value' => 'yes',
        );
        $fields[] = array(
            'menuId' => 'header',
            'id' => '_turbo_show_header_login',
            'type' => 'select',
            'label' => esc_html__('Show Header Login', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => true,
            'options' => array(
                'yes' => __('Yes', 'turbo-helper'),
                'no' => __('No', 'turbo-helper'),
            ),
            'value' => 'yes',
        );
        $fields[] = array(
            'menuId' => 'header',
            'id' => '_turbo_show_header_language',
            'type' => 'select',
            'label' => esc_html__('Show Header Language', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => true,
            'options' => array(
                'yes' => __('Yes', 'turbo-helper'),
                'no' => __('No', 'turbo-helper'),
            ),
            'value' => 'yes',
        );
        $fields[] = array(
            'menuId' => 'header',
            'id' => '_turbo_show_mini_cart',
            'type' => 'select',
            'label' => esc_html__('Show Mini Cart', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => true,
            'options' => array(
                'yes' => __('Yes', 'turbo-helper'),
                'no' => __('No', 'turbo-helper'),
            ),
            'value' => 'yes',
        );

        // banner option
        $fields[] = array(
            'menuId'         => 'banner',
            'id'             => '_general_banner_options_from',
            'type'             => 'select',
            'label'         => esc_html__('Use General Options', 'turbo-helper'),
            'param'         => 'select',
            'multiple'         => false,
            'clearable'     => false,
            'options'       => array(
                'option_panel'  => __('Global Options Panel', 'turbo-helper'),
                'local_panel'   => __('Current Post Options Panel', 'turbo-helper'),
            ),
            'value'         => 'option_panel',
        );
        $fields[] = array(
            'menuId'         => 'banner',
            'id'             => '_layout_banner_options_settings',
            'type'             => 'select',
            'label'         => esc_html__('Show Product Banner', 'turbo-helper'),
            'param'         => 'select',
            'multiple'         => false,
            'clearable'     => false,
            'options' => array(
                'on' => __('ENABLE', 'turbo'),
                'off' => __('DISABLE', 'turbo'),
            ),
            'value' => 'on',
        );
        $fields[] = array(
            'menuId'         => 'banner',
            'id'             => '_turbo_set_product_banner_bg',
            'type'             => 'select',
            'label'         => esc_html__('Set Banner Background As', 'turbo-helper'),
            'param'         => 'select',
            'multiple'         => false,
            'clearable'     => false,
            'options' => array(
                'feature_image' => __('Product Feature Image', 'turbo'),
                'color' => __('Color', 'turbo'),
                'image' => __('Image', 'turbo'),
            ),
            'value' => 'feature_image',
        );
        $fields[] = array(
            'menuId'         => 'banner',
            'id'             => '_turbo_product_breadcrumbs_alignment',
            'type'             => 'select',
            'label'         => esc_html__('Breadcrumbs Alignment', 'turbo-helper'),
            'param'         => 'select',
            'multiple'         => false,
            'clearable'     => false,
            'options' => array(
                'text-left' => __('Left Alignment', 'turbo'),
                'text-center' => __('Center Alignment', 'turbo'),
            ),
            'value' => 'text-center',
        );
        $fields[] = array(
            'menuId' => 'banner',
            'id' => '_product_banner_height',
            'type' => 'text',
            'label' => esc_html__('Banner Height', 'turbo-helper'),
            'param' => 'text',
            'value' => '50vh',
            'placeholder' => esc_html__('Enter Banner Height', 'turbo-helper'),
        );
        $fields[] = array(
            'menuId'         => 'banner',
            'id'             => '_turbo_product_banner_overlay',
            'type'             => 'select',
            'label'         => esc_html__('Enable/Disable Product Banner Overlay', 'turbo-helper'),
            'param'         => 'select',
            'multiple'         => false,
            'clearable'     => false,
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'value' => 'false',
        );
        $fields[] = array(
            'menuId' => 'banner',
            'id' => '_turbo_product_banner_overlay_bg',
            'type' => 'colorpicker',
            'label' => esc_html__('Overlay Color', 'turbo-helper'),
            'param' => 'Color',
            'name' => '_header_bg_color',
            'default_color' => 'true',
            'data_default_color' => '#fff',
            'palettes' => 'true',
            'hide_control' => 'true',
        );

        // product options
        $fields[] = array(
            'menuId'         => 'product',
            'id'             => '_general_product_options_from',
            'type'             => 'select',
            'label'         => esc_html__('Use General Options', 'turbo-helper'),
            'param'         => 'select',
            'multiple'         => false,
            'clearable'     => false,
            'options'       => array(
                'option_panel'  => __('Global Options Panel', 'turbo-helper'),
                'local_panel'   => __('Current Post Options Panel', 'turbo-helper'),
            ),
            'value'         => 'option_panel',
        );
        $fields[] = array(
            'menuId'         => 'product',
            'id'             => '_product_layout_options_settings',
            'type'             => 'select',
            'label'         => esc_html__('Choose Layout Conditions', 'turbo-helper'),
            'param'         => 'select',
            'multiple'         => false,
            'clearable'     => false,
            'options'       => array(
                'normal_layout'     => __('Normal Layout', 'turbo-helper'),
                'listing_layout'    => __('Listing Layout', 'turbo-helper'),
            ),
            'value'         => 'normal_layout',
        );
        $fields[] = array(
            'menuId'         => 'product',
            'id'             => '_turbo_product_attribute_display',
            'type'             => 'select',
            'label'         => esc_html__('Enable/Disable Product Attribute Area', 'turbo-helper'),
            'param'         => 'select',
            'multiple'         => false,
            'clearable'     => false,
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'value' => 'true',
        );
        $fields[] = array(
            'menuId'         => 'product',
            'id'             => '_turbo_product_feature_display',
            'type'             => 'select',
            'label'         => esc_html__('Enable/Disable Product Feature Area', 'turbo-helper'),
            'param'         => 'select',
            'multiple'         => false,
            'clearable'     => false,
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'value' => 'true',
        );
        $fields[] = array(
            'menuId'         => 'product',
            'id'             => '_turbo_product_rnb_display',
            'type'             => 'select',
            'label'         => esc_html__('Enable/Disable Product Booking Area', 'turbo-helper'),
            'param'         => 'select',
            'multiple'         => false,
            'clearable'     => false,
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'value' => 'true',
        );
        $fields[] = array(
            'menuId'         => 'product',
            'id'             => '_turbo_product_location_display',
            'type'             => 'select',
            'label'         => esc_html__('Enable/Disable Product Location Area', 'turbo-helper'),
            'param'         => 'select',
            'multiple'         => false,
            'clearable'     => false,
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'value' => 'true',
        );
        $fields[] = array(
            'menuId'         => 'product',
            'id'             => '_turbo_product_comment_display',
            'type'             => 'select',
            'label'         => esc_html__('Enable/Disable Product Comment Area', 'turbo-helper'),
            'param'         => 'select',
            'multiple'         => false,
            'clearable'     => false,
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'value' => 'true',
        );
        $fields[] = array(
            'menuId'         => 'product',
            'id'             => '_turbo_product_review_display',
            'type'             => 'select',
            'label'         => esc_html__('Enable/Disable Product Review Area', 'turbo-helper'),
            'param'         => 'select',
            'multiple'         => false,
            'clearable'     => false,
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'value' => 'true',
        );
        $fields[] = array(
            'menuId'         => 'product',
            'id'             => '_turbo_product_upsell_display',
            'type'             => 'select',
            'label'         => esc_html__('Enable/Disable Up-Sell Product  Area', 'turbo-helper'),
            'param'         => 'select',
            'multiple'         => false,
            'clearable'     => false,
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'value' => 'true',
        );
        $fields[] = array(
            'menuId'         => 'product',
            'id'             => '_turbo_product_related_display',
            'type'             => 'select',
            'label'         => esc_html__('Enable/Disable Related Product Area', 'turbo-helper'),
            'param'         => 'select',
            'multiple'         => false,
            'clearable'     => false,
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'value' => 'true',
        );

        // social share
        $fields[] = array(
            'menuId'         => 'social',
            'id'             => '_general_product_share_options_from',
            'type'             => 'select',
            'label'         => esc_html__('Use General Options', 'turbo-helper'),
            'param'         => 'select',
            'multiple'         => false,
            'clearable'     => false,
            'options'       => array(
                'option_panel'  => __('Global Options Panel', 'turbo-helper'),
                'local_panel'   => __('Current Post Options Panel', 'turbo-helper'),
            ),
            'value'         => 'option_panel',
        );

        $fields[] = array(
            'menuId'         => 'social',
            'id'             => '_turbo_social_share_switch',
            'type'             => 'select',
            'label'         => esc_html__('Enable/Disable Social Share', 'turbo-helper'),
            'param'         => 'select',
            'multiple'         => false,
            'clearable'     => false,
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'value' => 'true',
        );

        $fields[] = array(
            'menuId'         => 'social',
            'id'             => '_turbo_facebook_share',
            'type'             => 'select',
            'label'         => esc_html__('Enable/Disable Facebook Share', 'turbo-helper'),
            'param'         => 'select',
            'multiple'         => false,
            'clearable'     => false,
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'value' => 'true',
        );

        $fields[] = array(
            'menuId'         => 'social',
            'id'             => '_turbo_twitter_share',
            'type'             => 'select',
            'label'         => esc_html__('Enable/Disable Twitter Share', 'turbo-helper'),
            'param'         => 'select',
            'multiple'         => false,
            'clearable'     => false,
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'value' => 'true',
        );

        $fields[] = array(
            'menuId'         => 'social',
            'id'             => '_turbo_linkedin_share',
            'type'             => 'select',
            'label'         => esc_html__('Enable/Disable LinkedIn Share', 'turbo-helper'),
            'param'         => 'select',
            'multiple'         => false,
            'clearable'     => false,
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'value' => 'true',
        );


        $fields[] = array(
            'menuId'         => 'social',
            'id'             => '_turbo_google_share',
            'type'             => 'select',
            'label'         => esc_html__('Enable/Disable Google+ Share', 'turbo-helper'),
            'param'         => 'select',
            'multiple'         => false,
            'clearable'     => false,
            'options' => array(
                'true' => __('ENABLE', 'turbo'),
                'false' => __('DISABLE', 'turbo'),
            ),
            'value' => 'true',
        );

        //Footer options

        $fields[] = array(
            'menuId' => 'footer',
            'id' => '_turbo_footer_options_from',
            'type' => 'select',
            'label' => esc_html__('Use Footer Options From', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'option_panel' => __('Theme Options Panel', 'turbo-helper'),
                'local_panel' => __('Current Page Options', 'turbo-helper'),
            ),
            'value' => 'option_panel',
        );

        $fields[] = array(
            'menuId' => 'footer',
            'id' => '_turbo_display_footer',
            'type' => 'switch',
            'label' => esc_html__('Display Footer', 'turbo-helper'),
            'param' => 'enable',
            'value' => true,
        );

        $fields[] = array(
            'menuId' => 'footer',
            'id' => '_turbo_display_footer_widgets',
            'type' => 'switch',
            'label' => esc_html__('Display Footer Widgets', 'turbo-helper'),
            'param' => 'enable',
            'value' => true,
        );

        $fields[] = array(
            'menuId' => 'footer',
            'id' => '_turbo_choose_footer',
            'type' => 'selectGroup',
            'subtype' => 'imageLabel',
            'label' => esc_html__('Choose Footer', 'turbo-helper'),
            'param' => 'thisistheparam',
            'subtitle' => esc_html__('Choose Footer For This Page', 'turbo-helper'),
            'options' => array(
                array(
                    'value' => 'footer-one',
                    'title' => esc_html__('Footer View One', 'turbo-helper'),
                    // 'src' => SCWP_IMG.'footerRedux/footer-one.png',
                    'alt' => esc_html__('Footer Image', 'turbo-helper')
                ),
                array(
                    'value' => 'footer-two',
                    'title' => __('Footer View Two', 'turbo-helper'),
                    // 'src' => SCWP_IMG.'footerRedux/footer-two.png',
                    'alt' => esc_html__('Footer Image', 'turbo-helper')
                ),
                array(
                    'value' => 'footer-three',
                    'title' => __('Footer View Three', 'turbo-helper'),
                    // 'src' => SCWP_IMG.'footerRedux/footer-two.png',
                    'alt' => esc_html__('Footer Image', 'turbo-helper')
                ),

            ),
            'multiple' => false,
            'allButton' => false,
        );
        $fields[] = array(
            'id' => '_turbo_footer_logo',
            'type' => 'imageupload',
            'label' => esc_html__('Footer Logo', 'turbo-helper'),
            'param' => 'imageupload',
            'multiple' => false,
            'menuId' => 'footer',
        );
        $fields[] = array(
            'menuId' => 'footer',
            'id' => '_turbo_footer_bg_as',
            'type' => 'select',
            'label' => esc_html__('Footer Background As', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'color' => __('Color', 'turbo-helper'),
                'image' => __('Image', 'turbo-helper'),
            ),
            'value' => 'color',
        );
        $fields[] = array(
            'menuId' => 'footer',
            'id' => '_turbo_footer_bg_image',
            'type' => 'imageupload',
            'label' => esc_html__('Footer Background Image', 'turbo-helper'),
            'param' => 'imageupload',
            'multiple' => false,
        );
        $fields[] = array(
            'menuId' => 'footer',
            'id' => '_turbo_footer_bg_color',
            'type' => 'colorpicker',
            'label' => esc_html__('Footer Background Color', 'turbo-helper'),
            'param' => 'Color',
            'name' => '_footer_bg_color',
            'default_color' => true,
            'data_default_color' => '#000000',
            'palettes' => true,
            'hide_control' => true,
        );
        $fields[] = array(
            'menuId' => 'footer',
            'id' => '_turbo_footer_widget_mobile_display',
            'type' => 'select',
            'label' => esc_html__('Footer Widgets Mobile Display', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'toggle' => __('Toggle', 'turbo-helper'),
                'normal' => __('Normal', 'turbo-helper'),
            ),
            'value' => 'toggle',
        );
        $fields[] = array(
            'id' => '_turbo_footer_text',
            'type' => 'textarea',
            'label' => esc_html__('Footer Text', 'turbo-helper'),
            'param' => 'text',
            'subtitle' => esc_html__('Insert the footer text (Inlcuding HTML tags)', 'turbo-helper'),
            'placeholder' => esc_html__('enter your text here...', 'turbo-helper'),
            'menuId' => 'footer',
        );
        return $fields;
    }

    public function turbo_re_conditional_logic_post()
    {
        return $allLogicBlockPost = [
            // Header options
            [
                'name' => 'condition101',
                'id' => 322283156285,
                'logicBlock' => [
                    [
                        'id' => 13737583162312,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_header_options_from',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'option_panel',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_display_header',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_header_view',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_header_type',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_header_sticky',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_header_sticky_with_animatioin',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_header_sticky_offset',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_header_logo',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_header_bg_as',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_header_bg_image',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_header_bg_color',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_show_right_menu',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_show_header_login',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_show_header_language',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_show_mini_cart',
                    ],
                ],
            ],


            // Social options
            [
                'name' => 'condition101',
                'id' => 322283156285,
                'logicBlock' => [
                    [
                        'id' => 13737583162312,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_general_product_share_options_from',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'option_panel',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_social_share_switch',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_facebook_share',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_twitter_share',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_linkedin_share',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_google_share',
                    ],
                ],
            ],

            // Footer options
            [
                'name' => 'condition101',
                'id' => 322283156285,
                'logicBlock' => [
                    [
                        'id' => 13737583162312,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_footer_options_from',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'option_panel',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_display_footer',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_display_footer_widgets',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_choose_footer',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_footer_logo',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_footer_bg_as',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_footer_bg_image',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_footer_bg_color',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_footer_widget_mobile_display',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_footer_text',
                    ],
                ],
            ],

            // layout options start
            [
                'name' => 'condition101',
                'id' => 322283156285,
                'logicBlock' => [
                    [
                        'id' => 13737583162312,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_general_layout',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'option_panel',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_layout_control',
                    ],
                ],
            ],
            // layout options end


            // general options start
            [
                'name' => 'condition101',
                'id' => 322283156285,
                'logicBlock' => [
                    [
                        'id' => 13737583162312,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_general_options_from',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'option_panel',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_choose_custom_post_class',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_layout_options_settings',
                    ],
                    // [
                    //     'action' => 'hide',
                    //     'id' => 148733833181529,
                    //     'fieldID' => '_choose_color_schema',
                    // ],

                    // [
                    //     'action' => 'hide',
                    //     'id' => 148733833181529,
                    //     'fieldID' => '_turbo_color_scheme',
                    // ],
                    // [
                    //     'action' => 'hide',
                    //     'id' => 148733833181529,
                    //     'fieldID' => '_turbo_dynamic_color_scheme_primary_bg',
                    // ],
                    // [
                    //     'action' => 'hide',
                    //     'id' => 148733833181529,
                    //     'fieldID' => '_turbo_dynamic_color_scheme_hover_bg',
                    // ],
                ],
            ],

            // [
            //     'name' => 'condition102',
            //     'id' => 322283156185,
            //     'logicBlock' => [
            //         [
            //             'id' => 13737583162322,
            //             'key' => 'field',
            //             'value' => [
            //                 'fieldID' => '_choose_color_schema',
            //                 'secondOperand' => [
            //                     'type' => 'value',
            //                     'value' => 'dynamic',
            //                 ],
            //                 'operator' => 'equal_to',
            //             ],
            //             'childresult' => false,
            //         ],
            //     ],
            //     'effectField' => [
            //         [
            //             'action' => 'hide',
            //             'id' => 148733833181500,
            //             'fieldID' => '_turbo_color_scheme',
            //         ], 
            //     ],
            // ],

            // [
            //     'name' => 'condition102',
            //     'id' => 322283156100,
            //     'logicBlock' => [
            //         [
            //             'id' => 13737583162301,
            //             'key' => 'field',
            //             'value' => [
            //                 'fieldID' => '_choose_color_schema',
            //                 'secondOperand' => [
            //                     'type' => 'value',
            //                     'value' => 'specific',
            //                 ],
            //                 'operator' => 'equal_to',
            //             ],
            //             'childresult' => false,
            //         ],
            //     ],
            //     'effectField' => [
            //         [
            //             'action' => 'hide',
            //             'id' => 148733833181502,
            //             'fieldID' => '_turbo_dynamic_color_scheme_primary_bg',
            //         ],
            //         [
            //             'action' => 'hide',
            //             'id' => 148733833181502,
            //             'fieldID' => '_turbo_dynamic_color_scheme_hover_bg',
            //         ], 
            //     ],
            // ],               

            // general options end



            [
                'name' => 'condition101',
                'id' => 322283156285,
                'logicBlock' => [
                    [
                        'id' => 13737583162312,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_general_banner_options_from',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'option_panel',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_layout_banner_options_settings',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_set_product_banner_bg',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_product_breadcrumbs_alignment',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_product_banner_height',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_product_banner_overlay',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_product_banner_overlay_bg',
                    ],
                ],
            ],
            // product options single
            [
                'name' => 'condition101',
                'id' => 322283156285,
                'logicBlock' => [
                    [
                        'id' => 13737583162312,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_general_product_options_from',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'option_panel',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_product_layout_options_settings',
                    ],

                ],
            ],
            [
                'name' => 'condition102',
                'id' => 148733833181529,
                'logicBlock' => [
                    [
                        'id' => 13737583162312,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_product_layout_options_settings',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'normal_layout',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 13737583162312,
                        'fieldID' => '_turbo_product_attribute_display',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 13737583162312,
                        'fieldID' => '_turbo_product_feature_display',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 13737583162312,
                        'fieldID' => '_turbo_product_feature_display',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 13737583162312,
                        'fieldID' => '_turbo_product_rnb_display',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 13737583162312,
                        'fieldID' => '_turbo_product_location_display',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 13737583162312,
                        'fieldID' => '_turbo_product_comment_display',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 13737583162312,
                        'fieldID' => '_turbo_product_review_display',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 13737583162312,
                        'fieldID' => '_turbo_product_upsell_display',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 13737583162312,
                        'fieldID' => '_turbo_product_related_display',
                    ],
                ],
            ],
        ];
    }

    // ************************ POST SETTINGS ************************************


    // ************************ PAGE SETTINGS ************************************

    public static function dynamic_page_builder_tab_list()
    {
        $tabs_in_dynamic_page = array();
        $tabs_in_dynamic_page['layout'] = esc_html__('Layout Options', 'turbo-helper');
        $tabs_in_dynamic_page['header'] = esc_html__('Header Options', 'turbo-helper');
        $tabs_in_dynamic_page['banner'] = esc_html__('Banner Options', 'turbo-helper');
        $tabs_in_dynamic_page['social'] = esc_html__('Social Profiles', 'turbo-helper');
        $tabs_in_dynamic_page['woocommerce'] = esc_html__('WooCommerce Options', 'turbo-helper');
        //$tabs_in_dynamic_page['sidebar'] = esc_html__('Sidebar Options', 'turbo-helper');
        $tabs_in_dynamic_page['footer'] = esc_html__('Footer Options', 'turbo-helper');
        $tabs_in_dynamic_page['copyright'] = esc_html__('Copyright Options', 'turbo-helper');
        return $tabs_in_dynamic_page;
    }

    public static function dynamic_page_builder_data_provider()
    {
        $fields[] = array(
            'menuId' => 'layout',
            'id' => '_turbo_general_layout',
            'type' => 'select',
            'label' => esc_html__('Choose Layout Options Settings', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'option_panel' => __('Theme Options Panel', 'turbo-helper'),
                'local_panel' => __('Current Page Options', 'turbo-helper'),
            ),
            'value' => 'option_panel',
        );

        $fields[] = array(
            'menuId' => 'layout',
            'id' => '_turbo_layout_control',
            'type' => 'select',
            'label' => esc_html__('Choose Layout', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'with_container' => __('With Container', 'turbo-helper'),
                'without_container' => __('Without Container', 'turbo-helper'),
            ),
            'value' => 'with_container',
        );


        $fields[] = array(
            'menuId' => 'general',
            'id' => '_turbo_general_options_from',
            'type' => 'select',
            'label' => esc_html__('Choose General Options From', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'option_panel' => __('Theme Options Panel', 'turbo-helper'),
                'local_panel' => __('Current Page Options', 'turbo-helper'),
            ),
            'value' => 'option_panel',
        );

        $fields[] = array(
            'menuId' => 'woocommerce',
            'id' => '_turbo_woocommerce_options_form',
            'type' => 'select',
            'label' => esc_html__('Choose WooCommerce Options From', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'option_panel' => __('Theme Options Panel', 'turbo-helper'),
                'local_panel' => __('Current Page Options', 'turbo-helper'),
            ),
            'value' => 'option_panel',
        );

        $fields[] = array(
            'menuId' => 'woocommerce',
            'id' => '_turbo_woocommerce_layout',
            'type' => 'select',
            'label' => esc_html__('Choose WooCommerce View Layout', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options'       => array(
                'normal_layout'     => __('Normal Layout', 'turbo-helper'),
                'listing_layout'    => __('Listing Layout', 'turbo-helper'),
            ),
            'value' => 'normal_layout',
        );


        // Header options

        $fields[] = array(
            'menuId' => 'header',
            'id' => '_turbo_header_options_from',
            'type' => 'select',
            'label' => esc_html__('Choose Header Options From', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'option_panel' => esc_html__('Theme Option Panel', 'turbo-helper'),
                'local_panel' => esc_html__('Current Page Settings', 'turbo-helper'),
            ),
            'value' => 'option_panel',
        );

        $fields[] = array(
            'id' => '_turbo_display_header',
            'type' => 'switch', // switchalt
            'menuId' => 'header',
            'label' => esc_html__(' Display Header ', 'turbo-helper'),
            'param' => 'enable',
            'value' => true,
        );

        $fields[] = array(
            'menuId' => 'header',
            'id' => '_turbo_header_view',
            'type' => 'select',
            'label' => esc_html__('Choose Header View Layout', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'header-menu' => esc_html__('Header Default Type View', 'turbo-helper'),
                'header-listing-menu' => esc_html__('Header Listing Type View', 'turbo-helper'),
            ),
            'value' => 'header-menu',
        );


        $fields[] = array(
            'menuId' => 'header',
            'id' => '_turbo_header_type',
            'type' => 'select',
            'label' => esc_html__('Choose Header Layout', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'default-header' => esc_html__('Default Header', 'turbo-helper'),
                'transparent-header' => esc_html__('Transparent Header', 'turbo-helper'),
            ),
            'value' => 'default-header',
        );

        $fields[] = array(
            'menuId' => 'header',
            'id' => '_turbo_header_sticky',
            'type' => 'select',
            'label' => esc_html__('Is Header Sticky?', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'sticky-header' => esc_html__('Yes', 'turbo-helper'),
                'non-sticky-header' => esc_html__('No', 'turbo-helper'),
            ),
            'value' => 'sticky-header',
        );

        $fields[] = array(
            'menuId' => 'header',
            'id' => '_turbo_header_sticky_with_animatioin',
            'type' => 'select',
            'label' => esc_html__('Is Header Sticky with Animation?', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'yes' => esc_html__('Yes', 'turbo-helper'),
                'no' => esc_html__('No', 'turbo-helper'),
            ),
            'value' => 'yes',
        );

        $fields[] = array(
            'menuId' => 'header',
            'id' => '_turbo_header_sticky_offset',
            'type' => 'select',
            'label' => esc_html__('Is header sticky offset?', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'yes' => esc_html__('Yes', 'turbo-helper'),
                'no' => esc_html__('No', 'turbo-helper'),
            ),
            'value' => 'no',
        );


        $fields[] = array(
            'menuId' => 'header',
            'id' => '_turbo_show_header_login',
            'type' => 'select',
            'label' => esc_html__('Show header login ?', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'yes' => esc_html__('Yes', 'turbo-helper'),
                'no' => esc_html__('No', 'turbo-helper'),
            ),
            'value' => 'yes',
        );


        $fields[] = array(
            'menuId' => 'header',
            'id' => '_turbo_show_header_language',
            'type' => 'select',
            'label' => esc_html__('Show header language ?', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'yes' => esc_html__('Yes', 'turbo-helper'),
                'no' => esc_html__('No', 'turbo-helper'),
            ),
            'value' => 'no',
        );


        $fields[] = array(
            'id' => '_turbo_header_logo',
            'type' => 'imageupload',
            'label' => esc_html__('Header Logo', 'turbo-helper'),
            'param' => 'imageupload',
            'multiple' => false,
            'menuId' => 'header',
        );

        $fields[] = array(
            'menuId' => 'header',
            'id' => '_turbo_header_bg_as',
            'type' => 'select',
            'label' => esc_html__('Header Background Type', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'color' => esc_html__('Color', 'turbo-helper'),
                'image' => esc_html__('Image', 'turbo-helper'),
            ),
            'value' => 'color',
        );

        $fields[] = array(
            'id' => '_turbo_header_bg_image',
            'type' => 'imageupload',
            'label' => esc_html__('Background Image', 'turbo-helper'),
            'param' => 'imageupload',
            'subtitle' => esc_html__('Background Image', 'turbo-helper'),
            'multiple' => false,
            'menuId' => 'header',
        );

        $fields[] = array(
            'menuId' => 'header',
            'id' => '_turbo_header_bg_color',
            'type' => 'colorpicker',
            'label' => esc_html__('Background Color', 'turbo-helper'),
            'param' => 'Color',
            'name' => '_header_bg_color',
            'default_color' => 'true',
            'data_default_color' => '#000000',
            'palettes' => 'true',
            'hide_control' => 'true',
        );

        $fields[] = array(
            'menuId' => 'header',
            'id' => '_turbo_show_right_menu',
            'type' => 'select',
            'label' => esc_html__('Header Right Menu', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => true,
            'options' => array(
                'yes' => __('Yes', 'turbo-helper'),
                'no' => __('No', 'turbo-helper'),
            ),
            'value' => 'yes',
        );

        $fields[] = array(
            'menuId' => 'header',
            'id' => '_turbo_show_header_login',
            'type' => 'select',
            'label' => esc_html__('Show Header Login', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => true,
            'options' => array(
                'yes' => __('Yes', 'turbo-helper'),
                'no' => __('No', 'turbo-helper'),
            ),
            'value' => 'yes',
        );

        $fields[] = array(
            'menuId' => 'header',
            'id' => '_turbo_show_header_language',
            'type' => 'select',
            'label' => esc_html__('Show Header Language', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => true,
            'options' => array(
                'yes' => __('Yes', 'turbo-helper'),
                'no' => __('No', 'turbo-helper'),
            ),
            'value' => 'yes',
        );
        $fields[] = array(
            'menuId' => 'header',
            'id' => '_turbo_show_mini_cart',
            'type' => 'select',
            'label' => esc_html__('Show Mini Cart', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => true,
            'options' => array(
                'yes' => __('Yes', 'turbo-helper'),
                'no' => __('No', 'turbo-helper'),
            ),
            'value' => 'yes',
        );


        //Social options
        $fields[] = array(
            'menuId' => 'social',
            'id' => '_turbo_social_options_from',
            'type' => 'select',
            'label' => esc_html__('Choose General Options From', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'option_panel' => __('Theme Options Panel', 'turbo-helper'),
                'local_panel' => __('Current Page Options', 'turbo-helper'),
            ),
            'value' => 'option_panel',
        );

        $fields[] = array(
            'menuId' => 'social',
            'id' => '_turbo_social_profiles',
            'type' => 'bundle',
            'label' => esc_html__('Social Profiles', 'turbo-helper'),
            'fields' => array(
                array(
                    'id' => '_name',
                    'type' => 'text',
                    'label' => __('Profile Name', 'turbo-helper'),
                ),
                array(
                    'id' => '_icon',
                    'type' => 'iconpicker',
                    'label' => __('Profile Icon', 'turbo-helper'),
                    'placeholder' => 'enter your icon here...',
                ),
                array(
                    'id' => '_link',
                    'type' => 'text',
                    'label' => __('Profile Link', 'turbo-helper'),
                ),
                array(
                    'id' => '_open_link',
                    'type' => 'select',
                    'label' => __('Open Link', 'turbo-helper'),
                    'options' => array(
                        'own_window' => esc_html__('Own Window', 'turbo-helper'),
                        'new_tab' => esc_html__('New Tab', 'turbo-helper'),
                    ),
                    'value' => 'new_tab',
                ),
            ),
        );


        //Footer options

        $fields[] = array(
            'menuId' => 'footer',
            'id' => '_turbo_footer_options_from',
            'type' => 'select',
            'label' => esc_html__('Use Footer Options From', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'option_panel' => __('Theme Options Panel', 'turbo-helper'),
                'local_panel' => __('Current Page Options', 'turbo-helper'),
            ),
            'value' => 'option_panel',
        );

        $fields[] = array(
            'menuId' => 'footer',
            'id' => '_turbo_display_footer',
            'type' => 'switch',
            'label' => esc_html__('Display Footer', 'turbo-helper'),
            'param' => 'enable',
            'value' => true,
        );

        $fields[] = array(
            'menuId' => 'footer',
            'id' => '_turbo_display_footer_widgets',
            'type' => 'switch',
            'label' => esc_html__('Display Footer Widgets', 'turbo-helper'),
            'param' => 'enable',
            'value' => true,
        );

        $fields[] = array(
            'menuId' => 'footer',
            'id' => '_turbo_choose_footer',
            'type' => 'selectGroup',
            'subtype' => 'imageLabel',
            'label' => esc_html__('Choose Footer', 'turbo-helper'),
            'param' => 'thisistheparam',
            'subtitle' => esc_html__('Choose Footer For This Page', 'turbo-helper'),
            'options' => array(
                array(
                    'value' => 'footer-one',
                    'title' => esc_html__('Footer View One', 'turbo-helper'),
                    // 'src' => SCWP_IMG.'footerRedux/footer-one.png',
                    'alt' => esc_html__('Footer Image', 'turbo-helper')
                ),
                array(
                    'value' => 'footer-two',
                    'title' => __('Footer View Two', 'turbo-helper'),
                    // 'src' => SCWP_IMG.'footerRedux/footer-two.png',
                    'alt' => esc_html__('Footer Image', 'turbo-helper')
                ),
                array(
                    'value' => 'footer-three',
                    'title' => __('Footer View Three', 'turbo-helper'),
                    // 'src' => SCWP_IMG.'footerRedux/footer-two.png',
                    'alt' => esc_html__('Footer Image', 'turbo-helper')
                ),

            ),
            // 'options' => array(
            //     'footer-one' => __('Footer View One', 'turbo-helper'),
            //     'footer-two' => __('Footer View Two', 'turbo-helper'),
            //     'footer-three' => __('Footer View Three', 'turbo-helper'),
            // ),
            // 'value' => 'footer-one',
            'multiple' => false,
            'allButton' => false,
        );

        $fields[] = array(
            'id' => '_turbo_footer_logo',
            'type' => 'imageupload',
            'label' => esc_html__('Footer Logo', 'turbo-helper'),
            'param' => 'imageupload',
            'multiple' => false,
            'menuId' => 'footer',
        );

        $fields[] = array(
            'menuId' => 'footer',
            'id' => '_turbo_footer_bg_as',
            'type' => 'select',
            'label' => esc_html__('Footer Background As', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'color' => __('Color', 'turbo-helper'),
                'image' => __('Image', 'turbo-helper'),
            ),
            'value' => 'color',
        );

        $fields[] = array(
            'menuId' => 'footer',
            'id' => '_turbo_footer_bg_image',
            'type' => 'imageupload',
            'label' => esc_html__('Footer Background Image', 'turbo-helper'),
            'param' => 'imageupload',
            'multiple' => false,
        );

        $fields[] = array(
            'menuId' => 'footer',
            'id' => '_turbo_footer_bg_color',
            'type' => 'colorpicker',
            'label' => esc_html__('Footer Background Color', 'turbo-helper'),
            'param' => 'Color',
            'name' => '_footer_bg_color',
            'default_color' => true,
            'data_default_color' => '#000000',
            'palettes' => true,
            'hide_control' => true,
        );

        $fields[] = array(
            'menuId' => 'footer',
            'id' => '_turbo_footer_widget_mobile_display',
            'type' => 'select',
            'label' => esc_html__('Footer Widgets Mobile Display', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'toggle' => __('Toggle', 'turbo-helper'),
                'normal' => __('Normal', 'turbo-helper'),
            ),
            'value' => 'toggle',
        );

        $fields[] = array(
            'id' => '_turbo_footer_text',
            'type' => 'textarea',
            'label' => esc_html__('Footer Text', 'turbo-helper'),
            'param' => 'text',
            'subtitle' => esc_html__('Insert the footer text (Inlcuding HTML tags)', 'turbo-helper'),
            'placeholder' => esc_html__('enter your text here...', 'turbo-helper'),
            'menuId' => 'footer',
        );


        //Banner Options
        $fields[] = array(
            'menuId' => 'banner',
            'id' => '_turbo_banner_options_from',
            'type' => 'select',
            'label' => esc_html__('User Banner Options From', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'option_panel' => __('Theme Options Panel', 'turbo-helper'),
                'local_panel' => __('Current Page Options', 'turbo-helper'),
            ),
            'value' => 'option_panel',
        );


        $fields[] = array(
            'menuId' => 'banner',
            'id' => '_turbo_display_banner',
            'type' => 'switch', // switchalt
            'label' => esc_html__('Show Banner', 'turbo-helper'),
            'param' => 'enable',
            'value' => true,
        );

        $fields[] = array(
            'menuId' => 'banner',
            'id' => '_turbo_choose_banner',
            'type' => 'select',
            'label' => esc_html__('Choose Banner', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'banner-one' => __('Banner One', 'turbo-helper'),
            ),
            'value' => 'banner-one',
        );

        $fields[] = array(
            'menuId' => 'banner',
            'id' => '_turbo_banner_bg_as',
            'type' => 'select',
            'label' => esc_html__('Banner Background As', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'color' => __('Color', 'turbo-helper'),
                'image' => __('Image', 'turbo-helper'),
            ),
            'value' => 'color',
        );

        $fields[] = array(
            'menuId' => 'banner',
            'id' => '_turbo_banner_bg_image',
            'type' => 'imageupload',
            'label' => esc_html__('Banner Image', 'turbo-helper'),
            'param' => 'imageupload',
            'multiple' => false,
        );

        $fields[] = array(
            'menuId' => 'banner',
            'id' => '_turbo_banner_bg_color',
            'type' => 'colorpicker',
            'label' => esc_html__('Banner Color', 'turbo-helper'),
            'param' => 'Color',
            'name' => 'banner_bg_color',
            'default_color' => true,
            'data_default_color' => '#000000',
            'palettes' => true,
            'hide_control' => true,
        );

        $fields[] = array(
            'menuId' => 'banner',
            'id' => '_turbo_banner_height',
            'type' => 'text',
            'label' => esc_html__('Banner Height', 'turbo-helper'),
            'param' => 'slider_shortcode',
            'value' => '',
            'placeholder' => esc_html__('Enter banner height Ex. 50vh or 50px', 'turbo-helper'),
        );

        $fields[] = array(
            'menuId' => 'banner',
            'id' => '_turbo_banner_padding',
            'type' => 'text',
            'label' => esc_html__('Banner Padding', 'turbo-helper'),
            'param' => 'slider_shortcode',
            'value' => '',
            'placeholder' => esc_html__('Enter banner padding', 'turbo-helper'),
        );

        $fields[] = array(
            'menuId' => 'banner',
            'id' => '_turbo_banner_height_mobile',
            'type' => 'text',
            'label' => esc_html__('Banner Height For Mobile', 'turbo-helper'),
            'param' => 'slider_shortcode',
            'value' => '',
            'placeholder' => esc_html__('Enter banner height Ex. 50vh or 50px', 'turbo-helper'),
        );

        $fields[] = array(
            'menuId' => 'banner',
            'id' => '_turbo_banner_padding_mobile',
            'type' => 'text',
            'label' => esc_html__('Banner Padding For Mobile', 'turbo-helper'),
            'param' => 'slider_shortcode',
            'value' => '',
            'placeholder' => esc_html__('Enter banner padding', 'turbo-helper'),
        );

        $fields[] = array(
            'menuId' => 'banner',
            'id' => '_turbo_banner_overlay',
            'type' => 'select',
            'label' => esc_html__('Enable/Disable Banner Overlay', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => true,
            'options' => array(
                'true' => __('Enable', 'turbo-helper'),
                'false' => __('Disable', 'turbo-helper'),
            ),
            'value' => 'false',
        );

        $fields[] = array(
            'menuId' => 'banner',
            'id' => '_turbo_banner_overlay_bg',
            'type' => 'colorpicker',
            'label' => esc_html__('Banner Overlay Background Color', 'turbo-helper'),
            'param' => 'Color',
            'name' => 'banner_bg_color',
            'default_color' => true,
            'data_default_color' => '#fff',
            'palettes' => true,
            'hide_control' => true,
        );

        $fields[] = array(
            'menuId' => 'banner',
            'id' => '_turbo_display_breadcrumbs',
            'type' => 'switch', // switchalt
            'label' => esc_html__('Show BreadCrumbs', 'turbo-helper'),
            'param' => 'enable',
            'value' => true,
        );

        $fields[] = array(
            'menuId' => 'banner',
            'id' => '_turbo_breadcrumbs_alignment',
            'type' => 'select',
            'label' => __('Banner Content Alignment', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'text-center' => __('Center Alignment', 'turbo-helper'),
                'text-left' => __('Left Alignment', 'turbo-helper'),
            ),
            'value' => 'text-center',
        );

        $fields[] = array(
            'menuId' => 'banner',
            'id' => '_turbo_breadcrumbs_delimeter',
            'type' => 'text',
            'label' => __('Enter HTML code for BreadCrumbs Arrow Here', 'turbo-helper'),
            'param' => 'text',
            'repeat' => false,
            'value' => '&#x2192;',
        );

        //Copyright options
        $fields[] = array(
            'menuId' => 'copyright',
            'id' => '_turbo_copyright_options_from',
            'type' => 'select',
            'label' => esc_html__('Use Copyright Options From', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'option_panel' => esc_html__('Theme Option Panel', 'turbo-helper'),
                'local' => esc_html__('Current Page Settings', 'turbo-helper'),
            ),
            'value' => 'option_panel',
        );

        $fields[] = array(
            'menuId' => 'copyright',
            'id' => '_turbo_display_copyright',
            'type' => 'switch',
            'label' => esc_html__('Display Copyright', 'turbo-helper'),
            'param' => 'enable',
            'value' => true,
        );


        $fields[] = array(
            'menuId' => 'copyright',
            'id' => '_turbo_choose_copyright',
            'type' => 'selectGroup',
            'subtype' => 'imageLabel',
            'label' => esc_html__('Choose Copyright', 'turbo-helper'),
            'param' => 'thisistheparam',
            'subtitle' => esc_html__('Choose Copyright section for this page', 'turbo-helper'),
            'options' => array(
                array(
                    'value' => 'site-copyright',
                    'title' => esc_html__('Copyright View One', 'turbo-helper'),
                    // 'src' => SCWP_IMG.'footerRedux/footer-one.png',
                    'alt' => esc_html__('Copyright View Image', 'turbo-helper')
                ),
                // array(
                //     'value' => 'site-listing-copyright',
                //     'title' => __('Copyright View Two', 'turbo-helper'),
                // 	// 'src' => SCWP_IMG.'footerRedux/footer-two.png',
                //     'alt' => esc_html__('Copyright View Image', 'turbo-helper')
                // ),
            ),
            'multiple' => false,
            'allButton' => false,
        );

        $fields[] = array(
            'menuId' => 'copyright',
            'id' => '_turbo_copyright_logo',
            'type' => 'imageupload',
            'label' => esc_html__('Copyright Logo', 'turbo-helper'),
            'param' => 'imageupload',
            'multiple' => false,
        );

        $fields[] = array(
            'menuId' => 'copyright',
            'id' => '_turbo_copyright_bg_as',
            'type' => 'select',
            'label' => esc_html__('Copyright Background As', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'color' => __('Color', 'turbo-helper'),
                'image' => __('Image', 'turbo-helper'),
            ),
            'value' => 'color',
        );

        $fields[] = array(
            'menuId' => 'copyright',
            'id' => '_turbo_copyright_bg_image',
            'type' => 'imageupload',
            'label' => esc_html__('Copyright Background Image', 'turbo-helper'),
            'param' => 'imageupload',
            'multiple' => false,
        );

        $fields[] = array(
            'menuId' => 'copyright',
            'id' => '_turbo_copyright_bg_color',
            'type' => 'colorpicker',
            'label' => esc_html__('Copyright Background Color', 'turbo-helper'),
            'param' => 'Color',
            'name' => 'copyright_bg_color',
            'default_color' => true,
            'value' => '#000000',
            'palettes' => true,
            'hide_control' => true,
        );

        $fields[] = array(
            'id' => '_turbo_copyright_text',
            'type' => 'textarea',
            'label' => esc_html__('Copyright Text', 'turbo-helper'),
            'param' => 'text',
            'subtitle' => esc_html__('Insert the copyright text (Inlcuding HTML tags)', 'turbo-helper'),
            'placeholder' => esc_html__('enter your text here...', 'turbo-helper'),
            'menuId' => 'copyright',
        );

        $fields[] = array(
            'menuId' => 'sidebar',
            'id' => '_turbo_sidebar_options_from',
            'type' => 'select',
            'label' => esc_html__('Use Sidebar Options From', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'option_panel' => esc_html__('Scholar Option Panel', 'turbo-helper'),
                'local' => esc_html__('Current Page Settings', 'turbo-helper'),
            ),
            'value' => 'option_panel',
        );

        $fields[] = array(
            'menuId' => 'sidebar',
            'id' => '_turbo_sidebar_content_as',
            'type' => 'select',
            'label' => esc_html__('SideBar Content As', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => array(
                'widgets' => esc_html__('Widgets', 'turbo-helper'),
                'sidebar_menu' => esc_html__('Elements Menu', 'turbo-helper'),
            ),
            'value' => 'widgets',
        );

        global $wp_registered_sidebars;

        $widgets_areas = array();
        if (isset($wp_registered_sidebars) && is_array($wp_registered_sidebars)) :
            foreach ($wp_registered_sidebars as $key => $value) {
                $widgets_areas[$key] = $value['name'];
            }
        endif;

        $fields[] = array(
            'menuId' => 'sidebar',
            'id' => 'scholar_page_widget_sidebar',
            'type' => 'select',
            'label' => esc_html__('Choose Widgets Area', 'turbo-helper'),
            'param' => 'select',
            'multiple' => false,
            'clearable' => false,
            'options' => $widgets_areas,
        );

        $fields[] = array(
            'id' => 'page_sidebar',
            'type' => 'textarea',
            'label' => esc_html__('Element Menu Sidebar Text', 'turbo-helper'),
            'param' => 'text',
            'subtitle' => esc_html__('Insert the copyright text (Inlcuding HTML tags)', 'turbo-helper'),
            'placeholder' => esc_html__('enter your text here...', 'turbo-helper'),
            'menuId' => 'sidebar',
        );

        return $fields;
    }

    public function turbo_re_conditional_logic()
    {
        return $allLogicBlock = [
            [
                'name' => 'condition101',
                'id' => 322283156285,
                'logicBlock' => [
                    [
                        'id' => 13737583162312,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_woocommerce_options_form',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'option_panel',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_woocommerce_layout',
                    ],
                ],
            ],
            [
                'name' => 'condition101',
                'id' => 322283156285,
                'logicBlock' => [
                    [
                        'id' => 13737583162312,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_header_options_from',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'option_panel',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_show_header_language',
                    ],

                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_show_header_login',
                    ],


                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_header_view',
                    ],


                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_display_header',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_header_type',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_header_sticky',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_header_sticky_with_animatioin',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_header_sticky_offset',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_header_logo',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_header_bg_as',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_header_bg_image',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_header_bg_color',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_show_right_menu',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_show_header_login',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_show_header_language',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_show_mini_cart',
                    ],
                ],
            ],
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_header_bg_as',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'color',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_header_bg_image',
                    ],
                ],
            ],
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_header_bg_as',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'image',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_header_bg_color',
                    ],
                ],
            ],
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_header_bg_as',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'undefined',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_header_bg_image',
                    ],
                ],
            ],
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_show_right_menu',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'no',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_show_header_login',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_show_header_language',
                    ],
                ],
            ],
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_show_right_menu',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'undefined',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_show_header_login',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_show_header_language',
                    ],
                ],
            ],

            //Footer
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_footer_options_from',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'option_panel',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_display_footer',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_display_footer_widgets',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_choose_footer',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_footer_logo',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_footer_bg_as',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_footer_bg_color',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_footer_bg_image',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_footer_widget_mobile_display',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_footer_text',
                    ],
                ],
            ],
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_footer_options_from',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'undefined',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_display_footer',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_display_footer_widgets',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_choose_footer',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_footer_logo',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_footer_bg_as',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_footer_bg_color',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_footer_bg_image',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_footer_widget_mobile_display',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_footer_text',
                    ],
                ],
            ],
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_footer_bg_as',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'color',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_footer_bg_image',
                    ],
                ],
            ],
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_footer_bg_as',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'image',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_footer_bg_color',
                    ],
                ],
            ],
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_footer_bg_as',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'undefined',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_footer_bg_image',
                    ],
                ],
            ],

            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_choose_footer',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'footer-one',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_footer_logo',
                    ],
                ],
            ],
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_choose_footer',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'undefined',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_footer_logo',
                    ],
                ],
            ],

            //Sidebar
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_sidebar_options_from',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'option_panel',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_sidebar_content_as',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => 'scholar_page_widget_sidebar',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => 'page_sidebar',
                    ],
                ],
            ],
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_sidebar_options_from',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'undefined',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_sidebar_content_as',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => 'scholar_page_widget_sidebar',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => 'page_sidebar',
                    ],
                ],
            ],
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_sidebar_content_as',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'widgets',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => 'page_sidebar',
                    ],
                ],
            ],
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_sidebar_content_as',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'sidebar_menu',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => 'scholar_page_widget_sidebar',
                    ],
                ],
            ],
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_sidebar_content_as',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'undefined',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => 'page_sidebar',
                    ],
                ],
            ],
            //Sidebar option
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_banner_options_from',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'option_panel',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_display_banner',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_choose_banner',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_banner_bg_as',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_banner_bg_image',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_banner_bg_color',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_banner_height',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_choose_height_unit',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_banner_padding',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_display_breadcrumbs',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_breadcrumbs_alignment',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_breadcrumbs_delimeter',
                    ],
                ],
            ],
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_banner_options_from',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'undefined',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_display_banner',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_choose_banner',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_banner_bg_as',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_banner_bg_image',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_banner_bg_color',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_banner_height',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_banner_padding',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_display_breadcrumbs',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_breadcrumbs_alignment',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_breadcrumbs_delimeter',
                    ],
                ],
            ],
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_banner_bg_as',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'color',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_banner_bg_image',
                    ],
                ],
            ],
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_banner_bg_as',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'image',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_banner_bg_color',
                    ],
                ],
            ],
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_banner_bg_as',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'undefined',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_banner_bg_image',
                    ],
                ],
            ],
            //Copyright option
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_copyright_options_from',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'option_panel',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_display_copyright',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_copyright_logo',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_copyright_bg_as',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_copyright_bg_image',
                    ],

                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_choose_copyright',
                    ],


                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_copyright_bg_color',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_copyright_text',
                    ],
                ],
            ],
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_copyright_options_from',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'undefined',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_choose_copyright',
                    ],

                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_display_copyright',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_copyright_logo',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_copyright_bg_as',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_copyright_bg_image',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_copyright_bg_color',
                    ],
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_copyright_text',
                    ],
                ],
            ],
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_copyright_bg_as',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'color',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_copyright_bg_image',
                    ],
                ],
            ],
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_copyright_bg_as',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'image',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_copyright_bg_color',
                    ],
                ],
            ],
            [
                'name' => 'condition102',
                'id' => 322283156286,
                'logicBlock' => [
                    [
                        'id' => 13737583162315,
                        'key' => 'field',
                        'value' => [
                            'fieldID' => '_turbo_copyright_bg_as',
                            'secondOperand' => [
                                'type' => 'value',
                                'value' => 'undefined',
                            ],
                            'operator' => 'equal_to',
                        ],
                        'childresult' => false,
                    ],
                ],
                'effectField' => [
                    [
                        'action' => 'hide',
                        'id' => 148733833181529,
                        'fieldID' => '_turbo_copyright_bg_image',
                    ],
                ],
            ],
        ];
    }

    // ************************ PAGE SETTINGS ************************************


    public static function redq_get_all_taxonomies()
    {
        $restricted_taxonomies = array(
            'nav_menu',
            'link_category',
            'post_format',
        );

        $args = array();
        $output = 'objects'; // or objects
        $operator = 'or'; // 'and' or 'or'
        $taxonomies = get_taxonomies($args, $output, $operator);

        $formatted_taxonomies = array();

        if ($taxonomies) {
            foreach ($taxonomies as $key => $taxonomy) {
                if (!in_array($key, $restricted_taxonomies)) {
                    $formatted_taxonomies[$taxonomy->name] = $taxonomy->labels->singular_name;
                }
            }
        }

        return $formatted_taxonomies;
    }

    public static function redq_get_all_posts()
    {
        $restricted_post_types = array(
            'attachment',
            'scholar_faq',
            'page',
            'scholar_template',
            'scholar_component',
            'scholar_taxonomy',
            'scholar_term_metabox',
            'scholar_metabox',
            'scholar_form_builder',
            'scholar_plan',
            'redq_rb_post',
            'scholar_post_type',
            'scholar_console',
            'reactive_builder'
        );
        $args = array(
            'public' => true,
        );

        $output = 'objects'; // 'names' or 'objects' (default: 'names')
        $operator = 'and'; // 'and' or 'or' (default: 'and')

        $post_types = get_post_types($args, $output, $operator);

        $formatted_post_types = array();

        foreach ($post_types as $key => $post_type) {
            if (!in_array($key, $restricted_post_types)) {
                $formatted_post_types[$post_type->name] = $post_type->labels->singular_name;
            }
        }

        return $formatted_post_types;
    }
}
