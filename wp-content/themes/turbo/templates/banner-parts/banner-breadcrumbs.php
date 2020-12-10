<?php

$style = '';
$choose_options = get_post_meta(get_the_ID(), '_turbo_banner_options_from', true);
$choose_options = $choose_options ? $choose_options : 'option_panel';
$arrow_sign = '&#x2192;';

if (is_page() && $choose_options != 'option_panel') :

    $local_options = turbo_extract_page_meta_data(array(
        'show_breadcrumbs' => array('true', '_turbo_display_breadcrumbs'),
        'arrow_sign'       => array('&#x2192;', '_turbo_breadcrumbs_delimeter'),
    ));

    extract($local_options);

else :

    extract(turbo_extract_option_data(array(
        'show_breadcrumbs' => array('on', 'turbo_breadcrumbs_switch'),
    )));

endif;

?>


<?php if (is_home() || is_front_page()) : ?>

    <h2 class="rq-title"><?php esc_html_e('Blog', 'turbo'); ?></h2>

<?php elseif (is_category()) : ?>

    <h2 class="rq-title"><?php printf(__('Category Archives: %s', 'turbo'), '<span>' . single_cat_title('', false) . '</span>'); ?></h2>

<?php elseif (is_tag()) : ?>

    <h2 class="rq-title"><?php printf(__('Tag Archives: %s', 'turbo'), '<span>' . single_tag_title('', false) . '</span>'); ?></h2>

<?php elseif (is_author()) : ?>

    <?php
    $curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
    ?>

    <h2 class="rq-title"><?php esc_html_e('Posts written by: ', 'turbo'); ?><?php echo esc_attr($curauth->display_name); ?></h2>

<?php elseif (is_404()) : ?>

    <h2 class="rq-title"><?php esc_html_e('Error 404', 'turbo'); ?></h2>

<?php elseif (is_archive()) : ?>

    <?php if (is_woocommerce_activated() && is_shop()) : ?>
        <h2 class="rq-title"><?php woocommerce_page_title(); ?></h2>
    <?php else : ?>
        <?php if (is_day()) : ?>
            <h2 class="rq-title"><?php printf(__('Daily Archives: <span>%s</span>', 'turbo'), get_the_date()); ?></h2>
        <?php elseif (is_month()) : ?>
            <h2 class="rq-title"><?php printf(__('Monthly Archives: <span>%s</span>', 'turbo'), get_the_date(_x('F Y', 'monthly archives date format', 'turbo'))); ?></h2>
        <?php elseif (is_year()) : ?>
            <h2 class="rq-title"><?php printf(__('Yearly Archives: <span>%s</span>', 'turbo'), get_the_date(_x('Y', 'yearly archives date format', 'turbo'))); ?></h2>
        <?php else : ?>
            <h2 class="rq-title"><?php esc_html_e('Blog Archives', 'turbo'); ?></h2>
        <?php endif; ?>
    <?php endif; ?>

<?php elseif (is_search()) : ?>

    <h2 class="rq-title"><?php esc_html_e('Search Result for "', 'turbo'); ?><?php echo esc_attr(get_search_query()); ?><?php echo '"'; ?></h2>

<?php else : ?>

    <h2 class="rq-title"><?php the_title(); ?></h2>

<?php endif; ?>


<!-- <h2 class="pull-left">News</h2> -->
<?php
if (function_exists('turbo_breadcrumb') && $show_breadcrumbs === 'true') {
    // if ( !is_front_page() && !is_home() ) {
    echo '<ol class="breadcrumb rq-subtitle secondary">';
    turbo_breadcrumb($arrow_sign);
    echo '</ol>';
    // }
}
?>