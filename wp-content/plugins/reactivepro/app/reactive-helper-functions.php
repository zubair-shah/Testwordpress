<?php

function getCredentials($h, $w, $x, $y)
{
    return [
        'h' => $h,
        'w' => $w,
        'x' => $x,
        'y' => $y
    ];
}

function gridLeftSearchRight()
{
    $args = array(
        'post_type'      => 'reactive_layouts',
        'posts_per_page' => -1
    );
    $layouts = get_posts($args);
    $processed_layouts_data = [];
    foreach ($layouts as $key => $layout) {
        $processed_layouts_data[$layout->ID]['post_title'] = $layout->post_title;
        $processed_layouts_data[$layout->ID]['readOnly'] = get_post_meta($layout->ID, 'readOnly', true);
        $all_Layouts = get_post_meta($layout->ID, 'reactive_grid_template', true);
        if (is_array($all_Layouts)) {
            if (isset($all_Layouts['layouts_data']) || isset($all_Layouts['global_settings']) || isset($all_Layouts['global_settings'])) {
                $processed_layouts_data[$layout->ID]['layouts_data'] = json_decode($all_Layouts['layouts_data']);
                $processed_layouts_data[$layout->ID]['global_settings'] = json_decode($all_Layouts['global_settings']);
                $processed_layouts_data[$layout->ID]['settings_data'] = json_decode($all_Layouts['settings_data']);
            }
        }
    }
    return $processed_layouts_data;
}

function re_get_all_term_taxonomies()
{
    global $wpdb;
    $wpdb->get_results("SET SESSION group_concat_max_len = 999999999999999", 'ARRAY_A');
    $query = $wpdb->prepare("SELECT * FROM {$wpdb->terms} WHERE term_id <> %d", 0);
    $results = $wpdb->get_results($query, 'ARRAY_A');
    $new_array = array();

    foreach ($results as $result) {
        // $new_array = array_merge( array_combine( $term_slugs, $term_names ), $new_array );
        $new_array[$result['slug']] = $result['name'];
    }
    return $new_array;
}

function get_taxonomy_names($taxonomies)
{
    $taxonomy_names = array();
    foreach ($taxonomies as $key => $taxonomy) {
        if ($taxonomy != '') {
            $taxonomy_object = get_taxonomy($taxonomy);
            if ($taxonomy_object) {
                $taxonomy_names[$taxonomy] = $taxonomy_object->labels->singular_name;
            }
        }
    }
    return $taxonomy_names;
}

function split_slot($filtered_booking_data)
{
    $final_data = [];
    foreach ($filtered_booking_data as $key => $data) {
        $single_slotted_data = [];
        $total_inventory = $data['quantity'];
        $product_id = $data['product_id'];
        $conditions = redq_rental_get_settings($product_id, 'conditions');
        $begin = new DateTime($data['pickup_datetime']);
        $end = new DateTime($data['return_datetime']);
        $interval = new DateInterval("P1D");
        if ($data['block_by'] === 'CUSTOM') {
            $data['booked'] = $total_inventory;
        }
        $daterange = new DatePeriod($begin, $interval, $end);
        foreach ($daterange as $date) {
            if (isset($sloted_data[$date->format('Y:m:d')])) {
                $sloted_data[$date->format('Y:m:d')] += $data['booked'];
            } else {
                $sloted_data[$date->format('Y:m:d')] = $data['booked'];
            }
        }
        $final_booked_date = array_map(function ($value) use ($total_inventory, $product_id) {
            if ($value >= $total_inventory) {
                return $product_id;
            }
        }, $sloted_data);
        $final_data = array_merge_recursive($final_data, $final_booked_date);
    }
    return $final_data;
}

