<?php

if (!function_exists('is_woocommerce_activated')) {
    /**
     * Check is wooCommerce activated or not
     *
     * @return turbo menu for turbo.
     * @since Trubowp 2.0.2
     * @author   RedQTeam
     */
    function is_woocommerce_activated()
    {
        if (class_exists('woocommerce')) {
            return true;
        } else {
            return false;
        }
    }
}


if (!function_exists('is_rental_product')) {
    /**
     * is_rental_product
     *
     * @param mixed $product_id
     *
     * @return void
     */
    function is_rental_product($product_id)
    {
        $product_type = wc_get_product($product_id)->get_type();
        return isset($product_type) && $product_type === 'redq_rental' ? true : false;
    }
}


if (!function_exists('turbo_get_formatted_mini_cart_item_data')) {
    /**
     * turbo_get_formatted_mini_cart_item_data
     *
     * @return void
     */
    function turbo_get_formatted_mini_cart_item_data($product_id, $cart_item)
    {
        $output = '';
        $rental_data = $cart_item['rental_data'];

        $get_labels = redq_rental_get_settings($product_id, 'labels', array('pickup_date', 'return_date'));
        $labels = $get_labels['labels'];
        $get_displays = redq_rental_get_settings($product_id, 'display');
        $displays = $get_displays['display'];
        $get_conditions = redq_rental_get_settings($product_id, 'conditions');
        $conditional_data = $get_conditions['conditions'];

        if (isset($rental_data['pickup_date']) && $displays['pickup_date'] === 'open') {
            $pickup_date_time = convert_to_output_format($rental_data['pickup_date'], $conditional_data['date_format']);
            if (isset($rental_data['pickup_time'])) {
                $pickup_date_time = $pickup_date_time . ' ' . esc_html__('at', 'turbo') . ' ' . $rental_data['pickup_time'];
            }

            $output .=
                '<dl class="variation">
                    <dt>' . $labels['pickup_datetime'] . ' : </dt>
                    <dd>' . $pickup_date_time . '</dd>
                </dl>';
        }

        if (isset($rental_data['dropoff_date']) && $displays['return_date'] === 'open') {
            $return_date_time = convert_to_output_format($rental_data['dropoff_date'], $conditional_data['date_format']);
            if (isset($rental_data['dropoff_time'])) {
                $return_date_time = $return_date_time . ' ' . esc_html__('at', 'turbo') . ' ' . $rental_data['dropoff_time'];
            }

            $output .=
                '<dl class="variation">
                    <dt>' . $labels['return_datetime'] . ' : </dt>
                    <dd>' . $return_date_time . '</dd>
                </dl>';
        }

        $output .= '<a class="cart-item-details" href="' . wc_get_cart_url() . '">' . esc_html__('View Details', 'turbo') . '</a>';

        return $output;
    }
}


if (!function_exists('get_related_products')) {
    /**
     * Retrieve all related products
     *
     * @return turbo menu for turbo.
     * @since Trubowp 1.0
     * @author   RedQTeam
     */
    function get_related_products($related_cars_ids, $current_product_id)
    {
        $current_product = array();
        $current_product[] = $current_product_id;
        $args = array(
            'post_type'           => 'product',
            'ignore_sticky_posts' => 1,
            'no_found_rows'       => 1,
            'posts_per_page'      => 4,
            'orderby'             => 'rand',
            'post__in'            => $related_cars_ids,
            'post__not_in'        => $current_product
        );

        $related_products = get_posts($args);

        $results = array();

        if (isset($related_products) && is_array($related_products) && !empty($related_products)) {
            foreach ($related_products as $key => $value) {
                $results[$key]['ID'] = $value->ID;
                $results[$key]['post_title'] = $value->post_title;
                $results[$key]['post_permalink'] = get_permalink($value->ID);
                $results[$key]['thumbnail_image'] = get_the_post_thumbnail($value->ID, 'thumbnail');
                $results[$key]['image_url'] = wp_get_attachment_image_src(get_post_thumbnail_id($value->ID), array(170, 130));
                $results[$key]['price'] = get_post_meta($value->ID, '_price', true);
            }
        }

        return $results;
    }
}


