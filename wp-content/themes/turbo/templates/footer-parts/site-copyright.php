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
        'show_copyrights' => array('true', 'turbo_footer_copyright_switch'),
        'show_social_pro' => array('true', 'turbo_social_profile_switch'),
        'copyright_image' => array('', 'turbo_copyright_image', 'url'),
        'copyright_text'  => array(__('© 2020 Turbo, Inc. All Right Reserved', 'turbo'), 'turbo_copyright_text'),
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
    <div class="rq-copyright-section" style="<?php echo esc_attr($style); ?>">
        <div class="container">
            <div class="copyright-content">
                <p>
                    <?php if (isset($copyright_image) && !empty($copyright_image)) : ?>
                        <?php
                        $attachment_id = attachment_url_to_postid($copyright_image);
                        // $copyright_image =  turbo_resize_image($attachment_id, '', 50, 25, true)['url'];
                        ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo esc_url($copyright_image); ?>" alt="<?php echo esc_html__('logo', 'turbo'); ?>">
                        </a>
                    <?php endif; ?>
                    <?php echo wp_kses($copyright_text, $allowed_html); ?>
                </p>
                <?php
                if (isset($show_social_pro) && $show_social_pro === 'true') :
                    turbo_social_profile();
                endif;
                ?>
            </div>
        </div>
    </div>
<?php endif; ?>