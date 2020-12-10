<?php
extract(shortcode_atts(array(
    'bg_css' => ''
), $atts));

$bg_css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($bg_css, ' '), $this->settings['base'], $atts);

?>
<div class="rq-content-block gray-bg partner <?php echo esc_attr($bg_css_class); ?>">
    <div class="container"></div>
    <div class="rq-partners-section">
        <div class="partners-wrapper">
            <?php echo do_shortcode($content); ?>
        </div>
    </div> <!-- /.rq-partners-section -->
</div>
</div>