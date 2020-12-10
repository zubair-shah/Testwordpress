<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage turbo
 * @since 1.0
 */

$turbo_option_data = turbo_get_option_data();
$style = '';
$choose_options = get_post_meta(get_the_ID(), '_turbo_footer_options_from', true);
$choose_options = $choose_options ? $choose_options : 'option_panel';
$footer_widget_class = 'footer-widget';
if (is_page() && $choose_options != 'option_panel') :
    $local_options = turbo_extract_page_meta_data(array(
        'show_footer'    => array('true', '_turbo_display_footer'),
        'footer_logo'    => array(REDQFW_IMAGE . '/main-logo.png', '_turbo_footer_logo', 'url'),
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
endif;

?>

<?php if (!is_singular('post')) : ?>
    </div> <!-- End container -->
    </div> <!-- End rq-content-block -->
<?php endif; ?>
</div>
</div>


<footer class="rq-listing-footer">
    <div class="footer-listing-wrapper" style="<?php echo esc_attr($style); ?>">
        <?php

        /**
         * Scholar Footer hook.
         *
         * @hooked none - 10
         */
        do_action('turbo_before_footer');

        /**
         * Scholar Footer hook.
         *
         * @hooked turbo_main_footer_func - 10
         */
        do_action('turbo_main_footer');

        /**
         * Scholar top navigation hook.
         *
         * @hooked none - 10
         */
        do_action('turbo_site_copyright_info');

        /**
         * Scholar Footer hook.
         *
         * @hooked none - 10
         */
        do_action('turbo_after_footer');
        ?>
    </div>
</footer>


<?php wp_footer(); ?>

</body>

</html>