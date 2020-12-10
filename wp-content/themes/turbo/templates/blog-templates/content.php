<div <?php post_class('rq-listing-single'); ?> id="post-<?php the_ID(); ?>">
    <div class="rq-listing-standard-image-post">
        <?php turbo_post_thumbnail(); ?>
        <h3 class="rq-listing-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
        <div class="rq-listing-meta">
            <span class="author-name"><?php esc_url(the_author_posts_link()); ?></span>
            <span class="v-line">|</span>
            <span class="date"><?php echo esc_attr(get_the_date()) ?></span>
            <span class="v-line">|</span>
            <?php
            $categories_list = get_the_category_list(_x(', ', 'Used between list items, there is a space after the comma.', 'turbo'));
            if ($categories_list) {
                printf(
                    '<span class="category">%1$s</span>',
                    $categories_list
                );
            }
            ?>
        </div>

        <div class="post-content">
            <?php the_excerpt() ?>
        </div>
        <a class="continue-btn rq-btn rq-btn-normal" href="<?php the_permalink() ?>"><?php esc_html_e('Continue', 'turbo') ?>
            <svg class="rq-arrow-right" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
        </a>
    </div>
</div>