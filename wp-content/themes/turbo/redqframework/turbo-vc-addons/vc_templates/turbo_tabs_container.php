<?php
extract(shortcode_atts(array(
    'choose_layout'                  => 'layout_one',
    'tab_heading_title'              => __('Top Our Cars ', 'turbo'),
    'browse_car_title'               => __('Browse All Cars ', 'turbo'),
    'browse_car_link'                => '',
    'popular_car_tab_title'          => __('Popular Cars', 'turbo'),
    'new_car_tab_title'              => __('New Cars', 'turbo'),
    'show_popular_cars_tab'          => 'yes',
    'show_new_cars_tab'              => 'yes',
    'popular_car_initially_active'   => 'active',
    'popular_transparent_img'        => 'inactive',
    'popular_tab_small_separate_img' => 'inactive',
    'recent_initially_active'        => 'inactive',
    'popular_orderby'                => __('title', 'turbo'),
    'popular_order'                  => 'DESC',
    'popular_posts_per_page'         => 4,
    'new_orderby'                    => 'title',
    'new_order'                      => 'DESC',
    'new_posts_per_page'             => 4,
    'recent_transparent_img'         => 'inactive',
    'recent_tab_small_separate_img'  => 'inactive',
    'show_attributes'                => 'yes',
    'show_details_heading'           => 'yes',
    'outer_bg_css' => '',
    'inner_bg_css' => ''
), $atts));

$outer_css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($outer_bg_css, ' '), $this->settings['base'], $atts);
$inner_css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($inner_bg_css, ' '), $this->settings['base'], $atts);

if (empty($popular_transparent_img)) {
    $popular_transparent_img = 'inactive';
}

if (empty($popular_tab_small_separate_img)) {
    $popular_tab_small_separate_img = 'inactive';
}

if (empty($recent_transparent_img)) {
    $recent_transparent_img = 'inactive';
}

if (empty($recent_tab_small_separate_img)) {
    $recent_tab_small_separate_img = 'inactive';
}

if ($choose_layout === 'layout_one') {
    $parent_class = 'vertical-line with-border-bottom';
    $heading_class = 'rq-content-block gray-bg no-padding heading-layout-one';
    $turbo_parent_nav = '';
} else {
    $parent_class = 'turbo-vertical-line-reverse';
    $heading_class = 'heading-layout-two';
    $turbo_parent_nav = 'parent-tab-reverse';
}

$allowed_html = wp_kses_allowed_html('post');

?>

<div class="<?php echo esc_attr($heading_class) ?> <?php echo esc_attr($outer_css_class); ?>">
    <div class="container">
        <div class="rq-browse-section">
            <h1 class="rq-title"><?php echo wp_kses($tab_heading_title, $allowed_html); ?></h1>
            <?php if (!empty($browse_car_link)) : ?>
                <a href="<?php echo esc_url($browse_car_link); ?>"><?php echo esc_attr($browse_car_title); ?> <i class="ion-ios-arrow-right"></i></a>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="rq-content-block <?php echo esc_attr($parent_class); ?> <?php echo esc_attr($inner_css_class); ?>">
    <div class="rq-car-listing-tab">

        <ul class="nav nav-tabs parent-tab <?php echo esc_attr($turbo_parent_nav); ?>" role="tablist">
            <?php if ($show_popular_cars_tab === 'yes') : ?>
                <li role="presentation">
                    <a id="top-popular-tab" href="#top-popular" class="<?php echo esc_attr($popular_car_initially_active); ?>" role="tab" data-toggle="tab" aria-controls="top-popular"><?php echo esc_attr($popular_car_tab_title); ?></a>
                </li>
            <?php endif; ?>
            <?php if ($show_new_cars_tab === 'yes') : ?>
                <li role="presentation">
                    <a id="new-cars-tab" href="#new-cars" class="<?php echo esc_attr($recent_initially_active); ?>" role="tab" data-toggle="tab" aria-controls="new-cars"><?php echo esc_attr($new_car_tab_title); ?></a>
                </li>
            <?php endif; ?>
        </ul>

        <div class="tab-content">
            <?php if ($show_popular_cars_tab === 'yes') : ?>
                <div id="top-popular" class="tab-pane fade show <?php echo esc_attr($popular_car_initially_active); ?>" role="tabpanel" aria-labelledby="top-popular-tab">
                    <?php echo do_shortcode('[turbo_top_rated_products choose_layout=' . $choose_layout . ' show_attributes=' . $show_attributes . ' show_details_heading = ' . $show_details_heading . ' transparent_img=' . $popular_transparent_img . ' tab_small_separate_img=' . $popular_tab_small_separate_img . ' orderby=' . $popular_orderby . ' order=' . $popular_order . ' posts_per_page=' . $popular_posts_per_page . ' ]'); ?>
                </div>
            <?php endif; ?>
            <?php if ($show_new_cars_tab === 'yes') : ?>
                <div id="new-cars" class="tab-pane fade show <?php echo esc_attr($recent_initially_active); ?>" role="tabpanel" aria-labelledby="new-cars-tab">
                    <?php echo do_shortcode('[turbo_recent_products choose_layout=' . $choose_layout . ' show_attributes=' . $show_attributes . ' show_details_heading = ' . $show_details_heading . ' transparent_img=' . $recent_transparent_img . ' tab_small_separate_img=' . $recent_tab_small_separate_img . ' orderby=' . $new_orderby . ' order=' . $new_order . ' posts_per_page=' . $new_posts_per_page . ' ]'); ?>
                </div>
            <?php endif; ?>

        </div> <!-- /.tab-content -->

    </div> <!-- /.rq-car-listing-tab -->
</div>