<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
    if (function_exists('wp_body_open')) {
        wp_body_open();
    } else {
        do_action('wp_body_open');
    }
    ?>

    <?php
    // Header settings Work
    global $post;
    if (!empty($post)) {
        $choose_options = get_post_meta($post->ID, '_turbo_general_layout', true);
        $choose_options = $choose_options ? $choose_options : 'option_panel';
        if (is_page()) {
            if ($choose_options != 'option_panel') {
                $local_options = turbo_extract_page_meta_data(array(
                    'choose_container' => array('with_container', '_turbo_layout_control'),
                ));
                extract($local_options);
            } else {
                $global_options = turbo_extract_option_data(array(
                    'choose_container' => array('with_container', 'turbo_layout_control'),
                ));
                extract($global_options);
            }
        } else {
            if ($choose_options != 'option_panel') {
                $local_options = turbo_extract_post_meta_data(array(
                    'choose_container' => array('with_container', '_turbo_layout_control'),
                ));
                extract($local_options);
            } else {
                $global_options = turbo_extract_option_data(array(
                    'choose_container' => array('with_container', 'turbo_layout_control'),
                ));
                extract($global_options);
            }
        }

        // WooCommerce Normal or listing Layout control
        if (!is_page()) {
            $choose_layout_options = get_post_meta($post->ID, '_general_options_from', true);
            $choose_layout_options = $choose_layout_options ? $choose_layout_options : 'option_panel';
            if ($choose_layout_options != 'option_panel') {
                $local_layout_options = turbo_extract_post_meta_data(array(
                    'choose_layout' => array('normal_layout', '_layout_options_settings'),
                ));
                extract($local_layout_options);
            } else {
                $global_layout_options = turbo_extract_option_data(array(
                    'choose_layout' => array('normal_layout', 'turbo_woocommerce_layout'),
                ));
                extract($global_layout_options);
            }
        } else {
            $choose_layout_options = get_post_meta($post->ID, '_turbo_woocommerce_options_form', true);
            $choose_layout_options = $choose_layout_options ? $choose_layout_options : 'option_panel';
            if ($choose_layout_options != 'option_panel') {
                $local_layout_options = turbo_extract_page_meta_data(array(
                    'choose_layout' => array('normal_layout', '_turbo_woocommerce_layout'),
                ));
                extract($local_layout_options);
            } else {
                $global_layout_options = turbo_extract_option_data(array(
                    'choose_layout' => array('normal_layout', 'turbo_woocommerce_layout'),
                ));
                extract($global_layout_options);
            }
        }
    }
    ?>

    <?php echo turbo_toggle_page_loader(); ?>

    <!-- Start main wrapper  -->
    <div id="main-wrapper">
        <?php
        /**
         * Turbo Menu hook.
         *
         * @hooked turbo_choose_menu - 10
         */
        do_action('turbo_choose_menu');
        ?>
        <div class="rq-page-content">
            <?php
            /**
             * Turbo Top Banner hook.
             *
             * @hooked turbo_choose_top_banner - 10
             */
            do_action('turbo_top_banner');

            $block_css_class = isset($choose_layout) && $choose_layout === 'normal_layout' ? 'rq-content-block' :  '';
            ?>
            <?php if (!is_singular('post')) : ?>
                <div class="rq-listing-page <?php echo esc_attr($block_css_class); ?>">
                    <?php if (is_home() || isset($choose_container) && $choose_container === 'with_container') : ?>
                        <div class="container">
                        <?php endif; ?>
                    <?php endif; ?>