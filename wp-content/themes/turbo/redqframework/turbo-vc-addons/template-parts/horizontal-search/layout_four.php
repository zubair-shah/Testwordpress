<?php
$attrs_data = $template_args['attrs_data'];
$helper_data = $template_args['helper_data'];
$content = $template_args['content'];

extract($attrs_data);
extract($helper_data);
?>

<div class="header <?php echo esc_attr($layout_class); ?>">
    <div class="header-body">
        <div class="container">
            <div class="rq-home-banner-content <?php echo esc_attr($content_class); ?>">
                <?php if ($heading_sub_title): ?>
                    <div class="badge-heading">
                        <h6>
                            <span><?php echo esc_attr($heading_tag_title); ?></span><?php echo esc_attr($heading_sub_title); ?>
                        </h6>
                    </div>
                <?php endif; ?>
                <div class="banner-heading">
                    <h1><?php echo esc_attr($heading_title); ?></h1>
                </div>
                <p><?php echo do_shortcode($content); ?><p>
            </div>
            <div class="rq-home-banner-car">
                <img src="<?php echo esc_url($feature_image[0]); ?>" alt="Home5CarImage">
            </div>
        </div>
    </div>
</div>