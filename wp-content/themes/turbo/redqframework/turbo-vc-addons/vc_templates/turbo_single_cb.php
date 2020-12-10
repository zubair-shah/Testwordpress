<?php
$attrs_data = shortcode_atts(array(
    'choose_layout' => 'layout_one',
    'title'         => !empty($title) ? $title : esc_html__('What new facilities', 'turbo'),
    'feature_img'   => '',
    'preview_img'   => '',
    'button_text'   => __('Details', 'turbo'),
    'button_link'   => __('#', 'turbo'),
    'bg_css' => '',
), $atts);

extract($attrs_data);

$bg_css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($bg_css, ' '), $this->settings['base'], $atts);

$feature_img = wp_get_attachment_image_src($feature_img, "full");
$feature_img_src = $feature_img[0] ? $feature_img[0] : '';

$preview_img = wp_get_attachment_image_src($preview_img, "full");
$preview_img_src = $preview_img[0] ? $preview_img[0] : '';

if ($choose_layout === 'layout_one') {
    $wrapper_class = 'single-cb-layout-one';
} else {
    $wrapper_class = 'single-cb-layout-two';
}

$data = array(
    'attrs_data'  => $attrs_data,
    'content'     => $content,
    'helper_data' => array(
        'bg_css_class' => $bg_css_class,
        'wrapper_class'   => $wrapper_class,
        'feature_img_src' => $feature_img_src,
        'preview_img_src' => $preview_img_src
    ),
);

turbo_get_template_part(REDQFW_VC_DIR . 'template-parts/single-content-block/' . $choose_layout, $data);
