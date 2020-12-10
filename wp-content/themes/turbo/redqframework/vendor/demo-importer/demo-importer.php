<?php

/**
 * turbo_importer_page_setup
 *
 * @param mixed $default_settings
 *
 * @return array
 */
function turbo_importer_page_setup($default_settings)
{
    $default_settings['parent_slug'] = 'themes.php';
    $default_settings['page_title'] = esc_html__('Turbo Demo Importer', 'turbo');
    $default_settings['menu_title'] = esc_html__('Import Demo Data', 'turbo');
    $default_settings['capability'] = 'import';
    $default_settings['menu_slug'] = 'turbo-demo-importer';

    return $default_settings;
}

add_filter('pt-ocdi/plugin_page_setup', 'turbo_importer_page_setup');


/**
 * turbo_importer_page_title
 *
 * @param mixed $intro_text
 *
 * @return void
 */
function turbo_importer_page_title($intro_text)
{
    // Start output buffer for displaying the plugin intro text.
    ob_start();
?>
    <h1 class="ocdi__title  dashicons-before  dashicons-upload"><?php esc_html_e('Turbo Demo Importer', 'turbo'); ?></h1>
<?php
    $importer_page_title = ob_get_clean();

    return $importer_page_title;
}

add_filter('pt-ocdi/plugin_page_title', 'turbo_importer_page_title');


/**
 * turbo_importer_intro_text
 *
 * @param mixed $intro_text
 *
 * @return void
 */
function turbo_importer_intro_text($intro_text)
{
    // Start output buffer for displaying the plugin intro text.
    ob_start();
?>

    <div class="ocdi__intro-notice  notice  notice-warning  is-dismissible">
        <p><?php esc_html_e('Before you begin, make sure all the required plugins are activated.', 'turbo'); ?></p>
    </div>

    <div class="ocdi__intro-text">

        <p><?php esc_html_e('When you import the data, the following things might happen:', 'turbo'); ?></p>

        <ul>
            <li><?php esc_html_e('No existing posts, pages, categories, images, custom post types or any other data will be deleted or modified.', 'turbo'); ?></li>
            <li><?php esc_html_e('Posts, pages, images, widgets, menus and other theme settings will get imported.', 'turbo'); ?></li>
            <li><?php esc_html_e('Due to copyright issue, we have blurred all images in demo content.', 'turbo'); ?></li>
            <li><?php esc_html_e('Please click on the Import button only once and wait, it can take a couple of minutes.', 'turbo'); ?></li>
        </ul>

        <hr>
    </div>

<?php
    $notices = ob_get_clean();

    return $notices;
}

add_filter('pt-ocdi/plugin_intro_text', 'turbo_importer_intro_text');


/**
 * turbo_import_files
 *
 * @return array
 */
