<?php

/**
 * Vertical search shortcode
 * @author RedQ Team
 * @package Turbowp Helper
 * @since 2.4.0
 */
$atts_data = shortcode_atts(array(
    'search_form_title'          => esc_html__('Make your trip', 'turbo'),
    'background_image_id'        => '97',
    'reactive_builder_shortcode' => '972',
    'bg_css' => ''
), $atts);

extract($atts_data);

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($bg_css, ' '), $this->settings['base'], $atts);

$background_image = wp_get_attachment_image_src($background_image_id, "full");
$background_image = $background_image[0];

?>
<div class="header turbo-vertical-search-wrapper index-two-header">
    <div class="header-body" style="background: url('<?php echo esc_url($background_image); ?>') top center no-repeat; background-size: 100% auto;">
        <div class="container">
            <div class="turbo-vertical-search-area <?php echo esc_attr($css_class); ?>">
                <div class="search-header">
                    <h3><?php echo esc_attr($search_form_title); ?></h3>
                    <p><?php echo do_shortcode($content); ?></p>
                </div>
                <div class="turbo-obb-vertical-search-form">
                    <?php turbo_search_form($atts_data); ?>
                </div>
            </div>
        </div>
    </div>
</div>