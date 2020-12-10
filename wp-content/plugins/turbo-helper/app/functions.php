<?php

/**
 * Social share
 *
 * @return markup
 */
function turbo_helper_social_share()
{
    ob_start();

    include __DIR__ . '/views/social-share.php';

    echo ob_get_clean();
}

/**
 * Top rated products
 *
 * @param string $post_type
 * @param string $orderby
 * @param string $order
 * @param int $posts_per_page
 * @return array
 */
function turbo_helper_get_top_rated_products($post_type, $orderby, $order, $posts_per_page)
{
    $args = array(
        'post_type'   => $post_type,
        'post_status' => 'publish',
        'tax_query'   => [
            [
                'taxonomy' => 'product_type',
                'field'    => 'slug',
                'terms'    => 'redq_rental',
            ],
        ],
        'meta_query'     => WC()->query->get_meta_query(),
        'orderby'        => $orderby,
        'order'          => $order,
        'posts_per_page' => $posts_per_page,
        'no_found_rows'  => 1,
    );

    return (new WP_Query($args))->posts;
}

/**
 * Recent products
 *
 * @param string $post_type
 * @param string $orderby
 * @param string $order
 * @param int $posts_per_page
 * @return array
 */
function turbo_helper_get_recent_products($post_type, $orderby, $order, $posts_per_page)
{
    $args = [
        'post_type'        => $post_type,
        'post_status'      => 'publish',
        'numberposts'      => $posts_per_page,
        'offset'           => 0,
        'category'         => 0,
        'orderby'          => $orderby,
        'order'            => $order,
        'suppress_filters' => false
    ];

    return wp_get_recent_posts($args, ARRAY_A);
}

/**
 * Get posts
 *
 * @param string $post_type
 * @param string $orderby
 * @param string $order
 * @param int $posts_per_page
 * @return array
 */
function turbo_helper_get_posts($post_type, $orderby, $order, $posts_per_page, $taxonomy = 'category', $term = null)
{
    $args = [
        'post_type'        => $post_type,
        'orderby'          => $orderby,
        'order'            => $order,
        'posts_per_page'   => $posts_per_page,
        'suppress_filters' => false
    ];

    if ($term) {
        $args['tax_query'] = [
            [
                'taxonomy' => $taxonomy,
                'field'    => 'slug',
                'terms'    => $term,
            ],
        ];
    }

    return (new WP_Query($args))->posts;
}

/**
 * Post terms
 *
 * @param int $post_id
 * @param string $taxonomy
 * @return array
 */
function turbo_helper_get_post_terms($post_id, $taxonomy = 'product_cat')
{
    $args = [
        'orderby' => 'name',
        'order'   => 'ASC',
        'fields'  => 'all',
    ];

    $results = array_map(function (WP_Term $term) {

        $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
        $image = wp_get_attachment_url($thumbnail_id);

        return [
            'name' => $term->name,
            'icon' => $image
        ];
    }, wp_get_post_terms($post_id, $taxonomy, $args));

    return $results;
}

/**
 * Get language
 *
 * @return string
 */
function turbo_helper_get_lang_prefix()
{
    $language = 'en';

    if (class_exists('SitePress')) {
        $language = ICL_LANGUAGE_CODE;
    }

    return $language;
}

/**
 * Top rated products transient ID
 *
 * @return string
 */
function turbo_helper_get_trp_transient_id()
{
    $language = turbo_helper_get_lang_prefix();

    return 'turbo_top_rated_products_' . $language;
}

/**
 * Recent products transient ID
 *
 * @return string
 */
function turbo_helper_get_rp_transient_id()
{
    $language = turbo_helper_get_lang_prefix();

    return 'turbo_recent_products_' . $language;
}

/**
 * Blog posts transient ID
 *
 * @return string
 */
function turbo_helper_get_blog_posts_transient_id()
{
    $language = turbo_helper_get_lang_prefix();

    return 'turbo_blog_posts_' . $language;
}

/**
 * Testimonials transient ID
 *
 * @return string
 */
function turbo_helper_get_testimonials_transient_id()
{
    $language = turbo_helper_get_lang_prefix();

    return 'turbo_testimonials_' . $language;
}
