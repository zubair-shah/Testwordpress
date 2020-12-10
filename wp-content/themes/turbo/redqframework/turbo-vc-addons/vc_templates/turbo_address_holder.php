<?php
extract(shortcode_atts(array(
    'bg_css' => ''
), $atts));

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($bg_css, ' '), $this->settings['base'], $atts);

?>
<div class="rq-contact-us-grid-block <?php echo esc_attr($css_class); ?>">
    <div class="row">
        <?php echo do_shortcode($content) ?>
    </div>
</div>