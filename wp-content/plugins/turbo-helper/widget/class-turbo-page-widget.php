<?php

class turbo_Pages_Widgets extends WP_Widget
{
    public function __construct()
    {
        $widget_ops = array(
            'description' => esc_html__("A list of your site&#8217;s Pages.", 'turbo')
        );
        parent::__construct('turbo_pages', esc_html__('Turbo Pages', 'turbo'), $widget_ops);
    }

    public function widget($args, $instance)
    {
        extract($args);
        $select = empty($instance['select']) ? '' : $instance['select'];
        echo apply_filters('redq_before_page_widgets', $args['before_widget']);
        echo apply_filters('redq_before_page_title', $args['before_title']);
        ?>
        <div class="widget-list">
            <ul>
                <?php
                foreach ($select as $post_id) {
                    echo '<li><a href="' . get_the_permalink($post_id) . '">' . esc_attr(get_the_title($post_id)) . '</a></li>';
                }
                ?>
            </ul>
        </div>
        <?php
        echo apply_filters('redq_after_page_title', $args['after_title']);
        echo apply_filters('redq_after_page_widgets', $args['after_widget']);
    }

    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['select'] = esc_sql($new_instance['select']);
        return $instance;
    }

    public function form($instance)
    {
        if ($instance)
            $select = $instance['select'];
        else
            $select = '';

        $get_page = get_pages(array(
            'order'          => 'DESC',
            'posts_per_page' => 200,
            'post_status'    => 'publish',
            'post_type'      => 'page',
        ));
        if ($get_page) {
            printf(
                '<select
                  multiple="multiple"
                  name="%s[]"
                  id="%s"
                  class="widefat"
                  size="10"
                  style="margin: 5px;">',
                $this->get_field_name('select'),
                $this->get_field_id('select')
            );
            foreach ($get_page as $page) {
                printf(
                    '<option value="%s" class="widefat" %s>%s</option>',
                    $page->ID,
                    is_array($select) && in_array($page->ID, $select) ? 'selected="selected"' : '',
                    $page->post_title
                );
            }
            echo '</select>';
        } else
            esc_html__('No Pages have found', 'turbo');
    }
}

function turbo_pages()
{
    register_widget('turbo_Pages_Widgets');
}

add_action('widgets_init', 'turbo_pages');
