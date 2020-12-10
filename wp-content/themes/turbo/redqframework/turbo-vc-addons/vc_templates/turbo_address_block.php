<?php
$atts = shortcode_atts(
    array(
        'turbowp_address_title'     => !empty($turbowp_address_title) ? $turbowp_address_title : esc_html__('Info Field title', 'turbo'),
        'turbowp_address_field_one' => !empty($turbowp_address_field_one) ? $turbowp_address_field_one : esc_html__('Info Field One', 'turbo'),
        'turbowp_address_field_two' => !empty($turbowp_address_field_two) ? $turbowp_address_field_two : esc_html__('Info Field Two', 'turbo'),
        'turbowp_address_icon'      => !empty($turbowp_address_icon) ? $turbowp_address_icon : esc_html__('icon_mobile', 'turbo'),
        'bg_css' => ''
    ),
    $atts
);
extract($atts);

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($bg_css, ' '), $this->settings['base'], $atts);

?>

<div class="col-lg-4 col-md-6 <?php echo esc_attr($css_class); ?>">
    <div class="grid-block-single">
        <i class="<?php echo esc_attr($turbowp_address_icon); ?>"></i>
        <h3><?php echo esc_attr($turbowp_address_title); ?></h3>
        <p><?php echo esc_attr($turbowp_address_field_one); ?></p>
        <p><?php echo esc_attr($turbowp_address_field_two); ?></p>
    </div>
</div>