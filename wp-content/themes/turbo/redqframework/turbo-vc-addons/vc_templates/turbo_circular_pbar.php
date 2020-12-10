<?php
/**
 * Shortcode for circular progressbar
 * @author RedQ Team
 * @package Turbowp Helper
 * @since 1.0
 */

extract(shortcode_atts(array(
    'title'      => !empty($title) ? $title : esc_html__('Happy Clients', 'turbo'),
    'percentage' => !empty($percentage) ? $percentage : esc_html__('100', 'turbo'),
), $atts));
?>

<div class="progress-bar-content cirle-progress">
    <div class="progress-single">
        <div class="c100 p<?php echo esc_attr($percentage); ?>">
            <span><?php echo esc_attr($percentage); ?>%</span>
            <div class="slice">
                <div class="bar"></div>
                <div class="fill"></div>
            </div>
        </div>
        <h3 class="progress-title"><?php echo esc_attr($title); ?></h3>
    </div>
</div>