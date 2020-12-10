<?php
$attrs_data = $template_args['attrs_data'];
$helper_data = $template_args['helper_data'];
$content = $template_args['content'];
$bg_css_class = $template_args['bg_css_class'];

extract($attrs_data);
extract($helper_data);
?>

<?php if (isset($tips_and_tricks) && is_array($tips_and_tricks) && !empty($tips_and_tricks)) : ?>
    <div class="rq-content-block gray-bg <?php echo esc_attr($wrapper_class); ?> <?php echo esc_attr($bg_css_class); ?>">
        <div class="container">
            <div class="rq-tips-tricks">
                <h1 class="rq-title"><?php echo esc_attr($section_title); ?><span class="rq-dot">.</span></h1>
                <div class="row">
                    <?php foreach ($tips_and_tricks as $key => $value) : ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="rq-tips-single wow fadeInLeft" data-wow-duration="500ms">
                                <?php $feat_image_url = wp_get_attachment_url(get_post_thumbnail_id($value->ID));
                                if ($feat_image_url) : ?>
                                    <div class="image-container" style="background-image: url(<?php echo esc_url($feat_image_url) ?>);"></div>
                                <?php endif ?>
                                <div class="tips-content">
                                    <span class="date"><?php echo get_the_date('F jS, Y', $value->ID); ?></span>
                                    <h4>
                                        <a href="<?php echo esc_url(get_permalink($value->ID)); ?>"><?php echo esc_attr($value->post_title); ?></a>
                                    </h4>
                                    <a class="rq-btn rq-btn-normal continue-button" href="<?php echo esc_url(get_permalink($value->ID)); ?>"><?php echo esc_attr($button_title); ?>
                                        <svg class="rq-arrow-right" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>