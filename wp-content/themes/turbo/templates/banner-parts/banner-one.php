<?php
global $post;
$post_id = isset($post->ID) ? $post->ID : '';

$show_banner = 'true';
$banner_overlay = 'false';
$breadcrumbs_alignment = 'align-left';
$banner_class = '';

if ($post_id) {
    $banner_options = turbo_get_banner_settings($post_id);
    extract($banner_options['options']);
    if (isset($banner_options['style']) && isset($banner_options['style']) !== '') {
        if (strpos($banner_options['style'], "background-image") !== false) {
            $banner_class = 'has-style';
        }
    }
}
?>

<?php if (isset($show_banner) && $show_banner === 'true') : ?>

    <?php if (!is_singular('post')) : ?>
        <div class="inner-page-banner <?php echo esc_attr($banner_class); ?>">
            <?php if ($banner_overlay === 'true') : ?>
                <div class="rq-overlay"></div>
            <?php endif; ?>
            <div class="container">
                <div class="rq-title-container bredcrumb-title <?php echo esc_attr($breadcrumbs_alignment); ?>">
                    <?php get_template_part('templates/banner-parts/banner', 'breadcrumbs'); ?>
                </div>
            </div>
        </div>
        <?php else :
        if (has_post_thumbnail()) { ?>
            <div class="blog-post-single-wrapper">
                <?php turbo_post_thumbnail(); ?>
            </div>
    <?php }
    endif; ?>
<?php endif; ?>