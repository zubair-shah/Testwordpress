<?php

/**
 * Shortcode for help line
 * @author RedQ Team
 * @package Turbowp Helper
 * @since 1.0
 */

extract(shortcode_atts(array(
    'title' => !empty($title) ? $title : esc_html__('Need help renting online?', 'turbo'),
    'phone' => !empty($phone) ? $phone : esc_html__('(855) 962-3621', 'turbo'),
    'font_color'  => '',
    'bg_css' => ''
), $atts));

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($bg_css, ' '), $this->settings['base'], $atts);

?>

<div class="rq-call-to-action <?php echo esc_attr($css_class); ?>">
    <div class="container">
        <h2 style="color: <?php echo esc_attr($font_color); ?>"> <?php echo esc_attr($title); ?> <span> <?php echo esc_attr($phone); ?> </span></h2>
    </div>
</div>