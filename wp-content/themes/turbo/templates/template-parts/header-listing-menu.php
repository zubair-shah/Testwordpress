<?php
global $post;
$post_id = isset($post->ID) ? $post->ID : '';
$header_options = turbo_get_header_settings($post_id);
extract($header_options['options']);
$header_style = $header_options['style'];
$header_css_class = $header_type . ' ' . $is_sticky;
$is_sticky_id = $is_sticky === 'sticky-header' ? 'sticker' : 'non-sticker';
if (isset($header_type) && $header_type === 'transparent-header') {
    $header_style = '';
}
?>

<header class="header rq-listing-header <?php echo esc_attr($header_css_class); ?>">
    <nav class="navbar" id="<?php echo esc_attr($is_sticky_id); ?>" style="<?php echo esc_attr($header_style); ?>">
        <div class="container-fluid">
            <?php echo turbo_toggle_header_menu($site_logo); ?>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="collapse-inner">
                    <span class="rq-listing-nav-close">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </span>
                    <?php
                    $defaults = array(
                        'theme_location' => 'primary_navigation',
                        'menu_class'     => 'menu',
                        'menu_id'        => '',
                        'echo'           => true,
                        'items_wrap'     => '<ul id="%1$s" class="nav navbar-nav navbar-center %2$s">%3$s</ul>',
                        'depth'          => 4,
                        'fallback_cb'    => 'turbo_nav_walker::fallback',
                        'walker'         => new turbo_nav_walker()
                    );
                    wp_nav_menu($defaults);
                    ?>

                    <?php if (isset($header_right_menu) && $header_right_menu === 'yes') : ?>
                        <ul class="rq-listing-header-profile">

                            <?php if (isset($header_mini_cart) && $header_mini_cart === 'yes' && class_exists('woocommerce')) : ?>
                                <li class="turbo-mini-cart">
                                    <span class="cart-counter">
                                        <i class="fas fa-shopping-cart"></i> <span><?php echo WC()->cart->cart_contents_count; ?></span>
                                    </span>
                                    <?php turbo_mini_cart(); ?>
                                </li>
                            <?php endif; ?>

                            <?php if (isset($header_login) && $header_login === 'yes') : ?>
                                <?php
                                $current_user = get_current_user_id();
                                $args = array(
                                    'class' => array('rq-listing-avatar')
                                );
                                $account_text = is_user_logged_in() ? __('My Account', 'turbo') : __('Login / Register', 'turbo');
                                $account_icon = is_user_logged_in() ? 'fas fa-tachometer-alt' : 'fas fa-sign-in-alt';
                                ?>

                                <?php if (is_user_logged_in()) { ?>
                                    <li class="rq-listing-profile-link">
                                        <span class="rq-listing-profile-img">
                                            <?php echo get_avatar($current_user, 32, null, null, null); ?>
                                        </span>
                                        <ul class="rq-listing-profile-link-drop">
                                            <li>
                                                <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                                                    <?php echo esc_html__('Account', 'turbo'); ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>">
                                                    <?php echo esc_html__('Cart', 'turbo'); ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo get_permalink(get_option('woocommerce_shop_page_id')); ?>">
                                                    <?php echo esc_html__('Shop', 'turbo'); ?>
                                                </a>
                                            </li>
                                            <?php if (is_user_logged_in()) { ?>
                                                <li>
                                                    <a href="<?php echo wp_logout_url(get_permalink(wc_get_page_id('myaccount'))) ?>">
                                                        <?php echo esc_html__('Log Out', 'turbo'); ?>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                <?php } else { ?>
                                    <li class="login-register-link right-side-link">
                                        <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                                            <?php echo esc_html__('Sign in / Sign up', 'turbo'); ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            <?php endif; ?>

                            <?php
                            if (isset($header_lang) && $header_lang === 'yes') {
                                include_once(ABSPATH . 'wp-admin/includes/plugin.php');
                                if (class_exists('SitePress') && $header_lang == 'yes') :
                                    turbo_wpml_languages('right-side-link');
                                endif;
                            }
                            ?>

                            <?php if (isset($header_currency) && $header_currency === 'disabled') : ?>
                                <li class="dropdown right-side-link last">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">USD
                                        <svg class="rq-chevron-down" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </a>
                                    <ul class="dropdown-menu with-language">
                                        <li><a href="#">USD</a></li>
                                        <li><a href="#">Eur</a></li>
                                    </ul>
                                </li>
                            <?php endif; ?>

                        </ul>
                    <?php endif; ?>
                </div>
            </div>

            <?php if (isset($header_mini_cart) && $header_mini_cart === 'yes' && class_exists('woocommerce')) : ?>
                <div class="turbo-mini-cart hidden-md">
                    <span class="cart-counter">
                        <i class="fas fa-shopping-cart"></i> <span><?php echo WC()->cart->cart_contents_count; ?></span>
                    </span>
                    <?php turbo_mini_cart(); ?>
                </div>
            <?php endif; ?>
        </div>
    </nav>
    <?php if (isset($header_sticky_offset) && $header_sticky_offset === 'yes') : ?>
        <div class="sticky-nav-offset"></div>
    <?php endif; ?>
</header>