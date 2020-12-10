<?php

/**
 * Shortcode for Fancy title
 * @author RedQ Team
 * @package Turbo
 * @since 1.0
 */
$attrs_data = shortcode_atts(array(
    'choose_layout' => 'default_fancy_title',
    'title'         => esc_html__('Happy Clients', 'turbo'),
    'button_text'   => '',
    'button_link'   => '',
    'button_icon'   => '',
    'bg_css' => '',

), $atts);

extract($attrs_data);

$bg_css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($bg_css, ' '), $this->settings['base'], $atts);


$allowed_html = wp_kses_allowed_html('post');

$data = array(
    'attrs_data'  => $attrs_data,
    'content'     => $content,
    'helper_data' => array(
        'bg_css_class' => $bg_css_class,
        'allowed_html' => $allowed_html,
    ),
);

turbo_get_template_part(REDQFW_VC_DIR . 'template-parts/fancy-title/' . $choose_layout, $data);
