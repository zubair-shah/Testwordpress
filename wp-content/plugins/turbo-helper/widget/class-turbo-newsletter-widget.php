<?php

/**
 * Adds Newsletter widget.
 */
class turbo_Newsletter_Widgets extends WP_Widget
{

    /**
     * Register widget with WordPress.
     */
    function __construct()
    {
        parent::__construct(
            'turbo_newsletter_widget', // Base ID
            esc_html__('Turbo Newsletter', 'turbo'), // Name
            array('description' => esc_html__('A widget for newsletter. ', 'turbo'),) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     */
    public function widget($args, $instance)
    {
        echo apply_filters('redq_newsletter_before', $args['before_widget']);
        // print_r($instance);
        ?>
        <div class="widget-list">
            <div class="rq-newsletter">
                <h4 class="widget-title"><?php echo esc_attr($instance['title']); ?></h4>
                <form action="<?php echo esc_url($instance['email_link']); ?>" method="post"
                      id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                      class="validate rq-newsletter-form" target="_blank">

                    <input type="email" value="" name="EMAIL"
                           placeholder="<?php echo esc_attr($instance['placeholder']); ?>" class="fq-newsletter-form"
                           required>
                    <button class="rq-btn" type="submit"><i class="ion-android-send"></i></button>
                </form>
            </div>
        </div>
        <?php
        echo apply_filters('redq_newsletter_after', $args['after_widget']);
    }

    /**
     * Back-end widget form.
     */
    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Sign up for get our newsletter', 'turbo');
        $placeholder = !empty($instance['placeholder']) ? $instance['placeholder'] : esc_html__('Your Email...', 'turbo');
        $email_link = !empty($instance['email_link']) ? $instance['email_link'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'turbo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('placeholder')); ?>"><?php esc_html_e('Placeholder:', 'turbo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('placeholder')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('placeholder')); ?>" type="text"
                   value="<?php echo esc_attr($placeholder); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email_link')); ?>"><?php esc_html_e('Mailchimp URL:', 'turbo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('email_link')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('email_link')); ?>" type="text"
                   value="<?php echo esc_attr($email_link); ?>">
        </p>

        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['placeholder'] = (!empty($new_instance['placeholder'])) ? strip_tags($new_instance['placeholder']) : '';
        $instance['email_link'] = (!empty($new_instance['email_link'])) ? strip_tags($new_instance['email_link']) : '';

        return $instance;
    }

}

// register Newsletter widget
function register_turbo_newsletter_widget()
{
    register_widget('turbo_Newsletter_Widgets');
}

add_action('widgets_init', 'register_turbo_newsletter_widget');
