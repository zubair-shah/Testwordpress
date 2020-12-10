<?php

global $nonce;

if (!isset($content_width))
    $content_width = 1140;


if (!function_exists('turbo_create_nonce')) {
    function turbo_create_nonce()
    {
        global $nonce;
        $salt = substr(str_shuffle(MD5(microtime())), 0, 12);
        $nonce = array('ajaxNounce' => wp_create_nonce('ajax-nonce-' . $salt), 'salt' => $salt);
    }
}

add_action('init', 'turbo_create_nonce');


if (!function_exists('turbo_get_user_role')) {
    function turbo_get_user_role($id)
    {
        $user = new WP_User($id);
        return array_shift($user->roles);
    }
}

if (!function_exists('wp_gallery_data')) {
    function wp_gallery_data($attachment_id)
    {
        $attachment = get_post($attachment_id);
        return array(
            'alt'         => get_post_meta($attachment->ID, '_wp_attachment_image_alt', true),
            'caption'     => $attachment->post_excerpt,
            'description' => $attachment->post_content,
            'href'        => get_permalink($attachment->ID),
            'src'         => $attachment->guid,
            'title'       => $attachment->post_title
        );
    }
}

if (!function_exists('turbo_post_thumbnail')) :
    /**
     * Display an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     *
     * @since turbo 1.0
     */
    function turbo_post_thumbnail()
    {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_singular()) :
?>

            <div class="signle-post-feature-img">
                <?php the_post_thumbnail('full'); ?>
            </div><!-- .signle-post-feature-img -->

        <?php else : ?>
            <div class="rq-listing-standard-image-post">
                <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
                    <?php the_post_thumbnail('post-thumbnail', array('alt' => get_the_title())); ?>
                </a>
            </div><!-- .rq-listing-standard-image-post -->

        <?php endif; // End is_singular()
    }
endif;

/**
 * Nav walker for turbo menu
 *
 * @return turbo menu for turbo.
 * @since Trubowp 1.0
 * @author   RedQTeam
 */
class turbo_nav_walker extends Walker_Nav_Menu
{

