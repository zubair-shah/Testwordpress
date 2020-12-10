<?php
$attrs_data = shortcode_atts(
    array(
        'testimonial_banner_title' => !empty($testimonial_banner_title) ? $testimonial_banner_title : esc_html__("What client say about us", 'turbo'),
        'background_color'         => '',
        'testimonial_layout'       => 'layout_one',
        'orderby'                  => 'date',
        'order'                    => 'desc',
        'posts_per_page'           => '3',
        'bg_css'                   => '',
        'inner_bg_css'             => ''
    ),
    $atts
);

extract($attrs_data);

$bg_css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($bg_css, ' '), $this->settings['base'], $atts);
$inner_bg_css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($inner_bg_css, ' '), $this->settings['base'], $atts);


if ($testimonial_layout === 'layout_one') {
    $holder_class    = 'testimonial-layout-one no-bottom-padding';
    $carousel_class  = 'testimonial-wrapper';
    $container_class = 'container';
} elseif ($testimonial_layout === 'layout_two') {
    $holder_class    = 'testimonial-layout-two';
    $carousel_class  = 'testimonial-wrapper-two';
    $container_class = 'turbo-container';
} elseif ($testimonial_layout === 'layout_three') {
    $holder_class    = 'testimonial-layout-three';
    $carousel_class  = 'testimonial-wrapper-three';
    $container_class = 'turbo-container';
} else {
    $holder_class    = 'testimonial-layout-one no-bottom-padding';
    $carousel_class  = 'testimonial-wrapper';
    $container_class = 'container';
}

$testimonials = Turbowp_Helper::turbowp_get_product_type('testimonial', '', $orderby, $order, $posts_per_page);

$data = array(
    'attrs_data'         => $attrs_data,
    'content'            => $content,
    'bg_css_class'       => $bg_css_class,
    'inner_bg_css_class' => $inner_bg_css_class,
    'helper_data' => array(
        'holder_class'    => $holder_class,
        'carousel_class'  => $carousel_class,
        'container_class' => $container_class,
        'testimonials'    => $testimonials,
    ),
);

turbo_get_template_part(REDQFW_VC_DIR . 'template-parts/testimonial/' . $testimonial_layout, $data);
