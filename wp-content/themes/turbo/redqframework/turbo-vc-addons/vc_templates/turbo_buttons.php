<?php
/**
 * Shortcode for elements buttons
 * @author RedQ Team
 * @package Turbowp Helper
 * @since 1.0
 */

extract(shortcode_atts(array(
    'type'  => !empty($type) ? $type : 'rq-btn-primary',
    'size'  => !empty($size) ? $size : 'btn-large',
    'style' => !empty($style) ? $style : 'border-radius',
    'text'  => !empty($text) ? $text : 'border-radius',
    'url'   => !empty($url) ? $url : '#',
), $atts));

?>

<a href="<?php echo esc_url($url); ?>"
   class="rq-btn <?php echo esc_attr($type); ?> <?php echo esc_attr($size); ?> <?php echo esc_attr($style); ?>"><?php echo esc_attr($text); ?></a>