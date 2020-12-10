<?php

/**
 * Shortcode for about us our team container
 * @author RedQ Team
 * @package Turbowp Helper
 * @since 1.0
 */

$atts = shortcode_atts(
    array(
        'title' => !empty($title) ? $title : esc_html__('Our Team', 'turbo'),
        'bg_css' => '',
    ),
    $atts
);
extract($atts);
$bg_css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($bg_css, ' '), $this->settings['base'], $atts);

?>

<div class="about-us-content-single <?php echo esc_attr($bg_css_class); ?>">
    <!-- start of our team -->
    <div class="row">
        <div class="col-md-4">
            <h2 class="brand-title"><?php echo esc_attr($title); ?><span class="dot">.</span></h2>
        </div>
        <div class="col-md-8">
            <div class="rq-team-members">
                <div class="row">
                    <?php echo do_shortcode($content) ?>
                </div>
            </div>
        </div>
    </div>
</div>