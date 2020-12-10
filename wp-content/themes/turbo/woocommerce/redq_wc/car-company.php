<?php
/**
 * Loop car company
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

$car_companies = $product->redq_get_rental_car_company('car_company');

?>

<?php if (isset($car_companies) && !empty($car_companies)) : ?>
    <h5 class="car-brand">
        <?php foreach ($car_companies as $key => $value) : ?>
            <span><?php echo esc_attr($value['name']); ?></span>
        <?php endforeach; ?>
    </h5>
<?php endif; ?>








