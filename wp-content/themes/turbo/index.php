<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage turbo
 * @since turbo 1.0
 */

get_header(); ?>

<div class="rq-blog-listing">
    <div class="rq-listing-wrapper">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                get_template_part('templates/blog-templates/content', get_post_format());
            endwhile;
            if (function_exists('turbo_pagination_blog')) :
                turbo_pagination_blog();
            endif;
        else :
            get_template_part('templates/blog-templates/content', 'none');
        endif;
        ?>
    </div>
</div> <!-- /.rq-blog-listing -->

<?php get_footer(); ?>