<?php

if (!function_exists('turbo_background_css')) :

    /**
     * show copyright background image or color
     *
     * @param null
     * @return string
     * @since  1.0.0
     * @access public
     */
    function turbo_background_css($bg_key = null, $args = array())
    {

        $defaults = array(
            'bg_color'    => '000',
            'bg_image'    => '',
            'bg_repeat'   => 'repeat-x',
            'bg_size'     => 'cover',
            'bg_position' => 'center center',
            'bg_attach'   => 'scroll'
        );

        $args = wp_parse_args($args, $defaults);

        extract(turbo_extract_option_data(array(
            'bg_color'  => array($args['bg_color'], $bg_key, 'background-color'),
            'bg_image'  => array($args['bg_image'], $bg_key, 'background-image'),
            'bg_repeat' => array($args['bg_repeat'], $bg_key, 'background-repeat'),
            'bg_size'   => array($args['bg_size'], $bg_key, 'background-size'),
            'bg_pos'    => array($args['bg_position'], $bg_key, 'background-position'),
            'bg_attach' => array($args['bg_attach'], $bg_key, 'background-attachment'),
        )));

        $style = '';
        $style .= $bg_color ? "background-color: $bg_color;" : '';
        $style .= $bg_image ? "background-image: url($bg_image);" : '';
        $style .= $bg_repeat ? "background-repeat: $bg_repeat;" : '';
        $style .= $bg_size ? "background-size: $bg_size; -webkit-background-size: $bg_size;" : '';
        $style .= $bg_pos ? "background-position: $bg_pos;" : '';
        $style .= $bg_attach ? "background-attachment: $bg_attach;" : '';


        return $style;
    };
endif;

if (!function_exists('turbo_option_data')) :

    /**
     * Enqueue css and js files
     *
     * @param string $key key name that will be checked
     * @param string $fallback default value
     * @return string
     * @since 1.0.0
     * @access public
     * @version 1.0.0
     */
    function turbo_option_data($key, $fallback, $sub_key = '')
    {
        global $turbo_option_data;
        $option_data = $turbo_option_data;


        if (!empty($sub_key)) {
            if (isset($option_data[$key][$sub_key]) && !empty($option_data[$key][$sub_key])) {
                return $option_data[$key][$sub_key];
            }
        } else {
            if (isset($option_data[$key]) && !empty($option_data[$key])) {
                return $option_data[$key];
            }
        }
        return $fallback;
    }
endif;

if (!function_exists('turbo_extract_option_data')) :

    /**
     * Split options
     *
     *
     *
     * Call this function in following ways
     *
     * 1.  extract(
     *      turbo_extract_option_data(
     *          array(
     *            'Your_variable_name' = array ('default_value', 'main_ara_key', 'main_ara_sub_key'),
     *         )
     *      )
     *     );
     *
     *
     *
     * @version 1.0.1
     * @since 1.0.1
     * @var Array $helper
     * @access public
     */
    function turbo_extract_option_data($helper)
    {
        foreach ($helper as $option_key => $option_fallback) {
            if (is_array($option_fallback)) {
                $fallback = $option_fallback[0];
                $main_key = array_key_exists(1, $option_fallback) ? $option_fallback[1] : '';
                $sub_key = array_key_exists(2, $option_fallback) ? $option_fallback[2] : '';
                $helper[$option_key] = turbo_option_data($main_key, $fallback, $sub_key);
            } else {
                $helper[$option_key] = turbo_option_data($option_key, $option_fallback, '');
            }
        }
        return $helper;
    }

endif;

if (!function_exists('turbo_page_background')) :

    /**
     * show copyright background image or color
     *
     * @param null
     * @return string
     * @since  1.0.0
     * @access public
     */
    function turbo_page_background($args = array())
    {

        $defaults = array(
            'bg_color'    => '#000',
            'bg_image'    => '',
            'bg_repeat'   => 'repeat-x',
            'bg_size'     => 'cover',
            'bg_position' => 'center center',
            'bg_attach'   => 'scroll'
        );

        $args = wp_parse_args($args, $defaults);
        extract($args);

        $style = '';
        $style .= $bg_color ? "background-color: $bg_color;" : '';
        $style .= $bg_image ? "background-image: url($bg_image);" : '';
        $style .= $bg_repeat ? "background-repeat: $bg_repeat;" : '';
        $style .= $bg_size ? "background-size: $bg_size; -webkit-background-size: $bg_size;" : '';
        $style .= $bg_position ? "background-position: $bg_position;" : '';
        $style .= $bg_attach ? "background-attachment: $bg_attach;" : '';

        return $style;
    };

