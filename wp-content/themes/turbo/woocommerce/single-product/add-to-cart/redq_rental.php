<?php

/**
 * Redq rental product add to cart
 *
 * @author        redq-team
 * @package    RedqTeam/Templates
 * @version     1.0.0
 * @since       1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $woocommerce, $product, $post;
$date_format = get_post_meta(get_the_ID(), 'redq_calendar_date_format', true);

?>

<div class="turbo-rnb-section">
    <?php

    $single_page_layout = get_post_meta(get_the_ID(), 'redq_choose_product_layout', true);

    switch ($single_page_layout) {
        case 'right-sidebar':
            wc_get_template_part('single-product/add-to-cart/redq_rental', 'right');
            break;

        default:
            wc_get_template_part('single-product/add-to-cart/redq_rental', 'left');
            break;
    }

    ?>
</div>



<?php do_action('woocommerce_after_add_to_cart_form'); ?>