<?php

/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage turbo
 * @since turbo 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}

?>
<div id="comments" class="post-comment-section">
    <?php if (get_comments_number()) : ?>
        <h2 class="single-sub-title">
            <?php comments_number(esc_html__('No Comment', 'turbo'), esc_html__(' 1 Comment', 'turbo'), esc_html__(' % Comments', 'turbo')); ?>
        </h2>
    <?php endif; ?>
    <div class="comment-wrapper">
        <ol class="comment-list">
            <?php
            $args = array(
                'walker' => new turbo_Comments_Walker,
                'style'  => 'ol',
            );
            wp_list_comments($args);
            ?>
        </ol>
    </div>
    <?php if (comments_open()) :

        $args = array(
            'id_form'            => 'commentform',
            'class_form'         => 'comment-respond',
            'id_submit'          => 'submit',
            'class_submit'       => 'continue-btn rq-btn rq-btn-normal',
            'title_reply'        => esc_html__('Leave a comment', 'turbo'),
            'title_reply_to'     => esc_html__('Leave a reply to %s', 'turbo'),
            'cancel_reply_link'  => esc_html__('Cancel reply', 'turbo'),
            'label_submit'       => esc_html__('Submit Comment', 'turbo'),
            'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title single-sub-title">',
            'title_reply_after'  => '</h2>',

            'comment_field' => '<div class="row"><div class="col-md-12"><textarea id="comment" placeholder="' . esc_html__("Here goes your comment", 'turbo') . '" name="comment" class="comment-input" aria-required="true"></textarea></div></div>',

            'must_log_in' => '<p class="must-log-in">' .
                sprintf(
                    __('You must be <a href="%s">logged in</a> to post a comment.', 'turbo'),
                    wp_login_url(apply_filters('the_permalink', get_permalink()))
                ) . '</p>',

            'logged_in_as' => '<p class="logged-in-as">' .
                sprintf(
                    __('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'turbo'),
                    admin_url('profile.php'),
                    $user_identity,
                    wp_logout_url(apply_filters('the_permalink', get_permalink()))
                ) . '</p>',

            'comment_notes_before' => '',

            'comment_notes_after' => '',

            'fields' => apply_filters(
                'comment_form_default_fields',
                array(

                    'author' =>
                    '<div class="row"> <div class="col-md-4"><input id="author" name="author" type="text" placeholder="' . esc_html__("Enter your name...", 'turbo') . '" class="comment-input" value="' . esc_attr($commenter['comment_author']) .
                        '" /></div>',

                    'email' =>
                    '<div class="col-md-4"><input id="email" class="comment-input" name="email" placeholder="' . esc_html__("Enter your email...", 'turbo') . '" type="text" value="' . esc_attr($commenter['comment_author_email']) .
                        '" /></div>',

                    'url' =>
                    '<div class="col-md-4"><input id="url" name="url" class="comment-input" placeholder="' . esc_html__("Website(optional)", 'turbo') . '" type="text" value="' . esc_attr($commenter['comment_author_url']) .
                        '" /></div></div>'
                )
            ),
        );

        comment_form($args);


    endif; // if comments_open 
    ?>

    <?php
    if (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) { ?>
        <p class="closed"><?php esc_html_e('comments are closed .', 'turbo'); ?></p>
    <?php }
    ?>
</div>
</div>