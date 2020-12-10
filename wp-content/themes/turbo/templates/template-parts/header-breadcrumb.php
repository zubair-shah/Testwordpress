<div class="rq-title-container bredcrumb-title text-center">

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

        <?php if (is_day()) : ?>
            <h2 class="rq-title"><?php printf(__('Daily Archives: <span>%s</span>', 'turbo'), get_the_date()); ?></h2>
        <?php elseif (is_month()) : ?>
            <h2 class="rq-title"><?php printf(__('Monthly Archives: <span>%s</span>', 'turbo'), get_the_date(_x('F Y', 'monthly archives date format', 'turbo'))); ?></h2>
        <?php elseif (is_year()) : ?>
            <h2 class="rq-title"><?php printf(__('Yearly Archives: <span>%s</span>', 'turbo'), get_the_date(_x('Y', 'yearly archives date format', 'turbo'))); ?></h2>
        <?php else : ?>
            <h2 class="rq-title"><?php esc_html_e('Blog Archives', 'turbo'); ?></h2>
        <?php endif; ?>


    <?php elseif (is_search()) : ?>

        <h2 class="rq-title"><?php esc_html_e('Search Result for "', 'turbo'); ?><?php echo esc_attr(get_search_query()); ?><?php echo '"'; ?></h2>

    <?php else : ?>

        <h2 class="rq-title"><?php the_title(); ?></h2>

    <?php endif; ?>


    <!-- <h2 class="pull-left">News</h2> -->
    <?php
    if (function_exists('turbo_breadcrumb')) {
        turbo_breadcrumb();
    }
    ?>
</div>

