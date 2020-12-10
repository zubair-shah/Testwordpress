<?php
$attrs_data = shortcode_atts(array(
    'choose_layout'               => 'layout_one',
    'heading_title'               => esc_html__('Turbo helps you', 'turbo'),
    'heading_sub_title'           => '',
    'heading_tag_title'           => '',
    'show_user_access'            => 'yes',
    'show_cars'                   => 'yes',
    'show_reviews'                => 'yes',
    'show_counter_section'        => 'hide',
    'reactive_builder_shortcode'  => '',
    'user_access_text'            => esc_html__('User Access', 'turbo'),
    'cars_text'                   => esc_html__('Cars', 'turbo'),
    'reviews_text'                => esc_html__('Reviews', 'turbo'),
    'banner_image_id'             => '',
    'search_button_section'       => 'hide',
    'search_button_section_class' => 'radius',
    'explore_button_text'         => esc_html__('Explore', 'turbo'),
    'explore_button_link'         => '#',
    'details_button_text'         => esc_html__('Details', 'turbo'),
    'details_button_link'         => '#',
), $atts);

extract($attrs_data);

// $atts = vc_map_get_attributes($this->getShortcode(), $atts);

if ($banner_image_id) {
    $feature_image = wp_get_attachment_image_src($banner_image_id, 'full');
} else {
    $feature_image[0] = '';
}

if ($choose_layout === 'layout_one') {
    $layout_class = 'search-with-counter search-layout-one';
    $content_class = 'layout-one';
} elseif ($choose_layout === 'layout_two') {
    $layout_class = 'search-with-button search-layout-two';
    $content_class = 'layout-two';
} elseif ($choose_layout === 'layout_three') {
    $layout_class = 'search-with-button search-layout-three';
    $content_class = 'layout-three';
} elseif ($choose_layout === 'layout_four') {
    $layout_class = 'search-for-dealer search-layout-four';
    $content_class = 'layout-four';
} else {
    $layout_class = 'search-with-counter search-with-multiple-image';
}

$data = array(
    'attrs_data'  => $attrs_data,
    'content'     => $content,
    'helper_data' => array(
        'layout_class'  => $layout_class,
        'content_class' => $content_class,
        'feature_image' => $feature_image
    ),
);

turbo_get_template_part(REDQFW_VC_DIR . 'template-parts/horizontal-search/' . $choose_layout, $data);

?>