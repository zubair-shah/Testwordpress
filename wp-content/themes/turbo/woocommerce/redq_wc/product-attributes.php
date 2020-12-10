<?php

/**
 * Loop Price
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
$product_id = $product->get_id();
$attributes_by_inventories = $product->redq_get_rental_non_payable_attributes('attributes', $product_id);
?>

<?php if (isset($attributes_by_inventories) && !empty($attributes_by_inventories)) : ?>
    <ul>
        <?php
        foreach ($attributes_by_inventories as $key => $attributes_by_inventory) :
            $inventory_name = $attributes_by_inventory['title'];
            $attributes = isset($attributes_by_inventory['attributes']) ? $attributes_by_inventory['attributes'] : [];
            if (isset($attributes) && !empty($attributes)) :
                foreach ($attributes as $attr_key => $attribute) :
                    if ($attr_key === 3) break;
                    echo '<li>' . esc_attr($attribute['name']) . ' :<span>' . esc_attr($attribute['value']) . '</span></li>';
                endforeach;
            endif;
        endforeach;
        ?>
    </ul>
<?php endif; ?>