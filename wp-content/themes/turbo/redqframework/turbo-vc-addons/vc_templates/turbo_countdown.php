<?php
/**
 * Short code for countdown
 * @author RedQ Team
 * @package Turbowp Helper
 * @since 1.0
 */

extract(shortcode_atts(array(
    'title' => !empty($title) ? $title : esc_html__('Count Down', 'turbo'),
    'from'  => !empty($from) ? $from : esc_html__('2016/4/01 00:00:00', 'turbo'),
    'to'    => !empty($to) ? $to : esc_html__('2016/05/01 00:00:00', 'turbo'),
), $atts));

?>

<div id="rq-counter-portion" class="element-single">
    <h3 class="elements-title"><?php echo esc_attr($title); ?></h3>
    <div class="time-content">
        <div id="countdowntimer"><span id="given_date"></span></div>
        <input type="hidden" class="count-start" value="<?php echo esc_attr($from); ?>"></input>
        <input type="hidden" class="count-ends" value="<?php echo esc_attr($to); ?>"></input>
        <ul class="timer-division">
            <li><?php _e('Days', 'turbo'); ?></li>
            <li><?php _e('Hours', 'turbo'); ?></li>
            <li><?php _e('Minutes', 'turbo'); ?></li>
            <li><?php _e('Seconds', 'turbo'); ?></li>
        </ul>
    </div>
</div>

