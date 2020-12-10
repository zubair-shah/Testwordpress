<?php global $product; ?>
<?php if (get_option('woocommerce_review_rating_verification_required') === 'no' || wc_customer_bought_product('', get_current_user_id(), $product->get_id())) : ?>
    <?php
    $commenter = wp_get_current_commenter();

    $comment_form = array(
        'title_reply'          => have_comments() ? esc_html__('Write Your Review', 'turbo') : sprintf(__('Be the first to review &ldquo;%s&rdquo;', 'turbo'), get_the_title()),
        'title_reply_to'       => esc_html__('Leave a Reply to %s', 'turbo'),
        'comment_notes_before' => '',
        'comment_notes_after'  => '',
        'fields'               => array(
            'author' => '<p class="comment-form-author">' . '<label for="author">' . esc_html__('Name', 'turbo') . ' <span class="required">*</span></label> ' .
                '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" aria-required="true" /></p>',
            'email'  => '<p class="comment-form-email"><label for="email">' . esc_html__('Email', 'turbo') . ' <span class="required">*</span></label> ' .
                '<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" aria-required="true" /></p>',
        ),
        'label_submit'  => esc_html__('Submit', 'turbo'),
        'logged_in_as'  => '',
        'comment_field' => ''
    );

    if ($account_page_url = wc_get_page_permalink('myaccount')) {
        $comment_form['must_log_in'] = '<p class="must-log-in">' .  sprintf(__('You must be <a href="%s">logged in</a> to post a review.', 'turbo'), esc_url($account_page_url)) . '</p>';
    }

    if (get_option('woocommerce_enable_review_rating') === 'yes') {
        $comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . esc_html__('Your Rating', 'turbo') . '</label><select name="rating" id="rating">
            <option value="">' . esc_html__('Rate&hellip;', 'turbo') . '</option>
            <option value="5">' . esc_html__('Perfect', 'turbo') . '</option>
            <option value="4">' . esc_html__('Good', 'turbo') . '</option>
            <option value="3">' . esc_html__('Average', 'turbo') . '</option>
            <option value="2">' . esc_html__('Not that bad', 'turbo') . '</option>
            <option value="1">' . esc_html__('Very Poor', 'turbo') . '</option>
            </select></p>';
    }

    $comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__('Your Review', 'turbo') . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';

    comment_form(apply_filters('woocommerce_product_review_comment_form_args', $comment_form));
    ?>

<?php else : ?>
    <p class="woocommerce-verification-required"><?php esc_html_e('Only logged in customers who have purchased this product may leave a review.', 'turbo'); ?></p>
<?php endif; ?>