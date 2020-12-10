<?php
$atts = shortcode_atts(
    array(
        'turbowp_home_one_partner' => '',
        'turbowp_partner_link'     => !empty($turbowp_partner_link) ? $turbowp_partner_link : esc_html__('Insert Link', 'turbo'),
    ), $atts
);
extract($atts);
$testimonial_img = wp_get_attachment_image_src($turbowp_home_one_partner, "thumbnail");
$testimonial_imgSrc = $testimonial_img[0];
?>
<div class="partner-single"><a href="<?php echo esc_url($turbowp_partner_link); ?>"><img
                src="<?php echo esc_url($testimonial_imgSrc); ?>" alt="img"></a></div>
