<?php

/**
 * Content Block
 *
 * @author redqteam
 * @category Theme
 * @package turbo
 * @version 1.0.0
 */
if (!defined('ABSPATH')) {
    exit;
}
extract(shortcode_atts(array(
    'heading_title'  => esc_html__('About Us', 'turbo'),
    'layout'         => 'turbo-grid',
    'content_blocks' => '',
    'bg_css' => ''
), $atts));

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($bg_css, ' '), $this->settings['base'], $atts);

$content_blocks = vc_param_group_parse_atts($content_blocks);
$allowed_html = wp_kses_allowed_html('post');
$layout_class = $layout === 'turbo-grid' ? 'col-md-6 col-lg-4' : 'col-md-6 col-lg-6';
$inner_class = $layout === 'turbo-grid' ? 'turbo-blok-content-inner-wrapper' : 'container';
$container_class = $layout === 'turbo-grid' ? 'container' : 'turbo-blok-content-area';
?>

<div class="rq-content-block turbo-how-it-work-content-wrapper <?php echo esc_attr($css_class); ?> <?php echo esc_attr($layout); ?>">
    <div class="<?php echo esc_attr($inner_class); ?>">
        <div class="rq-title-container text-center">
            <h2 class="rq-title no-padding"><?php echo esc_attr($heading_title); ?></h2>
            <p><?php echo do_shortcode($content); ?></p>
        </div>
        <div class="rq-how-it-work-content">
            <div class="<?php echo esc_attr($container_class); ?>">
                <div class="row">
                    <?php if (isset($content_blocks) && !empty($content_blocks)) : ?>
                        <?php foreach ($content_blocks as $key => $content_block) : ?>
                            <?php
                            $title = isset($content_block['title']) ? $content_block['title'] : '';
                            $description = isset($content_block['description']) ? $content_block['description'] : '';
                            $image_id = isset($content_block['block_image']) ? $content_block['block_image'] : '';
                            $image_url = wp_get_attachment_url($image_id);
                            ?>
                            <div class="<?php echo esc_attr($layout_class); ?>">
                                <div class="how-it-work-single">
                                    <img src="<?php echo esc_url($image_url); ?> " alt="<?php echo esc_html__('Img', 'turbo'); ?>">
                                    <h4><?php echo esc_attr($title); ?></h4>
                                    <div class="content"><?php echo wp_kses($description, $allowed_html); ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>