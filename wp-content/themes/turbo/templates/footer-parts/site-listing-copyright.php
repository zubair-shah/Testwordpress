<?php
$style = '';
$choose_options = get_post_meta(get_the_ID(), '_turbo_copyright_options_from', true);
$choose_options = $choose_options ? $choose_options : 'option_panel';
$show_copyrights = 'true';
$show_social_pro = 'true';
$allowed_html = wp_kses_allowed_html('post');

if (is_page() && $choose_options != 'option_panel') :

    $local_options = turbo_extract_page_meta_data(array(
        'show_copyrights' => array('true', '_turbo_display_copyright'),
        'copyright_logo'  => array(REDQFW_IMAGE . '/main-logo.png', '_turbo_copyright_logo', 'url'),
        'copyright_bg_as' => array('color', '_turbo_copyright_bg_as'),
        'copyright_image' => array('', '_turbo_copyright_bg_image', 'url'),
        'copyright_color' => array('#000', '_turbo_copyright_bg_color'),
        'copyright_text'  => array('', '_turbo_copyright_text'),
    ));

    extract($local_options);

    $args = array(
        'bg_color'  => $copyright_color,
        'bg_image'  => isset($copyright_image) && !empty($copyright_image) ? $copyright_image : '',
        'bg_repeat' => 'repeat-x',
        'bg_size'   => 'cover',
    );
    $style = turbo_page_background($args);

else :

    extract(turbo_extract_option_data(array(
        'show_copyrights' => array('on', 'turbo_footer_copyright_switch'),
        'show_social_pro' => array('on', 'turbo_social_profile_switch'),
        'copyright_image' => array('', 'turbo_copyright_image', 'url'),
        'copyright_text'  => array('', 'turbo_copyright_text'),
    )));

    $args = array(
        'bg_color'  => '#000',
        'bg_image'  => '',
        'bg_repeat' => 'repeat-x',
        'bg_size'   => 'cover',
    );
    $style = turbo_background_css('turbo_copyright_background', $args);

endif;
?>
<?php if (isset($show_copyrights) && $show_copyrights === 'true') : ?>
    <div class="turbo-footer-listing-copyright-area" style="<?php echo esc_attr($style); ?>">
        <?php if (!empty($copyright_text)) { ?>
            <div class="turbo-footer-listing-copyright-text">
                <span> <?php echo wp_kses($copyright_text, $allowed_html); ?> </span>
            </div>
        <?php } else { ?>
            <div class="turbo-footer-listing-copyright-text">
                <span> <?php echo esc_html__('Copyright © 2018 REDQ,INC', 'turbo'); ?> </span>
            </div>
        <?php } ?>
    </div>
<?php endif; ?>