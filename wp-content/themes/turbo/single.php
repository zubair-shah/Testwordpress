<?php get_header(); ?>

    <div class="blog-post-single-wrapper">
        <div class="container">
            <div class="rq-content-block">
                <?php

                while (have_posts()) : the_post();
                    get_template_part('templates/blog-templates/content-single', get_post_format());
                endwhile;

                /**
                 * Show related blog posts
                 */
                turbo_related_blog_posts();

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

                ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>