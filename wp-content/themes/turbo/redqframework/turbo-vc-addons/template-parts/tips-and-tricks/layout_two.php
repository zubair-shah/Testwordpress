<?php
$attrs_data = $template_args['attrs_data'];
$helper_data = $template_args['helper_data'];
$content = $template_args['content'];
$bg_css_class = $template_args['bg_css_class'];


extract($attrs_data);
extract($helper_data);
?>

<?php if (isset($tips_and_tricks) && is_array($tips_and_tricks) && !empty($tips_and_tricks)) : ?>
    <div class="rq-content-block <?php echo esc_attr($wrapper_class); ?> <?php echo esc_attr($bg_css_class); ?>">
        <div class="container">
            <div class="rq-tips-tricks">
                <h1 class="rq-title"><?php echo esc_attr($section_title); ?></h1>
                <div class="row">
                    <?php foreach ($tips_and_tricks as $key => $value) : ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="rq-tips-single wow fadeInLeft" data-wow-duration="500ms">
                                <?php
                                $feat_image_url = wp_get_attachment_url(get_post_thumbnail_id($value->ID));
                                $categories = get_the_category($value->ID);
                                $cat_name = '';
                                $cat_link = '';
                                if (!empty($categories)) {
                                    $first_cat = $categories[0];
                                    $cat_name = $first_cat->name;
                                    $cat_link = get_category_link($first_cat->term_id);
                                }
                                ?>
                                <?php if ($feat_image_url) : ?>
                                    <div class="image-container" style="background-image: url(<?php echo esc_url($feat_image_url) ?>);"></div>
                                    <a class="tips-badge" href="<?php echo esc_url($cat_link); ?>"><?php echo esc_attr($cat_name); ?></a>
                                <?php endif ?>
                                <div class="tips-content">
                                    <h4>
                                        <a href="<?php echo esc_url(get_permalink($value->ID)); ?>"><?php echo esc_attr($value->post_title); ?></a>
                                    </h4>
                                    <p><?php echo do_shortcode(wp_trim_words($value->post_content, 12)); ?></p>
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
                <?php if ($button_text) : ?>
                    <div class="tips-and-tricks-footer button-section">
                        <a href="<?php echo esc_url($button_link); ?>" class="rq-default-btn">
                            <span class="btn-text"><?php echo esc_attr($button_text); ?></span>
                            <svg class="rq-arrow-right" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>