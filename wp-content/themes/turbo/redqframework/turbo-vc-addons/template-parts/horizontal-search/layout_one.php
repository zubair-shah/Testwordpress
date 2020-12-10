<?php
$attrs_data = $template_args['attrs_data'];
$helper_data = $template_args['helper_data'];
$content = $template_args['content'];

extract($attrs_data);
extract($helper_data);
?>

<div class="header <?php echo esc_attr($layout_class); ?>">
    <div class="header-body"
         style="background: url('<?php echo esc_url($feature_image[0]); ?>') top center no-repeat; background-size: cover;">
        <div class="container">
            <div class="rq-home-banner-conetnt <?php echo esc_attr($content_class); ?>">
                <?php if ($heading_sub_title): ?>
                    <h6>
                        <span><?php echo esc_attr($heading_tag_title); ?></span><?php echo esc_attr($heading_sub_title); ?>
                    </h6>
                <?php endif; ?>
                <h1><?php echo esc_attr($heading_title); ?></h1>
                <p><?php echo do_shortcode($content); ?><p>
            </div>

            <?php turbo_search_form($attrs_data); ?>

            <?php if (isset($show_counter_section) && $show_counter_section === 'show') : ?>
                <?php
                $params = array(
                    'posts_per_page' => -1,
                    'post_type'      => 'product',
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'product_type',
                            'field'    => 'slug',
                            'terms'    => 'redq_rental',
                        ),
                    ),
                );
                $users = count_users();
                $total_cars = count(get_posts($params));
                $comments_count = wp_count_comments();
                ?>

                <div class="rq-counting-list">
                    <ul class="list-unstyled">
                        <?php if (isset($show_user_access) && $show_user_access === 'yes') : ?>
                            <li>
                                <span class="count-result" data-from="0"
                                      data-to="<?php echo esc_attr($users['total_users']); ?>" data-speed="5000"
                                      data-refresh-interval="500"></span>
                                <span class="count-category"><?php echo esc_attr($user_access_text); ?></span>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($show_cars) && $show_cars === 'yes') : ?>
                            <li>
                                <span class="count-result" data-from="0" data-to="<?php echo esc_attr($total_cars); ?>"
                                      data-speed="5000" data-refresh-interval="50"></span>
                                <span class="count-category"><?php echo esc_attr($cars_text); ?></span>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($show_reviews) && $show_reviews === 'yes') : ?>
                            <li>
                                <span class="count-result" data-from="0"
                                      data-to="<?php echo esc_attr($comments_count->all); ?>" data-speed="5000"
                                      data-refresh-interval="50"></span>
                                <span class="count-category"><?php echo esc_attr($reviews_text); ?></span>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>