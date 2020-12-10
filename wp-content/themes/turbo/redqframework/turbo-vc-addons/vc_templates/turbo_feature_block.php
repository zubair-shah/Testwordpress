<?php

/**
 * Shortcode for home 2 how it works
 * @author RedQ Team
 * @package Turbowp Helper
 * @since 1.0
 */

extract(shortcode_atts(array(
    'title'   => !empty($title) ? $title : esc_html__('pick a car and enjoy your trip', 'turbo'),
    'content' => !empty($content) ? $content : esc_html__('Pick a car that you want', 'turbo'),
    'image'   => '',
    'bg_css' => ''
), $atts));

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($bg_css, ' '), $this->settings['base'], $atts);

$img = wp_get_attachment_image_src($image, "full");
$imgSrc = $img[0];
$html_tags = turbo_allowed_tags();

?>
<div class="col-md-4">
    <div class="how-it-work-single <?php echo esc_attr($css_class); ?>">
        <img src="<?php echo esc_url($imgSrc); ?>" alt="img">
        <h4><?php echo wp_kses($title, $html_tags); ?></h4>
        <?php echo do_shortcode(wpautop($content)); ?>
    </div>
</div>