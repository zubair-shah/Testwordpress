<?php

$style = '';
$choose_options = get_post_meta(get_the_ID(), '_turbo_footer_options_from', true);
$choose_options = $choose_options ? $choose_options : 'option_panel';

if (is_page() && $choose_options != 'option_panel') :

    $local_options = turbo_extract_page_meta_data(array(
        'show_footer'  => array('true', '_turbo_display_footer'),
        'footer_logo'  => array(REDQFW_IMAGE . '/main-logo.png', '_turbo_footer_logo', 'url'),
        'show_widgets' => array('true', '_turbo_display_footer_widgets'),
        'footer_bg_as' => array('color', '_turbo_footer_bg_as'),
        'footer_image' => array('', '_turbo_footer_bg_image', 'url'),
        'footer_color' => array('#000', '_turbo_footer_bg_color'),
    ));

    extract($local_options);

    $show_social_pro = 'true';

    $args = array(
        'bg_color'  => $footer_color,
        'bg_image'  => isset($footer_image) && !empty($footer_image) ? $footer_image : '',
        'bg_repeat' => 'repeat-x',
        'bg_size'   => 'cover',
    );

    $style = turbo_page_background($args);

else :

    $global_options = turbo_extract_option_data(array(
        'footer_logo'     => array(REDQFW_IMAGE . '/main-logo.png', 'footer-logo', 'url'),
        'show_footer'     => array('true', 'turbo_footer_switch'),
        'show_widgets'    => array('true', 'turbo_footer_widget_onoff'),
        'show_social_pro' => array('true', 'turbo_social_profile_switch'),
    ));

    extract($global_options);

    $args = array(
        'bg_color'  => '#212020',
        'bg_image'  => '',
        'bg_repeat' => 'repeat-x',
        'bg_size'   => 'cover',
    );
    $style = turbo_background_css('turbo_footer_background', $args);

endif;
?>


<?php if (isset($show_footer) && $show_footer === 'true') : ?>
    <div class="rq-main-footer" style="<?php echo esc_attr($style); ?>">
        <div class="container">

            <?php if (isset($footer_logo) && !empty($footer_logo)) : ?>
                <div class="secondary-footer-logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo esc_url($footer_logo); ?>"
                             alt="<?php echo esc_html__('logo', 'turbo'); ?>">
                    </a>
                </div>
            <?php endif; ?>

            <?php
            if (isset($show_social_pro) && $show_social_pro === 'true') :
                turbo_footer_social_profile();
            endif;
            ?>
        </div>
    </div>
<?php endif; ?>