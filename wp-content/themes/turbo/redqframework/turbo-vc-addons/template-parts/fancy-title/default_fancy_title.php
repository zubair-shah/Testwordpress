<?php
$attrs_data = $template_args['attrs_data'];
$helper_data = $template_args['helper_data'];
$content = $template_args['content'];

extract($attrs_data);
extract($helper_data);
?>

<div class="rq-fancy-title-container <?php echo esc_attr($bg_css_class); ?>">
    <h2 class="rq-title"><?php echo wp_kses($title, $allowed_html); ?></h2>
    <?php if ($content) { ?>
        <p class="rq-subtitle"><?php echo do_shortcode($content); ?></p>
    <?php } ?>
</div>