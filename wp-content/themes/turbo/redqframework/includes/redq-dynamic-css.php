<?php

/**
 * Display custom color CSS.
 */
function turbo_dynamic_css()
{
    global $post;
    global $turbo_option_data;
    $post_id = isset($post->ID) ? $post->ID : '';

    $body             = isset($turbo_option_data['turbo_body_typography']) ? $turbo_option_data['turbo_body_typography'] : [];
    $body_font_family = isset($body['font-family']) && $body['font-family'] !== '' ? $body['font-family'] : "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif";
    $body_font_size   = isset($body['font-size']) && $body['font-size'] !== '' ? $body['font-size'] : '16px';
    $body_font_weight = isset($body['font-weight']) && $body['font-weight'] !== '' ? $body['font-weight'] : '400';
    $body_font_style  = isset($body['font-style']) && $body['font-style'] !== '' ? $body['font-style'] : 'normal';

    $h1             = isset($turbo_option_data['turbo_h1_typography']) ? $turbo_option_data['turbo_h1_typography'] : [];
    $h1_font_family = isset($h1['font-family']) && $h1['font-family'] !== '' ? $h1['font-family'] : "inherit";
    $h1_font_size   = isset($h1['font-size']) && $h1['font-size'] !== '' ? $h1['font-size'] : '34px';
    $h1_font_weight = isset($h1['font-weight']) && $h1['font-weight'] !== '' ? $h1['font-weight'] : '700';
    $h1_font_style  = isset($h1['font-style']) && $h1['font-style'] !== '' ? $h1['font-style'] : 'normal';

    $h2             = isset($turbo_option_data['turbo_h2_typography']) ? $turbo_option_data['turbo_h2_typography'] : '';
    $h2_font_family = isset($h2['font-family']) && $h2['font-family'] !== '' ? $h2['font-family'] : "inherit";
    $h2_font_size   = isset($h2['font-size']) && $h2['font-size'] !== '' ? $h2['font-size'] : '30px';
    $h2_font_weight = isset($h2['font-weight']) && $h2['font-weight'] !== '' ? $h2['font-weight'] : '700';
    $h2_font_style  = isset($h2['font-style']) && $h2['font-style'] !== '' ? $h2['font-style'] : 'normal';

    $h3             = isset($turbo_option_data['turbo_h3_typography']) ? $turbo_option_data['turbo_h3_typography'] : [];
    $h3_font_family = isset($h3['font-family']) && $h3['font-family'] !== '' ? $h3['font-family'] : "inherit";
    $h3_font_size   = isset($h3['font-size']) && $h3['font-size'] !== '' ? $h3['font-size'] : '26px';
    $h3_font_weight = isset($h3['font-weight']) && $h3['font-weight'] !== '' ? $h3['font-weight'] : '700';
    $h3_font_style  = isset($h3['font-style']) && $h3['font-style'] !== '' ? $h3['font-style'] : 'normal';

    $h4             = isset($turbo_option_data['turbo_h4_typography']) ? $turbo_option_data['turbo_h4_typography'] : [];
    $h4_font_family = isset($h4['font-family']) && $h4['font-family'] !== '' ? $h4['font-family'] : "inherit";
    $h4_font_size   = isset($h4['font-size']) && $h4['font-size'] !== '' ? $h4['font-size'] : '22px';
    $h4_font_weight = isset($h4['font-weight']) && $h4['font-weight'] !== '' ? $h4['font-weight'] : '700';
    $h4_font_style  = isset($h4['font-style']) && $h4['font-style'] !== '' ? $h4['font-style'] : 'normal';

    $h5             = isset($turbo_option_data['turbo_h5_typography']) ? $turbo_option_data['turbo_h5_typography'] : [];
    $h5_font_family = isset($h5['font-family']) && $h5['font-family'] !== '' ? $h5['font-family'] : "inherit";
    $h5_font_size   = isset($h5['font-size']) && $h5['font-size'] !== '' ? $h5['font-size'] : '18px';
    $h5_font_weight = isset($h5['font-weight']) && $h5['font-weight'] !== '' ? $h5['font-weight'] : '700';
    $h5_font_style  = isset($h5['font-style']) && $h5['font-style'] !== '' ? $h5['font-style'] : 'normal';

    $h6             = isset($turbo_option_data['turbo_h6_typography']) ? $turbo_option_data['turbo_h6_typography'] : [];
    $h6_font_family = isset($h6['font-family']) && $h6['font-family'] !== '' ? $h6['font-family'] : "inherit";
    $h6_font_size   = isset($h6['font-size']) && $h6['font-size'] !== '' ? $h6['font-size'] : '18px';
    $h6_font_weight = isset($h6['font-weight']) && $h6['font-weight'] !== '' ? $h6['font-weight'] : '700';
    $h6_font_style  = isset($h6['font-style']) && $h6['font-style'] !== '' ? $h6['font-style'] : 'normal';


    //Color scheme section
    extract(turbo_extract_option_data(array(
        'color_primary'         => array('#ff992e', 'turbo_primary_color'),
        'color_primary_hover'   => array('#ff992e', 'turbo_primary_color_hover'),
        'color_secondary'       => array('#fef5ed', 'turbo_secondary_color'),
        'color_menu_text'       => array('#2d3748', 'turbo_menu_text_color'),
        'color_menu_text_hover' => array('#10202c', 'turbo_menu_text_hover_color'),
        'heading_color'         => array('#2d3748', 'turbo_heading_color'),
        'banner_heading_color'  => array('#2d3748', 'turbo_banner_heading_color'),
        'color_text_banner'     => array('#4a5568', 'turbo_banner_text_color'),
        'color_text_main'       => array('#4a5568', 'turbo_text_main_color'),
        'color_text_light'      => array('#718096', 'turbo_text_light_color'),
        'color_link'            => array('#2d3748', 'turbo_link_color'),
        'color_link_hover'      => array('#10202c', 'turbo_link_color_hover'),
        'loader_text'           => array('#2d3748', 'loader_text_color'),
        'loader_bg'             => array('#ffffff', 'loader_bg_color'),
    )));

    $custom_css = "
    :root {
        --color__primary: " . $color_primary . ";
        --color__primary-hover: " . $color_primary_hover . ";
        --color__secondary: " . $color_secondary . ";
        --color__menu-text: " . $color_menu_text . ";
        --color__menu-text_hover: " . $color_menu_text_hover . ";
        --heading__color: " . $heading_color . ";
        --banner__heading-color: " . $banner_heading_color . ";
        --color__text-banner: " . $color_text_banner . ";
        --color__text-main: " . $color_text_main . ";
        --color__text-light: " . $color_text_light . ";
        --color__link: " . $color_link . ";
        --color__link-hover: " . $color_link_hover . ";
        --color__loader-bg: " . $loader_bg . ";
        --color__loader-text: " . $loader_text . ";

        --font__main: " . $body_font_family . ";
        --base__font-size: " . $body_font_size . ";
        --base__font-weight: " . $body_font_weight . ";
        --base__font-style: " . $body_font_style . ";

        --h1__font-family: " . $h1_font_family . ";
        --h1__font-size: " . $h1_font_size . ";
        --h1__font-weight: " . $h1_font_weight . ";
        --h1__font-style: " . $h1_font_style . ";

        --h2__font-family: " . $h2_font_family . ";
        --h2__font-size: " . $h2_font_size . ";
        --h2__font-weight: " . $h2_font_weight . ";
        --h2__font-style: " . $h2_font_style . ";

        --h3__font-family: " . $h3_font_family . ";
        --h3__font-size: " . $h3_font_size . ";
        --h3__font-weight: " . $h3_font_weight . ";
        --h3__font-style: " . $h3_font_style . ";

        --h4__font-family: " . $h4_font_family . ";
        --h4__font-size: " . $h4_font_size . ";
        --h4__font-weight: " . $h4_font_weight . ";
        --h4__font-style: " . $h4_font_style . ";

        --h5__font-family: " . $h5_font_family . ";
        --h5__font-size: " . $h5_font_size . ";
        --h5__font-weight: " . $h5_font_weight . ";
        --h5__font-style: " . $h5_font_style . ";

        --h6__font-family: " . $h6_font_family . ";
        --h6__font-size: " . $h6_font_size . ";
        --h6__font-weight: " . $h6_font_weight . ";
        --h6__font-style: " . $h6_font_style . ";
    } 
    ";

    //Header section
    $header_options = turbo_get_header_settings($post_id);
    $options = isset($header_options['options']) ? $header_options['options'] : [];
    extract($options);
    $header_style = $header_options['style'];

    $custom_css .= ".header:not(.transparent-header) nav.navbar {
        {$header_style};
    }";
    $custom_css .= ".header.transparent-header.sticky nav.navbar {
        {$header_style};
    }";
    // $custom_css .= ".header.default-header.sticky-header.sticky nav.navbar.navbar-default{
    //     {$header_style};
    // }";
    // $custom_css .= ".header.default-header.non-sticky-header nav.navbar.navbar-default{
    //     {$header_style};
    // }";
    // $custom_css .= ".header.transparent-header.sticky-header.sticky nav.navbar.navbar-default {
    //     {$header_style};
    //     @media only screen and (max-width: 991px) {
    //       .header.transparent-header.sticky-header nav.navbar.navbar-default .navbar-collapse {
    //         {$header_style};
    //       }
    //     }
    // }";

    //Banner section
    $banner_options = turbo_get_banner_settings($post_id);
    extract($banner_options['options']);
    $banner_style = $banner_options['style'];

    $custom_css .= "
        .inner-page-banner:not(.no-banner-image) {
        $banner_style        
        } 
        .inner-page-banner{
            padding: $banner_padding;
            height: $banner_height;
        } 
    ";
    if ($banner_overlay === 'true') {
        $custom_css .= "
            .inner-page-banner .rq-overlay {
                background: $overlay_bg;
            }        
        ";
    }
    wp_add_inline_style('custom-style', $custom_css);
}

add_action('wp_enqueue_scripts', 'turbo_dynamic_css');
