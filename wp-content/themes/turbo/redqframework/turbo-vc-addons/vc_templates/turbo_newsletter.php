<?php

/**
 * Shortcode for newsletter
 * @author RedQ Team
 * @package Turbowp Helper
 * @since 1.0
 */

extract(shortcode_atts(array(
    'title'       => !empty($title) ? $title : esc_html__('Newsletter', 'turbo'),
    'button_text' => !empty($button_text) ? $button_text : esc_html__('Subscribe', 'turbo'),
    'email_link'  => !empty($email_link) ? $email_link : '//redqteam.us11.list-manage.com/subscribe/post?u=a89e8926e48d8e06b96f48f9d&amp;id=3f33dcae93',
    'bg_css' => '',
), $atts));

$html_tags = turbo_allowed_tags();

$bg_css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($bg_css, ' '), $this->settings['base'], $atts);

?>

<div class="rq-content-block gray-bg <?php echo esc_attr($bg_css_class) ?>">
    <div class="newsletter-content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2><?php echo wp_kses($title, $html_tags); ?></h2>
                </div>
                <div class="col-md-8">
                    <form action="<?php echo esc_url($email_link); ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate rq-newsletter-form" target="_blank">
                        <input type="email" value="" name="EMAIL" placeholder="<?php echo esc_html__('youremail@domain.com', 'turbo') ?>" class="required email" id="email" required>
                        <button type="submit" class="rq-btn rq-btn-primary"><?php echo esc_attr($button_text); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>