    /**
     * Starts the list before the elements are added.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of menu item. Used for padding.
     * @param array $args An array of arguments. @see wp_nav_menu()
     * @since 3.0.0
     *
     * @see Walker::start_lvl()
     *
     */
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {

        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $class_names = $value = '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;

        $has_children = 0;
        if (in_array('menu-item-has-children', $classes)) {
            $has_children = 1;
        }

        $arrow = '';
        $dropdown_toggle_class = '';

        if ($has_children > 0) {
            array_push($classes, "has-submenu");
            $arrow = '<svg class="rq-chevron-down" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>';
            $dropdown_toggle_class = 'dropdown';
        }

        if (in_array('current-menu-item', $classes, true) || in_array('current_page_item', $classes, true) || in_array('current-menu-ancestor', $classes, true)) {
            $classes = array_diff($classes, array('current-menu-item', 'current_page_item', 'active'));
            array_push($classes, "active");
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $output .= $indent . '<li id="menu-item-' . $item->ID . '"' . $value . $class_names . '>';

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';

        if ($item->hash == 1) {
            $attributes .= ' href="' . get_site_url() . '/#' . esc_attr($item->subtitle) . '"';
        } else {
            $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . ' class="dropdown-toggle" role="button" data-toggle="' . $dropdown_toggle_class . '" aria-haspopup="true" aria-expanded="false">';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID);
        $item_output .= $args->link_after;
        $item_output .= $arrow . '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }


    public static function fallback($args)
    {
        if (current_user_can('manage_options')) {
            extract($args);

            $fb_output = null;

            if ($container) {
                $fb_output = '<' . $container;

                if ($container_id)
                    $fb_output .= ' id="' . $container_id . '"';

                if ($container_class)
                    $fb_output .= ' class="' . $container_class . '"';

                $fb_output .= '>';
            }

            $fb_output .= '<ul';

            if ($menu_id)
                $fb_output .= ' id="' . $menu_id . '"';

            if ($menu_class)
                $fb_output .= ' class="' . $menu_class . ' add-a-menu"';

            $fb_output .= '>';
            $fb_output .= '<li><a href="' . admin_url('nav-menus.php') . '">' . esc_html__('Add a menu', 'turbo') . '</a></li>';
            $fb_output .= '</ul>';

            if ($container)
                $fb_output .= '</' . $container . '>';

            echo apply_filters('turbo_menu_notice', $fb_output);
        }
    }
}

add_filter('comment_form_fields', 'turbo_move_comment_field');
function turbo_move_comment_field($fields)
{
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}

if (!function_exists('turbo_related_blog_posts')) {
    function turbo_related_blog_posts()
    { ?>
        <?php
        $args = array(
            'numberposts'      => 3,
            'offset'           => 0,
            'category'         => 0,
            'orderby'          => 'post_date',
            'order'            => 'DESC',
            'include'          => '',
            'exclude'          => get_the_ID(),
            'meta_key'         => '',
            'meta_value'       => '',
            'post_type'        => 'post',
            'post_status'      => 'publish',
            'suppress_filters' => false
        );
        $recent_posts = wp_get_recent_posts($args, ARRAY_A);

        if (empty($recent_posts)) return;
        ?>

        <div class="related-posts">
            <h2 class="single-sub-title"><?php esc_html_e('related posts', 'turbo') ?></h2>
            <div class="rq-blog-grid-wrapper">
                <div class="row">
                    <?php foreach ($recent_posts as $key => $post) : ?>
                        <?php
                        $post_id = $post['ID'];
                        $title = $post['post_title'];
                        $permalink = get_the_permalink($post_id);
                        $post_date = get_the_date('', $post_id);
                        $feat_image_url = get_the_post_thumbnail_url($post_id);
                        $author = get_the_author();
                        ?>
                        <div class="col-md-6 col-lg-4">
                            <a href="<?php echo esc_url($permalink); ?>">
                                <div class="rq-blog-grid-single" style="background: url(<?php echo esc_url($feat_image_url) ?>) #f3f3f3 top center no-repeat;background-size: cover;">
                                    <div class="rq-overlay"></div>
                                    <span class="company-name"><?php echo esc_attr($title); ?></span>
                                    <div class="rq-listing-meta">
                                        <span class="date"><?php echo esc_attr($post_date); ?></span>
                                        <span class="v-line">|</span>
                                        <span class="author-name"><b><?php esc_html_e('by', 'turbo') ?></b><?php echo esc_attr($author); ?></span>
                                        <span class="v-line">|</span>
                                        <span class="category">
                                            <b><?php esc_html_e('in', 'turbo') ?></b>
                                            <?php
                                            $category_list = get_the_category();
                                            if ($category_list) {
                                                $related_cats = array();
                                                foreach ($category_list as $category) {
                                                    $related_cats[] = $category->name;
                                                }
                                                echo esc_attr(implode(', ', array_slice($related_cats, 0, 1)));
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php
    }
}

add_filter('comment_reply_link', 'turbo_replace_reply_link_class');

function turbo_replace_reply_link_class($class)
{
    $class = str_replace("class='comment-reply-link", "class='reply", $class);
    return $class;
}

function turbo_nav_menu_css_class($classes)
{
    $classes[] = 'dropdown';
    return $classes;
}

add_filter('nav_menu_css_class', 'turbo_nav_menu_css_class');


if (!function_exists('turbo_custom_css')) {
    /**
     * Custom css editor
     * @since turbo 1.0
     */
    function turbo_custom_css()
    {
        global $turbo_option_data;
        if (isset($turbo_option_data['turbo-custom-css'])) {
            echo "<style>" . $turbo_option_data['turbo-custom-css'] . "</style>";
        }
    }
}

// add_action('wp_head', 'turbo_custom_css');


if (!function_exists('turbo_custom_js')) {
    /**
     * Custom css editor
     * @since turbo 1.0
     */
    function turbo_custom_js()
    {
        global $turbo_option_data;
        if (isset($turbo_option_data['turbo-custom-js'])) {
            echo "<script>" . $turbo_option_data['turbo-custom-js'] . "</script>";
        }
    }
}

// add_action('wp_head', 'turbo_custom_js');


if (!function_exists('redq_listings_pagination')) {

    function redq_listings_pagination($pages = '', $range = 2)
    {
        $showitems = ($range * 2) + 1;

        global $paged;
        if (empty($paged)) $paged = 1;

        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if (!$pages) {
                $pages = 1;
            }
        }

        if (1 != $pages) {
            echo "<div class='rq-pagination p45'>";
            echo "<nav><ul class='rq-pagination-list'>";
            // if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";
            if ($paged > 1 && $showitems < $pages) echo "<li class='pagin-text'><a href='" . get_pagenum_link($paged - 1) . "'><span aria-hidden='true'><i class='arrow_left'></i> Prev</span></a></li>";

            for ($i = 1; $i <= $pages; $i++) {
                if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                    $paginate_item = ($paged == $i) ? "<li class='active'><a href='#'>" . $i . "</a></li>" : "<li><a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a></li>";
                    echo apply_filters('turbo_paginate_item', $paginate_item);
                }
            }

            if ($paged < $pages && $showitems < $pages) echo "<li class='pagin-text'><a href='" . get_pagenum_link($paged + 1) . "'><span aria-hidden='true'>next <i class='arrow_right'></i></span></a></li>";
            echo "</ul></nav>";
            echo "</div>\n";
        }
    }
}


if (!function_exists('turbo_check_footer_widgets_params')) {

    /**
     * Configure sidebar widgets
     *
     */
    function turbo_check_footer_widgets_params($params)
    {
        global $wp_registered_widgets;
        $settings_getter = $wp_registered_widgets[$params[0]['widget_id']]['callback'][0];

        if ($settings_getter->id_base == 'recent-posts') {
            $params[0]['before_widget'] = '<div class="col-md-3 col-sm-3"><div class="widget-list">';
            $params[0]['after_widget'] = '</div></div>';
            $params[0]['before_title'] = '<h5 class="widget-title">';
            $params[0]['after_title'] = '</h5>';
        }

        if ($settings_getter->id_base == 'archives' || $settings_getter->id_base == 'categories' || $settings_getter->id_base == 'meta' || $settings_getter->id_base == 'recent-comments') {
            $params[0]['before_widget'] = '<div class="col-md-3 col-sm-3"><div class="widget-list">';
            $params[0]['after_widget'] = '</div></div>';
            $params[0]['before_title'] = '<h5 class="widget-title">';
            $params[0]['after_title'] = '</h5>';
        }

        return $params;
    }
}

add_filter('dynamic_sidebar_params', 'turbo_check_footer_widgets_params');


if (!function_exists('turbo_footer_social_profile')) :

