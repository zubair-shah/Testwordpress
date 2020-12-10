<?php
$attrs_data = $template_args['attrs_data'];
$helper_data = $template_args['helper_data'];
$content = $template_args['content'];

extract($attrs_data);
extract($helper_data);
?>

<div class="rq-listing-fancy-title-container <?php echo esc_attr($bg_css_class); ?>">
    <div class="title-content">
        <h2 class="rq-title"><?php echo wp_kses($title, $allowed_html); ?></h2>
        <?php if ($content) { ?>
            <p class="rq-subtitle"><?php echo do_shortcode($content); ?></p>
        <?php } ?>
    </div>
    <?php if ($button_text) { ?>
        <div class="show-more-btn-area">
            <a class="rq-btn-o" href="<?php echo esc_url($button_link); ?>">
                <span class="btn-text">
                    <?php echo wp_kses($button_text, $allowed_html); ?>
                </span>
                <?php if ($button_icon) { ?>
                    <i class="<?php echo sprintf($button_icon); ?>"></i>
                <?php } ?>
            </a>
        </div>
    <?php } ?>
</div>