endif;


// POST META DATA START

if (!function_exists('turbo_post_meta_data')) :

    /**
     * Enqueue css and js files
     *
     * @param string $key key name that will be checked
     * @param string $fallback default value
     * @return string
     * @since 1.0.0
     * @access public
     * @version 1.0.0
     */
    function turbo_post_meta_data($key, $fallback, $sub_key = '')
    {
        $option_data = get_post_meta(get_the_ID(), '_turbo_post_settings', true);
        $option_data = json_decode($option_data);
        if (isset($option_data->$key) && !empty($sub_key)) {
            $data = $option_data->$key;
            if (isset($data[0]->$sub_key) && !empty($data[0]->$sub_key)) {
                return $data[0]->$sub_key;
            }
        } else {
            if (isset($option_data->$key) && !empty($option_data->$key)) {
                return $option_data->$key;
            }
        }
        return $fallback;
    }
endif;

if (!function_exists('turbo_extract_post_meta_data')) :
    /**
     * Split options
     *
     * @version 1.0.0
     * @since 1.0.0
     * @var Array $helper
     * @access public
     */
    function turbo_extract_post_meta_data($helper)
    {
        foreach ($helper as $option_key => $option_fallback) {
            if (is_array($option_fallback)) {
                $fallback = $option_fallback[0];
                $main_key = array_key_exists(1, $option_fallback) ? $option_fallback[1] : '';
                $sub_key = array_key_exists(2, $option_fallback) ? $option_fallback[2] : '';
                $helper[$option_key] = turbo_post_meta_data($main_key, $fallback, $sub_key);
            } else {
                $helper[$option_key] = turbo_post_meta_data($option_key, $option_fallback, '');
            }
        }
        return $helper;
    }
endif;


// POST META DATA END

if (!function_exists('turbo_page_meta_data')) :

    /**
     * Enqueue css and js files
     *
     * @param string $key key name that will be checked
     * @param string $fallback default value
     * @return string
     * @since 1.0.0
     * @access public
     * @version 1.0.0
     */
    function turbo_page_meta_data($key, $fallback, $sub_key = '')
    {

        $option_data = get_post_meta(get_the_ID(), '_turbo_page_settings', true);
        $option_data = json_decode($option_data);

        if (isset($option_data->$key) && !empty($sub_key)) {
            $data = $option_data->$key;
            if (isset($data[0]->$sub_key) && !empty($data[0]->$sub_key)) {
                return $data[0]->$sub_key;
            }
        } else {
            if (isset($option_data->$key) && !empty($option_data->$key)) {
                return $option_data->$key;
            }
        }
        return $fallback;
    }
endif;

if (!function_exists('turbo_extract_page_meta_data')) :

    /**
     * Split options
     *
     *
     *
     * Call this function in following ways
     *
     * 1.  extract(
     *      turbo_extract_page_meta_data(
     *          array(
     *            'Your_variable_name' = array ('default_value', 'main_ara_key', 'main_ara_sub_key'),
     *         )
     *      )
     *     );
     *
     *
     * 2.  $variable_name =  turbo_extract_page_meta_data(
     *                         array(
     *                           'Your_variable_name' = array ('default_value', 'main_ara_key', 'main_ara_sub_key'),
     *                         )
     *                       );
     *
     * 3.  extract(
     *       turbo_extract_page_meta_data(
     *         array(
     *           'main_ara_key' = 'default_value',
     *         )
     *       )
     *     );
     *
     *
     * 4.  extract(
     *      turbo_extract_page_meta_data(
     *          array(
     *            'Your_variable_name' = array ('default_value', 'main_ara_key'),
     *         )
     *       )
     *     );
     *
     *
     * @version 1.0.0
     * @since 1.0.0
     * @var Array $helper
     * @access public
     */
    function turbo_extract_page_meta_data($helper)
    {
        foreach ($helper as $option_key => $option_fallback) {
            if (is_array($option_fallback)) {
                $fallback = $option_fallback[0];
                $main_key = array_key_exists(1, $option_fallback) ? $option_fallback[1] : '';
                $sub_key = array_key_exists(2, $option_fallback) ? $option_fallback[2] : '';
                $helper[$option_key] = turbo_page_meta_data($main_key, $fallback, $sub_key);
            } else {
                $helper[$option_key] = turbo_page_meta_data($option_key, $option_fallback, '');
            }
        }
        return $helper;
    }