if (!function_exists('turbo_retrun_price')) {
    /**
     * Get the product price for the loop.
     *
     * @subpackage    Redq_wc
     */
    function turbo_retrun_price()
    {
        wc_get_template('redq_wc/redq_price.php');
    }
}

add_action('redq_after_shop_loop_item_title', 'turbo_retrun_price');


if (!function_exists('turbo_shop_loop_attributes')) {
    /**
     * Get the product price for the loop.
     *
     * @subpackage    Redq_wc
     */
    function turbo_shop_loop_attributes()
    {
        wc_get_template('redq_wc/product-attributes.php');
    }
}

add_action('redq_shop_loop_attributes', 'turbo_shop_loop_attributes');


if (!function_exists('turbo_shop_loop_item_title')) {
    /**
     * Get the product title for the loop.
     *
     * @subpackage    Redq_wc
     */
    function turbo_shop_loop_item_title()
    {
        wc_get_template('redq_wc/title.php');
    }
}

add_action('redq_shop_loop_item_title', 'turbo_shop_loop_item_title');


if (!function_exists('turbo_shop_loop_item_car_company')) {
    /**
     * Get the product title for the loop.
     *
     * @subpackage    Redq_wc
     */
    function turbo_shop_loop_item_car_company()
    {
        wc_get_template('redq_wc/car-company.php');
    }
}

add_action('redq_shop_loop_item_car_company', 'turbo_shop_loop_item_car_company');


if (!function_exists('turbo_after_shop_loop_item_details_page')) {
    /**
     * Get the product title for the loop.
     *
     * @subpackage    Redq_wc
     */
    function turbo_after_shop_loop_item_details_page()
    {
        wc_get_template('redq_wc/details.php');
    }
}

add_action('redq_after_shop_loop_item_details_page', 'turbo_after_shop_loop_item_details_page');


if (!function_exists('turbowo_dequeue_default_stylesheet')) {
    /**
     * Dequeue woo-commerce default stylesheets from theme
     *
     * @subpackage    Redq_wc
     */
    function turbowo_dequeue_default_stylesheet($enqueue_styles)
    {

        $product = wc_get_product(get_the_ID());

        if (isset($product) && !empty($product)) {
            $product_type = $product->get_type();
            if (isset($product_type) && $product_type === 'redq_rental') {
                unset($enqueue_styles['woocommerce-general']);
                unset($enqueue_styles['woocommerce-layout']);
                unset($enqueue_styles['woocommerce-smallscreen']);
            } else {
                unset($enqueue_styles['woocommerce-general']);
                //unset( $enqueue_styles['woocommerce-layout'] );
                unset($enqueue_styles['woocommerce-smallscreen']);
            }
        } else {
            unset($enqueue_styles['woocommerce-general']);
            unset($enqueue_styles['woocommerce-layout']);
            unset($enqueue_styles['woocommerce-smallscreen']);
        }


        return $enqueue_styles;
    }
}

add_filter('woocommerce_enqueue_styles', 'turbowo_dequeue_default_stylesheet');


if (!function_exists('trubowp__product_review_comment_form_args')) {
    /**
     * Customize woocommerce review form
     *
     * @subpackage    Redq_wc
     */
    function trubowp__product_review_comment_form_args($args)
    {
        $args['label_submit'] = __('Submit Review', 'turbo');
        return $args;
    }
}

add_filter('woocommerce_product_review_comment_form_args', 'trubowp__product_review_comment_form_args');


