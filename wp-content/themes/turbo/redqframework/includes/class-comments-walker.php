<?php

/**
 * Comments walker for turbo
 *
 * @return turbo blog comment for turbo.
 * @since Trubowp 1.0
 * @author   RedQTeam
 */
class turbo_Comments_Walker extends Walker_Comment
{

    /*initialize classwide variables*/

    var $tree_type = 'comment';
    var $db_fields = array('parent' => 'comment_parent', 'id' => 'comment_ID');

    function start_lvl(&$output, $depth = 0, $args = array())
    {

        $GLOBAL['comment_depth'] = $depth + 1; ?>
        <ul>
        <?php

    }

    function end_lvl(&$output, $depth = 0, $args = array())
    {

        $GLOBAL['comment_depth'] = $depth + 1; ?>
        </ul>

    <?php
    }


    function start_el(&$output, $comment, $depth = 0, $args = array(), $id = 0)
    {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment'] = $comment;
        $parent_class = empty($args['has_children']) ? '' : 'parent';
    ?>

        <li id="comment-<?php comment_ID(); ?>" class="comment">
            <div class="comment-card">
                <div class="comment-author-img">
                    <?php echo get_avatar($comment, $size = '64'); ?>
                </div>
                <div class="comment-details">
                    <span class="author-name">
                        <a class="name" href="<?php comment_author_url(); ?>"><?php comment_author(); ?> - </a>
                        <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                    </span>
                    <span class="comment-text">
                        <?php comment_text(); ?>
                    </span>
                    <span class="date"><?php echo get_comment_date(); ?><?php esc_html_e('at', 'turbo') ?><?php echo human_time_diff(get_comment_time('U'), current_time('timestamp')); ?><?php esc_html_e('ago', 'turbo') ?></span>
                </div>
            </div>
        <?php }

    function end_el(&$output, $comment, $depth = 0, $args = array())
    { ?>
        </li>
<?php }
}
