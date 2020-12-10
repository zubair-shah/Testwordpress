<?php

/**
 * Template Name: Turbo Home Template
 *
 */
get_header('home');
while (have_posts()) : the_post();
echo do_shortcode(the_content());
endwhile;
get_footer('home');

