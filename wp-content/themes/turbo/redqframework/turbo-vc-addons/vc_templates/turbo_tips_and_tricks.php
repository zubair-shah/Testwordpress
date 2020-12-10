<?php
$attrs_data = shortcode_atts(
    array(
        'choose_layout'  => 'layout_one',
        'section_title'  => esc_html__('Tips & Tricks', 'turbo'),
        'button_title'   => esc_html__('Continue Reading', 'turbo'),
        'post_type'      => 'post',
        'taxonomy'       => 'category',
        'term'           => '',
        'orderby'        => 'date',
        'order'          => 'desc',
        'posts_per_page' => '3',
        'button_text'    => '',
        'button_link'    => '#',
        'bg_css'    => ''
    ),
    $atts
);


extract($attrs_data);

$bg_css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($bg_css, ' '), $this->settings['base'], $atts);


if ($choose_layout === 'layout_one') {
    $wrapper_class = 'tips-and-tricks-layout-one';
} elseif ($choose_layout === 'layout_two') {
    $wrapper_class = 'tips-and-tricks-layout-two';
} else {
    $wrapper_class = 'tips-and-tricks-layout-one';
}

$tips_and_tricks = Turbowp_Helper::turbowp_get_product_type('tips_and_tricks', $post_type, $orderby, $order, $posts_per_page, $taxonomy, $term);

$data = array(
    'attrs_data'  => $attrs_data,
    'content'     => $content,
    'bg_css_class'     => $bg_css_class,
    'helper_data' => array(
        'tips_and_tricks' => $tips_and_tricks,
        'wrapper_class'   => $wrapper_class,
    ),
);

turbo_get_template_part(REDQFW_VC_DIR . 'template-parts/tips-and-tricks/' . $choose_layout, $data);
