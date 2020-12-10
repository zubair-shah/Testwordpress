<?php
/**
 * Shortcode for factbox
 * @author RedQ Team
 * @package Turbowp Helper
 * @since 1.0
 */

extract(shortcode_atts(array(
    'title' => !empty($title) ? $title : esc_html__('Happy Clients', 'turbo'),
    'from'  => !empty($from) ? $from : esc_html__('100', 'turbo'),
    'to'    => !empty($to) ? $to : esc_html__('233', 'turbo'),
    'icon'  => !empty($icon) ? $icon : esc_html__('ion-android-happy', 'turbo'),
), $atts));

?>

<div class="rq-facts-single">
    <i class="<?php echo esc_attr($icon); ?>"></i>
    <span class="fact-box-count" data-from="<?php echo esc_attr($from); ?>" data-to="<?php echo esc_attr($to); ?>"
          data-speed="5000" data-refresh-interval="50"></span>
    <p class="fact-box-title"><?php echo esc_attr($title); ?></p>
</div>