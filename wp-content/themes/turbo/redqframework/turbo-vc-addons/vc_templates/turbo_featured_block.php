<?php
/**
 * Content Block
 *
 * @author redqteam
 * @category Theme
 * @package turbo
 * @version 1.0.0
 */
if (!defined('ABSPATH')) {
    exit;
}
$attrs_data = shortcode_atts(array(
    'heading_title'        => esc_html__('Featured Block', 'turbo'),
    'layout'               => 'layout-one',
    'featured_image_bg'    => '',
    'content_image'        => '',
    'highlighted_features' => '',
    'button_text'          => '',
    'button_link'          => '#'
), $atts);

extract($attrs_data);

$featured_image_bg_src = wp_get_attachment_url($featured_image_bg);
$content_image_src = wp_get_attachment_url($content_image);
$features = vc_param_group_parse_atts($highlighted_features);
$allowed_html = wp_kses_allowed_html('post');


if ($layout === 'layout-one') {
    $layout_class = 'turbo-search-feature-block';
    $content_class = 'layout-one';
} elseif ($layout === 'layout-two') {
    $layout_class = 'turbo-highlighted-feature-block';
    $content_class = 'layout-two';
} elseif ($layout === 'layout-three') {
    $layout_class = 'turbo-highlighted-feature-block';
    $content_class = 'layout-three';
} else {
    $layout_class = 'turbo-highlighted-feature-block';
    $content_class = 'layout-four';
}


$data = array(
    'attrs_data'  => $attrs_data,
    'content'     => $content,
    'helper_data' => array(
        'layout_class'          => $layout_class,
        'content_class'         => $content_class,
        'featured_image_bg_src' => $featured_image_bg_src,
        'content_image_src'     => $content_image_src,
        'allowed_html'          => $allowed_html,
        'features'              => $features,
    ),
);

turbo_get_template_part(REDQFW_VC_DIR . 'template-parts/feature-block/' . $layout, $data);

?>
