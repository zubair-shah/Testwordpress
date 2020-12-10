<?php
extract(shortcode_atts(array(
    'lat'     => !empty($lat) ? $lat : '47.6205588',
    'lang'    => !empty($lang) ? $lang : '-122.3212725',
    'zoom'    => !empty($zoom) ? $zoom : '15',
    'address' => !empty($address) ? $address : esc_html__('St. Melbourne, Australia', 'turbo'),
    'bg_css' => ''
), $atts));

wp_localize_script('contact-map', 'map_attr', $atts);

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($bg_css, ' '), $this->settings['base'], $atts);


?>
<div class="rq-contact-us-map container <?php echo esc_attr($css_class); ?>">
    <div id="map"></div>
</div>