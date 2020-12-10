<?php

extract(shortcode_atts(array(
    'choose_layout'          => 'layout_one',
    'transparent_img'        => 'active',
    'tab_small_separate_img' => 'active',
    'orderby'                => 'date',
    'order'                  => 'desc',
    'posts_per_page'         => 4,
    'show_attributes'        => 'yes',
    'show_details_heading'   => 'yes',
), $atts));

$recent_products = Turbowp_Helper::turbowp_get_product_type('recent_products', 'product', $orderby, $order, $posts_per_page);

if ($choose_layout === 'layout_one') {
    $parent_class = 'layout-one-wrapper';
    $shadow_img_class = 'image-bg';
} else {
    $parent_class = 'layout-two-wrapper';
    $shadow_img_class = '';
}

?>

<div class="child-tab-wrapper <?php echo esc_attr($parent_class); ?>">
    <?php if (isset($recent_products) && !empty($recent_products)) : ?>
        <?php $height = $transparent_img != 'active' ? '430px' : '325px'; ?>
        <ul class="nav nav-tabs" role="tablist" style="height: <?php echo esc_attr($height); ?>;">
            <?php foreach ($recent_products as $key => $product) : ?>
                <?php
                $class = $key == 0 ?  'active' : 'inactive';
                $small_img = !empty($product['thumbnail_id']) ? (turbo_resize_image($product['thumbnail_id'], '', 182, 137, true)['url']) : '';
                ?>
                <li role="presentation">
                    <a href="#recent-<?php echo esc_attr($product['ID']); ?>" role="tab" data-toggle="tab" class="<?php echo esc_attr($class); ?>">
                        <img src="<?php echo esc_url($small_img); ?>" alt="img" />
                        <span class="tittle"><?php echo esc_attr($product['post_title']); ?></span>
                        <?php if (isset($product['no_of_seat']) && !empty($product['no_of_seat'])) : ?>
                            <span class="car-des"><?php echo esc_attr($product['no_of_seat']); ?><?php _e(' Seater Car', 'turbo'); ?></span>
                        <?php endif; ?>
                        <span class="rent-price"><?php echo wc_price($product['price']); ?><b><?php echo esc_html__('/Day', 'turbo'); ?></b></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="tab-content">

            <?php foreach ($recent_products as $key => $product) : ?>
                <?php
                $class = $key == 0 ? 'show active' : 'inactive';

                $width = 600;
                $height = 400;

                if ($choose_layout === 'layout_one') {
                    $width = 538;
                    $height = 250;
                }
                $big_image = !empty($product['thumbnail_id']) ? (turbo_resize_image($product['thumbnail_id'], '',  $width, $height, true)['url']) : '';
                ?>

                <div role="tabpanel" class="tab-pane fade <?php echo esc_attr($class); ?>" id="recent-<?php echo esc_attr($product['ID']); ?>">
                    <div class="rq-tab-car-details">
                        <?php if (isset($show_details_heading) && $show_details_heading === 'yes') : ?>
                            <?php $brand_logo = $product['brand_logo']; ?>
                            <?php if (!empty($brand_logo)) : ?>
                                <?php $brand_image = !empty($brand_logo) ? (turbo_resize_image($brand_logo, '', 50, 32, true)['url']) : ''; ?>
                                <div class="car-logo">
                                    <img src="<?php echo esc_url($brand_image); ?>" alt="img" />
                                </div>
                            <?php endif; ?>
                            <a href="<?php echo esc_attr($product['post_permalink']); ?>">
                                <h3><?php echo esc_attr($product['post_title']); ?></h3>
                            </a>
                        <?php endif; ?>

                        <?php if ($transparent_img != 'active') : ?>
                            <a href="<?php echo esc_attr($product['post_permalink']); ?>">
                                <div class="large-image-wrapper non-transparent-image">
                                    <img src="<?php echo esc_url($big_image); ?>" alt="img" />
                                </div>
                            </a>
                        <?php else : ?>
                            <?php
                            $rotate_css = '';
                            if (isset($product['rotate_image']) && $product['rotate_image'] === 'yes') {
                                $rotate_css =
                                    '-webkit-transform: rotateY(-180deg);
                                    transform: rotateY(-180deg);';
                            }
                            ?>
                            <a href="<?php echo esc_attr($product['post_permalink']); ?>">
                                <div class="large-image-wrapper transparent-image" style="background-color: <?php echo esc_attr($product['transparent_img_bg_color']) ?>">
                                    <img style="<?php echo esc_attr($rotate_css); ?>" src="<?php echo esc_url($big_image); ?>" alt="img">
                                </div>
                            </a>
                        <?php endif; ?>

                        <?php if (isset($show_attributes) && $show_attributes === 'yes' && class_exists('RedQ_Rental_And_Bookings')) : ?>

                            <?php $attributes_by_inventory = WC_Product_Redq_Rental::redq_get_rental_non_payable_attributes('attributes', $product['ID']); ?>

                            <?php if (isset($attributes_by_inventory) && !empty($attributes_by_inventory)) : ?>
                                <div class="car-details-option">
                                    <?php
                                    foreach ($attributes_by_inventory as $akeys => $attributes_by_inventory) :
                                        $inventory_name = $attributes_by_inventory['title'];
                                        $attributes = isset($attributes_by_inventory['attributes']) ? $attributes_by_inventory['attributes'] : [];

                                        if (isset($attributes) && !empty($attributes)) :
                                            foreach ($attributes as $attr_key => $attribute) :
                                                if ($attribute['highlighted'] === 'yes') : ?>
                                                    <span><i class="<?php echo esc_attr($attribute['icon']); ?>"></i><?php echo esc_attr($attribute['name']); ?>:<?php echo esc_attr($attribute['value']); ?></span>
                                    <?php endif;
                                            endforeach;
                                        endif;
                                    endforeach;
                                    ?>
                                    <span><?php _e('From', 'turbo'); ?> <span class="red-section"><?php echo wc_price($product['price']); ?></span><?php echo esc_html__('/Day', 'turbo'); ?></span>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</div>