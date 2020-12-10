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
?>
<?php $turbo_option_data = turbo_get_option_data(); ?>

</div>
</div> <!-- end #main-wrapper -->

<footer class="rq-footer">

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


<?php wp_footer(); ?>

</body>
</html>
