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
            <div class="rq-home-banner-conetnt <?php echo esc_attr($content_class); ?>">
                <h1><?php echo esc_attr($heading_title); ?></h1>
                <p><?php echo do_shortcode($content); ?><p>
            </div>
            <div class="rq-home-banner-car">
                <img src="<?php echo esc_url($feature_image[0]); ?>" alt="Home4CarImage">
            </div>
        </div>
    </div>
</div>

<div class="turbo-horizontal-search-bottom">
    <div class="container">
        <?php turbo_search_form($attrs_data); ?>
    </div>
</div>