endif;

if (!function_exists('turbo_allowed_tags')) :
    /**
     * Allow html tags for wp_kses
     *
     * @param array $args Arguments to pass to scholar_single_page_meta.
     * @return void
     * @since  0.1.0
     * @access public
     */
    function turbo_allowed_tags()
    {
        $allowedtags = array(
            'a'    => array('href' => array(), 'title' => array(), 'target' => array()),
            'abbr' => array('title' => array()), 'acronym' => array('title' => array()),
            'code' => array(), 'pre' => array(), 'em' => array(), 'strong' => array(),
            'div'  => array('class' => array()), 'span' => array('class' => array()),
            'p'    => array(), 'i' => array('class' => array()), 'br' => array(), 'ul' => array(), 'ol' => array(), 'li' => array(),
            'h1'   => array(), 'h2' => array(), 'h3' => array(), 'h4' => array(), 'h5' => array(), 'h6' => array(),
            'img'  => array('src' => array(), 'class' => array(), 'alt' => array())
        );

        return $allowedtags;
    }
endif;

if (!function_exists('turbo_toggle_header_menu')) {
    /**
     * Markup for toggle nav
     *
     * @param array $args Arguments to pass to scholar_single_page_meta.
     * @return void
     * @since  1.0.0
     * @access public
     */
    function turbo_toggle_header_menu($site_logo)
    {

        $logo = $site_logo ? '<img src="' . $site_logo . '" alt="' . __('Site logo', 'turbo') . '">' : '<span class="turbo-site-name">' . get_bloginfo('name') . '</span>';
        $markup = '
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="' . esc_url(home_url('/')) . '"  class="navbar-brand">
                    ' . $logo . '
                </a>
            </div>';
        return $markup;
    }
}

if (!function_exists('turbo_toggle_page_loader')) {
    /**
     * Markup for toggle nav
     *
     * @param array $args Arguments to pass to scholar_single_page_meta.
     * @return void
     * @since  1.0.0
     * @access public
     */
    function turbo_toggle_page_loader()
    {
        $global_options = turbo_extract_option_data(array(
            'toggle_loader' => array('enable', 'turbo-toggle-loader'),
            'loader_text' => array('Loading', 'loader_text_msg'),
        ));
        extract($global_options);

        if ($toggle_loader === 'enable') {
            return '
            <div class="turbo-loader">
                <div class="loader">
                    <div class="loader--dot"></div>
                    <div class="loader--dot"></div>
                    <div class="loader--dot"></div>
                    <div class="loader--dot"></div>
                    <div class="loader--dot"></div>
                    <div class="loader--dot"></div>
                    <div class="loader--text" data="' . $loader_text . '"></div>
                </div>
            </div>
            ';
        }
        return false;
    }
}


// if (!function_exists('turbo_listing_product_share_social')) {
//     function turbo_listing_product_share_social(){
//         $wrapper_class = 'turbo-product-share-list';
//         extract(turbo_extract_option_data(array(
//             'facebook'     => array( 'true', 'turbo_facebook_share' ),
//             'twitter'      => array( 'true', 'turbo_twitter_share' ),
//             'linkedin'     => array( 'true', 'turbo_linkedin_share' ),
//             'google'       => array( 'true', 'turbo_google_share' ),
//         )));
//         $social_shares = array(
//             'facebook'      => array( 'icon' => 'ion-social-facebook', 'is_enabled' => $facebook ),
//             'linkedin'      => array( 'icon' => 'ion-social-linkedin', 'is_enabled' => $linkedin ),
//             'twitter'       => array( 'icon' => 'ion-social-twitter', 'is_enabled' => $twitter ),
//             'google_plus'   => array( 'icon' => 'ion-social-googleplus', 'is_enabled' => $google ),
//         );
//         if( function_exists( 'turbo_product_social_share' ) ) :
//             $social_result = turbo_product_social_share( $post_id, $wrapper_class, $social_shares );
//             echo apply_filters( 'turbo_product_single_product_share', $social_result );
//         endif;