    /**
     * Social Profiles For Footer Widgets
     *
     * @param null
     * @return string
     * @since  1.0.0
     * @access public
     */
    function turbo_footer_social_profile()
    {

        $choose_options = get_post_meta(get_the_ID(), '_turbo_footer_options_from', true);
        $choose_options = $choose_options ? $choose_options : 'option_panel';
        $social_profiles = array();

        if (is_page() && $choose_options != 'option_panel') :
            $local_options = turbo_extract_page_meta_data(array(
                'social_profiles' => array('', '_turbo_social_profiles'),
            ));

            extract($local_options);

            if (isset($social_profiles) && !empty($social_profiles)) :
                echo '<ul class="rq-footer-social">';
                foreach ($social_profiles as $key => $value) {
                    $profile = $value->data;
                    $name = isset($profile[0]->value) ? $profile[0]->value : '';
                    $icon = isset($profile[1]->value) ? $profile[1]->value : '';
                    $link = isset($profile[2]->value) ? $profile[2]->value : '#';
                    $open_link = isset($profile[3]->value) ? $profile[3]->value : '_blank';
                    echo '<li><a href="' . esc_url($link) . '" target="' . esc_attr($open_link) . '"><i class="' . esc_attr($icon) . '">' . esc_attr($name) . '</i></a></li>';
                }
                echo '</ul>';
            endif;

        else :

            extract(turbo_extract_option_data(array(
                'social_profiles' => array('', 'turbo_social_profile'),
                'open_link'       => array('_blank', 'turbo_open_social_link'),
            )));

            if (isset($social_profiles) && !empty($social_profiles)) :
                echo '<ul class="rq-footer-social">';
                foreach ($social_profiles as $key => $value) {
                    echo '<li><a href="' . esc_url($value['url']) . '" target="' . esc_attr($open_link) . '"> <i class="' . esc_attr($value['description']) . '"> ' . esc_attr($value['title']) . '</i></a></li>';
                }
                echo '</ul>';
            endif;

        endif;
    };

endif;


if (!function_exists('turbo_social_profile')) :

