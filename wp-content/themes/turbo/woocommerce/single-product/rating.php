<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( 'no' === get_option( 'woocommerce_enable_review_rating' ) ) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();
global $post;
if (!empty($post)) {
	$choose_options   = get_post_meta( $post->ID, '_general_options_from', true );
	$choose_options   = $choose_options ? $choose_options : 'option_panel';
	if( $choose_options != 'option_panel' ) {
		$local_options = turbo_extract_post_meta_data(array(
			'choose_layout'  => array('normal_layout', '_layout_options_settings' ),
		));
		extract($local_options);
	} else {
		$global_options = turbo_extract_option_data(array(
			'choose_layout'  => array('normal_layout', 'turbo_woocommerce_layout' ),
		));
		extract($global_options);
  }
}
?>
<?php if ( isset($choose_layout) && $choose_layout === 'normal_layout') { ?>
  <?php if ( $rating_count > 0 ) : ?>
    <div class="woocommerce-product-rating">
      <?php echo wc_get_rating_html( $average, $rating_count ); ?>
      <?php if ( comments_open() ) : ?><a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<?php printf( _n( '%s customer review', '%s customer reviews', $review_count, 'turbo' ), '<span class="count">' . esc_html( $review_count ) . '</span>' ); ?>)</a><?php endif ?>
    </div>
  <?php endif; ?>
<?php } else { ?>
  <?php if ( $rating_count > 0 ) : ?>
    <div class="woocommerce-product-rating">
      <?php if ( comments_open() ) : ?>
        <span class="turbo-comment-count">
          <a href="#reviews" class="woocommerce-review-link" rel="nofollow">
            <?php 
              printf( 
                _n( '%s customer review', '%s customer reviews', $review_count, 'turbo' ),
                '<span class="count">' . esc_html( $review_count ) . '</span>' 
              ); 
            ?>
          </a>
        </span>
      <?php endif ?>    
      <?php echo wc_get_rating_html( $average, $rating_count ); ?>
    </div>
  <?php endif; ?>
<?php } ?>