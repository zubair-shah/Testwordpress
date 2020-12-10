<?php

/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$rating   = intval(get_comment_meta($comment->comment_ID, 'rating', true));
$verified = wc_review_is_from_verified_owner($comment->comment_ID);
global $post;
if (!empty($post)) {
    $choose_options   = get_post_meta($post->ID, '_general_options_from', true);
    $choose_options   = $choose_options ? $choose_options : 'option_panel';
    if ($choose_options != 'option_panel') {
        $local_options = turbo_extract_post_meta_data(array(
            'choose_layout'  => array('normal_layout', '_layout_options_settings'),
        ));
        extract($local_options);
    } else {
        $global_options = turbo_extract_option_data(array(
            'choose_layout'  => array('normal_layout', 'turbo_woocommerce_layout'),
        ));
        extract($global_options);
    }
}
?>
<?php if (isset($choose_layout) && $choose_layout === 'normal_layout') { ?>
    <li itemprop="review" itemscope itemtype="http://schema.org/Review" <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>" class="comment_container author-info-content">
            <div class="author-img">
                <?php echo get_avatar($comment, apply_filters('woocommerce_review_gravatar_size', '75'), ''); ?>
            </div>
            <div class="comment-text">
                <?php do_action('woocommerce_review_before_comment_meta', $comment); ?>
                <?php if ($comment->comment_approved == '0') : ?>
                    <p class="meta"><em><?php esc_html_e('Your comment is awaiting approval', 'turbo'); ?></em></p>
                <?php else : ?>
                    <span class="author-name"><?php comment_author(); ?>
                        <?php
                        if (get_option('woocommerce_review_rating_verification_label') === 'yes')
                            if ($verified)
                                echo '<em class="verified">(' . esc_html__('verified owner', 'turbo') . ')</em> ';
                        ?>
                    </span>
                <?php endif; ?>
                <?php do_action('woocommerce_review_before_comment_text', $comment); ?>
                <span class="author-role"><?php comment_text(); ?></span>
                <?php do_action('woocommerce_review_after_comment_text', $comment); ?>
            </div>
        </div>
    </li>
<?php } else { ?>
    <li itemprop="review" itemscope itemtype="http://schema.org/Review" <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>" class="comment_container author-info-content">
            <div class="comment-text">
                <?php if ($comment->comment_approved == '0') : ?>
                    <p class="meta"><em><?php esc_html_e('Your comment is awaiting approval', 'turbo'); ?></em></p>
                <?php else : ?>
                    <div class="listing-comment-author-info">
                        <div class="listing-author-img">
                            <?php echo get_avatar($comment, apply_filters('woocommerce_review_gravatar_size', '75'), ''); ?>
                        </div>
                        <div class="listing-author-meta">
                            <span class="listing-author-name">
                                <?php
                                comment_author();
                                if ($verified);
                                if ($verified)
                                    echo '<em class="verified">(' . esc_html__('verified owner', 'turbo') . ')</em> ';
                                ?>
                            </span>
                            <span class="listing-author-rating">
                                <?php do_action('woocommerce_review_before_comment_meta', $comment); ?>
                                <?php
                                if (get_option('woocommerce_review_rating_verification_label') === 'yes');
                                ?>
                            </span>
                            <span class="listing-author-review-date">
                                <?php echo esc_html__('Reviewed ', 'turbo'); ?>
                                <span class="date"><?php echo get_comment_date(); ?></span>
                            </span>
                        </div>
                    </div>
                <?php endif; ?>
                <?php do_action('woocommerce_review_before_comment_text', $comment); ?>
                <span class="author-role"><?php comment_text(); ?></span>
                <?php do_action('woocommerce_review_after_comment_text', $comment); ?>
            </div>
        </div>
    </li>
<?php } ?>