    /**
     * Social Profiles
     *
     * @param null
     * @return string
     * @since  1.0.0
     * @access public
     */
    function turbo_social_profile()
    {

        $choose_options = get_post_meta(get_the_ID(), '_turbo_copyright_options_from', true);
        $choose_options = $choose_options ? $choose_options : 'option_panel';
        $social_profiles = array();

        if (is_page() && $choose_options != 'option_panel') :

            $local_options = turbo_extract_page_meta_data(array(
                'social_profiles' => array('', '_turbo_social_profiles'),
            ));

            extract($local_options);

            if (isset($social_profiles) && !empty($social_profiles)) :
                echo '<ul class="list-unstyled social-list">';
                foreach ($social_profiles as $key => $value) {
                    $profile = $value->data;
                    $name = isset($profile[0]->value) ? $profile[0]->value : '';
                    $icon = isset($profile[1]->value) ? $profile[1]->value : '';
                    $link = isset($profile[2]->value) ? $profile[2]->value : '#';
                    $open_link = isset($profile[3]->value) ? $profile[3]->value : '_blank';
                    echo '<li><a href="' . esc_url($link) . '" target="' . esc_attr($open_link) . '"><i class="' . esc_attr($icon) . '"></i></a></li>';
                }
                echo '</ul>';
            endif;

        else :

            extract(turbo_extract_option_data(array(
                'social_profiles' => array('', 'turbo_social_profile'),
                'open_link'       => array('_blank', 'turbo_open_social_link'),
            )));

            if (isset($social_profiles) && !empty($social_profiles)) :
                echo '<ul class="list-unstyled social-list">';
                foreach ($social_profiles as $key => $value) {
                    echo '<li><a href="' . esc_url($value['url']) . '" target="' . esc_attr($open_link) . '"><i class="' . esc_attr($value['description']) . '"></i></a></li>';
                }
                echo '</ul>';
            endif;

        endif;
    };

endif;


if (!function_exists('turbo_wp_kses_allowed_html')) :
    function turbo_wp_kses_allowed_html($tags)
    {
        $tags['i'] = array(
            'class' => 1,
            'id'    => 1,
            'style' => 1,
            'title' => 1,
            'role'  => 1
        );
        return $tags;
    }
endif;

add_filter('wp_kses_allowed_html', 'turbo_wp_kses_allowed_html');


if (!function_exists('turbo_search_form')) :

    /**
     * Social Profiles
     *
     * @param null
     * @return string
     * @since  1.0.0
     * @access public
     */
    function turbo_search_form($atts_data)
    {
        extract($atts_data);
    ?>
        <div class="turbo-horizontal-search-oob">
            <?php echo do_shortcode('[reactive key="' . $reactive_builder_shortcode . '"]', false); ?>
        </div>
<?php

    };

endif;

if (!function_exists('turbo_vc_get_posts')) :

