<?php

/**
 * Shortcode for home 2 how it works container
 * @author RedQ Team
 * @package Turbowp Helper
 * @since 1.0
 */

extract(shortcode_atts(array(
    'title' => !empty($title) ? $title : esc_html__('How it Works', 'turbo'),
    'bg_css' => ''
), $atts));

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($bg_css, ' '), $this->settings['base'], $atts);

$html_tags = turbo_allowed_tags();
?>

<div class="rq-content-block gray-bg <?php echo esc_attr($css_class); ?>" id="services">
    <div class="rq-title-container text-center">
        <h2 class="rq-title no-padding"><?php echo wp_kses($title, $html_tags); ?></h2>
    </div>
    <div class="rq-how-it-work-content">
        <div class="container">
            <div class="row">
                <?php echo do_shortcode($content); ?>
            </div>
        </div>
    </div>
</div>