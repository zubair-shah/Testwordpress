<?php
$style = '';
$choose_options = get_post_meta(get_the_ID(), '_turbo_footer_options_from', true);
$choose_options = $choose_options ? $choose_options : 'option_panel';
$footer_widget_class = 'footer-widget';
if (is_page() && $choose_options != 'option_panel') {
    $local_options = turbo_extract_page_meta_data(array(
        'footer_logo'    => array(REDQFW_IMAGE . '/main-logo.png', '_turbo_footer_logo', 'url'),
        'show_footer'    => array('true', '_turbo_display_footer'),
        'show_widgets'   => array('true', '_turbo_display_footer_widgets'),
        'footer_bg_as'   => array('color', '_turbo_footer_bg_as'),
        'footer_image'   => array('', '_turbo_footer_bg_image', 'url'),
        'footer_color'   => array('#000', '_turbo_footer_bg_color'),
        'mobile_display' => array('toogle', '_turbo_footer_widget_mobile_display'), // local settings ... todo

    ));
    extract($local_options);
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
    $global_options = turbo_extract_option_data(array(
        'footer_logo'    => array(REDQFW_IMAGE . '/main-logo.png', 'footer-logo', 'url'),
        'show_footer'    => array('true', 'turbo_footer_switch'),
        'show_widgets'   => array('true', 'turbo_footer_widget_onoff'),
        'mobile_display' => array('toogle', 'turbo_footer_widget_mobile_display'),
    ));
    extract($global_options);
    $args = array(
        'bg_color'  => '#212020',
        'bg_image'  => '',
        'bg_repeat' => 'repeat-x',
        'bg_size'   => 'cover',
    );
    $style = turbo_background_css('turbo_footer_background', $args);
    if ($mobile_display == 'toggle') {
        $footer_widget_class .= ' footer-widget-toggle';
    }
}
?>
<?php if (isset($show_footer) && $show_footer === 'true') : ?>
    <div class="rq-listing-main-footer">
        <div class="turbo-footer-listing-logo-area">
            <?php if (isset($footer_logo) && !empty($footer_logo)) : ?>
                <div class="turbo-listing-footer-logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo esc_url($footer_logo); ?>" alt="<?php echo esc_html__('logo', 'turbo'); ?>">
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <div class="turbo-footer-listing-menu-area">
            <?php
            $footer_nav = array(
                'theme_location' => 'footer_navigation',
                'menu_class'     => 'menu',
                'menu_id'        => '',
                'echo'           => true,
                'items_wrap'     => '<ul id="%1$s" class="nav listing-footer-nav navbar-nav %2$s">%3$s</ul>',
                'depth'          => 4,
                'fallback_cb'    => 'turbo_nav_walker::fallback',
                'walker'         => new turbo_nav_walker()
            );
            wp_nav_menu($footer_nav);
            ?>
        </div>
    </div>
<?php endif; ?>