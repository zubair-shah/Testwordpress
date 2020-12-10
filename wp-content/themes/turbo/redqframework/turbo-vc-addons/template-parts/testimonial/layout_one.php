<?php
$attrs_data = $template_args['attrs_data'];
$helper_data = $template_args['helper_data'];
$content = $template_args['content'];
$bg_css_class = $template_args['bg_css_class'];
$inner_bg_css_class = $template_args['inner_bg_css_class'];

extract($attrs_data);
extract($helper_data);
?>
<div class="rq-content-block <?php echo esc_attr($holder_class); ?> <?php echo esc_attr($bg_css_class); ?>" style="background: <?php echo esc_attr($background_color); ?>;">
    <div class="<?php echo esc_attr($container_class); ?>">
        <div class="rq-testimonial-section">
            <div class="rq-testimonial-content <?php echo esc_attr($inner_bg_css_class); ?>">
                <h1 class="rq-title"><?php echo esc_attr($testimonial_banner_title); ?><span class="rq-dot">.</span>
                </h1>
                <div class="owl-carousel <?php echo esc_attr($carousel_class); ?>">
                    <?php if ($testimonials) : ?>
                        <?php foreach ($testimonials as $key => $value) : ?>
                            <div class="item">
                                <p class="testimoinal-text"><?php echo do_shortcode($value['content']); ?></p>
                                <div class="author-name-title">
                                    <div class="author-info">
                                        <img src="<?php echo esc_url($value['image']); ?>" alt="img">
                                        <?php if ($value['designation']) : ?>
                                            <span class="author-designation"><?php echo esc_attr($value['designation']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <a href="#"><?php echo esc_attr($value['author']); ?>&nbsp;<i class="ion-ios-minus-empty"></i>
                                        <span>
                                            <?php
                                            if (isset($value['rating']) && !empty($value['rating'])) {
                                                $line = '<i class="fas fa-star"></i>';
                                                $non_rate = '<i class="far fa-star"></i>';
                                                $default = 5;
                                                $number = (int) $value['rating'];
                                                $blank = $default - $number;
                                                if ($number > 5) {
                                                    for ($default = 0; $default < 5; $default++) {
                                                        echo esc_attr($line);
                                                    }
                                                } else {
                                                    echo str_repeat($line, $number);
                                                    echo str_repeat($non_rate, $blank);
                                                }
                                            }
                                            ?>
                                        </span>
                                    </a>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>