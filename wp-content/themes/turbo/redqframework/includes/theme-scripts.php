<?php
if (!function_exists('turbo_add_scripts')) {
    function turbo_add_scripts()
    {
        global $product, $post;
        $post_id = get_the_ID();

        $option_data = turbo_get_option_data();
        if (is_singular()) wp_enqueue_script("comment-reply");
        wp_enqueue_script('jquery-ui-slider');
        wp_register_script('bootstrap.min', REDQFW_JS . 'bootstrap.min.js', array('jquery'), $ver = true, true);
        wp_enqueue_script('bootstrap.min');
        wp_register_script('isotope.pkgd.min', REDQFW_JS . 'isotope.pkgd.min.js', array('jquery'), $ver = true, true);
        wp_enqueue_script('isotope.pkgd.min');
        wp_register_script('select2.min', REDQFW_JS . 'select2.min.js', array('jquery'), $ver = true, true);
        wp_enqueue_script('select2.min');
        wp_register_script('owl.carousel', REDQFW_JS . 'owl.carousel.js', array('jquery'), $ver = true, true);
        wp_enqueue_script('owl.carousel');
        wp_register_script('jquery.inview', REDQFW_JS . 'jquery.inview.js', array('jquery'), $ver = true, true);
        wp_enqueue_script('jquery.inview');
        wp_register_script('jquery.counterup', REDQFW_JS . 'jquery.counterup.js', array('jquery'), $ver = true, true);
        wp_enqueue_script('jquery.counterup');
        wp_register_script('jquery.sticky', REDQFW_JS . 'jquery.sticky.js', array('jquery'), $ver = true, true);
        wp_enqueue_script('jquery.sticky');

        wp_register_script('jquery.resizesensor', REDQFW_JS . 'resizeSensor.js', array('jquery'), $ver = true, true);
        wp_enqueue_script('jquery.resizesensor');

        wp_register_script('jquery.stickysidebar', REDQFW_JS . 'sticky-sidebar.min.js', array('jquery'), $ver = true, true);
        wp_enqueue_script('jquery.stickysidebar');
        wp_register_script('jquery.nicescroll', REDQFW_JS . 'jquery.nicescroll.js', array('jquery'), $ver = true, true);
        wp_enqueue_script('jquery.nicescroll');
        wp_register_script('jquery.fitvids', REDQFW_JS . 'jquery.fitvids.js', array('jquery'), $ver = true, true);
        wp_enqueue_script('jquery.fitvids');
        wp_register_script('jquery.barrating.min', REDQFW_JS . 'jquery.barrating.min.js', array('jquery'), $ver = true, true);
        wp_enqueue_script('jquery.barrating.min');

        // wp_register_script('typeahead.bundle.min', REDQFW_JS . 'typeahead.bundle.min.js', array('jquery'), $ver = true, true);
        // wp_enqueue_script('typeahead.bundle.min');

        wp_register_script('imagesloaded.pkgd.min', REDQFW_JS . 'imagesloaded.pkgd.min.js', array('jquery'), $ver = true, true);
        wp_enqueue_script('imagesloaded.pkgd.min');

        $googlemap_settings = get_option('googlemap_settings', true);
        include_once(ABSPATH . 'wp-admin/includes/plugin.php');
        if (class_exists('Load_Google_Map') && isset($googlemap_settings)) {
            if (isset($googlemap_settings['googlemap_enable']) && $googlemap_settings['googlemap_enable'] === 'enable' && isset($googlemap_settings['googlemap_api_key']) && $googlemap_settings['googlemap_api_key'] !== '') {
                wp_register_script('maplace', REDQFW_JS . 'maplace.js', array('jquery'), $ver = true, true);
                wp_enqueue_script('maplace');

                wp_register_script('contact-map', REDQFW_JS . 'contact-map.js', array('jquery'), $ver = true, true);
                wp_enqueue_script('contact-map');
            }
        }

        wp_register_script('turbo-scripts', REDQFW_SRC_JS . 'scripts.js', array('jquery'), $ver = false, true);
        wp_enqueue_script('turbo-scripts');

        wp_register_script('turbo-custom-scripts', REDQFW_JS . 'custom-turbo-scripts.js', array('jquery'), false, true);
        wp_enqueue_script('turbo-custom-scripts');


        // if (!empty($option_data)) {
        //     wp_localize_script('turbo-scripts', 'option_data', $option_data);
        // }


        if (class_exists('RedQ_Rental_And_Bookings') && is_product() && is_rental_product($post_id)) {
            $locations_data = array();

            $pick_up_locations = array();
            $drop_off_locations = array();

            $product_inventories = rnb_get_product_inventory_id($post_id);

            if (!empty($product_inventories)) {
                foreach ($product_inventories as $key => $product_inventory) {
                    $pick_up_locations[] = WC_Product_Redq_Rental::redq_get_rental_payable_attributes('pickup_location', $product_inventory);
                    $drop_off_locations[] = WC_Product_Redq_Rental::redq_get_rental_payable_attributes('dropoff_location', $product_inventory);
                }
            }

            $pick_up_locations = sizeof($pick_up_locations) > 0 ? array_merge(...$pick_up_locations) : [];
            $drop_off_locations = sizeof($drop_off_locations) > 0 ? array_merge(...$drop_off_locations) : [];

            $locations = array_merge($pick_up_locations, $drop_off_locations);
            $map_zoom_level = isset($option_data['map_zoom']) && $option_data['map_zoom'] ? (int) $option_data['map_zoom'] : 8;

            if (isset($locations) && is_array($locations)) {
                foreach ($locations as $key => $value) {
                    $price      = $value['cost'] ? wc_price($value['cost']) : '';
                    $main_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');

                    $locations_data[$key] = [
                        'lat'   => trim($value['lat']),
                        'lon'   => trim($value['lon']),
                        'title' => $value['title'],
                        'zoom'  => $map_zoom_level,
                        'icon'  => isset($option_data['map_marker']['url']) ? $option_data['map_marker']['url'] : '',
                        'html'  => '<div class                                                                 = "image"><img src = "' . $main_image[0] . '"></div><div class = "loc-content"><h3>' . $value['title'] . '</h3><p>' . $value['address'] . '</p><p>' . $price . '</p></div>'
                    ];
                }
            }

            if (is_singular('product')) {
                wp_register_script('listing-detail-map', REDQFW_JS . 'listing-detail-map.js', array('jquery'), $ver = true, true);
                wp_enqueue_script('listing-detail-map');
                wp_localize_script('listing-detail-map', 'turbo_data', [
                    'locations' => $locations_data
                ]);
            }
        }
    }
}
add_action('wp_enqueue_scripts', 'turbo_add_scripts');

/**
 * Custom JS option
 *
 * @return void
 */
function turbo_custom_js()
{
    global $turbo_option_data;

    if (isset($turbo_option_data['turbo-custom-js'])) {
        echo "<script>" . $turbo_option_data['turbo-custom-js'] . "</script>";
    }
}
add_action('wp_head', 'turbo_custom_js');
