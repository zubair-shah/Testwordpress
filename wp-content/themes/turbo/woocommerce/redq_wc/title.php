<?php

/**
 * Loop Title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/redq_wc/redq_price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see        http://docs.woothemes.com/document/template-structure/
 * @author        RedqTeam
 * @package    WooCommerce/Templates
 * @version     1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;
?>

<h3 class="car-name">
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</h3>