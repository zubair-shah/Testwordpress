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
<!-- Start main wrapper  -->
<div id="main-wrapper">
    <?php //get_template_part('templates/template-parts/header-listing', 'menu'); ?>
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
         * Scholar Footer hook.
         *
         * @hooked turbo_choose_top_banner - 10
         */
        do_action('turbo_top_banner');
        ?>
        <?php if (!is_singular('post')) : ?>
        <div class="rq-content-block rq-listing-view">
            <div class="container">
<?php endif; ?>