<?php
extract(turbo_extract_option_data(array(
    'single_post_avatar_part' => array('No', 'turbo_single_post_header'),
)));

?>

<article class="rq-single-post">
    <div class="rq-title-container bredcrumb-title text-center">
        <h2 class="rq-title"><?php the_title() ?></h2>
        <ul class="turbo-breadcrumbs">
            <?php
            if (function_exists('turbo_breadcrumb')) {
                turbo_breadcrumb();
            }
            ?>
        </ul>
    </div>

    <?php if ($single_post_avatar_part !== 'yes') { ?>
        <div class="rq-single-post-header">
            <div class="author-info-content">
                <?php
                $aid = get_the_author_meta('ID');
                $photo = get_user_meta($aid, 'user_photo', true);
                $author_mail = get_the_author_meta('email');
                $user_photo = !empty($photo) ? $photo : '//www.gravatar.com/avatar/' . md5($author_mail) . '?s=70';
                ?>
                <div class="author-img" style="background: url(<?php echo esc_url($user_photo) ?>) top center no-repeat; background-size: cover"></div>
                <span class="author-name"><?php echo esc_attr(ucfirst(get_the_author())); ?></span>
                <span class="author-role"><?php echo esc_attr(turbo_get_user_role($aid)); ?></span>
            </div>
            <div class="post-cat-tag">
                <div class="post-cat-tag-single">
                    <span class="cat-title"><?php esc_html_e('Date', 'turbo') ?></span>
                    <span class="cat-details"><?php the_date() ?></span>
                </div>
                <div class="post-cat-tag-single">
                    <?php
                    $categories_list = get_the_category_list(_x(', ', 'Used between list items, there is a space after the comma.', 'turbo'));
                    if ($categories_list) {
                        printf('<span class="cat-title">%1$s </span><span class="cat-details">%2$s</span>', _x('Categories', 'Used before category names.', 'turbo'), $categories_list);
                    }
                    ?>
                </div>
                <div class="post-cat-tag-single">
                    <?php
                    $tags_list = get_the_tag_list('', _x(', ', 'Used between list items, there is a space after the comma.', 'turbo'));
                    if ($tags_list) {
                        printf(
                            '<span class="cat-title">%1$s </span><span class="cat-details">%2$s</span>',
                            _x('Tags', 'Used before category names.', 'turbo'),
                            $tags_list
                        );
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php } ?>

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
    if (class_exists('Turbowp_Helper')) {
        turbo_helper_social_share();
    }
    ?>

</article>