<?php

$style = '';
$choose_options = get_post_meta(get_the_ID(), '_turbo_footer_options_from', true);
$choose_options = $choose_options ? $choose_options : 'option_panel';
$footer_widget_class = 'footer-widget';

if (is_page() && $choose_options != 'option_panel') :

    $local_options = turbo_extract_page_meta_data(array(
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

else :

    $global_options = turbo_extract_option_data(array(
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


endif;
?>


<?php if (isset($show_footer) && $show_footer === 'true') : ?>
    <div class="rq-main-footer" style="<?php echo esc_attr($style); ?>">
        <div class="container">
            <?php if ($mobile_display == 'toggle') : ?>
                <button class="toggle-widget"><?php echo esc_html__('Footer widget', 'turbo'); ?></button>
            <?php endif ?>
            <div class="<?php echo esc_attr(trim($footer_widget_class)); ?>">
                <div class="row">
                    <?php
                    if (is_active_sidebar('turbo_footer_widget') && $show_widgets === 'true'):
                        dynamic_sidebar('turbo_footer_widget');
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

