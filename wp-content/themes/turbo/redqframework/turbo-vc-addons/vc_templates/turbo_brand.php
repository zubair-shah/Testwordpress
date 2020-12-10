<?php

/**
 * Shortcode for about us the brand
 * @author RedQ Team
 * @package Turbowp Helper
 * @since 1.0
 */

extract(shortcode_atts(array(
    'title'    => !empty($title) ? $title : esc_html__('Title', 'turbo'),
    'subtitle' => !empty($subtitle) ? $subtitle : esc_html__('some subtitle', 'turbo'),
    'content'  => !empty($content) ? $content : esc_html__('lorem ipsome', 'turbo'),
    'bg_css' => '',
), $atts));

$bg_css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($bg_css, ' '), $this->settings['base'], $atts);

?>


<div class="about-us-content-single <?php echo esc_attr($bg_css_class); ?>">
    <div class="row">
        <div class="col-md-4">
            <h2 class="brand-title"><?php echo esc_attr($title); ?><span class="dot">.</span></h2>
        </div>
        <div class="col-md-8">
            <div class="about-us-text">
                <p><strong><?php echo esc_attr($subtitle); ?></strong></p>
                <p><?php echo do_shortcode($content); ?></p>
            </div>
        </div>
    </div>
</div>