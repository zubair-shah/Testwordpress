<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>
<html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->

<html class="no-js" <?php language_attributes(); ?>>

<!--<![endif]-->

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

    <?php echo turbo_toggle_page_loader(); ?>

    <!-- Start main wrapper  -->
    <div id="main-wrapper">
        <?php //get_template_part('templates/template-parts/header', 'menu'); 
        ?>
        <?php
        /**
         * Turbo Menu hook.
         *
         * @hooked turbo_choose_menu - 10
         */
        do_action('turbo_choose_menu');
        ?>