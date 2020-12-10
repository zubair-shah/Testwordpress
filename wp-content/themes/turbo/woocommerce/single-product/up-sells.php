<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 
?>

<?php
// Single Post settings Work
global $post;
$choose_options 	= get_post_meta( $post->ID, '_general_options_from', true );
$choose_options		= $choose_options ? $choose_options : 'option_panel';
if( is_single() && $choose_options != 'option_panel' ) {
	$local_options = turbo_extract_post_meta_data(array(
		'choose_layout'     => array('normal_layout', '_layout_options_settings' ),
	));
	extract($local_options);
} else {
	$global_options = turbo_extract_option_data(array(
		'choose_layout'     => array('normal_layout', 'turbo_woocommerce_layout' ),
	));
	extract($global_options);
}
?>

<?php if ( isset($choose_layout) && $choose_layout === 'normal_layout') { ?>
	<?php if ( $upsells ) : ?>
		<?php
			extract(turbo_extract_option_data(array(
				'upsell_product_label' => array('Upsell Cars', 'upsell_products_heading' ),
			)));
		?>
		<section class="up-sells upsells products">
			<h2 class="rq-title rq-title-upsell"><?php echo esc_attr($upsell_product_label); ?></h2>
			<?php woocommerce_product_loop_start(); ?>
				<?php foreach ( $upsells as $upsell ) : ?>
					<?php
						$post_object = get_post( $upsell->get_id() );
						setup_postdata( $GLOBALS['post'] =& $post_object );
						wc_get_template_part( 'content', 'product' ); ?>
				<?php endforeach; ?>
			<?php woocommerce_product_loop_end(); ?>
		</section>
	<?php endif;
		wp_reset_postdata(); 
	?>
<?php } else { ?>
	<?php if ( $upsells ) : ?>
		<?php
			extract(turbo_extract_option_data(array(
				'upsell_product_label' => array('Upsell Cars', 'upsell_products_heading' ),
			)));
		?>
		<section class="up-sells upsells products">
			<h2 class="rq-title rq-title-upsell"><?php echo esc_attr($upsell_product_label); ?></h2>
			<?php woocommerce_product_loop_start(); ?>
				<?php foreach ( $upsells as $upsell ) : ?>
					<?php
						$post_object = get_post( $upsell->get_id() );
						setup_postdata( $GLOBALS['post'] =& $post_object );
						wc_get_template_part( 'content-listing', 'product' ); ?>
				<?php endforeach; ?>
			<?php woocommerce_product_loop_end(); ?>
		</section>
	<?php endif;
		wp_reset_postdata(); 
	?>

<?php } ?>


