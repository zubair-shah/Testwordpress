<?php

/**
 * Single Product Price, including microdata for SEO
 * Edit by redq
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;

?>
<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

    <!-- check for rental product -->

    <?php $product_type = $product->get_type(); ?>
    <?php if ($product_type != 'redq_rental') : ?>
        <?php $price_html = $product->get_price_html(); ?>
        <p class="price"><?php echo  apply_filters('turbo_price_html', $price_html); ?></p>
    <?php endif; ?>

    <?php $is_stock = $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>

    <meta itemprop="price" content="<?php echo esc_attr($product->get_price()); ?>" />
    <meta itemprop="priceCurrency" content="<?php echo esc_attr(get_woocommerce_currency()); ?>" />
    <link itemprop="availability" href="http://schema.org/<?php echo esc_attr($is_stock); ?>" />

</div>