    /**
     * Social Profiles
     *
     * @param null
     * @return string
     * @since  1.0.0
     * @access public
     */
    function turbo_vc_get_posts($post_type)
    {
        global $wpdb;
        $results = [];

        $posts = $wpdb->get_results($wpdb->prepare("SELECT ID, post_title FROM {$wpdb->posts} WHERE post_type = %s and post_status = 'publish'", $post_type), ARRAY_A);

        if (!$posts) return;

        foreach ($posts as $key => $value) {
            $results[$value['post_title']] = $value['ID'];
        }
        return $results;
    };

endif;


if (!function_exists('turbo_get_header_settings')) :
    /**
     * Get all settings for header
     *
     * @param null
     * @return string
     * @since  1.0.0
     * @access public
     */
    function turbo_get_header_settings($post_id)
    {
        $choose_options = get_post_meta($post_id, '_turbo_header_options_from', true);
        $choose_options = $choose_options ? $choose_options : 'option_panel';
        if (is_page()) {
            if ($choose_options != 'option_panel') {
                $options = turbo_extract_page_meta_data(array(
                    'show_header'         => array('true', '_turbo_display_header'),
                    'header_layout'       => array('header-menu', '_turbo_header_view'),
                    'header_type'         => array('transparent-header', '_turbo_header_type'),
                    'is_sticky'           => array('sticky-header', '_turbo_header_sticky'),
                    'header_login'        => array('yes', '_turbo_show_header_login'),
                    'header_lang'         => array('no', '_turbo_show_header_language'),
                    'site_logo'           => array('', '_turbo_header_logo', 'url'),
                    'header_bg_as'        => array('color', '_turbo_header_bg_as'),
                    'header_bg_image'     => array('', '_turbo_header_bg_image', 'url'),
                    'header_bg_color'     => array('#000000', '_turbo_header_bg_color'),
                    'header_right_menu'   => array('yes', '_turbo_show_right_menu'),
                    'header_currency'     => array('no', '_turbo_show_header_currency_switcher'),
                    'header_sticky_offset' => array('no', '_turbo_header_sticky_offset'),
                    'header_mini_cart'    => array('yes', '_turbo_show_mini_cart'),
                ));
                extract($options);
                $args = array(
                    'bg_color'  => $header_bg_color,
                    'bg_image'  => isset($header_bg_image) && !empty($header_bg_image) ? $header_bg_image : '',
                    'bg_repeat' => 'repeat-x',
                    'bg_size'   => 'cover',
                );
                $style = turbo_page_background($args);
            } else {
                $options = turbo_extract_option_data(array(
                    'site_logo'            => array('', 'header-logo', 'url'),
                    'header_right_menu'    => array('no', 'show_menu_right_section'),
                    'header_login'         => array('', 'show_header_login'),
                    'header_lang'          => array('', 'show_header_language'),
                    'header_currency'      => array('', 'show_header_currency_switcher'),
                    'header_type'          => array('transparent-header', 'turbo_header_type'),
                    'is_sticky'            => array('sticky-header', 'turbo_header_sticky'),
                    'header_sticky_offset' => array('no', 'turbo_header_sticky_offset'),
                    'header_mini_cart'     => array('yes', 'turbo_show_mini_cart'),
                ));
                extract($options);
                $args = array(
                    'bg_color'  => '#ffffff',
                    'bg_image'  => '',
                    'bg_repeat' => 'repeat-x',
                    'bg_size'   => 'cover',
                );
                $style = turbo_background_css('turbo_header_background', $args);
            }
        } else {
            if ($choose_options != 'option_panel') {
                $options = turbo_extract_post_meta_data(array(
                    'show_header'         => array('true', '_turbo_display_header'),
                    'header_layout'       => array('header-menu', '_turbo_header_view'),
                    'header_type'         => array('transparent-header', '_turbo_header_type'),
                    'is_sticky'           => array('sticky-header', '_turbo_header_sticky'),
                    'header_login'        => array('yes', '_turbo_show_header_login'),
                    'header_lang'         => array('no', '_turbo_show_header_language'),
                    'site_logo'           => array('', '_turbo_header_logo', 'url'),
                    'header_bg_as'        => array('color', '_turbo_header_bg_as'),
                    'header_bg_image'     => array('', '_turbo_header_bg_image', 'url'),
                    'header_bg_color'     => array('#000000', '_turbo_header_bg_color'),
                    'header_right_menu'   => array('yes', '_turbo_show_right_menu'),
                    'header_currency'     => array('no', '_turbo_show_header_currency_switcher'),
                    'header_sticky_offset' => array('no', '_turbo_header_sticky_offset'),
                    'header_mini_cart'    => array('yes', '_turbo_show_mini_cart'),
                ));
                extract($options);
                $args = array(
                    'bg_color'  => $header_bg_color,
                    'bg_image'  => isset($header_bg_image) && !empty($header_bg_image) ? $header_bg_image : '',
                    'bg_repeat' => 'repeat-x',
                    'bg_size'   => 'cover',
                );
                $style = turbo_page_background($args);
            } else {
                $options = turbo_extract_option_data(array(
                    'header_right_menu'    => array('no', 'show_menu_right_section'),
                    'header_type'          => array('transparent-header', 'turbo_header_type'),
                    'is_sticky'            => array('sticky-header', 'turbo_header_sticky'),
                    'header_layout'        => array('header-menu', 'turbo_header_view_type'),
                    'site_logo'            => array('', 'header-logo', 'url'),
                    'header_login'         => array('', 'show_header_login'),
                    'header_lang'          => array('', 'show_header_language'),
                    'header_currency'      => array('', 'show_header_currency_switcher'),
                    'header_sticky_offset' => array('no', 'turbo_header_sticky_offset'),
                    'header_mini_cart'     => array('yes', 'turbo_show_mini_cart'),
                ));
                extract($options);
                $args = array(
                    'bg_color'  => '#ffffff',
                    'bg_image'  => '',
                    'bg_repeat' => 'repeat-x',
                    'bg_size'   => 'cover',
                );
                $style = turbo_background_css('turbo_header_background', $args);
            }
        }

        if (is_singular('post')) {
            $blog_single_header = turbo_extract_option_data(array(
                'header_type' => array('transparent-header', 'turbo_blog_single_header_type'),
                'header_sticky_offset' => array('yes', 'turbo_header_sticky_offset_blog_single'),
            ));
            extract($blog_single_header);
            $options['header_type'] = $header_type;
            $options['header_sticky_offset'] = $header_sticky_offset;
        }

        $settings = array(
            'options' => $options,
            'style'   => $style
        );

        return $settings;
    }
endif;


if (!function_exists('turbo_get_banner_settings')) :

