<?php
$atts = shortcode_atts(
    array(
        'image'             => '',
        'transparent_image' => 'inactive',
        'background_color'  => '#efa80f',
        'text'              => 'turbo',
        'title'             => !empty($title) ? $title : esc_html__('Our Mission', 'turbo'),
        'content'           => !empty($content) ? $content : esc_html__('something', 'turbo'),
        'name'              => !empty($name) ? $name : esc_html__('Brasion Mike', 'turbo'),
        'designation'       => !empty($designation) ? $designation : esc_html__('CEO Founder', 'turbo'),
        'url'               => !empty($url) ? $url : '#',
        'block_holder_css' => '',
        'block_css' => ''
    ),
    $atts
);
extract($atts);

$holder_css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($block_holder_css, ' '), $this->settings['base'], $atts);
$block_css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($block_css, ' '), $this->settings['base'], $atts);

$img = wp_get_attachment_image_src($image, "full");
$imgSrc = $img[0];
?>

<div class="rq-content-block rq-mission-block-wrapper gray-bg <?php echo esc_attr($holder_css_class) ?>">
    <span class="bg-large-text">
        <?php echo esc_attr($text); ?>
    </span>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="rq-mission-block <?php echo esc_attr($block_css_class); ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mission-content">
                                <h1 class="rq-title"><?php echo esc_attr($title); ?><span class="rq-dot">.</span><i class="rq-line"></i></h1>
                                <p class="mission-text"><?php echo do_shortcode($content); ?></p>
                                <address>
                                    <a href="<?php echo esc_url($url) ?>"><?php echo esc_attr($name); ?></a>
                                    <cite>- <?php echo esc_attr($designation); ?></cite>
                                </address>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php if ($transparent_image == 'active') : ?>
                                <div class="mission-image" style="position: relative;height: 443px;margin: 30px; background: <?php echo esc_attr($background_color); ?>">
                                    <img style="position: absolute;top: 136px;width: 536px;left: 0;" src="<?php echo esc_url($imgSrc); ?>" alt="img">
                                </div>
                            <?php else : ?>
                                <div class="mission-image">
                                    <img src="<?php echo esc_url($imgSrc); ?>" alt="img">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>