function turbo_import_files()
{
    return array(
        array(
            'import_file_name'         => 'Turbo_Car_Rental_1',
            'categories'               => array('Car'),
            'import_file_url'          => 'https://s3.amazonaws.com/redqteam.com/turbowp/demo-data/Turbo_Car_Rental_1/all.xml',
            'import_widget_file_url'   => 'https://s3.amazonaws.com/redqteam.com/turbowp/demo-data/Turbo_Car_Rental_1/widgets.json',
            'import_redux'             => array(
                array(
                    'file_url'    => 'https://s3.amazonaws.com/redqteam.com/turbowp/demo-data/Turbo_Car_Rental_1/options.json',
                    'option_name' => 'turbo_option_data',
                ),
            ),
            'import_preview_image_url' => 'https://s3.amazonaws.com/redqteam.com/turbowp/preview-images/Turbo_Car_Rental_1.png',
            'import_notice'            => __('Ready to import', 'turbo'),
            'preview_url'              => 'https://preview.redq.io/turbo',
        ),
        array(
            'import_file_name'         => 'Turbo_Car_Rental_2',
            'categories'               => array('Car'),
            'import_file_url'          => 'https://s3.amazonaws.com/redqteam.com/turbowp/demo-data/Turbo_Car_Rental_2/all.xml',
            'import_widget_file_url'   => 'https://s3.amazonaws.com/redqteam.com/turbowp/demo-data/Turbo_Car_Rental_2/widgets.json',
            'import_redux'             => array(
                array(
                    'file_url'    => 'https://s3.amazonaws.com/redqteam.com/turbowp/demo-data/Turbo_Car_Rental_2/options.json',
                    'option_name' => 'turbo_option_data',
                ),
            ),
            'import_preview_image_url' => 'https://s3.amazonaws.com/redqteam.com/turbowp/preview-images/Turbo_Car_Rental_2.png',
            'import_notice'            => __('Ready to import', 'turbo'),
            'preview_url'              => 'https://preview.redq.io/turbo/car',
        ),
        array(
            'import_file_name'         => 'Turbo_Car_Rental_3',
            'categories'               => array('Car'),
            'import_file_url'          => 'https://s3.amazonaws.com/redqteam.com/turbowp/demo-data/Turbo_Car_Rental_3/all.xml',
            'import_widget_file_url'   => 'https://s3.amazonaws.com/redqteam.com/turbowp/demo-data/Turbo_Car_Rental_3/widgets.json',
            'import_redux'             => array(
                array(
                    'file_url'    => 'https://s3.amazonaws.com/redqteam.com/turbowp/demo-data/Turbo_Car_Rental_3/options.json',
                    'option_name' => 'turbo_option_data',
                ),
            ),
            'import_preview_image_url' => 'https://s3.amazonaws.com/redqteam.com/turbowp/preview-images/Turbo_Car_Rental_3.png',
            'import_notice'            => __('Ready to import', 'turbo'),
            'preview_url'              => 'https://preview.redq.io/turbo/car-deal',
        ),
        array(
            'import_file_name'         => 'Turbo_Car_Rental_4',
            'categories'               => array('Car'),
            'import_file_url'          => 'https://s3.amazonaws.com/redqteam.com/turbowp/demo-data/Turbo_Car_Rental_4/all.xml',
            'import_widget_file_url'   => 'https://s3.amazonaws.com/redqteam.com/turbowp/demo-data/Turbo_Car_Rental_4/widgets.json',
            'import_redux'             => array(
                array(
                    'file_url'    => 'https://s3.amazonaws.com/redqteam.com/turbowp/demo-data/Turbo_Car_Rental_4/options.json',
                    'option_name' => 'turbo_option_data',
                ),
            ),
            'import_preview_image_url' => 'https://s3.amazonaws.com/redqteam.com/turbowp/preview-images/Turbo_Car_Rental_4.png',
            'import_notice'            => __('Ready to import', 'turbo'),
            'preview_url'              => 'https://preview.redq.io/turbo/car-deal-two',
        ),
        array(
            'import_file_name'         => 'Turbo_Motor_Bike',
            'categories'               => array('Bike', 'Scooter'),
            'import_file_url'          => 'https://s3.amazonaws.com/redqteam.com/turbowp/demo-data/Turbo_Motor_Bike/all.xml',
            'import_widget_file_url'   => 'https://s3.amazonaws.com/redqteam.com/turbowp/demo-data/Turbo_Motor_Bike/widgets.json',
            'import_redux'             => array(
                array(
                    'file_url'    => 'https://s3.amazonaws.com/redqteam.com/turbowp/demo-data/Turbo_Motor_Bike/options.json',
                    'option_name' => 'turbo_option_data',
                ),
            ),
            'import_preview_image_url' => 'https://s3.amazonaws.com/redqteam.com/turbowp/preview-images/Turbo_Motor_Bike.png',
            'import_notice'            => __('Ready to import', 'turbo'),
            'preview_url'              => 'https://preview.redq.io/turbo/motor-bike',
        ),
        array(
            'import_file_name'         => 'Turbo_Bike',
            'categories'               => array('Bike'),
            'import_file_url'          => 'https://s3.amazonaws.com/redqteam.com/turbowp/demo-data/Turbo_Bike/all.xml',
            'import_widget_file_url'   => 'https://s3.amazonaws.com/redqteam.com/turbowp/demo-data/Turbo_Bike/widgets.json',
            'import_redux'             => array(
                array(
                    'file_url'    => 'https://s3.amazonaws.com/redqteam.com/turbowp/demo-data/Turbo_Bike/options.json',
                    'option_name' => 'turbo_option_data',
                ),
            ),
            'import_preview_image_url' => 'https://s3.amazonaws.com/redqteam.com/turbowp/preview-images/Turbo_Bike.png',
            'import_notice'            => __('Ready to import', 'turbo'),
            'preview_url'              => 'https://preview.redq.io/turbo/bike',
        ),
        array(
            'import_file_name'         => 'Turbo_Listing',
            'categories'               => array('Listing'),
            'import_file_url'          => 'https://s3.amazonaws.com/redqteam.com/turbowp/demo-data/Turbo_Listing/all.xml',
            'import_widget_file_url'   => 'https://s3.amazonaws.com/redqteam.com/turbowp/demo-data/Turbo_Listing/widgets.json',
            'import_redux'             => array(
                array(
                    'file_url'    => 'https://s3.amazonaws.com/redqteam.com/turbowp/demo-data/Turbo_Listing/options.json',
                    'option_name' => 'turbo_option_data',
                ),
            ),
            'import_preview_image_url' => 'https://s3.amazonaws.com/redqteam.com/turbowp/preview-images/Turbo_Listing.png',
            'import_notice'            => __('Ready to import', 'turbo'),
            'preview_url'              => 'https://preview.redq.io/turbo/listing',
        ),
    );
}

add_filter('pt-ocdi/import_files', 'turbo_import_files');


/**
 * turbo_after_import_setup
 *
 * @return void
 */
