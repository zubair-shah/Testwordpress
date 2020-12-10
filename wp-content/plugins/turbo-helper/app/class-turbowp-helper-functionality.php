<?php

namespace Turbowp_Helper\App;

/**
 * Turbowp_Theme_Helper_Functionality
 * @package Turbowp_Helper/App
 * @author RedQ Team
 * @since 1.0
 * @version 1.0
 */
class Turbowp_Theme_Helper_Functionality
{

    public function __construct()
    {
        add_action('init', array($this, 'turbowp_cuztom_initialization'));
    }


    /**
     * Initilization all post types, taxonomy and post meta
     *
     * @param    WP_Post    $post        The post to which we're adding the taxonomy term.
     * @param    string     $value       The name of the taxonomy term
     * @param    string     $taxonomy    The name of the taxonomy.
     * @access   public
     * @since    1.0.0
     */
    public function turbowp_cuztom_initialization()
    {

        $page = register_cuztom_post_type('page');

        $locations = register_cuztom_post_type('FAQ', array(
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'exclude_from_search' => true,
            'menu_icon'   => 'dashicons-pressthis',
        ));

        $faqs = register_cuztom_taxonomy('FAQ', 'product');

        if (is_admin()) :

            $args = array(
                'post_type' => 'faq',
                'posts_per_page' => -1
            );

            $faqs = get_posts($args);

            if (isset($faqs) && is_array($faqs)) {
                foreach ($faqs as $key => $value) {
                    if (!term_exists($value->post_title, 'faq')) {
                        wp_insert_term(
                            $value->post_title,
                            'faq',
                            array(
                                'description' => $value->post_content,
                                'slug' => strtolower(str_ireplace(' ', '-', $value->post_title)),
                            )
                        );
                    } else {
                        $faq = get_term_by('name', $value->post_title, 'faq');
                        if (isset($faq) && !empty($faq)) {
                            $term_id = $faq->term_id;
                            wp_update_term($term_id, 'faq', array(
                                'name' => $value->post_title,
                                'description' => $value->post_content,
                                'slug' => strtolower(str_ireplace(' ', '-', $value->post_title)),
                            ));
                        }
                    }
                }
            }

        endif;


        $product = register_cuztom_post_type('product');

        $product->add_meta_box(
            'turbowp_car_nice_image',
            __('Product Custom Fields', 'turbo-helper'),

            array(
                array(
                    'name'  => 'seat',
                    'label' => __('No. of seat', 'turbo-helper'),
                    'type'  => 'text'
                ),
                // array(
                //     'name'          => 'product_tab_small_image',
                //     'label'         => __('Upload Tab Small Image','turbo-helper'),
                //     'type'          => 'image',
                //     'description'   => __('use 170 × 111 px image for better view.', 'turbo-helper')
                // ),
                // array(
                //     'name'          => 'product_nice_image',
                //     'label'         => __('Transparent image for product.','turbo-helper'),
                //     'type'          => 'image',
                //     'description'   => __('Use 792*380 dimension image for better view.', 'turbo-helper')
                // ),
                array(
                    'name'  => 'brand_logo',
                    'label' => __('Brand Logo', 'turbo-helper'),
                    'type'  => 'image',
                ),
                array(
                    'name'        => 'product_nice_image_rotate',
                    'label'       => __('Rotate transparent image for product.', 'turbo-helper'),
                    'type'        => 'yesno',
                    'description' => __('Rotate or not for better view.', 'turbo-helper')
                ),
                array(
                    'name'        => 'bg_color',
                    'label'       => __('Transparent image Background Color', 'turbo-helper'),
                    'type'        => 'color',
                    'description' => __('Choose background color of transparent image', 'turbo-helper')
                ),
            )
        );

        $testimonial = register_cuztom_post_type('Testimonial', array(
            'has_archive'         => true,
            'supports'            => array('title', 'editor', 'thumbnail'),
            'exclude_from_search' => true
        ));

        $testimonial->add_meta_box(
            'turbowp_testimonial',
            __('Testimonial Custom Fields', 'turbo-helper'),
            array(
                array(
                    'name'          => 'author',
                    'label'         => __('Author', 'turbo-helper'),
                    'type'          => 'text'
                ),
                array(
                    'name'          => 'designation',
                    'label'         => __('Designation', 'turbo-helper'),
                    'type'          => 'text'
                ),
                array(
                    'name'          => 'rating',
                    'label'         => __('Rating', 'turbo-helper'),
                    'type'          => 'select',
                    'options'    => array(
                        '1' => __('1 star', 'turbo-helper'),
                        '2' => __('2 stars', 'turbo-helper'),
                        '3' => __('3 stars', 'turbo-helper'),
                        '4' => __('4 stars', 'turbo-helper'),
                        '5' => __('5 stars', 'turbo-helper'),
                    ),
                ),
            )
        );
    }
}
