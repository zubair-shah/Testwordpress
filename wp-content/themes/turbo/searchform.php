<?php
/**
 * Template for displaying search forms in Twenty Sixteen
 *
 * @package WordPress
 * @subpackage turbo
 * @since Twenty Sixteen 1.0
 */
?>

<form role="search" method="get" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">

    <input type="text" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'turbo'); ?>"
           value="<?php echo get_search_query(); ?>" name="s"/>

    <input type="submit" id="searchsubmit" value="<?php echo esc_html__('Search', 'turbo'); ?>">
</form>
