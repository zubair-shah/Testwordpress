<?php

/**
 * Order management class
 */
class Rnb_Orders
{
    /**
     * Init class
     */
    public function __construct()
    {
        add_action('init', array($this, 'rnb_register_custom_order_statuses'));
        add_filter('wc_order_statuses', array($this, 'rnb_custom_order_statuses'), 10, 1);
        add_action('woocommerce_cart_totals_before_order_total', array($this, 'rnb_order_price_details'));
        add_action('woocommerce_review_order_before_order_total', array($this, 'rnb_order_price_details'));
        add_filter('woocommerce_get_order_item_totals', array($this, 'rnb_order_item_totals'), 10, 3);
        add_filter('woocommerce_cart_get_total', array($this, 'redq_rental_cart_calculate_totals'), 10, 1);
        add_action('woocommerce_admin_order_items_after_line_items', array($this, 'rnb_admin_order_details'), 10, 1);
        add_filter('woocommerce_display_item_meta', array($this, 'redq_rental_order_items_meta_display'), 10, 3);
    }

    /**
     * Register custom order statues
     *
     * @return void
     */
    public function rnb_register_custom_order_statuses()
    {
        register_post_status('wc-rnb-fake-order', array(
            'label'                     => 'Fake Order',
            'public'                    => true,
            'exclude_from_search'       => false,
            'show_in_admin_all_list'    => false,
            'show_in_admin_status_list' => true,
            'label_count'               => _n_noop('Hidden order <span class="count">(%s)</span>', 'Hidden order <span class="count">(%s)</span>')
        ));
    }

    /**
     * Custom Order Statues
     *
     * @param array $order_statuses
     *
     * @return array
     */
    public function rnb_custom_order_statuses($order_statuses)
    {
        $order_statuses['wc-rnb-fake-order'] = 'RnB Hidden Order';
        return $order_statuses;
    }

    /**
     * rnb_order_price_details
     *
     * @return void
     */
    public function rnb_order_price_details()
    {
        $deposit = 0;
        $cart_items = WC()->cart->get_cart_contents();

        foreach ($cart_items as $key => $cart_item) {
            if (is_rental_product($cart_item['product_id'])) {
                $price_breakdown = $cart_item['rental_data']['rental_days_and_costs']['price_breakdown'];
                $deposit += (float) $price_breakdown['deposit_total'] * $cart_item['quantity'];
            }
        }

        if ($deposit) {
            echo
                '<tr class="deposit">
                    <th>' . esc_html__('Deposit', 'redq-rental') . '</th>
                    <td>' . wc_price($deposit) . '</td>
                </tr>';
        }
    }

    /**
     * Total amount for credit card payment
     *
     * @return string
     */
    public function redq_rental_cart_calculate_totals($total)
    {
        $line_total = 0;
        $deposit = 0;
        $cart_items = WC()->cart->get_cart();

        foreach ($cart_items as $key => $cart_item) {
            if (is_rental_product($cart_item['product_id'])) {
                $price_breakdown = $cart_item['rental_data']['rental_days_and_costs']['price_breakdown'];
                $deposit_amount = (float) $price_breakdown['deposit_total'] * $cart_item['quantity'];
                $deposit += $deposit_amount;
            }
            $line_total += isset($cart_item['line_total']) ? $cart_item['line_total'] : 0;
        }

        if ($deposit) {
            $total = $total + $deposit;
        }

        return $total;
    }

    /**
     * rnb_order_item_totals
     *
     * @param mixed $rows
     * @param mixed $order
     * @param mixed $tax_display
     *
     * @return array
     * @throws Exception
     */
    public function rnb_order_item_totals($rows, $order, $tax_display)
    {
        $items = $order->get_items();

        if (empty($items)) {
            return $rows;
        }

        $deposit = 0;

        foreach ($items as $item_id => $item) {

            $product_id = $item->get_product_id();
            $product_type = wc_get_product($product_id)->get_type();

            if (isset($product_type) && $product_type === 'redq_rental') {
                $price_breakdown = wc_get_order_item_meta($item_id, 'rnb_price_breakdown', true);
                $deposit_amount = isset($price_breakdown['deposit_total']) ? floatval($price_breakdown['deposit_total']) * $item['quantity'] : 0;
                $deposit += $deposit_amount;
            }
        }

        if ($deposit) {
            $inserted['deposit'] = array(
                'label' => __('Deposit', 'redq-rental'),
                'value' => $deposit ? wc_price($deposit) : 0,
            );

            $position = count($rows) - 2;
            array_splice($rows, $position, 0, $inserted);
        }

        return $rows;
    }

    public function rnb_admin_order_details($order_id)
    {
        $order = wc_get_order($order_id);
        $items = $order->get_items();
        $deposit = 0;

        if (isset($items) && !empty($items)) {
            foreach ($items as $item_id => $item) {
                $product_id = $item->get_product_id();
                $product_type = wc_get_product($product_id)->get_type();
                if (isset($product_type) && $product_type === 'redq_rental') {
                    $price_breakdown = wc_get_order_item_meta($item_id, 'rnb_price_breakdown', true);
                    $deposit_amount = isset($price_breakdown['deposit_total']) ? floatval($price_breakdown['deposit_total']) * $item['quantity'] : 0;
                    $deposit += $deposit_amount;
                }
            }
        }

        if (!empty($deposit)) :
            echo
                '<tr>
                    <td colspan="6"><div class="amount" style="float:right;"><span> ' . esc_html__('Deposit', 'redq-rental') . ' : </span><span style="padding-left: 50px;">' . wc_price($deposit) . '</span></div></td>
                </tr>';
        endif;
    }

    /**
     * Output of order meta in emails
     *
     * @param $html
     * @param $item
     * @param $args
     * @return string
     * @version 1.0.0
     * @since 2.0.4
     */
    public function redq_rental_order_items_meta_display($html, $item, $args)
    {
        $strings = array();
        $html = '';
        $args = wp_parse_args($args, array(
            'before'    => '<ul class="wc-item-meta"><li>',
            'after'     => '</li></ul>',
            'separator' => '</li><li>',
            'echo'      => true,
            'autop'     => false,
        ));

        foreach ($item->get_formatted_meta_data() as $meta_id => $meta) {
            if ($meta->key !== 'pickup_hidden_datetime' && $meta->key !== 'return_hidden_datetime' && $meta->key !== 'return_hidden_days' && $meta->key !== 'redq_google_cal_sync_id' && $meta->key !== 'booking_inventory') :
                $value = $args['autop'] ? wp_kses_post(wpautop(make_clickable($meta->display_value))) : wp_kses_post(make_clickable($meta->display_value));
                $strings[] = '<strong class="wc-item-meta-label">' . wp_kses_post($meta->display_key) . ':</strong> ' . $value;
            endif;
        }

        if ($strings) {
            $html = $args['before'] . implode($args['separator'], $strings) . $args['after'];
        }

        return $html;
    }
}

new Rnb_Orders();
