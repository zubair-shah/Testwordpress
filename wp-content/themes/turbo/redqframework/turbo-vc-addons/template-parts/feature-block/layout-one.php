<?php
$attrs_data = $template_args['attrs_data'];
$helper_data = $template_args['helper_data'];
$content = $template_args['content'];

extract($attrs_data);
extract($helper_data);
?>

<div class="turbo-featured-block rq-content-block <?php echo esc_attr($layout_class); ?> <?php echo esc_attr($content_class); ?>"
     style="background: url('<?php echo esc_url($featured_image_bg_src); ?>') top center no-repeat; background-size: 100% auto;">
    <div class="row">
        <div class="container">
            <div class="col-md-5"></div>
            <div class="col-md-7">
                <div class="rq-title-container">
                    <h2 class="rq-title"><?php echo esc_attr($heading_title); ?></h2>
                    <div class="featured-descrition"><?php echo do_shortcode($content); ?></div>
                </div>
                <div class="turbo-search-featured-content">
                    <?php if ($content_image_src) : ?>
                        <img src="<?php echo esc_url($content_image_src); ?> "
                             alt="<?php echo esc_html__('content_image', 'turbo'); ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>