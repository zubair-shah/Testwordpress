<?php

/**
 * Shortcode for about us our team
 * @author RedQ Team
 * @package Turbowp Helper
 * @since 1.0
 */

$atts = shortcode_atts(
    array(
        'member_name'     => !empty($member_name) ? $member_name : esc_html__('Alex Luther', 'turbo'),
        'designation'     => !empty($designation) ? $designation : esc_html__('Co-founder', 'turbo'),
        'social_twitter'  => !empty($social_twitter) ? $social_twitter : 'https://twitter.com',
        'social_facebook' => !empty($social_facebook) ? $social_facebook : 'https://facebook.com',
        'social_dribbble' => !empty($social_dribbble) ? $social_dribbble : 'https://facebook.com',
        'member_image'    => ''
    ),
    $atts
);
extract($atts);

$img = wp_get_attachment_image_src($member_image, "full");
$imgSrc = $img[0];
?>

<div class="col-lg-4 col-sm-6">
    <div class="member-single">
        <div class="member-avatar">
            <img src="<?php echo esc_url($imgSrc); ?>" alt="<?php echo esc_attr($member_name); ?>">
        </div>
        <div class="member-info">
            <a href="#"><?php echo esc_attr($member_name); ?></a>
            <p><?php echo esc_attr($designation); ?></p>
            <ul class="list-unstyled social-list">
                <li><a href="<?php echo esc_url($social_facebook); ?>"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="<?php echo esc_url($social_twitter); ?>"><i class="fab fa-twitter"></i></a></li>
                <li><a href="<?php echo esc_url($social_dribbble); ?>"><i class="fab fa-dribbble"></i></a></li>
            </ul>
        </div>
    </div>
</div>