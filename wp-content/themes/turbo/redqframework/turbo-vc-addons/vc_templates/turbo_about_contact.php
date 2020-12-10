<?php

/**
 * Shortcode for about us contact
 * @author RedQ Team
 * @package Turbowp Helper
 * @since 1.0
 */

extract(shortcode_atts(array(
    'title'   => !empty($title) ? $title : esc_html__('Title', 'turbo'),
    'address' => !empty($address) ? $address : esc_html__('some subtitle', 'turbo'),
    'email'   => !empty($email) ? $email : esc_html__('lorem@ipsome.com', 'turbo'),
    'phone'   => !empty($phone) ? $phone : esc_html__('lorem@ipsome.com', 'turbo'),
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
            <div class="contact-single">
                <i class="fas fa-map-marker-alt"></i>
                <p><?php echo esc_attr($address) ?></p>
            </div>
            <div class="contact-single">
                <i class="fas fa-envelope"></i>
                <p><?php echo esc_attr($email); ?></p>
            </div>
            <div class="contact-single">
                <i class="fas fa-mobile-alt"></i>
                <p><?php echo esc_attr($phone); ?></p>
            </div>
            <div class="opening-hour">
                <p> <?php _e('HOUR WORK:', 'turbo') ?> <span><?php echo do_shortcode($content); ?></span></p>
            </div>
        </div>
    </div>
</div>