function get_available_product_id($pickup_datetime, $return_datetime, $wpml_lang)
{
    global $wpdb;
    $requested_data_slot = [];
    // $filtered_booking_data = $wpdb->get_results(
    //     "select *,
    // 		(select sum(meta_value) from {$wpdb->prefix}woocommerce_order_itemmeta where order_item_id= wr.item_id and meta_key='_qty') as booked,
    // 		(select meta_value from {$wpdb->prefix}postmeta where post_id= wr.inventory_id and meta_key='quantity') as quantity
    // 		from {$wpdb->prefix}rnb_availability as wr where wr.delete_status='0' and wr.lang='$wpml_lang'",
    //     ARRAY_A
    // );

    $filtered_booking_data = $wpdb->get_results(
        "select *,
    		(select sum(meta_value) from {$wpdb->prefix}woocommerce_order_itemmeta where order_item_id= wr.item_id and meta_key='_qty') as booked,
    		(select sum(`meta_value`) from {$wpdb->prefix}postmeta as meta left join {$wpdb->prefix}rnb_inventory_product as ip on ip.`inventory` = meta.`post_id` where meta.meta_key='quantity' and wr.`product_id` = ip.`product`) as quantity
    		from {$wpdb->prefix}rnb_availability as wr where wr.delete_status='0' and wr.lang='$wpml_lang'",
        ARRAY_A
    );

    if (count($filtered_booking_data) <= 0) {
        return reactive_get_available_product_id($requested_data_slot);
    }
    $booked_products_array = split_slot($filtered_booking_data);
    if (count($booked_products_array) <= 0) {
        return reactive_get_available_product_id($requested_data_slot);
    }

    $to = new DateTime($pickup_datetime);
    $from = new DateTime($return_datetime);
    $interval = new DateInterval("P1D");
    $daterange = new DatePeriod($to, $interval, $from);
    foreach ($daterange as $date) {
        if (isset($booked_products_array[$date->format('Y:m:d')]) && !in_array($booked_products_array[$date->format('Y:m:d')], $requested_data_slot)) {
            $requested_data_slot[] = $booked_products_array[$date->format('Y:m:d')];
        }
    }

    $last_data = [];

    foreach ($requested_data_slot as $key => $value) {
        if (is_array($value)) {
            $last_data = array_merge($last_data, $value);
        } else {
            $last_data[] = $value;
        }
    }
    return reactive_get_available_product_id($last_data);
}

function reactive_get_available_product_id($requested_data_slot = [])
{
    $bookable_products = get_posts(
        array(
            'post_type'   => 'product',
            'numberposts' => -1,
            'exclude'     => $requested_data_slot,
            'tax_query'   => array(
                array(
                    'taxonomy' => 'product_type',
                    'field'    => 'slug',
                    'terms'    => array('redq_rental'),
                    'operator' => 'IN',
                )
            )
        )
    );

    $bookable_products_id = array_map(function ($product) {
        return $product->ID;
    }, $bookable_products);
    return implode(',', $bookable_products_id);
}