//     }
// }


if (!function_exists('turbo_product_social_share')) {
    /**
     * Social share links
     *
     * @param string $css_class
     * @return boolean
     * @since  1.0.0
     * @access public
     */
    function turbo_product_social_share($post_id, $wrapper_class = 'turbo-product-share-list', $profiles = array())
    {
        $share_link = get_the_permalink($post_id);
        $share_title = get_the_title($post_id);
        $social_shares = apply_filters('turbo_product_social_shares', array(
            'facebook'    => array(
                'label'        => isset($profiles['facebook']['label']) ? $profiles['facebook']['label'] : '',
                'url'          => 'https://www.facebook.com/sharer/sharer.php?u=' . $share_link,
                'icon'         => isset($profiles['facebook']['icon']) ? $profiles['facebook']['icon'] : '',
                'is_enabled'   => isset($profiles['facebook']['is_enabled']) ? $profiles['facebook']['is_enabled'] : 'false',
                'markup_class' => isset($profiles['facebook']['markup_class']) ? $profiles['facebook']['markup_class'] : 'turbo-facebook',
            ),
            'twitter'     => array(
                'label'        => isset($profiles['twitter']['label']) ? $profiles['twitter']['label'] : '',
                'url'          => 'https://twitter.com/intent/tweet?text=' . $share_title . '&amp;url=' . $share_link . '&amp;via=turbo',
                'icon'         => isset($profiles['twitter']['icon']) ? $profiles['twitter']['icon'] : '',
                'is_enabled'   => isset($profiles['twitter']['is_enabled']) ? $profiles['twitter']['is_enabled'] : 'false',
                'markup_class' => isset($profiles['twitter']['markup_class']) ? $profiles['twitter']['markup_class'] : 'turbo-twitter',
            ),
            'google_plus' => array(
                'label'        => isset($profiles['google_plus']['label']) ? $profiles['google_plus']['label'] : '',
                'url'          => 'https://plus.google.com/share?url=' . $share_link,
                'icon'         => isset($profiles['google_plus']['icon']) ? $profiles['google_plus']['icon'] : '',
                'is_enabled'   => isset($profiles['google_plus']['is_enabled']) ? $profiles['google_plus']['is_enabled'] : 'false',
                'markup_class' => isset($profiles['google_plus']['markup_class']) ? $profiles['google_plus']['markup_class'] : 'turbo-gplus',
            ),
            'linkedin'    => array(
                'label'        => isset($profiles['linkedin']['label']) ? $profiles['linkedin']['label'] : '',
                'url'          => 'https://www.linkedin.com/shareArticle?mini=true&url=' . $share_link . '&amp;title=' . $share_title,
                'icon'         => isset($profiles['linkedin']['icon']) ? $profiles['linkedin']['icon'] : '',
                'is_enabled'   => isset($profiles['linkedin']['is_enabled']) ? $profiles['linkedin']['is_enabled'] : 'false',
                'markup_class' => isset($profiles['linkedin']['markup_class']) ? $profiles['linkedin']['markup_class'] : 'turbo-linkedin',
            ),
        ));

        $result = turbo_product_social_share_markup($wrapper_class, $social_shares);
        $result = apply_filters('turbo_product_social_share_markup', $result, $social_shares);
        return $result;
    }
}


if (!function_exists('turbo_product_social_share_markup')) {
    /**
     * Social share markup
     *
     * @param array $social_shares
     * @return html
     * @since  1.0.0
     * @access public
     */
    function turbo_product_social_share_markup($wrapper_class, $social_shares)
    {
        $result = '<ul class="' . esc_attr($wrapper_class) . '">';
        foreach ($social_shares as $key => $value) {
            if ($value['is_enabled'] === 'true') {
                $value['markup_class'] = !empty($value['markup_class']) ? $value['markup_class'] : '';
                $result .= '<li class="' . $value['markup_class'] . '"><a target="_blank" href="' . $value['url'] . '">';
                if ($value['icon']) {
                    $result .= '<i class="' . $value['icon'] . '"></i>';
                }
                if ($value['label']) {
                    $result .= $value['label'];
                }
                $result .= '</a></li>';
            }
        }
        $result .= '</ul>';
        return $result;
    }
}
