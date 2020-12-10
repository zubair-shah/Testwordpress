<?php
$attrs_data = $template_args['attrs_data'];
$helper_data = $template_args['helper_data'];
$content = $template_args['content'];

extract($attrs_data);
extract($helper_data);
?>

<div class="turbo-featured-block rq-content-block <?php echo esc_attr($layout_class); ?> <?php echo esc_attr($content_class); ?>" style="background: url('<?php echo esc_url($featured_image_bg_src); ?>') no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6"></div>
            <div class="col-lg-6 col-content">
                <div class="rq-title-container">
                    <h2 class="rq-title"><?php echo esc_attr($heading_title); ?></h2>
                    <div class="featured-descrition"><?php echo do_shortcode($content); ?></div>
                </div>

                <?php if (isset($features) && !empty($features)) : ?>
                    <ul class="hightlighted-featured">
                        <?php
                        foreach ($features as $key => $feature) :
                            $title = isset($feature['title']) ? $feature['title'] : '';
                            $description = isset($feature['description']) ? $feature['description'] : '';
                            $icon = isset($feature['icon']) ? $feature['icon'] : '';
                        ?>
                            <li class="highlighted-feature">
                                <div class="turbo-icon-wrap"><i class="<?php echo esc_attr($icon); ?>"></i></div>
                                <div class="turbo-feature-content">
                                    <h4><?php echo esc_attr($title); ?></h4>
                                    <p class="content"><?php echo wp_kses($description, $allowed_html); ?></p>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>