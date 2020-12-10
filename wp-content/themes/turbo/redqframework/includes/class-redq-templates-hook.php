<?php

class Turbo_Theme_Functions
{

    public function __construct()
    {
        add_action('turbo_choose_menu', array($this, 'turbo_choose_menu_view'), 10, 1);
        add_action('turbo_top_banner', array($this, 'turbo_choose_top_banner'), 10, 1);
        add_action('turbo_main_footer', array($this, 'turbo_footer_selector'), 10, 1);
        add_action('turbo_site_copyright_info', array($this, 'turbo_site_copyright_info_func'), 10, 1);
    }

    /**
     * Initialize menu chooser
     *
     * @param null
     * @return template files that are located redq-framwork/template-parts/post directory
     * @version 1.0.0
     * @since 1.0.0
     * @access public
     */
    public static function turbo_choose_menu_view()
    {
        $choose_options = get_post_meta(get_the_ID(), '_turbo_header_options_from', true);
        $choose_options = $choose_options ? $choose_options : 'option_panel';

        if (is_page()) {
            if ($choose_options !== 'option_panel') :
                extract(turbo_extract_page_meta_data(array(
                    'choose_menu' => array('header-menu', '_turbo_header_view'),
                )));
            else :
                extract(turbo_extract_option_data(array(
                    'choose_menu' => array('header-menu', 'turbo_header_view_type'),
                )));
            endif;
        } else {
            if ($choose_options !== 'option_panel') :
                extract(turbo_extract_post_meta_data(array(
                    'choose_menu' => array('header-menu', '_turbo_header_view'),
                )));
            else :
                extract(turbo_extract_option_data(array(
                    'choose_menu' => array('header-menu', 'turbo_header_view_type'),
                )));
            endif;
        }

        switch ($choose_menu) {
            case 'header-listing-menu':
                get_template_part(TURBO_TEMPLATE_DIR . 'template-parts/header-listing', 'menu');
                break;
            case 'header-menu':
                get_template_part(TURBO_TEMPLATE_DIR . 'template-parts/header', 'menu');
                break;
            default:
                get_template_part(TURBO_TEMPLATE_DIR . 'template-parts/header', 'menu');
                break;
        }
    }

    /**
     * Initialize banner chooser
     *
     * @param null
     * @return template files that are located redq-framwork/template-parts/post directory
     * @version 1.0.0
     * @since 1.0.0
     * @access public
     */
    public function turbo_choose_top_banner()
    {
        if (class_exists('woocommerce') && is_product()) {
            extract(turbo_extract_option_data(array(
                'choose_banner' => array('product-banner-two', 'turbo_product_multi_banner'),
            )));
            get_template_part(TURBO_TEMPLATE_DIR . 'banner-parts/' . $choose_banner);
        } else {
            $choose_options = get_post_meta(get_the_ID(), '_turbo_banner_options_from', true);
            $choose_options = $choose_options ? $choose_options : 'option_panel';

            if (is_page() && $choose_options !== 'option_panel') :
                extract(turbo_extract_page_meta_data(array(
                    'choose_banner' => array('banner-one', '_turbo_choose_banner'),
                )));
            else :
                extract(turbo_extract_option_data(array(
                    'choose_banner' => array('banner-one', 'turbo_multi_banner'),
                )));
            endif;

            get_template_part(TURBO_TEMPLATE_DIR . 'banner-parts/' . $choose_banner);
        }
    }

    /**
     * Initialize blog layout chooser
     *
     * @param null
     * @return template files that are located redq-framwork/template-parts/post directory
     * @version 1.0.0
     * @since 1.0.0
     * @access public
     */
    public function turbo_footer_selector()
    {
        // global $post;
        // $choose_options = get_post_meta( get_the_ID(), '_turbo_footer_options_from', true );
        // $choose_options = $choose_options ? $choose_options : 'option_panel';
        // if( is_page()  && $choose_options !== 'option_panel' ) :
        //     extract(turbo_extract_page_meta_data(array(
        //         'choose_footer' => array('footer-one', '_turbo_choose_footer' ),
        //     )));
        //     $choose_footer = $choose_footer[0];
        // else:
        //     extract(turbo_extract_option_data(array(
        //         'choose_footer' => array('footer-one', 'turbo_multi_footer' ),
        //     )));
        // endif;

        $choose_options = get_post_meta(get_the_ID(), '_turbo_footer_options_from', true);
        $choose_options = $choose_options ? $choose_options : 'option_panel';
        if ($choose_options !== 'option_panel') :
            $footer_options = turbo_get_footer_settings(get_the_ID());
            extract($footer_options['options']);
            $choose_footer_view = $choose_footer[0];
        else :
            $footer_options = turbo_get_footer_settings(get_the_ID());
            extract($footer_options['options']);
            $choose_footer_view = $choose_footer;
        endif;

        get_template_part(TURBO_TEMPLATE_DIR . 'footer-parts/' . $choose_footer_view);
    }


    /**
     * Initialize blog layout chooser
     *
     * @param null
     * @return template files that are located redq-framwork/template-parts/post directory
     * @version 1.0.0
     * @since 1.0.0
     * @access public
     */
    public function turbo_site_copyright_info_func()
    {
        $choose_options = get_post_meta(get_the_ID(), '_turbo_copyright_options_from', true);
        $choose_options = $choose_options ? $choose_options : 'option_panel';

        if (is_page() && $choose_options !== 'option_panel') :
            extract(turbo_extract_page_meta_data(array(
                'choose_copyright' => array('site-copyright', '_turbo_choose_copyright'),
            )));
            $choose_copyright = $choose_copyright[0];
        else :
            extract(turbo_extract_option_data(array(
                'choose_copyright' => array('site-copyright', 'turbo_footer_copyright_view'),
            )));
        endif;

        get_template_part(TURBO_TEMPLATE_DIR . 'footer-parts/' . $choose_copyright);
    }
}

new Turbo_Theme_Functions();