if (!function_exists('turbo_reorder_comment_form_fields')) {
    /**
     * Customize woocommerce comment review form
     *
     * @subpackage    Redq_wc
     */
    function turbo_reorder_comment_form_fields($comment_fields)
    {
        global $post;

        if (!empty($post)) {
            $choose_options = get_post_meta(get_the_ID(), '_general_options_from', true);
            $choose_options = $choose_options ? $choose_options : 'option_panel';
            if (is_single() && $choose_options != 'option_panel') {
                $local_options = turbo_extract_post_meta_data(array(
                    'choose_layout' => array('normal_layout', '_layout_options_settings'),
                ));
                extract($local_options);
            } else {
                $global_options = turbo_extract_option_data(array(
                    'choose_layout' => array('normal_layout', 'turbo_woocommerce_layout'),
                ));
                extract($global_options);
            }
        }
        $reorder_comments = array();
        $commenter = wp_get_current_commenter();
        $textarea_placeholder = class_exists('woocommerce') && is_product() ? esc_html__('Write your review', 'turbo') : esc_html__('Write your comment', 'turbo');

        $rating_field = '';

        if (class_exists('woocommerce') && is_product() && get_option('woocommerce_enable_review_rating') === 'yes') {
            $rating_field =
                '<div class="col-md-12 rq-rental-product-comment-form">
                    <label for="rating">' . __('Your Rating', 'turbo') . '</label>
                    <select name="rating" id="rating">
                        <option value="">' . __('Rate&hellip;', 'turbo') . '</option>
                        <option value="5">' . __('Perfect', 'turbo') . '</option>
                        <option value="4">' . __('Good', 'turbo') . '</option>
                        <option value="3">' . __('Average', 'turbo') . '</option>
                        <option value="2">' . __('Not that bad', 'turbo') . '</option>
                        <option value="1">' . __('Very Poor', 'turbo') . '</option>
                    </select>
                </div>';
        }

        if (isset($choose_layout) && $choose_layout === 'normal_layout') {

            if (is_user_logged_in()) :
                $review_form = $rating_field;
                $review_form .=
                    '<div class="col-md-12 rq-rental-product-comment-form">
                        <textarea id="comment" name="comment" class="comment-input"  placeholder="' . $textarea_placeholder . '"></textarea>
                    </div>';
            else :

                $author =
                    '<div class="col-md-6 rq-rental-product-comment-form">
						<input type="text" id="author" name="author"  class="comment-input" value="' . $commenter['comment_author'] . '" placeholder="' . esc_html__('Name (required)', 'turbo') . '">
					</div>';

                $email =
                    '<div class="col-md-6 rq-rental-product-comment-form">
						<input id="email" name="email" type="text" class="comment-input" placeholder="' . esc_html__('Email (required)', 'turbo') . '" value="' . $commenter['comment_author_email'] . '" aria-required="true" />
					</div>';

                $review_form =
                    '<div class="col-md-12 rq-rental-product-comment-form">
						<textarea id="comment" name="comment" class="comment-input"  placeholder="' . $textarea_placeholder . '"></textarea>
                    </div>';
            endif;

            $reorder_comments['rating'] = $rating_field;
            $reorder_comments['author'] = isset($author) ? $author : '';
            $reorder_comments['email'] = isset($email) ? $email : '';
            $reorder_comments['comment'] = isset($review_form) ? $review_form : '';
        } else {
            $req = get_option('require_name_email');
            $html_req = ($req ? " required='required'" : '');
            $consent = empty($commenter['comment_author_email']) ? '' : ' checked="checked"';
            if (is_user_logged_in()) :

                $review_form = $rating_field;
                $review_form .=
                    '<div class="col-md-12 rq-rental-product-comment-form">
                        <textarea id="comment" name="comment" class="comment-input"  placeholder="' . $textarea_placeholder . '"></textarea>
                    </div>';

            else :

                $review_form =
                    '<div class="turbo-listing-review-wrap">
                        <div class="col-md-12 rq-rental-product-comment-form">
                            <label id="comment-label" for="comment">' . esc_html__('Add your message', 'turbo') . '</label>
                            <textarea id="comment" name="comment" class="comment-input" ' . $html_req . '></textarea>
                        </div>
                    </div>';

                $author =
                    '<div class="row"><div class="col-md-6 rq-rental-product-comment-form">
                        <label id="comment-author" for="author">' . esc_html__('Username', 'turbo') . '</label>
                        <input type="text" id="author" name="author"  class="comment-input" value="' . $commenter['comment_author'] . '" ' . $html_req . '>
					</div>';

                $email =
                    '<div class="col-md-6 rq-rental-product-comment-form">
						<label id="comment-email" for="email">' . esc_html__('Your Email', 'turbo') . '</label>
						<input id="email" name="email" type="text" class="comment-input" value="' . $commenter['comment_author_email'] . '" ' . $html_req . ' />
					</div>';

                $phone =
                    '<div class="col-md-6 rq-rental-product-comment-form">
                        <label id="comment-phone" for="phone">' . esc_html__('Phone', 'turbo') . '</label>
                        <input id="phone" name="phone" type="text" size="30"  class="comment-input" />
                    </div>';


                $zip =
                    '<div class="col-md-6 rq-rental-product-comment-form">
                        <label id="comment-zip" for="zip">' . esc_html__('Zip Code', 'turbo') . '</label>
                        <input id="zip" name="zip" type="text" size="30"  class="comment-input" />
                    </div></div>';

                $cookies =
                    '<div class="input-field"> 
						<p class="comment-form-cookies-consent">
							<label for="wp-comment-cookies-consent" data-error="wrong" data-success="right">
								<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" class="comment-form-cookies-consent-input" value="yes"' . $consent . ' />
								<span>' . esc_html__('Save my name & email in this browser for the next time I comment.', 'turbo') . '</span>
							</label>
						</p>
                    </div>';

            endif;

            $reorder_comments['rating'] = $rating_field;
            $reorder_comments['comment'] = isset($review_form) ? $review_form : '';
            $reorder_comments['author'] = isset($author) ? $author : '';
            $reorder_comments['email'] = isset($email) ? $email : '';
            $reorder_comments['phone'] = isset($phone) ? $phone : '';
            $reorder_comments['zip'] = isset($zip) ? $zip : '';
            $reorder_comments['cookies'] = isset($cookies) ? $cookies : '';
        }
        return $reorder_comments;
    }
}
add_filter('comment_form_fields', 'turbo_reorder_comment_form_fields');