    /**
     * Get all settings for Banner
     *
     * @param null
     * @return string
     * @since  1.0.0
     * @access public
     */
    function turbo_get_banner_settings($post_id)
    {
        $choose_options = get_post_meta($post_id, '_turbo_banner_options_from', true);
        $choose_options = $choose_options ? $choose_options : 'option_panel';

        if (is_page() && $choose_options != 'option_panel') :
            $options = turbo_extract_page_meta_data(array(
                'show_banner'           => array('on', '_turbo_display_banner'),
                'breadcrumbs_alignment' => array('text-center', '_turbo_breadcrumbs_alignment'),
                'banner_color'          => array('#f3f3f3', '_turbo_banner_bg_color'),
                'banner_image'          => array('', '_turbo_banner_bg_image', 'url'),
                'banner_padding'        => array('10px', '_turbo_banner_padding'),
                'banner_height'         => array('70vh', '_turbo_banner_height'),
                'banner_padding_mobile' => array('10px', '_turbo_banner_padding_mobile'),
                'banner_height_mobile'  => array('35vh', '_turbo_banner_height_mobile'),
                'banner_overlay'        => array('false', '_turbo_banner_overlay'),
                'overlay_bg'            => array('white', '_turbo_banner_overlay_bg'),
            ));
            extract($options);

            $banner_args = array(
                'bg_color'  => $banner_color,
                'bg_image'  => isset($banner_image) && !empty($banner_image) ? $banner_image : '',
                'bg_repeat' => 'repeat-x',
                'bg_size'   => 'cover',
            );
            $style = turbo_page_background($banner_args);
        else :
            $options = turbo_extract_option_data(array(
                'show_banner'           => array('true', 'turbo_banner_switch'),
                'blog_banner'           => array('', 'featured-img', 'url'),
                'breadcrumbs_alignment' => array('text-left', 'turbo_breadcrumbs_alignment'),
                'banner_padding'        => array('10px', 'banner_padding'),
                'banner_height'         => array('70vh', 'banner_height'),
                'banner_overlay'        => array('false', 'turbo_banner_overlay'),
                'overlay_bg'            => array('white', 'turbo_banner_overlay_bg'),
            ));

            extract($options);

            $banner_args = array(
                'bg_color'  => '#f3f3f3',
                'bg_image'  => '',
                'bg_repeat' => 'repeat-x',
                'bg_size'   => 'cover',
            );
            $style = turbo_background_css('turbo_banner_background', $banner_args);
        endif;

        $settings = array(
            'options' => $options,
            'style'   => $style
        );
        return $settings;
    };

endif;


if (!function_exists('turbo_get_product_banner_settings')) :

