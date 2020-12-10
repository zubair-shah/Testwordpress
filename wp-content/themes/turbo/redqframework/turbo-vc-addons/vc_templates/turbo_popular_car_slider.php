<?php
if (class_exists('woocommerce')) {
    extract(
        shortcode_atts(array(
            'title' => !empty($title) ? $title : esc_html__('Cars', 'turbo'),
        ), $atts)
    );
    $top_rated_products = Turbowp_Helper::turbowp_get_product_type('top_rated_product', 'product');
?>
    <div class="rq-content-block" id="cars">
        <div class="rq-title-container text-center">
            <h2 class="rq-title no-padding"><?php echo do_shortcode($title); ?></h2>
        </div>
        <div class="rq-secondary-slider">
            <div class="owl-loop owl-carousel">
                <?php foreach ($top_rated_products as $key => $product) { ?>
                    <div class="item">
                        <div class="car-details-bg">
                            <span><?php echo esc_attr(get_woocommerce_currency_symbol()); ?><?php echo esc_attr($product['price']); ?>/<?php _e('Days', 'turbo'); ?></span>
                            <div class="owl-title-area">
                                <h4><a href="<?php echo esc_url($product['post_permalink']); ?>"><?php echo esc_attr($product['post_title']); ?></a></h4>
                                <div class="star-rating"><span style="width: 70%"><strong class="rating"></strong></span></div>
                            </div>
                        </div>
                        <a href="<?php echo esc_url($product['post_permalink']); ?>">
                            <img src="<?php if ($product['nice_image']) {
                                            echo esc_url($product['nice_image']);
                                        } ?>" data-img-src="" alt="img" />
                        </a>
                        <h5><a href="#"><?php echo esc_attr($product['post_title']); ?></a></h5>
                    </div>
                <?php } ?>
            </div>
            <div class="browse-cars">
                <?php
                global $woocommerce, $product, $post;
                $shop = get_permalink(wc_get_page_id('shop'));
                ?>
                <a href="<?php echo esc_url($shop); ?>"><?php _e('Browse all cars', 'turbo'); ?></a>
            </div>
        </div>
    </div>
<?php } else {
    echo "<h1>please activate woocommerce.</h1>";
} ?>