if (!function_exists('turbo_comment_form_submit_button')) {
    /**
     * Customize woocommerce comment review form submit button
     *
     * @subpackage    Redq_wc
     */
    function turbo_comment_form_submit_button($submit_button, $args)
    {
        $submit_button_text = class_exists('woocommerce') && is_product() ? esc_html__('Submit review', 'turbo') : esc_html__('Post Comment', 'turbo');

        return
            '<div class="col-md-12 turbo-submit-btn">
                <button type="submit" id="submit" class="continue-btn submit rq-btn rq-btn-normal">' . $submit_button_text . '</button>
            </div>';
    }
}

add_filter('comment_form_submit_button', 'turbo_comment_form_submit_button', 1, 2);


if (!function_exists('turbo_checkout_fields')) {

    /**
     * Customize woocommerce checkout forms fields
     *
     * @subpackage    Redq_wc
     */
    function turbo_checkout_fields($fields)
    {
        foreach ($fields as &$fieldset) {
            $fieldset['class'][] = 'form-group';
            $fieldset['input_class'][] = 'input-text rq-form-control small';
        }
        return $fields;
    }
}

add_filter('woocommerce_billing_fields', 'turbo_checkout_fields');
add_filter('woocommerce_shipping_fields', 'turbo_checkout_fields');


if (!function_exists('check_unavailablility')) {

    /**
     * Check unavailability
     *
     * @subpackage    Redq_wc
     */
    function check_unavailablility($product_id, $pickup_data, $return_data)
    {

        $call_class = new RedQ_Rental_And_Bookings();
        $block_dates = get_post_meta($product_id, 'redq_product_block_dates', true);
        $output_date_format = get_post_meta($product_id, 'redq_calendar_date_format', true);
        $dates = $call_class->manage_all_dates($pickup_data, $return_data, 'no', $output_date_format);

        if (!empty($block_dates)) {
            $match_dates = array_intersect($dates, $block_dates);
        }

        $flag = 1;

        if (isset($match_dates) && !empty($match_dates)) {
            $flag = 0;
        }
        return $flag;
    }
}


if (!function_exists('turbo_woo_remove_product_tabs')) {
    /**
     * Control add or remove product tab
     *
     * @subpackage    Redq_wc
     */
    function turbo_woo_remove_product_tabs($tabs)
    {
        global $product, $post;
        $product_type = wc_get_product($post->ID)->get_type();
        if ($product_type === 'redq_rental') {
            unset($tabs['attributes']);
            unset($tabs['description']);
            unset($tabs['additional_information']);
            return $tabs;
        } else {
            return $tabs;
        }
    }
}

