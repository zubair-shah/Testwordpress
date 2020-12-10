<?php

global $options;
$vc_is_wp_version_3_6_more = version_compare(preg_replace('/^([\d\.]+)(\-.*$)/', '$1', get_bloginfo('version')), '3.6') >= 0;

function turbo_set_vc_as_theme()
{
    vc_set_as_theme($disable_updater = true);
    $template_directory = get_template_directory();

    $child_dir = $template_directory . '/redqframework/turbo-vc-addons/vc_templates';
    $parent_dir = $template_directory . '/redqframework/turbo-vc-addons/vc_templates';
    vc_set_shortcodes_templates_dir($parent_dir);
    vc_set_shortcodes_templates_dir($child_dir);

    // vc_disable_frontend();
    
}

add_action('vc_before_init', 'turbo_set_vc_as_theme');


add_action('vc_before_init', 'turbo_shortcodes_integrations_with_vc');

function turbo_shortcodes_integrations_with_vc()
{

    class WPBakeryShortCode_Turbo_Top_Rated_Products extends WPBakeryShortCode
    {
    }
    vc_map(
        array(
            "name" => __("Top Rated Products", "turbo"),
            "base" => "turbo_top_rated_products",
            "category" => __('Turbo Shortcodes', 'turbo'),
            "icon" => "th-top-product",
            "params" => array(
                array(
                    "type" => "dropdown",
                    'heading' => __('Choose Layout', 'turbo'),
                    'param_name' => 'choose_layout',
                    'save_always' => true,
                    'admin_label' => true,
                    "value" => array(
                        __("Layout One", "turbo") => "layout_one",
                        __("Layout Two", "turbo") => "layout_two",
                    ),
                ),
                array(
                    "type" => "dropdown",
                    'heading' => __('Show attributes', 'turbo'),
                    'param_name' => 'show_attributes',
                    'save_always' => true,
                    'admin_label' => true,
                    "value" => array(
                        __("Yes", "turbo") => "yes",
                        __("No", "turbo") => "no",
                    ),
                ),

                array(
                    "type" => "dropdown",
                    'heading' => __('Show product details heading', 'turbo'),
                    'param_name' => 'show_details_heading',
                    'save_always' => true,
                    'admin_label' => true,
                    "value" => array(
                        __("Yes", "turbo") => "yes",
                        __("No", "turbo") => "no",
                    ),
                ),

                array(
                    "type" => "dropdown",
                    'heading' => __('Order By', 'turbo'),
                    'param_name' => 'orderby',
                    'save_always' => true,
                    "value" => array(
                        __("Date", "turbo") => "date",
                        __("Title", "turbo") => "post_title",
                    )
                ),
                array(
                    "type" => "dropdown",
                    'heading' => __('Order', 'turbo'),
                    'param_name' => 'order',
                    'save_always' => true,
                    "value" => array(
                        __("ASC", "turbo") => "asc",
                        __("DESC", "turbo") => "desc",
                    )
                ),
                array(
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Post per page", "turbo"),
                    "param_name" => "posts_per_page",
                    "description" => __("Enter a  <strong> integer number </strong> that will determine how many car will show in tab", "turbo")
                ),
                array(
                    'type' => 'checkbox',
                    'save_always' => true,
                    'param_name' => 'transparent_img',
                    'value' => array(__('Check to show transparent image for product', 'turbo') => 'active'),
                ),
                array(
                    'type' => 'checkbox',
                    'save_always' => true,
                    'param_name' => 'tab_small_separate_img',
                    'value' => array(__('Check to show transparent image for product', 'turbo') => 'active'),
                ),
            )
        )
    );

    //Isotope Car Block
    class WPBakeryShortCode_Turbo_Isotope_Car_Grid extends WPBakeryShortCode
    {
    }
    vc_map(
        array(
            "name" => __("Isotope Car Grid", "turbo"),
            "base" => "turbo_isotope_car_grid",
            "category" => __('Turbo Shortcode', 'turbo'),
            "icon" => "th-top-product",
            "params" => array(
                array(
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Heading Title", "turbo"),
                    "param_name" => "heading_title",
                    "value" => __("Available Cars", "turbo"),
                ),
                array(
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Search Label", "turbo"),
                    "param_name" => "search_text",
                    "value" => __("Search", "turbo"),
                ),
                array(
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Search Placeholder", "turbo"),
                    "param_name" => "search_placeholder",
                    "value" => __("Quick Search", "turbo"),
                ),
                array(
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Select Label", "turbo"),
                    "param_name" => "select_text",
                    "value" => __("Categories", "turbo"),
                ),
                array(
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Select Placeholder", "turbo"),
                    "param_name" => "select_placeholder",
                    "value" => __("Choose", "turbo"),
                ),
                array(
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Rating Label", "turbo"),
                    "param_name" => "rating_text",
                    "value" => __("Rating", "turbo"),
                ),
                array(
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("All Cars Label", "turbo"),
                    "param_name" => "all_cars_text",
                    "value" => __("See All", "turbo"),
                ),
                array(
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("All Cars Button Label", "turbo"),
                    "param_name" => "all_car_button_text",
                    "value" => __("See all cars", "turbo"),
                ),
                array(
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("All Cars Button Link", "turbo"),
                    "param_name" => "all_car_button_link",
                    "value" => __("#", "turbo"),
                ),
                array(
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Price Type", "turbo"),
                    "param_name" => "price_type",
                    "value" => __("/Day", "turbo"),
                ),
                array(
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("No. of posts", "turbo"),
                    "param_name" => "posts_per_page",
                    "value" => 10,
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => __('Customize Block', 'turbo'),
                    'param_name' => 'bg_css',
                    'group' => __('Design options', 'turbo'),
                ),
            )
        )
    );

    //Content blocks
    class WPBakeryShortCode_Turbo_Content_Block extends WPBakeryShortCode
    {
    }
    vc_map(
        array(
            'name' => esc_html__('Content Blocks', 'turbo'),
            'base' => 'turbo_content_block',
            'class' => '',
            'icon' => 'icon-mpc-prod_slider',
            'category' => esc_html__('Turbo Shortcode', 'turbo'),
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Choose Layout', 'turbo'),
                    'param_name' => 'layout',
                    'value' => array(
                        esc_html__('Grid View', 'turbo') => 'turbo-grid',
                        esc_html__('Grid Alternative View', 'turbo') => 'turbo-grid-alt',
                    ),
                    'std' => array('turbo-grid'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Heading Title', 'turbo'),
                    'param_name' => 'heading_title',
                    'value' => esc_html__('How turbo works', 'turbo'),
                    'admin_label' => true,
                ),
                array(
                    "type" => "textarea_html",
                    "admin_label" => true,
                    "heading" => __("Descripton", "turbo"),
                    "param_name" => "content",
                    "description" => __("Enter your description", "turbo")
                ),
                array(
                    'type' => 'param_group',
                    'heading' => 'List of content block',
                    'value' => '',
                    'param_name' => 'content_blocks',
                    'params' => array(
                        array(
                            'type' => 'textfield',
                            'value' => '',
                            'heading' => 'Content Title',
                            'param_name' => 'title',
                        ),
                        array(
                            'type' => 'textarea',
                            'value' => '',
                            'heading' => 'Content Description',
                            'param_name' => 'description',
                        ),
                        array(
                            'type' => 'attach_image',
                            'heading' => esc_html__('Content Image', 'turbo'),
                            'param_name' => 'block_image',
                            'description' => __('Choose Image.', 'turbo'),
                        ),
                    ),
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => __('Customize Block', 'turbo'),
                    'param_name' => 'bg_css',
                    'group' => __('Design options', 'turbo'),
                ),
            )
        )
    );

    //Featured blocks
    class WPBakeryShortCode_Turbo_Featured_Block extends WPBakeryShortCode
    {
    }
    vc_map(
        array(
            'name' => esc_html__('Featured Blocks', 'turbo'),
            'base' => 'turbo_featured_block',
            'class' => '',
            'icon' => 'icon-mpc-prod_slider',
            'category' => esc_html__('Turbo Shortcode', 'turbo'),
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Choose Layout', 'turbo'),
                    'param_name' => 'layout',
                    'value' => array(
                        esc_html__('Layout One', 'turbo') => 'layout-one',
                        esc_html__('Layout Two', 'turbo') => 'layout-two',
                        esc_html__('Layout Three', 'turbo') => 'layout-three',
                        esc_html__('Layout Four', 'turbo') => 'layout-four',
                    ),
                    'std' => array('layout-one'),
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Heading Title', 'turbo'),
                    'param_name' => 'heading_title',
                    'value' => esc_html__('How turbo works', 'turbo'),
                    'admin_label' => true,
                ),
                array(
                    'type' => 'textarea_html',
                    'admin_label' => true,
                    'class' => '',
                    'heading' => __('Description', 'turbo'),
                    'param_name' => 'content',
                    'description' => __('Enter your description', 'turbo')
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Background Featured Image', 'turbo'),
                    'param_name' => 'featured_image_bg',
                    'description' => __('Choose Image.', 'turbo'),
                    'dependency' => array('element' => 'layout', 'value' => array('layout-two', 'layout-three', 'layout-one'))
                ),
                array(
                    'type' => 'attach_image',
                    'heading' => esc_html__('Content Image', 'turbo'),
                    'param_name' => 'content_image',
                    'description' => __('Choose Image.', 'turbo'),
                    'dependency' => array('element' => 'layout', 'value' => array('layout-one'))
                ),
                array(
                    'type' => 'param_group',
                    'heading' => 'Highlighted Features',
                    'value' => '',
                    'param_name' => 'highlighted_features',
                    'params' => array(
                        array(
                            'type' => 'textfield',
                            'value' => '',
                            'heading' => 'Content Title',
                            'param_name' => 'title',
                        ),
                        array(
                            'type' => 'textarea',
                            'value' => '',
                            'heading' => 'Content Description',
                            'param_name' => 'description',
                        ),
                        array(
                            'type' => 'iconpicker',
                            'heading' => 'Content Description',
                            'param_name' => 'icon',
                            'settings' => array(
                                'emptyIcon' => false,
                                'type' => 'fontawesome',
                                'iconsPerPage' => 200,
                            ),
                            'description' => __('Select icon from library.', 'turbo'),
                        ),
                        array(
                            "type" => "colorpicker",

                            "heading" => __("Choose Background Color", "turbo"),
                            "param_name" => "background_color",
                            'description' => __('This option works only for layout four', 'turbo'),
                        ),
                        array(
                            "type" => "colorpicker",

                            "heading" => __("Choose Box Shadow Color From", "turbo"),
                            "param_name" => "box_shadow_color_from",
                            'description' => __('This option works only for layout four', 'turbo'),
                        ),
                        array(
                            "type" => "colorpicker",
                            "heading" => __("Choose Box Shadow Color To", "turbo"),
                            "param_name" => "box_shadow_color_to",
                            'description' => __('This option works only for layout four', 'turbo'),
                        ),
                    ),
                    'dependency' => array('element' => 'layout', 'value' => array('layout-two', 'layout-three', 'layout-four'))
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Button Text', 'turbo'),
                    'param_name' => 'button_text',
                    'value' => esc_html__('Details', 'turbo'),
                    'admin_label' => true,
                    'dependency' => array('element' => 'layout', 'value' => array('layout-four'))
                ),
                array(
                    'type' => 'textfield',
                    'heading' => esc_html__('Button Link', 'turbo'),
                    'param_name' => 'button_link',
                    'admin_label' => true,
                    'dependency' => array('element' => 'layout', 'value' => array('layout-four'))
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => __('Customize Block', 'turbo'),
                    'param_name' => 'bg_css',
                    'group' => __('Design options', 'turbo'),
                ),
            )
        )
    );


    class WPBakeryShortCode_Turbo_Recent_Products extends WPBakeryShortCode
    {
    }
    vc_map(array(
        "name" => __("Recent Products", "turbo"),
        "base" => "turbo_recent_products",
        "icon" => "icon-wpb-testimonial-slider",
        "category" => __('Turbo Shortcode', 'turbo'),
        "icon" => "th-new-product",
        "params" => array(
            array(
                "type" => "dropdown",
                'heading' => __('Choose Layout', 'turbo'),
                'param_name' => 'choose_layout',
                'save_always' => true,
                'admin_label' => true,
                "value" => array(
                    __("Layout One", "turbo") => "layout_one",
                    __("Layout Two", "turbo") => "layout_two",
                ),
            ),
            array(
                "type" => "dropdown",
                'heading' => __('Show attributes', 'turbo'),
                'param_name' => 'show_attributes',
                'save_always' => true,
                'admin_label' => true,
                "value" => array(
                    __("Yes", "turbo") => "yes",
                    __("No", "turbo") => "no",
                ),
            ),

            array(
                "type" => "dropdown",
                'heading' => __('Show product details heading', 'turbo'),
                'param_name' => 'show_details_heading',
                'save_always' => true,
                'admin_label' => true,
                "value" => array(
                    __("Yes", "turbo") => "yes",
                    __("No", "turbo") => "no",
                ),
            ),

            array(
                "type" => "dropdown",
                'heading' => __('Order By', 'turbo'),
                'param_name' => 'orderby',
                'save_always' => true,
                "value" => array(
                    __("Date", "turbo") => "date",
                    __("Title", "turbo") => "post_title",
                )
            ),
            array(
                "type" => "dropdown",
                'heading' => __('Order', 'turbo'),
                'param_name' => 'order',
                'save_always' => true,
                "value" => array(
                    __("ASC", "turbo") => "asc",
                    __("DESC", "turbo") => "desc",
                )
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Post per page", "turbo"),
                "param_name" => "posts_per_page",
                "description" => __("Enter a  <strong> integer number </strong> that will determine how many car will show in tab", "turbo")
            ),
        )
    ));


    class WPBakeryShortCode_Turbo_Tabs_Container extends WPBakeryShortCode
    {
    }
    vc_map(array(
        "name" => __("Car Tabs", "turbo"),
        "base" => "turbo_tabs_container",
        "class" => "",
        "category" => __("Turbo Shortcode", "turbo"),
        "icon" => "th-contact-details",
        "params" => array(
            array(
                "type" => "dropdown",
                'heading' => __('Choose Layout', 'turbo'),
                'param_name' => 'choose_layout',
                'save_always' => true,
                'admin_label' => true,
                "value" => array(
                    __("Layout One", "turbo") => "layout_one",
                    __("Layout Two", "turbo") => "layout_two",
                ),
            ),

            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Tab Container Heading", "turbo"),
                "param_name" => "tab_heading_title",
            ),

            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Browser All Cars Heading", "turbo"),
                "param_name" => "browse_car_title",
            ),

            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Browser All Cars Redirect Link", "turbo"),
                "param_name" => "browse_car_link",
            ),

            array(
                "type" => "dropdown",
                'heading' => __('Show Popular Car Tab', 'turbo'),
                'param_name' => 'show_popular_cars_tab',
                'save_always' => true,
                "value" => array(
                    "Yes" => "yes",
                    "No" => "no",
                )
            ),

            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Popular Car Tab Title", "turbo"),
                "param_name" => "popular_car_tab_title",
                "dependency" => array('element' => "show_popular_cars_tab", 'value' => array('yes'))
            ),

            array(
                'type' => 'checkbox',
                'save_always' => true,
                'heading' => __('Check to initially active popular car tab', 'turbo'),
                'param_name' => 'popular_car_initially_active',
                'description' => __('Check only one (From popular car and new car) tab at a time', 'turbo'),
                'value' => array(__('Initially Active', 'turbo') => 'active'),
                "dependency" => array('element' => "show_popular_cars_tab", 'value' => array('yes'))
            ),

            array(
                'type' => 'checkbox',
                'save_always' => true,
                'param_name' => 'popular_tab_small_separate_img',
                'value' => array(__('Check to show custom image as small tab image', 'turbo') => 'active'),
                "dependency" => array('element' => "show_popular_cars_tab", 'value' => array('yes'))
            ),

            array(
                'type' => 'checkbox',
                'save_always' => true,
                'param_name' => 'popular_transparent_img',
                'value' => array(__('Check to show transparent image for product', 'turbo') => 'active'),
                "dependency" => array('element' => "show_popular_cars_tab", 'value' => array('yes'))
            ),

            array(
                "type" => "dropdown",
                'heading' => __('Show attributes', 'turbo'),
                'param_name' => 'show_attributes',
                'save_always' => true,
                'admin_label' => true,
                "value" => array(
                    __("Yes", "turbo") => "yes",
                    __("No", "turbo") => "no",
                ),
                "dependency" => array('element' => "show_popular_cars_tab", 'value' => array('yes')),
            ),

            array(
                "type" => "dropdown",
                'heading' => __('Show product details heading', 'turbo'),
                'param_name' => 'show_details_heading',
                'save_always' => true,
                'admin_label' => true,
                "value" => array(
                    __("Yes", "turbo") => "yes",
                    __("No", "turbo") => "no",
                ),
                "dependency" => array('element' => "show_popular_cars_tab", 'value' => array('yes')),
            ),

            array(
                "type" => "dropdown",
                'heading' => __('Order By', 'turbo'),
                'param_name' => 'popular_orderby',
                'save_always' => true,
                "value" => array(
                    __("Date", "turbo") => "date",
                    __("Title", "turbo") => "title",
                ),
                "dependency" => array('element' => "show_popular_cars_tab", 'value' => array('yes'))
            ),
            array(
                "type" => "dropdown",
                'heading' => __('Order', 'turbo'),
                'param_name' => 'popular_order',
                'save_always' => true,
                "value" => array(
                    __("ASC", "turbo") => "asc",
                    __("DESC", "turbo") => "desc",
                ),
                "dependency" => array('element' => "show_popular_cars_tab", 'value' => array('yes'))
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Post per page", "turbo"),
                "param_name" => "popular_posts_per_page",
                "description" => __("Enter a  <strong> integer number </strong> that will determine how many car will show in tab", "turbo"),
                "dependency" => array('element' => "show_popular_cars_tab", 'value' => array('yes'))
            ),

            array(
                "type" => "dropdown",
                'heading' => __('Show New Car Tab', 'turbo'),
                'param_name' => 'show_new_cars_tab',
                'save_always' => true,
                "value" => array(
                    __("Yes", "turbo") => "yes",
                    __("No", "turbo") => "no",
                )
            ),

            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("New Car Tab Title", "turbo"),
                "param_name" => "new_car_tab_title",
                "dependency" => array('element' => "show_new_cars_tab", 'value' => array('yes'))
            ),

            array(
                'type' => 'checkbox',
                'save_always' => true,
                'heading' => __('Check to initially active new car tab', 'turbo'),
                'param_name' => 'recent_initially_active',
                'description' => __('Check only one (From popular car and new car) tab at a time', 'turbo'),
                'value' => array(__('Initially Active', 'turbo') => 'active'),
                "dependency" => array('element' => "show_new_cars_tab", 'value' => array('yes'))
            ),

            array(
                'type' => 'checkbox',
                'save_always' => true,
                'param_name' => 'recent_tab_small_separate_img',
                'value' => array(__('Check to show custom image as small tab image', 'turbo') => 'active'),
                "dependency" => array('element' => "show_new_cars_tab", 'value' => array('yes'))
            ),

            array(
                'type' => 'checkbox',
                'save_always' => true,
                'param_name' => 'recent_transparent_img',
                'value' => array(__('Check to show transparent image for product', 'turbo') => 'active'),
                "dependency" => array('element' => "show_new_cars_tab", 'value' => array('yes'))
            ),

            array(
                "type" => "dropdown",
                'heading' => __('Show attributes', 'turbo'),
                'param_name' => 'show_attributes',
                'save_always' => true,
                'admin_label' => true,
                "value" => array(
                    __("Yes", "turbo") => "yes",
                    __("No", "turbo") => "no",
                ),
                "dependency" => array('element' => "show_new_cars_tab", 'value' => array('yes'))
            ),

            array(
                "type" => "dropdown",
                'heading' => __('Show product details heading', 'turbo'),
                'param_name' => 'show_details_heading',
                'save_always' => true,
                'admin_label' => true,
                "value" => array(
                    __("Yes", "turbo") => "yes",
                    __("No", "turbo") => "no",
                ),
                "dependency" => array('element' => "show_new_cars_tab", 'value' => array('yes')),
            ),

            array(
                "type" => "dropdown",
                'heading' => __('Order By', 'turbo'),
                'param_name' => 'new_orderby',
                'save_always' => true,
                "value" => array(
                    __("ASC", "turbo") => "asc",
                    __("DESC", "turbo") => "desc",
                ),
                "dependency" => array('element' => "show_new_cars_tab", 'value' => array('yes'))
            ),
            array(
                "type" => "dropdown",
                'heading' => __('Order', 'turbo'),
                'param_name' => 'new_order',
                'save_always' => true,
                "value" => array(
                    __("ASC", "turbo") => "asc",
                    __("DESC", "turbo") => "desc",
                ),
                "dependency" => array('element' => "show_new_cars_tab", 'value' => array('yes'))
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Post per page", "turbo"),
                "param_name" => "new_posts_per_page",
                "description" => "Enter a  <strong> integer number </strong> that will determine how many car will show in tab",
                "dependency" => array('element' => "show_new_cars_tab", 'value' => array('yes'))
            ),
            array(
                'type' => 'css_editor',
                'heading' => __('Customize Block', 'turbo'),
                'param_name' => 'outer_bg_css',
                'group' => __('Outer Design options', 'turbo'),
            ),
            array(
                'type' => 'css_editor',
                'heading' => __('Customize Block', 'turbo'),
                'param_name' => 'inner_bg_css',
                'group' => __('Inner Design options', 'turbo'),
            ),
        )
    ));


    class WPBakeryShortCode_Turbo_Testimonial extends WPBakeryShortCode
    {
    }
    vc_map(
        array(
            "name" => esc_html__("Testimonial", "turbo"),
            "base" => "turbo_testimonial",
            "icon" => "icon-wpb-testimonial-slider",
            "category" => __("Turbo Shortcode", "turbo"),
            "icon" => "th-testimonial",
            'params' => array(
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Choose Testimonial Layout', 'turbo'),
                    'param_name' => 'testimonial_layout',
                    'value' => array(
                        esc_html__('Layout One', 'turbo') => 'layout_one',
                        esc_html__('Layout Two', 'turbo') => 'layout_two',
                        esc_html__('Layout Three', 'turbo') => 'layout_three',
                    ),
                    'std' => array('layout_one'),
                ),
                array(
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Testimonial Banner Title", "turbo"),
                    "param_name" => "testimonial_banner_title",
                    "dependency" => array('element' => "testimonial_layout", 'value' => array('layout_one', 'layout_two'))
                ),
                array(
                    "type" => "dropdown",
                    'heading' => __('Order By', 'turbo'),
                    'param_name' => 'orderby',
                    'save_always' => true,
                    "value" => array(
                        __("Date", "turbo") => "date",
                        __("Title", "turbo") => "post_title",
                    )
                ),
                array(
                    "type" => "dropdown",
                    'heading' => __('Order', 'turbo'),
                    'param_name' => 'order',
                    'save_always' => true,
                    "value" => array(
                        __("ASC", "turbo") => "asc",
                        __("DESC", "turbo") => "desc",
                    )
                ),
                array(
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Post per page", "turbo"),
                    "param_name" => "posts_per_page",
                    "description" => __("Enter a  <strong> integer number </strong> that will determine how many car will show in tab", "turbo")
                ),
                array(
                    "type" => "colorpicker",
                    "admin_label" => true,
                    "heading" => __("Choose Background Color", "turbo"),
                    "param_name" => "background_color",
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => __('Customize Block', 'turbo'),
                    'param_name' => 'bg_css',
                    'group' => __('Design options', 'turbo'),
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => __('Customize Block (This is true only for layout one)', 'turbo'),
                    'param_name' => 'inner_bg_css',
                    'group' => __('Inner Design options', 'turbo'),
                ),
            ),
        )
    );



    class WPBakeryShortCode_Turbo_Tips_And_Tricks extends WPBakeryShortCode
    {
    }

    $terms = get_terms(array(
        'taxonomy'   => 'category',
        'hide_empty' => false,
    ));

    $category_terms = array();
    $category_terms['Choose Terms'] = 'choose';

    if (isset($terms) && is_array($terms)) {
        foreach ($terms as $key => $term) {
            $category_terms[$term->name] = $term->slug;
        }
    }

    vc_map(array(
        "name" => __("Tips & Tricks", "turbo"),
        "base" => "turbo_tips_and_tricks",
        "class" => "",
        "category" => __("Turbo Shortcode", "turbo"),
        "icon" => "th-tips",
        "params" => array(
            array(
                "type" => "dropdown",
                'heading' => __('Choose Layout', 'turbo'),
                'param_name' => 'choose_layout',
                'save_always' => true,
                'admin_label' => true,
                "value" => array(
                    __("Layout One", "turbo") => "layout_one",
                    __("Layout Two", "turbo") => "layout_two",
                ),
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Section Title", "turbo"),
                "param_name" => "section_title",
                "value" => __("Tips & Tricks", "turbo"),
            ),

            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Button Name", "turbo"),
                "param_name" => "button_title",
                "value" => __("Continue Reading", "turbo"),
            ),

            array(
                "type" => "dropdown",
                "admin_label" => true,
                "heading" => __("Choose Term", "turbo"),
                "param_name" => "term",
                "value" => $category_terms,
            ),

            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Posts Per Page", "turbo"),
                "param_name" => "posts_per_page",
                "value" => __("3", "turbo"),
            ),

            array(
                "type" => "dropdown",
                "admin_label" => true,
                "heading" => __("Choose Order", "turbo"),
                "param_name" => "order",
                "value" => array(
                    __('Choose..', 'turbo') => '',
                    __('Ascending', 'turbo') => 'asc',
                    __('Descending', 'turbo') => 'dsc',
                ),
            ),

            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("All Posts Button Label", "turbo"),
                "param_name" => "button_text",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("All Posts Button Link", "turbo"),
                "param_name" => "button_link",
            ),
            array(
                'type' => 'css_editor',
                'heading' => __('Customize Block', 'turbo'),
                'param_name' => 'bg_css',
                'group' => __('Design options', 'turbo'),
            ),
        )
    ));


    class WPBakeryShortCode_Turbo_Helpline extends WPBakeryShortCode
    {
    }
    vc_map(array(
        "name" => __("Help Line", "turbo"),
        "base" => "turbo_helpline",
        "class" => "",
        "category" => __("Turbo Shortcode", "turbo"),
        "icon" => "th-help-line",
        'admin_enqueue_css' => array(get_template_directory_uri() . '/assets/dist/css/vc.css'),
        "params" => array(
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Text for Help line block", "turbo"),
                "param_name" => "title",
            ),

            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Help line number", "turbo"),
                "param_name" => "phone",
            ),
            array(
                "type" => "colorpicker",
                "admin_label" => true,
                "heading" => __("Choose Font Color", "turbo"),
                "param_name" => "font_color",
            ),
            array(
                'type' => 'css_editor',
                'heading' => __('Customize appearance', 'turbo'),
                'param_name' => 'bg_css',
                'group' => __('Design options', 'turbo'),
            ),

        )
    ));


    class WPBakeryShortCode_Turbo_Mission extends WPBakeryShortCode
    {
    }
    vc_map(array(
        "name" => __("Our Mission", "turbo"),
        "base" => "turbo_mission",
        "class" => "",
        "category" => __("Turbo Shortcode", "turbo"),
        "icon" => "th-mission",
        'admin_enqueue_css' => array(get_template_directory_uri() . '/assets/dist/css/vc.css'),
        "params" => array(
            array(
                "type" => "attach_image",
                "admin_label" => true,
                "heading" => __("Image for this block", "turbo"),
                "param_name" => "image",
            ),

            array(
                'type' => 'checkbox',
                'save_always' => true,
                'param_name' => 'transparent_image',
                'value' => array(__('Check to show transparent image for this content block', 'turbo') => 'active'),
            ),

            array(
                "type" => "colorpicker",
                "admin_label" => true,
                "heading" => __("Choose Transparent Image Background Color", "turbo"),
                "param_name" => "background_color",
            ),

            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Background Large Text", "turbo"),
                "param_name" => "text",
            ),

            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Title of this paragraph", "turbo"),
                "param_name" => "title",
                "value" => __("Our Mission", "turbo"),
            ),

            array(
                "type" => "textarea_html",
                "admin_label" => true,
                "heading" => __("Content", "turbo"),
                "param_name" => "content",
                "value" => __("Content goes here....", "turbo"),
            ),

            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Name", "turbo"),
                "param_name" => "name",
                "value" => __("Brasion Mike", "turbo"),
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Designation", "turbo"),
                "param_name" => "designation",
                "value" => __("CEO Founder", "turbo"),
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Author Url", "turbo"),
                "param_name" => "url",
                "value" => esc_url("htt://somelink.com")
            ),
            array(
                'type' => 'css_editor',
                'heading' => __('Customize appearance', 'turbo'),
                'param_name' => 'block_holder_css',
                'group' => __('Block Holder Design options', 'turbo'),
            ),
            array(
                'type' => 'css_editor',
                'heading' => __('Customize appearance', 'turbo'),
                'param_name' => 'block_css',
                'group' => __('Block Design options', 'turbo'),
            ),
        )
    ));



    vc_map(array(
        "name" => __("Our Partner", "turbo"),
        "base" => "turbo_partner_holder",
        "class" => "",
        "category" => __("Turbo Shortcode", "turbo"),
        "icon" => "th-partner",
        "as_parent" => array('only' => 'turbo_partner'),
        "content_element" => true,
        "show_settings_on_create" => false,
        "js_view" => 'VcColumnView',
        "params" => array(
            array(
                'type' => 'css_editor',
                'heading' => __('Customize Block', 'turbo'),
                'param_name' => 'bg_css',
                'group' => __('Design options', 'turbo'),
            ),
        )
    ));

    vc_map(array(
        "name" => __("Our Partner", "turbo"),
        "base" => "turbo_partner",
        "class" => "",
        "content_element" => true,
        "as_child" => array('only' => 'turbo_partner_holder'),
        "params" => array(
            array(
                "type" => "attach_image",
                "admin_label" => true,
                "heading" => __("Image for this Our Partner", "turbo"),
                "param_name" => "turbowp_home_one_partner",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Link for Partner/company", "turbo"),
                "param_name" => "turbowp_partner_link",
            ),
        )
    ));

    if (class_exists('WPBakeryShortCodesContainer')) {
        class WPBakeryShortCode_Turbo_Partner_Holder extends WPBakeryShortCodesContainer
        {
        }
    }

    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_Turbo_Partner extends WPBakeryShortCode
        {
        }
    }


    class WPBakeryShortCode_Turbo_Horizontal_Search extends WPBakeryShortCode
    {
    }
    vc_map(array(
        "name" => __("Horizontal Search Form", "turbo"),
        "base" => "turbo_horizontal_search",
        "class" => "",
        "category" => __("Turbo Shortcode", "turbo"),
        "icon" => "th-car-search",
        "content_element" => true,
        "params" => array(
            array(
                "type" => "dropdown",
                'heading' => __('Choose Horizontal Search Layout', 'turbo'),
                'param_name' => 'choose_layout',
                'save_always' => true,
                "admin_label" => true,
                "value" => array(
                    __("Horizontal Layout One", "turbo") => "layout_one",
                    __("Horizontal Layout Two", "turbo") => "layout_two",
                    __("Horizontal Layout Three", "turbo") => "layout_three",
                    __("Horizontal Layout Four", "turbo") => "layout_four",
                )
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Heading Title", "turbo"),
                "param_name" => "heading_title",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Heading Sub Title", "turbo"),
                "param_name" => "heading_sub_title",
                "dependency" => array('element' => "choose_layout", 'value' => array('layout_four'))
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Tag Title", "turbo"),
                "param_name" => "heading_tag_title",
                "dependency" => array('element' => "choose_layout", 'value' => array('layout_four'))
            ),
            array(
                "type" => "textarea_html",
                "admin_label" => true,
                "heading" => __("Content", "turbo"),
                "param_name" => "content",
                "description" => __("Enter your content.", "turbo")
            ),
            array(
                "type" => "dropdown",
                'heading' => __('Show Banner Button Section', 'turbo'),
                'param_name' => 'search_button_section',
                "admin_label" => true,
                'save_always' => true,
                "value" => array(
                    __("Show", "turbo") => "show",
                    __("Hide", "turbo") => "hide",
                ),
                "dependency" => array('element' => "choose_layout", 'value' => array('layout_two'))
            ),
            array(
                "type" => "dropdown",
                'heading' => __('Button class for search section', 'turbo'),
                'param_name' => 'search_button_section_class',
                "admin_label" => true,
                'save_always' => true,
                "value" => array(
                    __("Radius", "turbo") => "radius",
                    __("Square", "turbo") => "square",
                ),
                "dependency" => array('element' => "choose_layout", 'value' => array('layout_two'))
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Explore Button Text", "turbo"),
                "param_name" => "explore_button_text",
                "dependency" => array('element' => "search_button_section", 'value' => array('show'))
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Explore Button Link", "turbo"),
                "param_name" => "explore_button_link",
                "dependency" => array('element' => "search_button_section", 'value' => array('show'))
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Details Button Text", "turbo"),
                "param_name" => "details_button_text",
                "dependency" => array('element' => "search_button_section", 'value' => array('show'))
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Details Button Link", "turbo"),
                "param_name" => "details_button_link",
                "dependency" => array('element' => "search_button_section", 'value' => array('show'))
            ),
            array(
                "type" => "dropdown",
                'heading' => __('Choose reactive builder shortcode', 'turbo'),
                'param_name' => 'reactive_builder_shortcode',
                "admin_label" => true,
                'save_always' => true,
                "value" => turbo_vc_get_posts('reactive_builder'),
                "description" => __('Choose reactive builder shortcode to render the search form', 'turbo'),
                "dependency" => array('element' => "choose_layout", 'value' => array('layout_one', 'layout_two', 'layout_three'))
            ),
            array(
                "type" => "dropdown",
                'heading' => __('Show Counter Section', 'turbo'),
                'param_name' => 'show_counter_section',
                "admin_label" => true,
                "value" => array(
                    __("Choose", "turbo") => "",
                    __("Show", "turbo") => "show",
                    __("Hide", "turbo") => "hide",
                ),
                "dependency" => array('element' => "choose_layout", 'value' => array('layout_one'))
            ),

            array(
                "type" => "dropdown",
                'heading' => __('Show user access', 'turbo'),
                'param_name' => 'show_user_access',
                'save_always' => true,
                "value" => array(
                    __("Yes", "turbo") => "yes",
                    __("No", "turbo") => "no",
                ),
                "dependency" => array(
                    'element' => "choose_layout", 'value' => array('layout_one'),
                    'element' => "show_counter_section", 'value' => array('show')
                )
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("User access text", "turbo"),
                "param_name" => "user_access_text",
                "dependency" => array(
                    'element' => "choose_layout", 'value' => array('layout_one'),
                    'element' => "show_counter_section", 'value' => array('show')
                )
            ),
            array(
                "type" => "dropdown",
                'heading' => __('Show car text', 'turbo'),
                'param_name' => 'show_cars',
                'save_always' => true,
                "value" => array(
                    __("Yes", "turbo") => "yes",
                    __("No", "turbo") => "no",
                ),
                "dependency" => array(
                    'element' => "choose_layout", 'value' => array('layout_one'),
                    'element' => "show_counter_section", 'value' => array('show')
                )
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Car text", "turbo"),
                "param_name" => "cars_text",
                "dependency" => array(
                    'element' => "choose_layout", 'value' => array('layout_one'),
                    'element' => "show_counter_section", 'value' => array('show')
                )
            ),
            array(
                "type" => "dropdown",
                'heading' => __('Show Reviews', 'turbo'),
                'param_name' => 'show_reviews',
                'save_always' => true,
                "value" => array(
                    __("Yes", "turbo") => "yes",
                    __("No", "turbo") => "no",
                ),
                "dependency" => array(
                    'element' => "choose_layout", 'value' => array('layout_one'),
                    'element' => "show_counter_section", 'value' => array('show')
                )
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Reviews text", "turbo"),
                "param_name" => "reviews_text",
                "dependency" => array(
                    'element' => "choose_layout", 'value' => array('layout_one'),
                    'element' => "show_counter_section", 'value' => array('show')
                )
            ),
            array(
                "type" => "attach_image",
                "admin_label" => true,
                "heading" => __("Feature Image", "turbo"),
                "param_name" => "banner_image_id",
            ),
        )
    ));

    //Tubro vertical search
    class WPBakeryShortCode_Turbo_Search_Vertical extends WPBakeryShortCode
    {
    }
    vc_map(
        array(
            "name" => __("Vertical Search Form", "turbo"),
            "base" => "turbo_search_vertical",
            "category" => __('Turbo Shortcode', 'turbo'),
            "icon" => "th-top-product",
            "params" => array(
                array(
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Search Form Title", "turbo"),
                    "param_name" => "search_form_title",
                ),
                array(
                    "type" => "textarea_html",
                    "admin_label" => true,
                    "heading" => __("Search Form Description", "turbo"),
                    "param_name" => "content",
                    "description" => __("Enter Search Form Description", "turbo")
                ),
                array(
                    "type" => "dropdown",
                    'heading' => __('Choose reactive builder shortcode', 'turbo'),
                    'param_name' => 'reactive_builder_shortcode',
                    "admin_label" => true,
                    'save_always' => true,
                    "value" => turbo_vc_get_posts('reactive_builder'),
                    "description" => __('Choose reactive builder shortcode to render the search form', 'turbo'),
                ),
                array(
                    "type" => "attach_image",
                    "admin_label" => true,
                    "heading" => __("Background Image", "turbo"),
                    "param_name" => "background_image_id",
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => __('Customize Block', 'turbo'),
                    'param_name' => 'bg_css',
                    'group' => __('Design options', 'turbo'),
                ),
            )
        )
    );


    class WPBakeryShortCode_Turbo_About_Contact extends WPBakeryShortCode
    {
    }
    vc_map(array(
        "name" => __("About Contact Info", "turbo"),
        "base" => "turbo_about_contact",
        "class" => "",
        "category" => __("Turbo Shortcode", "turbo"),
        "icon" => "th-car-search",
        "content_element" => true,
        "params" => array(
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Title for contact us block", "turbo"),
                "param_name" => "title",
            ),

            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Address", "turbo"),
                "param_name" => "address",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Email address", "turbo"),
                "param_name" => "email",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Phone number", "turbo"),
                "param_name" => "phone",
            ),
            array(
                "type" => "textarea_html",
                "admin_label" => true,
                "heading" => __("Schedule", "turbo"),
                "param_name" => "content",
                "description" => __("Enter your content.", "turbo")
            ),
            array(
                'type' => 'css_editor',
                'heading' => __('Customize Block', 'turbo'),
                'param_name' => 'bg_css',
                'group' => __('Design options', 'turbo'),
            ),
        )
    ));



    vc_map(array(
        "name" => __("Our Team", "turbo"),
        "base" => "turbo_team_holder",
        "category" => __("Turbo Shortcode", "turbo"),
        "icon" => "th-our-team",
        "as_parent" => array('only' => 'turbo_team_member'),
        "content_element" => true,
        "show_settings_on_create" => false,
        "js_view" => "VcColumnView",
        "params" => array(
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Title", "turbo"),
                "param_name" => "title",
            ),
            array(
                'type' => 'css_editor',
                'heading' => __('Customize Block', 'turbo'),
                'param_name' => 'bg_css',
                'group' => __('Design options', 'turbo'),
            ),
        ),
    ));


    vc_map(array(
        "name" => __("Team Member", "turbo"),
        "base" => "turbo_team_member",
        "category" => __('Turbo Shortcode', "turbo"),
        "class" => "",
        "content_element" => true,
        "as_child" => array('only' => 'turbo_team_holder'),
        "params" => array(
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Member Name", "turbo"),
                "param_name" => "member_name",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Designation", "turbo"),
                "param_name" => "designation",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Twitter", "turbo"),
                "param_name" => "social_twitter",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Facebook", "turbo"),
                "param_name" => "social_facebook",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Dribble", "turbo"),
                "param_name" => "social_dribbble",
            ),
            array(
                "type" => "attach_image",
                "admin_label" => true,
                "heading" => __("Member Picture", "turbo"),
                "param_name" => "member_image",
            ),
        )
    ));


    if (class_exists('WPBakeryShortCodesContainer')) {
        class WPBakeryShortCode_Turbo_Team_Holder extends WPBakeryShortCodesContainer
        {
        }
    }

    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_Turbo_Team_Member extends WPBakeryShortCode
        {
        }
    }


    /**
     * Shortcode for about us the brand
     * @author RedQ Team
     * @package Turbowp Helper
     * @since 1.0
     */
    class WPBakeryShortCode_Turbo_Brand extends WPBakeryShortCode
    {
    }
    vc_map(array(
        "name" => __("The brand", "turbo"),
        "base" => "turbo_brand",
        "class" => "",
        "category" => __("Turbo Shortcode", "turbo"),
        "icon" => "th-brand",
        "params" => array(
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Title for brand block", "turbo"),
                "param_name" => "title",
            ),

            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Subtitle for brand block", "turbo"),
                "param_name" => "subtitle",
            ),
            array(
                "type" => "textarea_html",
                "admin_label" => true,
                "heading" => __("Content for brand block", "turbo"),
                "param_name" => "content",
            ),
            array(
                'type' => 'css_editor',
                'heading' => __('Customize Block', 'turbo'),
                'param_name' => 'bg_css',
                'group' => __('Design options', 'turbo'),
            ),
        )
    ));



    /**
     * Shortcode for Contact Us Page Info
     * @author RedQ Team
     * @package Turbowp Helper
     * @since 1.0
     */
    add_action('vc_before_init', 'turbowp_contact_us_page_holder_with_VC');
    vc_map(array(
        "name" => esc_html__("Contact Us Page Address Bar", "turbo"),
        "base" => "turbo_address_holder",
        "as_parent" => array('only' => 'turbo_address_block'),
        "class" => "",
        "category" => esc_html__("Turbo Shortcode", "turbo"),
        "content_element" => true,
        "show_settings_on_create" => false,
        "js_view" => 'VcColumnView',
        "icon" => "th-contact-holder",
        "params" => array(
            array(
                'type' => 'css_editor',
                'heading' => __('Customize Block', 'turbo'),
                'param_name' => 'bg_css',
                'group' => __('Design options', 'turbo'),
            )
        )
    ));


    add_action('vc_before_init', 'turbowp_contact_us_page_field_with_VC');
    vc_map(array(
        "name" => esc_html__("Contact Us Page Address Field", "turbo"),
        "base" => "turbo_address_block",
        "as_child" => array('only' => 'turbo_address_holder'),
        "class" => "",
        "category" => esc_html__("Turbo Shortcode", "turbo"),
        "content_element" => true,
        "params" => array(
            array(
                "type" => "iconpicker",
                "admin_label" => true,
                "heading" => esc_html__("Input Address Title Icon", "turbo"),
                "param_name" => "turbowp_address_icon",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => esc_html__("Input Address Title Block", "turbo"),
                "param_name" => "turbowp_address_title",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => esc_html__("Input First field Info", "turbo"),
                "param_name" => "turbowp_address_field_one",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => esc_html__("Input Second Filed Info", "turbo"),
                "param_name" => "turbowp_address_field_two",
            ),
            array(
                'type' => 'css_editor',
                'heading' => __('Customize Block', 'turbo'),
                'param_name' => 'bg_css',
                'group' => __('Design options', 'turbo'),
            ),
        )
    ));


    if (class_exists('WPBakeryShortCodesContainer')) {
        class WPBakeryShortCode_Turbo_Address_Holder extends WPBakeryShortCodesContainer
        {
        }
    }
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_Turbo_Address_Block extends WPBakeryShortCode
        {
        }
    }


    /**
     * Shortcode home 2 popular cars
     * @author RedQ Team
     * @package Turbowp Helper
     * @since 1.0
     */
    class WPBakeryShortCode_Turbo_Popular_Car_Slider extends WPBakeryShortCode
    {
    }
    vc_map(array(
        "name" => __("Popular Cars Slider", "turbo"),
        "base" => "turbo_popular_car_slider",
        "class" => "",
        "category" => __("Turbo Shortcode", "turbo"),
        "icon" => "th-popular-car",
        "params" => array(
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Product Name", "turbo"),
                "param_name" => "title",
                "description" => __("e.g: cars", "turbo"),
            ),
        )
    ));


    /**
     * Shortcode Features Content Block
     * @author RedQ Team
     * @package Turbowp Helper
     * @since 1.0
     */
    vc_map(array(
        "name" => esc_html__("Feature Block Holder", "turbo"),
        "base" => "turbo_feature_cb_holder",
        "as_parent" => array('only' => 'turbo_feature_block'),
        "class" => "",
        "category" => esc_html__("Turbo Shortcode", "turbo"),
        "content_element" => true,
        "show_settings_on_create" => false,
        "js_view" => 'VcColumnView',
        "icon" => "th-contact-holder",
        "params" => array(
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Title", "turbo"),
                "param_name" => "title",
            ),
            array(
                'type' => 'css_editor',
                'heading' => __('Customize Block', 'turbo'),
                'param_name' => 'bg_css',
                'group' => __('Design options', 'turbo'),
            ),
        )
    ));


    vc_map(array(
        "name" => esc_html__("Feature", "turbo"),
        "base" => "turbo_feature_block",
        "as_child" => array('only' => 'turbo_feature_cb_holder'),
        "class" => "",
        "category" => esc_html__("Turbo Shortcode", "turbo"),
        "content_element" => true,
        "params" => array(
            array(
                "type" => "attach_image",
                "admin_label" => true,
                "heading" => __("Image for this block", "turbo"),
                "param_name" => "image",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Block title", "turbo"),
                "param_name" => "title",
            ),
            array(
                "type" => "textarea_html",
                "admin_label" => true,
                "heading" => __("Content", "turbo"),
                "param_name" => "content",
            ),
            array(
                'type' => 'css_editor',
                'heading' => __('Customize Block', 'turbo'),
                'param_name' => 'bg_css',
                'group' => __('Design options', 'turbo'),
            ),
        )
    ));


    if (class_exists('WPBakeryShortCodesContainer')) {
        class WPBakeryShortCode_Turbo_Feature_Cb_Holder extends WPBakeryShortCodesContainer
        {
        }
    }
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_Turbo_Feature_Block extends WPBakeryShortCode
        {
        }
    }



    /**
     * Shortcode Download App
     * @author RedQ Team
     * @package Turbowp Helper
     * @since 1.0
     */
    class WPBakeryShortCode_Turbo_Download_App extends WPBakeryShortCode
    {
    }
    vc_map(array(
        "name" => __("Download App", "turbo"),
        "base" => "turbo_download_app",
        "class" => "",
        "category" => __("Turbo Shortcode", "turbo"),
        "icon" => "th-download-app",
        "params" => array(
            array(
                "type" => "dropdown",
                'heading' => __('Choose Layout', 'turbo'),
                'param_name' => 'choose_layout',
                'save_always' => true,
                'admin_label' => true,
                "value" => array(
                    __("Layout One", "turbo") => "layout_one",
                    __("Layout Two", "turbo") => "layout_two",
                ),
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Download App Title", "turbo"),
                "param_name" => "title",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Subtitle", "turbo"),
                "param_name" => "subtitle",
            ),
            array(
                "type" => "textarea_html",
                "admin_label" => true,
                "heading" => __("Content", "turbo"),
                "param_name" => "content",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Newsletter form url", "turbo"),
                "param_name" => "newsletter_form_link",
                "dependency" => array('element' => "choose_layout", 'value' => array('layout_two'))
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Newsletter placeholder", "turbo"),
                "param_name" => "newsletter_placeholder",
                "dependency" => array('element' => "choose_layout", 'value' => array('layout_two')),
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Newsletter button label", "turbo"),
                "param_name" => "newsletter_submit_button",
                "dependency" => array('element' => "choose_layout", 'value' => array('layout_two'))
            ),
            array(
                "type" => "attach_image",
                "admin_label" => true,
                "heading" => __("Image for Download App", "turbo"),
                "param_name" => "image",
            ),
            array(
                "type" => "attach_image",
                "admin_label" => true,
                "heading" => __("Image for IOS Download Button", "turbo"),
                "param_name" => "ios_button",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("IOS App download link", "turbo"),
                "param_name" => "ios_url",
            ),
            array(
                "type" => "attach_image",
                "admin_label" => true,
                "heading" => __("Image for Android Download Button", "turbo"),
                "param_name" => "android_button",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Android App download link", "turbo"),
                "param_name" => "android_url",
            ),
            array(
                "type" => "colorpicker",
                "admin_label" => true,
                "heading" => __("Choose Background Color", "turbo"),
                "param_name" => "section_bg_color",
            ),
        )
    ));


    /**
     * Shortcode Single content block
     * @author RedQ Team
     * @package Turbowp Helper
     * @since 1.0
     */
    class WPBakeryShortCode_Turbo_Single_Cb extends WPBakeryShortCode
    {
    }
    vc_map(array(
        "name" => __("Single Content Block", "turbo"),
        "base" => "turbo_single_cb",
        "class" => "",
        "category" => __("Turbo Shortcode", "turbo"),
        "icon" => "th-download-app",
        "params" => array(
            array(
                "type" => "dropdown",
                'heading' => __('Choose Layout', 'turbo'),
                'param_name' => 'choose_layout',
                'save_always' => true,
                'admin_label' => true,
                "value" => array(
                    __("Layout One", "turbo") => "layout_one",
                    __("Layout Two", "turbo") => "layout_two",
                ),
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Title", "turbo"),
                "param_name" => "title",
            ),

            array(
                "type" => "textarea_html",
                "admin_label" => true,
                "heading" => __("Content", "turbo"),
                "param_name" => "content",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Details Button Text", "turbo"),
                "param_name" => "button_text",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Details Button Link", "turbo"),
                "param_name" => "button_link",
            ),

            array(
                "type" => "attach_image",
                "admin_label" => true,
                "heading" => __("Feature Image", "turbo"),
                "param_name" => "feature_img",
            ),
            array(
                "type" => "attach_image",
                "admin_label" => true,
                "heading" => __("Preview Image", "turbo"),
                "param_name" => "preview_img",
            ),
            array(
                'type' => 'css_editor',
                'heading' => __('Customize Block', 'turbo'),
                'param_name' => 'bg_css',
                'group' => __('Design options', 'turbo'),
            ),
        )
    ));


    /**
     * Shortcode Newsletter
     * @author RedQ Team
     * @package Turbowp Helper
     * @since 1.0
     */
    class WPBakeryShortCode_Turbo_Newsletter extends WPBakeryShortCode
    {
    }
    vc_map(array(
        "name" => __("News Letter", "turbo"),
        "base" => "turbo_newsletter",
        "class" => "",
        "category" => __("Turbo Shortcode", "turbo"),
        "icon" => "th-newsletter",
        "params" => array(
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("News Letter Title", "turbo"),
                "param_name" => "title",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Button text", "turbo"),
                "param_name" => "button_text",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Mail chimp action link", "turbo"),
                "param_name" => "email_link",
            ),
            array(
                'type' => 'css_editor',
                'heading' => __('Customize Block', 'turbo'),
                'param_name' => 'bg_css',
                'group' => __('Design options', 'turbo'),
            ),
        )
    ));


    /**
     * Shortcode Buttons
     * @author RedQ Team
     * @package Turbowp Helper
     * @since 1.0
     */
    class WPBakeryShortCode_Turbo_Buttons extends WPBakeryShortCode
    {
    }
    vc_map(array(
        "name" => __("Buttons", "turbo"),
        "base" => "turbo_buttons",
        "class" => "",
        "category" => __("Turbo Shortcode", "turbo"),
        "icon" => "th-buttons",
        "params" => array(
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Button text", "turbo"),
                "param_name" => "text",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Button URL", "turbo"),
                "param_name" => "url",
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Button Type', 'turbo'),
                'param_name' => 'type',
                'value' => array(
                    __('Turbo Primary Button', 'turbo') => 'rq-btn-primary',
                    __('Turbo Default Button', 'turbo') => 'rq-btn-default',
                    __('Turbo Dashed Button', 'turbo') => 'rq-btn-dashed',
                ),
                'save_always' => true,
                'description' => __('Button types: primary, default, dashed.', 'turbo')
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Button Size', 'turbo'),
                'param_name' => 'size',
                'value' => array(
                    __('Turbo Large Button', 'turbo') => 'btn-large',
                    __('Turbo Medium Button', 'turbo') => 'btn-medium',
                    __('Turbo Small Button', 'turbo') => 'btn-small',
                    __('Turbo Mini Button', 'turbo') => 'btn-mini',
                ),
                'save_always' => true,
                'description' => __('Button size: large, medium, small, mini.', 'turbo')
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Button Style', 'turbo'),
                'param_name' => 'style',
                'value' => array(
                    __('Turbo Rectangular Button', 'turbo') => 'border-radius',
                    __('Turbo Round Button', 'turbo') => 'border-radius-round',
                ),
                'save_always' => true,
                'description' => __('Button styes: rectangular, round', 'turbo')
            ),
        )
    ));


    /**
     * Shortcode Buttons
     * @author RedQ Team
     * @package Turbowp Helper
     * @since 1.0
     */
    class WPBakeryShortCode_Turbo_Factbox extends WPBakeryShortCode
    {
    }
    vc_map(array(
        "name" => __("Fact Box", "turbo"),
        "base" => "turbo_factbox",
        "class" => "",
        "category" => __("Turbo Shortcode", "turbo"),
        "icon" => "th-fact-box",
        "params" => array(
            array(
                "type" => "iconpicker",
                "admin_label" => true,
                "heading" => __("Fact Box Icon", "turbo"),
                "param_name" => "icon",
                'description' => __('Put an ion icon like: ion-android-happy', 'turbo')
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Title of the factbox", "turbo"),
                "param_name" => "title",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Count start", "turbo"),
                "param_name" => "from",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Count ends", "turbo"),
                "param_name" => "to",
            ),
        )
    ));

    /**
     * Shortcode Buttons
     * @author RedQ Team
     * @package Turbowp Helper
     * @since 1.0
     */
    class WPBakeryShortCode_Turbo_Countdown extends WPBakeryShortCode
    {
    }
    vc_map(array(
        "name" => __("Countdown", "turbo"),
        "base" => "turbo_countdown",
        "class" => "",
        "category" => __("Turbo Shortcode", "turbo"),
        "icon" => "th-countdown",
        "params" => array(
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Title of the Counter", "turbo"),
                "param_name" => "title",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Count start", "turbo"),
                "description" => __("Please enter time stamp like: 2016/4/01 00:00:00", "turbo"),
                "param_name" => "from",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Count ends", "turbo"),
                "description" => __("Please enter time stamp like: 2016/4/01 00:00:00", "turbo"),
                "param_name" => "to",
            ),
        )
    ));


    /**
     * Shortcode ProgressBar
     * @author RedQ Team
     * @package Turbowp Helper
     * @since 1.0
     */
    class WPBakeryShortCode_Turbo_Progressbar extends WPBakeryShortCode
    {
    }
    vc_map(array(
        "name" => __("Progress Bar", "turbo"),
        "base" => "turbo_progressbar",
        "class" => "",
        "category" => __("Turbo Shortcode", "turbo"),
        "icon" => "th-progress-bar",
        "params" => array(
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Title of the Progress Bar", "turbo"),
                "param_name" => "title",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Percentage of progress bar", "turbo"),
                "param_name" => "percentage",
            ),
        )
    ));


    /**
     * Shortcode ProgressBar
     * @author RedQ Team
     * @package Turbowp Helper
     * @since 1.0
     */
    class WPBakeryShortCode_Turbo_Circular_Pbar extends WPBakeryShortCode
    {
    }
    vc_map(array(
        "name" => __("Circular Progress Bar", "turbo"),
        "base" => "turbo_circular_pbar",
        "class" => "",
        "category" => __("Turbo Shortcode", "turbo"),
        "icon" => "th-circular-progress",
        "params" => array(
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Title of the Progress Bar", "turbo"),
                "param_name" => "title",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Percentage of progress bar", "turbo"),
                "param_name" => "percentage",
            ),
        )
    ));


    vc_map(array(
        "name" => esc_html__("Accordions", "turbo"),
        "base" => "turbo_element_accordions",
        "as_parent" => array('only' => 'turbo_element_accordion'),
        "class" => "",
        "category" => esc_html__("Turbo Shortcode", "turbo"),
        "content_element" => true,
        "show_settings_on_create" => false,
        "js_view" => 'VcColumnView',
        "icon" => "th-accordion",
        "params" => array(
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => esc_html__("Accordions Title", "turbo"),
                "param_name" => "accordion_banner_title",
            ),
        )
    ));


    vc_map(array(
        "name" => esc_html__("Accordion", "turbo"),
        "base" => "turbo_element_accordion",
        "as_child" => array('only' => 'turbo_element_accordions'),
        "class" => "",
        "category" => esc_html__("Turbo Shortcode", "turbo"),
        "content_element" => true,
        "params" => array(
            array(
                "type" => "iconpicker",
                "admin_label" => true,
                "heading" => esc_html__("Accordions Icon", "turbo"),
                "param_name" => "accordion_link_icon",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => esc_html__("Accordion ID", "turbo"),
                "param_name" => "accordion_link_id",
                "description" => esc_html__("e.g. 1", "turbo"),
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => esc_html__("Accordion Title", "turbo"),
                "param_name" => "accordion_link_title",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => esc_html__("Accordions description", "turbo"),
                "param_name" => "accordion_link_desc",
            ),
        )
    ));

    if (class_exists('WPBakeryShortCodesContainer')) {
        class WPBakeryShortCode_Turbo_Element_Accordions extends WPBakeryShortCodesContainer
        {
        }
    }
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_Turbo_Element_Accordion extends WPBakeryShortCode
        {
        }
    }


    /**
     * Shortcode ProgressBar
     * @author RedQ Team
     * @package Turbowp Helper
     * @since 1.0
     */
    class WPBakeryShortCode_Turbo_Google_Map extends WPBakeryShortCode
    {
    }
    vc_map(array(
        "name" => __("Google Map", "turbo"),
        "base" => "turbo_google_map",
        "class" => "",
        "category" => __("Turbo Shortcode", "turbo"),
        "icon" => "th-google-map",
        "params" => array(
            array(
                'type' => 'dropdown',
                'heading' => __('Zoom Level', 'turbo'),
                'param_name' => 'zoom',
                'value' => array(
                    __('One', 'turbo') => '1',
                    __('two', 'turbo') => '2',
                    __('Three', 'turbo') => '3',
                    __('Four', 'turbo') => '4',
                    __('Five', 'turbo') => '5',
                    __('Six', 'turbo') => '6',
                    __('Seven', 'turbo') => '7',
                    __('Eight', 'turbo') => '8',
                    __('Nine', 'turbo') => '9',
                    __('Ten', 'turbo') => '10',
                    __('Eleven', 'turbo') => '11',
                    __('Twelve', 'turbo') => '12',
                    __('Thirteen', 'turbo') => '13',
                    __('Fourteen', 'turbo') => '14',
                    __('Fifteen', 'turbo') => '15',
                    __('Sixteen', 'turbo') => '16',
                ),
                'save_always' => true,
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Latitude", "turbo"),
                "param_name" => "lat",
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Longitude", "turbo"),
                "param_name" => "lang",
            ),
            array(
                "type" => "textarea",
                "admin_label" => true,
                "heading" => __("Address", "turbo"),
                "param_name" => "address",
            ),
            array(
                'type' => 'css_editor',
                'heading' => __('Customize Block', 'turbo'),
                'param_name' => 'bg_css',
                'group' => __('Design options', 'turbo'),
            ),
        )
    ));


    /**
     * Shortcode Fancy title
     * @author RedQ Team
     * @package Turbowp Helper
     * @since 1.0
     */
    class WPBakeryShortCode_Turbo_Fancy_Title extends WPBakeryShortCode
    {
    }
    vc_map(array(
        "name" => __("Fancy Title", "turbo"),
        "base" => "turbo_fancy_title",
        "class" => "",
        "category" => __("Turbo Shortcode", "turbo"),
        "icon" => "th-google-map",
        "params" => array(
            array(
                "type" => "dropdown",
                'heading' => __('Choose Layout', 'turbo'),
                'param_name' => 'choose_layout',
                'save_always' => true,
                'admin_label' => true,
                "value" => array(
                    __("Default Fancy Title", "turbo") => "default_fancy_title",
                    __("Listing Fancy Title", "turbo") => "listing_fancy_title",
                ),
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Title", "turbo"),
                "param_name" => "title",
            ),
            array(
                "type" => "textarea_html",
                "admin_label" => true,
                "heading" => __("Description", "turbo"),
                "param_name" => "content",
                "description" => __("Enter your description", "turbo")
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Add button text", "turbo"),
                "param_name" => "button_text",
                'dependency' => array('element' => 'choose_layout', 'value' => array('listing_fancy_title')),
            ),
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Add button link", "turbo"),
                "param_name" => "button_link",
                'dependency' => array('element' => 'choose_layout', 'value' => array('listing_fancy_title')),
            ),
            array(
                'type' => 'iconpicker',
                'heading' => 'Content Description',
                'param_name' => 'button_icon',
                'settings' => array(
                    'emptyIcon' => true,
                    'type' => 'fontawesome',
                    'iconsPerPage' => 200,
                ),
                'description' => __('Select icon from library.', 'turbo'),
                'dependency' => array('element' => 'choose_layout', 'value' => array('listing_fancy_title')),
            ),
            array(
                'type' => 'css_editor',
                'heading' => __('Customize Block', 'turbo'),
                'param_name' => 'bg_css',
                'group' => __('Design options', 'turbo'),
            ),
        )
    ));


    /**
     * Shortcode Feature Product
     * @author RedQ Team
     * @package Turbowp Helper
     * @since 4.0
     */
    class WPBakeryShortCode_Turbo_Feature_Product extends WPBakeryShortCode
    {
    }
    vc_map(array(
        "name" => __("Featured Product", "turbo"),
        "base" => "turbo_feature_product",
        "class" => "",
        "category" => __("Turbo Shortcode", "turbo"),
        "icon" => "th-google-map",
        "params" => array(
            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Title", "turbo"),
                "param_name" => "title",
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Choose Feature Product", "turbo"),
                "param_name" => "product_id",
                "admin_label" => true,
                "save_always" => true,
                "value" => turbo_vc_get_posts('product'),
            ),

            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Button Text", "turbo"),
                "param_name" => "button_text",
            ),

            array(
                "type" => "textfield",
                "admin_label" => true,
                "heading" => __("Similar Car Text", "turbo"),
                "param_name" => "similar_cars",
            ),
        )
    ));
}
