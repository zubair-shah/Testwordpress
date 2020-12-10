<?php
$atts = shortcode_atts(
    array(
        'accordion_link_title' => !empty($accordion_link_title) ? $accordion_link_title : esc_html__("Our mission", 'turbo'),
        'accordion_link_desc'  => !empty($accordion_link_desc) ? $accordion_link_desc : esc_html__("Input some description here", 'turbo'),
        'accordion_link_icon'  => !empty($accordion_link_icon) ? $accordion_link_icon : '',
        'accordion_link_id'    => !empty($accordion_link_id) ? $accordion_link_id : '1',
    ),
    $atts
);
extract($atts);
?>

<div class="card">
    <div class="card-header" id="heading<?php echo esc_attr($accordion_link_id); ?>">
        <button class="collapsed" role="button" data-toggle="collapse" data-target="#collapse<?php echo esc_attr($accordion_link_id); ?>" aria-controls="collapse<?php echo esc_attr($accordion_link_id); ?>">
            <i class="<?php echo esc_attr($accordion_link_icon); ?>"></i>
            <?php echo esc_attr($accordion_link_title); ?>
        </button>
    </div>

    <div id="collapse<?php echo esc_attr($accordion_link_id); ?>" class="collapse" aria-labelledby="heading<?php echo esc_attr($accordion_link_id); ?>" data-parent="#accordionFAQ">
        <div class="card-body">
            <?php echo esc_attr($accordion_link_desc); ?>
        </div>
    </div>
</div>