add_filter('woocommerce_product_tabs', 'turbo_woo_remove_product_tabs', 98);


if (!function_exists('turbo_related_products_args')) {
    /**
     * Control related product in single product page
     *
     * @subpackage    Redq_wc
     */
    function turbo_related_products_args($args)
    {
        $options = get_option('turbo_option_data');
        $args['posts_per_page'] = isset($options['no_of_related_product']) ? intval($options['no_of_related_product']) : 3;
        return $args;
    }
}

add_filter('woocommerce_output_related_products_args', 'turbo_related_products_args');


if (!function_exists('turbo_upsell_display_args')) {
    /**
     * Control up-sell product in single product page
     *
     * @subpackage    Redq_wc
     */
    function turbo_upsell_display_args($args)
    {
        $options = get_option('turbo_option_data');
        $upsells = isset($options['no_of_upsell_product']) ? $options['no_of_upsell_product'] : 3;
        $args['posts_per_page'] = intval($upsells);
        return $args;
    }
}

add_filter('woocommerce_upsell_display_args', 'turbo_upsell_display_args');


if (!function_exists('turbo_cross_sell_display_args')) {
    /**
     * Control cross-sell product in single product page
     *
     * @subpackage    Woocommerce
     */
    function turbo_cross_sell_display_args($args)
    {
        $options = get_option('turbo_option_data');
        $args = intval($options['no_of_cross_sell_product']);
        return $args;
    }
}

add_filter('woocommerce_cross_sells_total', 'turbo_cross_sell_display_args');


if (!function_exists('turbo_extra_register_fields')) {
    /**
     * Add new register fields for WooCommerce registration.
     *
     * @return string Register fields HTML.
     */
    function turbo_extra_register_fields()
    { ?>

        <div class="col-md-4">
            <input type="text" class="input-text rq-form-control reverse" name="billing_first_name" id="reg_billing_first_name" placeholder="<?php echo esc_html__('First Name', 'turbo'); ?>" value="<?php if (!empty($_POST['billing_first_name'])) echo esc_attr($_POST['billing_first_name']); ?>" required />
        </div>

        <div class="col-md-4">
            <input type="text" class="input-text rq-form-control reverse" name="billing_last_name" id="reg_billing_last_name" placeholder="<?php echo esc_html__('Last Name', 'turbo'); ?>" value="<?php if (!empty($_POST['billing_last_name'])) echo esc_attr($_POST['billing_last_name']); ?>" required />
        </div>

        <div class="col-md-4">
            <input type="text" class="input-text rq-form-control reverse" name="billing_phone" id="reg_billing_phone" placeholder="<?php echo esc_html__('Phone No.', 'turbo'); ?>" value="<?php if (!empty($_POST['billing_phone'])) echo esc_attr($_POST['billing_phone']); ?>" required />
        </div>

        <div class="col-md-4">
            <input type="text" class="input-text rq-form-control reverse" name="billing_address_1" id="reg_billing_phone" placeholder="<?php echo esc_html__('Address', 'turbo'); ?>" value="<?php if (!empty($_POST['billing_phone'])) echo esc_attr($_POST['billing_phone']); ?>" required />
        </div>

    <?php
    }
}

add_action('woocommerce_register_form_start', 'turbo_extra_register_fields', 10, 0);


if (!function_exists('turbo_validate_extra_register_fields')) {
    /**
     * Validate the extra register fields.
     *
     * @param string $username Current username.
     * @param string $email Current email.
     * @param object $validation_errors WP_Error object.
     *
     * @return void
     */
    function turbo_validate_extra_register_fields($username, $email, $validation_errors)
    {
        if (isset($_POST['billing_first_name']) && empty($_POST['billing_first_name'])) {
            $validation_errors->add('billing_first_name_error', __('<strong>Error</strong>: First name is required!', 'turbo'));
        }

        if (isset($_POST['billing_last_name']) && empty($_POST['billing_last_name'])) {
            $validation_errors->add('billing_last_name_error', __('<strong>Error</strong>: Last name is required!.', 'turbo'));
        }


        if (isset($_POST['billing_phone']) && empty($_POST['billing_phone'])) {
            $validation_errors->add('billing_phone_error', __('<strong>Error</strong>: Phone is required!.', 'turbo'));
        }
    }
}

