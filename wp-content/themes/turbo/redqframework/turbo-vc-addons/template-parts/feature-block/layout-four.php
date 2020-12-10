<?php
$attrs_data = $template_args['attrs_data'];
$helper_data = $template_args['helper_data'];
$content = $template_args['content'];

extract($attrs_data);
extract($helper_data);

$size = sizeof($features);
?>

<div class="turbo-featured-block rq-content-block <?php echo esc_attr($layout_class); ?> <?php echo esc_attr($content_class); ?>">
    <div class="row">
        <div class="container">
            <div class="col-md-5">
                <div class="rq-title-container">
                    <h2 class="rq-title"><?php echo esc_attr($heading_title); ?></h2>
                    <div class="featured-descrition"><?php echo do_shortcode($content); ?></div>
                </div>
                <?php if ($button_text) : ?>
                    <div class="button-section">
                        <a href="<?php echo esc_url($button_link); ?>" class="rq-default-btn">
                            <span class="btn-text"><?php echo esc_attr($button_text); ?></span>
                            <svg class="rq-arrow-right" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-md-7">
                <?php if (isset($features) && !empty($features)) : ?>
                    <ul class="hightlighted-featured-four feature-<?php echo esc_attr($size); ?>">
                        <?php
                        foreach ($features as $key => $feature) :
                            $title = isset($feature['title']) ? $feature['title'] : '';
                            $description = isset($feature['description']) ? $feature['description'] : '';
                            $icon = isset($feature['icon']) ? $feature['icon'] : '';
                            $bg_color = isset($feature['background_color']) ? $feature['background_color'] : '#34ceba';
                            $bs_from_color = isset($feature['box_shadow_color_from']) ? $feature['box_shadow_color_from'] : 'rgba(60,208,189,0.2)';
                            $bs_to_color = isset($feature['box_shadow_color_to']) ? $feature['box_shadow_color_to'] : 'rgba(60,208,189,0.5)';
                            $color_scheme = 'background-color: ' . $bg_color . '; box-shadow: 0 13px 90px 0 ' . $bs_from_color . ', 0 15px 40px -15px ' . $bs_to_color . ';';
                        ?>
                            <li class="highlighted-feature" style="<?php echo esc_attr($color_scheme); ?>">
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