<?php
$attrs_data = $template_args['attrs_data'];
$helper_data = $template_args['helper_data'];
$content = $template_args['content'];

extract($attrs_data);
extract($helper_data);
?>
<div class="rq-content-block rq-single-content-block <?php echo esc_attr($wrapper_class); ?> <?php echo esc_attr($bg_css_class); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="single-cb-image">
                    <?php if ($feature_img_src) : ?>
                        <img src="<?php echo esc_url($feature_img_src); ?>" alt="<?php echo esc_html__('Feature Image', 'turbo'); ?>">
                    <?php endif; ?>
                    <?php if ($feature_img_src) : ?>
                        <img src="<?php echo esc_url($preview_img_src); ?>" alt="<?php echo esc_html__('Preview Image', 'turbo'); ?>">
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="single-cb-content">
                    <h5><?php echo esc_attr($title); ?></h5>
                    <div class="entry-content">
                        <?php echo do_shortcode($content); ?>
                    </div>
                    <div class="button-section">
                        <a href="<?php echo esc_url($button_link); ?>" class="rq-default-btn">
                            <span class="btn-text">
                                <?php echo esc_attr($button_text); ?>
                            </span>
                            <svg class="rq-arrow-right" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>