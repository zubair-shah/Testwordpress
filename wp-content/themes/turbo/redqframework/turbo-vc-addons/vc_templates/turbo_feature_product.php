<?php
$attrs_data = shortcode_atts(array(
    'title'                 => esc_html__('Top Selling Cars', 'turbo'),
    'product_id'            => '461',
    'no_of_related_product' => 3,
    'similar_cars'          => esc_html__('Similar Cars', 'turbo'),
    'button_text'           => esc_html__('Details', 'turbo'),
), $atts);

extract($attrs_data);


if (!class_exists('woocommerce')) return;
if (!$product_id) return;

$product = wc_get_product($product_id);
if (!$product) return;

$product_data = $product->get_data();

$product_title = $product_data['name'];
$product_permalink = get_the_permalink($product_id);
$product_description = $product_data['short_description'] ? $product_data['short_description'] : $product_data['description'];
$product_rating = $product_data['average_rating'];
$product_rating_count = $product_data['review_count'];
$product_feature_image_id = $product_data['image_id'];
$feature_img = wp_get_attachment_image_src($product_feature_image_id, "full");
$feature_img_src = $feature_img[0] ? $feature_img[0] : '';
$related_products = wc_get_related_products($product_id, $no_of_related_product);
?>

<div class="rq-content-block rq-feature-product-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="single-cb-image">
                    <?php if ($feature_img_src) : ?>
                        <img src="<?php echo esc_url($feature_img_src); ?>" alt="<?php echo esc_html__('Feature Image', 'turbo'); ?>">
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="single-cb-content">
                    <h2 class="section-title"><?php echo esc_attr($title); ?></h2>
                    <h4 class="product-title"><?php echo esc_attr($product_title); ?></h4>
                    <div class="product-meta">
                        <span class="rating-badge">
                            <i class="fas fa-star"></i>
                            <?php echo esc_attr($product_rating); ?>
                        </span>
                        <span class="rating-count">
                            <?php
                            $total_review = sprintf(_n('( %s Review )', '( %s Reviews )', $product_rating_count, 'turbo'), $product_rating_count);
                            echo esc_attr($total_review);
                            ?>
                        </span>
                    </div>
                    <div class="entry-content">
                        <?php echo do_shortcode(wp_trim_words($product_description, 25)); ?>
                    </div>
                    <div class="button-section">
                        <a href="<?php echo esc_url($product_permalink); ?>" class="rq-default-btn">
                            <span class="btn-text">
                                <?php echo esc_attr($button_text); ?>
                            </span>
                            <svg class="rq-arrow-right" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
                <?php if (isset($related_products) && !empty($related_products)) : ?>
                    <h5 class="similar-cars"><?php echo esc_attr($similar_cars); ?></h5>
                    <ul class="related-products owl-carousel owl-theme">
                        <?php foreach ($related_products as $key => $value) : ?>
                            <?php
                            $rp_feature_image = get_the_post_thumbnail_url($value);
                            $rp_permalink = get_the_permalink($value);
                            ?>
                            <li>
                                <div class="single-cb-image">
                                    <?php if ($rp_feature_image) : ?>
                                        <a href="<?php echo esc_url($rp_permalink); ?>">
                                            <img src="<?php echo esc_url($rp_feature_image); ?>" alt="<?php echo esc_html__('Feature Image', 'turbo'); ?>">
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>