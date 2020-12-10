<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see        http://docs.woothemes.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     3.3.0
 */
$choose_options = get_post_meta(get_the_ID(), '_turbo_woocommerce_options_form', true);
$choose_options = $choose_options ? $choose_options : 'option_panel';
if (is_page() && $choose_options != 'option_panel') {
    $local_options = turbo_extract_post_meta_data(array(
        'choose_layout' => array('normal_layout', '_turbo_woocommerce_layout'),
    ));
    extract($local_options);
} else {
    $global_options = turbo_extract_option_data(array(
        'choose_layout' => array('normal_layout', 'turbo_woocommerce_layout'),
    ));
    extract($global_options);
}
?>
<?php if (isset($choose_layout) && $choose_layout !== 'normal_layout') { ?>
    <div class="rq-car-listing-wrapper products turbo-listing-shop-items">
    <div class="rq-listing-choose rq-listing-grid">
    <div class="row">
<?php } else { ?>
    <div class="rq-car-listing-wrapper products">
        <div class="rq-listing-choose rq-listing-grid">
            <div class="row">
<?php } ?>