<?php
extract(shortcode_atts(array(
    'choose_layout'            => 'layout_one',
    'title'                    => !empty($title) ? $title : esc_html__('Download our app', 'turbo'),
    'subtitle'                 => !empty($subtitle) ? $subtitle : esc_html__('Wow! Get Turbo App For Your Mobile', 'turbo'),
    'image'                    => '',
    'ios_button'               => '',
    'ios_url'                  => !empty($ios_url) ? $ios_url : '#',
    'android_button'           => '',
    'android_url'              => !empty($android_url) ? $android_url : '#',
    'newsletter_form_link'     => '#',
    'newsletter_placeholder'   => __('Email', 'turbo'),
    'newsletter_submit_button' => __('Send Link', 'turbo'),
    'section_bg_color'         => '#efa80f',
), $atts));

$img = wp_get_attachment_image_src($image, "full");
$imgSrc = $img[0];
$fileparts = pathinfo($imgSrc);
$featured_image_alt = $fileparts['filename'];

$img_ios = wp_get_attachment_image_src($ios_button, "full");
$img_iosSrc = $img_ios[0];
$fileparts1 = pathinfo($img_iosSrc);
$featured_image_alt1 = $fileparts1['filename'];

$img_android = wp_get_attachment_image_src($android_button, "full");
$img_androidSrc = $img_android[0];
$fileparts2 = pathinfo($img_androidSrc);
$featured_image_alt2 = $fileparts2['filename'];

if ($choose_layout === 'layout_one') {
    $wrapper_class = 'newsletter-layout-one with-bg-color';
    $wrapper_style = "background: $section_bg_color;";

} else {
    $wrapper_class = 'newsletter-layout-two';
    $wrapper_style = "";
}


?>
<div class="rq-content-block <?php echo esc_attr($wrapper_class); ?>" style="<?php echo esc_attr($wrapper_style); ?>">
    <div class="container">
        <div class="rq-download-app-section">
            <div class="row">
                <div class="col-md-6">
                    <div class="mobile-image-content">
                        <img src="<?php echo esc_url($imgSrc); ?>" alt="<?php echo esc_attr($featured_image_alt); ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="app-text-section">
                        <h5><?php echo esc_attr($title); ?></h5>
                        <h1><?php echo esc_attr($subtitle); ?></h1>
                        <?php if ($choose_layout === 'layout_one') : ?>
                            <?php echo do_shortcode($content); ?>
                        <?php endif; ?>

                        <?php if ($choose_layout === 'layout_two') : ?>
                            <form action="<?php echo esc_url($newsletter_form_link); ?>" method="post"
                                  id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                                  class="validate rq-newsletter-form" target="_blank">
                                <input type="email" value="" name="EMAIL"
                                       placeholder="<?php echo esc_attr($newsletter_placeholder); ?>"
                                       class="fq-newsletter-form" required>
                                <button class="rq-btn"
                                        type="submit"><?php echo esc_attr($newsletter_submit_button); ?></button>
                            </form>
                            <?php echo do_shortcode($content); ?>
                        <?php endif; ?>

                        <div class="app-download-btn">
                            <?php if (!$img_iosSrc == '') { ?>
                                <a href="<?php echo esc_url($ios_url); ?>"><img
                                            src="<?php echo esc_url($img_iosSrc); ?>"
                                            alt="<?php echo esc_url($featured_image_alt1); ?>"></a>
                            <?php }
                            if (!$img_androidSrc == '') { ?>
                                <a href="<?php echo esc_url($android_url); ?>"><img
                                            src="<?php echo esc_url($img_androidSrc); ?>"
                                            alt="<?php echo esc_attr($featured_image_alt2); ?>"></a>
                            <?php } ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