function location_posts_where($geoData, $location, $radius = 100)
{
    global $wpdb;
    $lat               = $location->lat;
    $lng               = $location->lng;
    $selected_posts[]  = $lat;
    $selected_posts[]  = $lng;
    $selected_posts[]  = $lat;
    $selected_posts[]  = $radius;
    $geo_searched_posts = [];
    // $radius = 100; // should be dynamic
    if (in_array('country', $geoData->types) && in_array('political', $geoData->types)) {
        $query = $wpdb->prepare("SELECT id FROM {$wpdb->prefix}re_lat_lng WHERE country= %s", $geoData->formatted_address);
    } else {
        $query = $wpdb->prepare("SELECT DISTINCT id, ( 3959 * acos( cos( radians($lat) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( lat ) ) ) ) as distance FROM {$wpdb->prefix}re_lat_lng as T
  WHERE
  ( 3959 * acos( cos( radians(%s) )
                * cos( radians( lat ) )
                * cos( radians( lng )
                - radians(%s) )
                + sin( radians(%s) )
                * sin( radians( lat ) ) ) ) <= %s ORDER BY distance ASC", $selected_posts);
    }
    $results = $wpdb->get_results($query, 'ARRAY_A');
    foreach ($results as $key => $single_post) {
        $geo_searched_posts[] = $single_post['id'];
    }

    return $geo_searched_posts;
}

function sorting_by_post_key($post_types = array(), $sort_key)
{
    global $wpdb;
    $post_types_placeholder = implode(', ', array_fill(0, count($post_types), '%s'));
    $post_types[]           = 'publish';
    $post_types[]           = 'inherit';
    $query                  = $wpdb->prepare("SELECT ID FROM {$wpdb->posts}
            WHERE post_type IN ($post_types_placeholder)
            AND (post_status = %s OR post_status = %s) ORDER BY $sort_key ASC", $post_types);
    $results                = $wpdb->get_results($query, 'ARRAY_A');

    return $results;
}

function sort_by_meta_key_value($post_types, $sort_key)
{
    global $wpdb;
    $post_types_placeholder = implode(', ', array_fill(0, count($post_types), '%s'));
    $post_types[]           = $sort_key;
    $post_types[]           = 'publish';
    $query                  = $wpdb->prepare("SELECT DISTINCT post_id as ID FROM {$wpdb->postmeta}
  LEFT JOIN {$wpdb->posts} ON {$wpdb->postmeta}.post_id = {$wpdb->posts}.ID
  WHERE {$wpdb->posts}.post_type IN ($post_types_placeholder)
  AND {$wpdb->postmeta}.meta_key = %s
  AND {$wpdb->posts}.post_status = %s
  ORDER BY CASE WHEN CAST({$wpdb->postmeta}.meta_value AS DECIMAL(10,6)) = {$wpdb->postmeta}.meta_value THEN ABS({$wpdb->postmeta}.meta_value) END ASC,
  CASE WHEN concat('',{$wpdb->postmeta}.meta_value * 1) <> {$wpdb->postmeta}.meta_value  THEN {$wpdb->postmeta}.meta_value END ASC", $post_types);
    $results                = $wpdb->get_results($query, 'ARRAY_A');

    return $results;
}

function sorting_by_review_key($sort_key)
{
    global $wpdb;
    $query   = $wpdb->prepare("SELECT comment_ID as ID FROM {$wpdb->comments}
          WHERE comment_ID <> %s
          ORDER BY $sort_key ASC", 0);
    $results = $wpdb->get_results($query, 'ARRAY_A');

    return $results;
}

function sort_by_review_meta_key_value($sort_key)
{
    global $wpdb;
    $query = $wpdb->prepare("SELECT DISTINCT comment_ID as ID FROM {$wpdb->commentmeta}
  WHERE {$wpdb->commentmeta}.meta_key = %s
  ORDER BY CASE WHEN concat('',{$wpdb->commentmeta}.meta_value * 1) = {$wpdb->commentmeta}.meta_value THEN ABS({$wpdb->commentmeta}.meta_value) ELSE LENGTH({$wpdb->commentmeta}.meta_value) END ASC", $sort_key);
    //ORDER BY ABS({$wpdb->postmeta}.meta_value) ASC", $post_types);
    $results = $wpdb->get_results($query, 'ARRAY_A');

    return $results;
}

function sorting_by_bp_group_key($sort_key)
{
    global $wpdb;
    $query   = $wpdb->prepare("SELECT id as ID FROM {$wpdb->prefix}bp_groups
          WHERE id <> %s
          ORDER BY $sort_key ASC", 0);
    $results = $wpdb->get_results($query, 'ARRAY_A');

    return $results;
}

function sort_by_bp_group_meta_key_value($sort_key)
{
    global $wpdb;
    $query = $wpdb->prepare("SELECT DISTINCT id as ID FROM {$wpdb->prefix}bp_groups_groupmeta as metaTbale
  WHERE metaTbale.meta_key = %s
  ORDER BY CASE WHEN concat('',metaTbale.meta_value * 1) = metaTbale.meta_value THEN ABS(metaTbale.meta_value) ELSE LENGTH(metaTbale.meta_value) END ASC", $sort_key);
    //ORDER BY ABS({$wpdb->postmeta}.meta_value) ASC", $post_types);
    $results = $wpdb->get_results($query, 'ARRAY_A');

    return $results;
}

function sorting_by_user_key($sort_key)
{
    global $wpdb;
    $query   = $wpdb->prepare("SELECT ID FROM {$wpdb->users}
          WHERE ID <> %s
          ORDER BY $sort_key ASC", 0);
    $results = $wpdb->get_results($query, 'ARRAY_A');

    return $results;
}

function sort_by_user_meta_key_value($sort_key)
{
    global $wpdb;
    $query = $wpdb->prepare("SELECT DISTINCT user_id as ID FROM {$wpdb->usermeta}
  WHERE {$wpdb->usermeta}.meta_key = %s
  ORDER BY CASE WHEN concat('',{$wpdb->usermeta}.meta_value * 1) = {$wpdb->usermeta}.meta_value THEN ABS({$wpdb->usermeta}.meta_value) ELSE LENGTH({$wpdb->usermeta}.meta_value) END ASC", $sort_key);
    //ORDER BY ABS({$wpdb->postmeta}.meta_value) ASC", $post_types);
    $results = $wpdb->get_results($query, 'ARRAY_A');

    return $results;
}