    /**
     * Get all settings for Banner
     *
     * @param null
     * @return string
     * @since  1.0.0
     * @access public
     */
    function turbo_get_product_banner_settings($post_id)
    {
        if (!$post_id) return;
        $choose_options = get_post_meta($post_id, '_general_banner_options_from', true);
        $choose_options = $choose_options ? $choose_options : 'option_panel';
        if ($choose_options != 'option_panel') {
            $product_banner_options_local = turbo_extract_post_meta_data(array(
                'show_banner'           => array('on', '_layout_banner_options_settings'),
                'banner_image_as'       => array('feature_image', '_turbo_set_product_banner_bg'),
                'breadcrumbs_alignment' => array('text-center', '_turbo_product_breadcrumbs_alignment'),
                'banner_height'         => array('50vh', '_product_banner_height'),
                'banner_overlay'        => array('false', '_turbo_product_banner_overlay'),
                'overlay_bg'            => array('#ffffff', '_turbo_product_banner_overlay_bg'),
            ));
            extract($product_banner_options_local);
            $container_class = 'inner-page-banner';
            $args = array(
                'bg_color'    => '#ffffff',
                'bg_image'    => '',
                'bg_repeat'   => 'repeat-x',
                'bg_size'     => 'cover',
                'bg_position' => 'center center',
                'bg_attach'   => 'scroll'
            );

            if ($banner_image_as === 'feature_image') {
                if (has_post_thumbnail()) {
                    $feature_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                    $args['bg_image'] = $feature_image[0];
                } else {
                    $container_class .= ' no-image';
                }
                $style = turbo_background_css('turbo_product_banner_background', $args);
            } else {
                $style = turbo_background_css('turbo_product_banner_background', $args);
            }

            $settings = array(
                'options'         => $product_banner_options_local,
                'style'           => $style,
                'container_class' => $container_class
            );
            return $settings;
        } else {
            $container_class = 'inner-page-banner';
            $product_banner_options = turbo_extract_option_data(array(
                'show_banner'           => array('on', 'turbo_product_banner_switch'),
                'banner_image_as'       => array('feature_image', 'turbo_set_product_banner_bg'),
                'breadcrumbs_alignment' => array('text-center', 'turbo_product_breadcrumbs_alignment'),
                'banner_height'         => array('50vh', 'product_banner_height'),
                'banner_overlay'        => array('false', 'turbo_product_banner_overlay'),
                'overlay_bg'            => array('white', 'turbo_product_banner_overlay_bg'),
            ));

            extract($product_banner_options);

            $args = array(
                'bg_color'    => 'white',
                'bg_image'    => '',
                'bg_repeat'   => 'repeat-x',
                'bg_size'     => 'cover',
                'bg_position' => 'center center',
                'bg_attach'   => 'scroll'
            );

            if ($banner_image_as === 'feature_image') {
                if (has_post_thumbnail()) {
                    $feature_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                    $args['bg_image'] = $feature_image[0];
                } else {
                    $container_class .= ' no-image';
                }
                $style = turbo_background_css('turbo_product_banner_background', $args);
            } else if ($banner_image_as === 'color') {
                $style = turbo_background_css('turbo_product_banner_background', $args);
                $container_class .= ' no-banner-image';
            } else {
                $style = turbo_background_css('turbo_product_banner_background', $args);
            }

            $settings = array(
                'options'         => $product_banner_options,
                'style'           => $style,
                'container_class' => $container_class
            );
            return $settings;
        }
    };

endif;


if (!function_exists('turbo_get_footer_settings')) :
    /**
     * Get all settings for footer
     *
     * @param null
     * @return string
     * @since  1.0.0
     * @access public
     */
    function turbo_get_footer_settings($post_id)
    {
        $choose_options = get_post_meta($post_id, '_turbo_footer_options_from', true);
        $choose_options = $choose_options ? $choose_options : 'option_panel';
        if (is_page()) {
            if ($choose_options != 'option_panel') {
                $options = turbo_extract_page_meta_data(array(
                    'choose_footer'  => array('footer-one', '_turbo_choose_footer'),
                    'show_footer'    => array('true', '_turbo_display_footer'),
                    'show_widgets'   => array('true', '_turbo_display_footer_widgets'),
                    'footer_bg_as'   => array('color', '_turbo_footer_bg_as'),
                    'footer_image'   => array('', '_turbo_footer_bg_image', 'url'),
                    'footer_color'   => array('#000000', '_turbo_footer_bg_color'),
                    'mobile_display' => array('toogle', '_turbo_footer_widget_mobile_display'),
                    'footer_text'    => array('', '_turbo_footer_text'),
                ));
                extract($options);
                // $choose_footer_type = $choose_footer[0];
                $args = array(
                    'bg_color'  => $footer_color,
                    'bg_image'  => isset($footer_image) && !empty($footer_image) ? $footer_image : '',
                    'bg_repeat' => 'repeat-x',
                    'bg_size'   => 'cover',
                );
                if ($mobile_display == 'toggle') {
                    $footer_widget_class .= ' footer-widget-toggle';
                }
                $style = turbo_page_background($args);
            } else {
                $options = turbo_extract_option_data(array(
                    'choose_footer' => array('footer-one', 'turbo_multi_footer'),
                ));
                extract($options);
                $args = array(
                    'bg_color'  => '#212020',
                    'bg_image'  => '',
                    'bg_repeat' => 'repeat-x',
                    'bg_size'   => 'cover',
                );
                $style = turbo_background_css('turbo_footer_background', $args);
            }
            $settings = array(
                'options' => $options,
                'style'   => $style
            );
            return $settings;
        } else {
            if ($choose_options != 'option_panel') {
                $options = turbo_extract_post_meta_data(array(
                    'choose_footer'  => array('footer-one', '_turbo_choose_footer'),
                    'show_footer'    => array('true', '_turbo_display_footer'),
                    'show_widgets'   => array('true', '_turbo_display_footer_widgets'),
                    'footer_bg_as'   => array('color', '_turbo_footer_bg_as'),
                    'footer_image'   => array('', '_turbo_footer_bg_image', 'url'),
                    'footer_color'   => array('#000000', '_turbo_footer_bg_color'),
                    'mobile_display' => array('toogle', '_turbo_footer_widget_mobile_display'),
                    'footer_text'    => array('', '_turbo_footer_text'),
                ));
                extract($options);
                // $choose_footer_type = $choose_footer[0];
                $args = array(
                    'bg_color'  => $footer_color,
                    'bg_image'  => isset($footer_image) && !empty($footer_image) ? $footer_image : '',
                    'bg_repeat' => 'repeat-x',
                    'bg_size'   => 'cover',
                );
                if ($mobile_display == 'toggle') {
                    $footer_widget_class .= ' footer-widget-toggle';
                }
                $style = turbo_page_background($args);
            } else {
                $options = turbo_extract_option_data(array(
                    'choose_footer' => array('footer-one', 'turbo_multi_footer'),
                ));
                extract($options);
                $args = array(
                    'bg_color'  => '#212020',
                    'bg_image'  => '',
                    'bg_repeat' => 'repeat-x',
                    'bg_size'   => 'cover',
                );
                $style = turbo_background_css('turbo_footer_background', $args);
            }
            $settings = array(
                'options' => $options,
                'style'   => $style
            );
            return $settings;
        }
    }
endif;
