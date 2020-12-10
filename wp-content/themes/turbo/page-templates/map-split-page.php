<?php

/**
 * Template Name: Turbo Map Split Template
 *
 */

get_header();
while (have_posts()) : the_post();
    echo do_shortcode(the_content());
endwhile;
get_footer();
