<?php

/**
 * Single Product title
 * Edit by redq
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 4.4.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

?>

<!-- check for rental product -->

<?php
$rental_product = wc_get_product(get_the_ID());
$product_type = $rental_product->get_type();
?>
<?php if ($product_type != 'redq_rental') : ?>
    <h1 itemprop="name" class="product_title entry-title"><?php the_title(); ?></h1>
<?php endif; ?>