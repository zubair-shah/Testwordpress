<?php
if (turbo_is_woocommerce_activated()) {
    if (!is_cart()) {
        add_filter('the_content', 'wpautop');
    }
} else {
    add_filter('the_content', 'wpautop');
}
?>

<div class="rq-shopping-content-block rq-page-single-wrapper">
    <div class="post-content">
        <?php the_content() ?>
        <div class="link-pages">
            <?php
            $args = array(
                'before'   => '<p class="post-navigation">',
                'after'    => '</p>',
                'pagelink' => 'Page %'
            );
            wp_link_pages($args);
            ?>
        </div>
    </div>
    <?php
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif;
    ?>
</div>