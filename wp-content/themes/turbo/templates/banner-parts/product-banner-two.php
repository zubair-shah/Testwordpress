<?php
global $post;
$post_id = isset($post->ID) ? $post->ID : '';

$product_banner_options = turbo_get_product_banner_settings($post_id);
extract($product_banner_options['options']);

$style = $product_banner_options['style'];
$container_class = $product_banner_options['container_class'];
?>

<?php if (isset($show_banner) && $show_banner === 'on') : ?>
    <div class="<?php echo esc_attr(trim($container_class)) ?>" style="<?php echo esc_attr($style); ?> height: <?php echo esc_attr($banner_height); ?>;">
        <?php if ($banner_overlay === 'true') : ?>
            <div style="background: <?php echo esc_attr($overlay_bg); ?>" class="rq-overlay"></div>
        <?php endif; ?>
        <div class="container">
            <div class="rq-title-container bredcrumb-title <?php echo esc_attr($breadcrumbs_alignment); ?>">
                <?php get_template_part('templates/banner-parts/banner', 'breadcrumbs'); ?>
            </div>
        </div>
    </div>
<?php endif; ?>