<?php
global $post, $product;
$product_meta = get_post_custom($post->ID);

?>

<div class="rq-listing-single turbo-content-listing-gallery">
    <div class="rq-change-button">
        <span class="slide active"><i class="far fa-image" aria-hidden="true"></i></span>
        <span class="map "><i class="fas fa-map-marker-alt" aria-hidden="true"></i></span>
    </div>
    <div class="rq-custom-map" id="listing-map"></div>
    <div class="rq-listing-gallery-post">
        <div class="rq-gallery-content">
            <div class="details-slider owl-carousel">
                <?php
                $gallery = $product_meta['_product_image_gallery'][0];
                $gallery_img_id = explode(',', $gallery);
                ?>

                <?php if (isset($gallery_img_id) && is_array($gallery_img_id)) { ?>
                    <?php foreach ($gallery_img_id as $key => $value) { ?>
                        <?php
                        $large_image = wp_get_attachment_image_src($value, 'car-gallery');
                        ?>
                        <div class="item">
                            <img src="<?php echo esc_url($large_image[0]); ?>" alt="img">
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
</div> <!-- end of banner slider -->