function turbo_after_import_setup()
{
    $main_menu = get_term_by('slug', 'turbo-menu', 'nav_menu');
    $footer_menu = get_term_by('slug', 'footer-menu', 'nav_menu');
    set_theme_mod(
        'nav_menu_locations',
        array(
            'primary_navigation' => $main_menu->term_id,
            'footer_navigation'  => $footer_menu ? $footer_menu->term_id : ''
        )
    );

    $home = get_page_by_title('Home');
    update_option('page_on_front', $home->ID);
    update_option('show_on_front', 'page');

    // Set the blog page
    $blog = get_page_by_title('News');
    update_option('page_for_posts', $blog->ID);
}
add_action('pt-ocdi/after_import', 'turbo_after_import_setup');



/**
 * turbo_disabled_pt_branding
 *
 * @return boolean
 */
function turbo_disabled_pt_branding()
{
    return true;
}

add_filter('pt-ocdi/disable_pt_branding', 'turbo_disabled_pt_branding');


/**
 * turbo_before_widgets_import
 *
 * @param mixed $selected_import
 *
 * @return void
 */
function turbo_before_widgets_import($selected_import)
{
    update_option('sidebars_widgets', array());
}

add_action('pt-ocdi/before_widgets_import', 'turbo_before_widgets_import');

/**
 * turbo_after_import_demo_data
 *
 * @param  mixed $selected_import_files
 * @param  mixed $import_files
 * @param  mixed $selected_index
 *
 * @return void
 */
function turbo_after_import_demo_data($selected_import_files, $import_files, $selected_index)
{
    $args = array(
        'post_type'   => 'product',
        'posts_per_page' => -1,
        'fields' => 'ids',
        'suppress_filters' => 0,
    );
    $products_query = new WP_Query($args);
    $products = $products_query->posts;

    foreach ($products as $key => $product) {
        $post_id = $product;
        if (class_exists('RedQ_Rental_And_Bookings') && is_rental_product($post_id)) {

            global $wpdb;
            $values = array();
            $fields = array();

            $pivot_table = $wpdb->prefix . 'rnb_inventory_product';
            $wpdb->delete($pivot_table, array('product' => $post_id), array('%d'));
            $inventory_data = get_post_meta($post_id, '_redq_product_inventory', true);

            if (isset($inventory_data)) {
                foreach ($inventory_data as $pvi) {
                    $values[] = "(%d, %d)";
                    $fields[] = $pvi;
                    $fields[] = $post_id;
                }
            }

            $values = implode(",", $values);
            $wpdb->query($wpdb->prepare(
                "INSERT INTO $pivot_table ( inventory, product ) VALUES $values",
                $fields
            ));

            $result = rnb_get_product_price($post_id);
            $price = $result['price'];
            update_post_meta($post_id, '_price', $price);
        }
    }
}
add_action('pt-ocdi/after_all_import_execution', 'turbo_after_import_demo_data', 10, 3);



/**
 * turbo_delete_duplicate_meta_key
 *
 * @param  mixed $selected_import_files
 * @param  mixed $import_files
 * @param  mixed $selected_index
 *
 * @return void
 */
function turbo_delete_duplicate_meta_key($selected_import_files, $import_files, $selected_index)
{
    global $wpdb;

    $duplicate_keys = $wpdb->get_results(
        "SELECT COUNT(meta_id) AS count, meta_id, meta_key, post_id, meta_value FROM {$wpdb->prefix}postmeta as postmeta LEFT JOIN {$wpdb->prefix}posts as posts ON postmeta.post_id = posts.ID GROUP BY post_id, meta_key HAVING count > 1",
        ARRAY_A
    );

    foreach ($duplicate_keys as $key => $duplicate_key) {
        $post_id = $duplicate_key['post_id'];
        $meta_key = $duplicate_key['meta_key'];

        $mids = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$wpdb->prefix}postmeta as postmeta WHERE postmeta.post_id = %d AND postmeta.meta_key = %s", $post_id, $meta_key));

        $duplicate = [];
        foreach ($mids as $key => $mid) {
            if (empty($mid->meta_value) || is_serialized($mid->meta_value) && empty(unserialize($mid->meta_value))) {
                delete_metadata_by_mid('post', $mid->meta_id);
                continue;
            }
            $duplicate[] =  $mid->meta_id;
        }

        if (sizeof($duplicate) > 1) {
            foreach ($duplicate as $key => $meta_id) {
                if ($key === 0) continue;
                delete_metadata_by_mid('post', $meta_id);
            }
        }

        if (class_exists('RedQ_Rental_And_Bookings')) {
            $result = rnb_get_product_price($post_id);
            $price = $result['price'];
            update_post_meta($post_id, '_price', $price);
        }
    }
}
add_action('pt-ocdi/after_all_import_execution', 'turbo_delete_duplicate_meta_key', 10, 3);
