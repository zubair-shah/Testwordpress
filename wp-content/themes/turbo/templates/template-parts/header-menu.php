<?php
global $post;
$post_id = isset($post->ID) ? $post->ID : '';
$header_options = turbo_get_header_settings($post_id);

extract($header_options['options']);

$header_style = $header_options['style'];
$header_css_class = $header_type . ' ' . $is_sticky;
$is_sticky_id = $is_sticky === 'sticky-header' ? 'sticker' : 'non-sticker';
$nav_right_class = '';
if (isset($header_mini_cart) && $header_mini_cart === 'yes' && class_exists('woocommerce')) {
    $nav_right_class = 'turbo-mini-cart--active';
}

?>
<header class="header <?php echo esc_attr($header_css_class); ?>">
    <nav class="navbar" id="<?php echo esc_attr($is_sticky_id); ?>">
        <div class="container">
            <?php echo turbo_toggle_header_menu($site_logo); ?>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php
                $defaults = array(
                    'theme_location' => 'primary_navigation',
                    'menu_class'     => 'menu',
                    'menu_id'        => '',
                    'echo'           => true,
                    'items_wrap'     => '<div class="menu-turbo-menu-container"><ul id="%1$s" class="nav navbar-nav navbar-center %2$s">%3$s</ul></div>',
                    'depth'          => 4,
                    'fallback_cb'    => 'turbo_nav_walker::fallback',
                    'walker'         => new turbo_nav_walker()
                );
                wp_nav_menu($defaults);
                ?>

                <?php if (isset($header_right_menu) && $header_right_menu === 'yes') : ?>
                    <ul class="nav navbar-nav navbar-right <?php echo $nav_right_class ?> ">
                        <?php if (isset($header_login) && $header_login === 'yes') : ?>
                            <?php
                            $account_text = is_user_logged_in() ? __('My Account', 'turbo') : __('Login / Register', 'turbo');
                            $account_icon = is_user_logged_in() ? 'fas fa-tachometer-alt' : 'fas fa-sign-in-alt';
                            ?>
                            <li class="login-register-link right-side-link">
                                <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>" title="<?php echo esc_attr($account_text); ?>"><i class="<?php echo esc_attr($account_icon); ?>"></i><?php echo esc_attr($account_text); ?>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php
                        if (isset($header_lang) && $header_lang === 'yes') {
                            include_once(ABSPATH . 'wp-admin/includes/plugin.php');
                            if (class_exists('SitePress') && $header_lang == 'yes') :
                                turbo_wpml_languages('right-side-link');
                            endif;
                        }
                        ?>

                        <?php if (isset($header_mini_cart) && $header_mini_cart === 'yes' && class_exists('woocommerce')) : ?>
                            <li class="turbo-mini-cart">
                                <span class="cart-counter">
                                    <i class="fas fa-shopping-cart"></i> <span><?php echo WC()->cart->cart_contents_count; ?></span>
                                </span>
                                <?php turbo_mini_cart(); ?>
                            </li>
                        <?php endif; ?>
                    </ul>
                <?php endif; ?>
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