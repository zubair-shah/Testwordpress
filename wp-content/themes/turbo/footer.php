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

// Header settings Work
global $post;
$footer_class = '';
$style = '';
$footer_style = '';
if (!empty($post)) {
    // Page Layout Work
    $choose_options_layout = get_post_meta($post->ID, '_turbo_general_layout', true);
    $choose_options_layout = $choose_options_layout ? $choose_options_layout : 'option_panel';
    if (is_page()) {
        if ($choose_options_layout != 'option_panel') {
            $local_options_layout = turbo_extract_page_meta_data(array(
                'choose_layout_container' => array('with_container', '_turbo_layout_control'),
            ));
            extract($local_options_layout);
        } else {
            $global_options_layout = turbo_extract_option_data(array(
                'choose_layout_container' => array('with_container', 'turbo_layout_control'),
            ));
            extract($global_options_layout);
        }
    } else {
        if ($choose_options_layout != 'option_panel') {
            $local_options_layout = turbo_extract_post_meta_data(array(
                'choose_layout_container' => array('with_container', '_turbo_layout_control'),
            ));
            extract($local_options_layout);
        } else {
            $global_options_layout = turbo_extract_option_data(array(
                'choose_layout_container' => array('with_container', 'turbo_layout_control'),
            ));
            extract($global_options_layout);
        }
    }


    $allowed_html = wp_kses_allowed_html('post');
    $choose_options = get_post_meta($post->ID, '_turbo_footer_options_from', true);
    $choose_options = $choose_options ? $choose_options : 'option_panel';
    if ($choose_options !== 'option_panel') :
        $footer_options = turbo_get_footer_settings(get_the_ID());
        extract($footer_options['options']);
        $footer_style = isset($footer_options['style']) ? $footer_options['style'] : '';
        $choose_footer_view = $choose_footer[0];
    else :
        $footer_options = turbo_get_footer_settings(get_the_ID());
        extract($footer_options['options']);
        $footer_style = isset($footer_options['style']) ? $footer_options['style'] : '';
        $choose_footer_view = $choose_footer;
    endif;
    if ($choose_footer_view === 'footer-three') {
        $footer_class = 'rq-listing-footer';
    } else {
        $footer_class = 'rq-footer';
    }
}

?>


<?php if (!is_singular('post')) : ?>
    <?php if (isset($choose_layout_container) && $choose_layout_container === 'with_container') { ?>
        </div> <!-- End container -->
    <?php } ?>
    </div> <!-- End rq-content-block -->
<?php endif; ?>
</div>


<footer class="<?php echo esc_attr($footer_class); ?>" style="<?php echo esc_attr($footer_style); ?>">
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
</footer>
</div>
<!-- end of #main-wrapper -->

<?php wp_footer(); ?>
</body>

</html>