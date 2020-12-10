<div id="reuse_turbo_post_settings"></div>
<?php
/**
 * Localize the updated data from database
 */

use Turbowp_Helper\Admin\RedQ_Admin_Lacalize;

$settings_array = new RedQ_Admin_Lacalize();
$post_options = get_post_meta($post->ID, '_turbo_post_settings', true);
$conditional_logic = $settings_array->turbo_re_conditional_logic_post();

wp_localize_script(
    'turbo-post-settings',
    'TURBO_ADMIN',
    apply_filters('scholar_admin_generator_localize_args', array(
        'POST_SETTINGS' => $post_options,
        'conditions'         => $conditional_logic,
    ))
);
?>
<input type="hidden" id="_turbo_post_settings" name="_turbo_post_settings" value="<?php echo esc_attr(isset($post_options) ? $post_options : '{}') ?>">