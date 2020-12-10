<div id="reuse_turbo_page_settings"></div>

<?php

/**
 * Localize the updated data from database
 */
use Turbowp_Helper\Admin\RedQ_Admin_Lacalize;

$settings_array = new RedQ_Admin_Lacalize();
$page_options = get_post_meta($post->ID, '_turbo_page_settings', true);
$conditional_logic = $settings_array->turbo_re_conditional_logic();


wp_localize_script(
    'turbo-page-settings',
    'SCHOLAR_ADMIN',
    apply_filters('scholar_admin_generator_localize_args', array(
        'PAGE_SETTINGS' => get_post_meta($post->ID, '_turbo_page_settings', true),
        'conditions' => $conditional_logic,
    ))
);

?>
<input type="hidden" id="_turbo_page_settings" name="_turbo_page_settings" value="<?php echo esc_attr(isset($page_options) ? $page_options : '{}') ?>">
