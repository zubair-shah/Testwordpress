<!DOCTYPE html>
<html <?php 'language_attributes'(); ?> class="no-js" lang="">

<head>
    <meta charset="<?php 'bloginfo'('charset'); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo 'get_the_title'() . ' | Cable TV & Internet Deals' . 'get_bloginfo'('description'); ?></title>
    
    <link rel="shortcut icon" type="image/x-icon" href="<?php 'bloginfo'('template_directory') ?>/assets/img/fav-icon.png">

    <link rel="stylesheet" type="text/css" href="style.css">
</head>
 <?php 'wp_head'(); ?>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="#"><img src="<?php 'bloginfo'('template_directory') ?>/assets/img/logo.png" width="250"></a>
                    </div>
                </div>
                <div class="col-md-9">
                    <nav class="nav-new">
                        <ul>
                            <li><a href="<?php echo 'esc_url'('home_url'('#about-us')); ?>">Who We Are</a></li>
                            <li><a href="#find-deals">Internet Provider</a></li>
                            <li><a href="#services">Services</a></li>
                            <li><a href="#popular-cities">Popular Cities</a></li>
                            <li><a href="#how-it-work">How we Serve</a></li>
                            <li><a href="#packages">Packages</a></li>
                            <li><a href="tel:+8332095121" class="callnow"><i class="fa fa-phone-volume"> </i>(833)
                                    209-5121</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Mobile Navigation Start-->
    <div class="mobile-nav" id="nav">
        <a href="index.html">
            <div class="mob-nav-logo ptpx-15 pbpx-15 plpx-15 prpx-15">
                <a href="#"><img class="m-auto" style="width: 450px;" src="assets/img/mob-logo.png"></a>
            </div>
        </a>
        <nav>
            <div>
                <ul class="tt-uppercase">
                    <li><a href="#about-us">Who We Are</a></li>
                    <li><a href="#find-deals">Internet Provider</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#popular-cities">Popular Cities</a></li>
                    <li><a href="#how-it-work">How we Serve</a></li>
                    <li><a href="#packages">Packages</a></li>
                    <li><a href="+8332095121" class="callnow"><i class="fa fa-phone-volume prpx-15"> </i>Call Now</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="mobile-nav-btn">
        <span class="lines"></span>
    </div>