add_action('woocommerce_register_post', 'turbo_validate_extra_register_fields', 10, 3);


if (!function_exists('turbo_save_extra_register_fields')) {
    /**
     * Save the extra register fields.
     *
     * @param int $customer_id Current customer ID.
     *
     * @return void
     */
    function turbo_save_extra_register_fields($customer_id)
    {
        if (isset($_POST['billing_first_name'])) {
            // WordPress default first name field.
            update_user_meta($customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']));

            // WooCommerce billing first name.
            update_user_meta($customer_id, 'billing_first_name', sanitize_text_field($_POST['billing_first_name']));
        }

        if (isset($_POST['billing_last_name'])) {
            // WordPress default last name field.
            update_user_meta($customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']));

            // WooCommerce billing last name.
            update_user_meta($customer_id, 'billing_last_name', sanitize_text_field($_POST['billing_last_name']));
        }

        if (isset($_POST['billing_phone'])) {
            // WooCommerce billing phone
            update_user_meta($customer_id, 'billing_phone', sanitize_text_field($_POST['billing_phone']));
        }
    }
}

add_action('woocommerce_created_customer', 'turbo_save_extra_register_fields');


if (!function_exists('turbo_woocommerce_clear_cart_url')) {
    /**
     * Get the product title for the loop.
     *
     */
    function turbo_woocommerce_clear_cart_url()
    {
        global $woocommerce;
        if (isset($_GET['empty-cart'])) {
            $woocommerce->cart->empty_cart();
        }
    }
}

add_action('init', 'turbo_woocommerce_clear_cart_url');


if (!function_exists('turbo_woocommerce_after_cart')) {
    /**
     * Get the product title for the loop.
     *
     */
    function turbo_woocommerce_after_cart()
    {
        $options = get_option('turbo_option_data');
    ?>
        <?php if (isset($options['show_horizontal_cross_sell_products']) && !empty($options['show_horizontal_cross_sell_products'])) : ?>
            <div class="turbo-cross-sell-cars" style="clear: both">
                <div class="row">
                    <div class="rq-feature-tab">
                        <div class="rq-blog-listing">
                            <?php

                            /**
                             * woocommerce_after_single_product_summary hook.
                             *
                             * @hooked woocommerce_cross_sell_display - 15
                             */
                            woocommerce_cross_sell_display();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

<?php }
}

add_action('woocommerce_after_cart', 'turbo_woocommerce_after_cart');


/**
 * woo_hide_page_title
 *
 * Removes the "shop" title on the main shop page
 *
 * @access      public
 * @return      void
 * @since       1.0
 */
function turbo_shop_page_title($title)
{
    return $title;
};

add_filter('woocommerce_page_title', 'turbo_shop_page_title');


/**
 * turbo_manage_listing_data
 *
 * @return void
 */
function turbo_manage_listing_data()
{

    if (!class_exists('RedQ_Rental_And_Bookings')) return;

    $global_options = turbo_extract_option_data(array(
        'book_now_btn_label' => array(__('Book Now', 'turbo'), 'listing_book_now_btn_text'),
        'price_unit'         => array(__('/day', 'turbo'), 'listing_day_or_night_text'),
        'total_cost_label'   => array(__('Total Cost', 'turbo'), 'listing_total_cost_text'),
    ));

    $args = array(
        'type'             => 'redq_rental',
        'return'           => 'ids',
        'limit'            => -1,
        'suppress_filters' => 0,
    );
    $products = wc_get_products($args);

    if (sizeof($products) && is_array($products)) {
        foreach ($products as $key => $product_id) {
            $rnb_data = [];
            $car_company = [];

            $redq_product_inventory = function_exists('rnb_get_product_inventory_id') ? rnb_get_product_inventory_id($product_id) : '';
            $inventory_id = '';
            if (!empty($redq_product_inventory)) {
                $inventory_id = $redq_product_inventory[0];
            }

            if (taxonomy_exists('car_company')) {
                $car_company = get_the_terms($product_id, 'car_company');
            }

            $rnb_data['post_id'] = $product_id;
            $rnb_data['settings']['currency'] = get_woocommerce_currency_symbol();
            $rnb_data['settings']['global_options'] = $global_options;

            $attributes_by_inventories = WC_Product_Redq_Rental::redq_get_rental_non_payable_attributes('attributes', $product_id);
            $all_attributes = [];

            if (!empty($attributes_by_inventories)) {
                foreach ($attributes_by_inventories as $key => $attributes_by_inventory) {
                    $inventory_name = $attributes_by_inventory['title'];
                    $attributes = isset($attributes_by_inventory['attributes']) ? $attributes_by_inventory['attributes'] : [];
                    if (isset($attributes) && !empty($attributes)) {
                        foreach ($attributes as $key => $value) {
                            $all_attributes[] = $value;
                        }
                    }
                }
            }

            $all_attributes = array_unique($all_attributes, SORT_REGULAR);

            if (isset($all_attributes) && !empty($all_attributes)) {
                foreach ($all_attributes as $key => $value) {
                    if ($value['highlighted'] === 'yes') {
                        $rnb_data['attributes']['highlighted'][] = $value;
                    } else {
                        $rnb_data['attributes']['non_highlighted'][] = $value;
                    }
                }
            }

            $all_features = [];
            $features_by_inventories = WC_Product_Redq_Rental::redq_get_rental_non_payable_attributes('features', $product_id);

            if (!empty($features_by_inventories)) {
                foreach ($features_by_inventories as $key => $features_by_inventory) {
                    $inventory_name = $features_by_inventory['title'];
                    $features = isset($features_by_inventory['features']) ? $features_by_inventory['features'] : [];
                    if (isset($features) && !empty($features)) {
                        foreach ($features as $key => $value) {
                            $all_features[] = $value;
                        }
                    }
                }
            }

            $all_features = array_unique($all_features, SORT_REGULAR);

            if (isset($all_features) && !empty($all_features)) {
                foreach ($all_features as $key => $value) {
                    if ($value['highlighted'] === 'yes') {
                        $rnb_data['features']['highlighted'][] = $value;
                    } else {
                        $rnb_data['features']['non_highlighted'][] = $value;
                    }
                }
            }

            $rnb_data['brand'] = !empty($car_company) ? $car_company[0]->name : '';

            update_post_meta($product_id, '_redq_rental_all_data', json_encode($rnb_data, JSON_UNESCAPED_UNICODE));
        }
    }
}

add_action('init', 'turbo_manage_listing_data');


function turbo_mini_cart()
{
    $markup = '';

    //if( !is_null(WC()->cart) ) :
    $markup =
        '<div class="mini-cart-widget">
                <ul id="site-header-cart" class="site-header-cart menu">
                    <li class="current-menu-item">' . turbo_mini_cart_link() . '</li>
                    <li class="current-menu-content">' . the_widget('WC_Widget_Cart') . '</li>
                </ul>
            </div>';

    //endif;

    return $markup;
}


function turbo_mini_cart_link()
{
    $html =
        '<div class="item-count">
            <span class="mobile-search-icon"></span>
            <a href="' . wc_get_cart_url() . '" class="et-cart-info">
                <span class="cart-items-count">' . WC()->cart->get_cart_contents_count() . '</span>
            </a>    
        </div>';
    return $html;
}


/**
 * turbo_archive_thumbnail_size
 *
 * @param  string $size
 *
 * @return string
 */
function turbo_archive_thumbnail_size($size)
{
    return 'turbo_shop_image';
}

add_filter('single_product_archive_thumbnail_size', 'turbo_archive_thumbnail_size', 10, 1);


/**
 * Resize wooCommerce shop image
 *
 * @param string $image
 * @param int $attachment_id
 * @param string $size
 * @return array
 */
function turbo_get_attachment_image_src($image, $attachment_id, $size)
{
    if ($size === 'turbo_shop_image') {
        $feature_img_url = turbo_resize_image($attachment_id, '', 368, 260, true);
        $image[0] = $feature_img_url['url'];
        $image[1] = $feature_img_url['width'];
        $image[2] = $feature_img_url['height'];
    }

    return $image;
}
add_filter('wp_get_attachment_image_src', 'turbo_get_attachment_image_src', 10, 3);
