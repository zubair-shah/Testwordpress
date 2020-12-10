<?php
$attrs_data = $template_args['attrs_data'];
$helper_data = $template_args['helper_data'];
$content = $template_args['content'];

extract($attrs_data);
extract($helper_data);
?>
<div class="rq-content-block <?php echo esc_attr($holder_class); ?>" style="background: <?php echo esc_attr($background_color); ?>;">
    <div class="<?php echo esc_attr($container_class); ?>">
        <div class="rq-testimonial-section">
            <div class="rq-testimonial-content">
                <div class="owl-carousel <?php echo esc_attr($carousel_class); ?>">

                    <?php if ($testimonials) : ?>
                        <?php foreach ($testimonials as $key => $testimonial) : ?>
                            <div class="item" data-dot='<img src="<?php echo esc_url($testimonial['image']); ?>" alt="img">'>
                                <div class="quote-icon"><i class="fas fa-quote-right"></i></div>
                                <p class="testimoinal-text"><?php echo do_shortcode($testimonial['content']); ?></p>
                                <div class="author-name-title">
                                    <a href="#"><?php echo esc_attr($testimonial['author']); ?>
                                        <?php if ($testimonial['designation']) : ?>
                                            &nbsp;<i class="ion-ios-minus-empty"></i>&nbsp;
                                            <span class="author-designation">
                                                <?php echo esc_attr($testimonial['designation']); ?>
                                            </span>
                                        <?php endif; ?>
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