<?php
$atts = shortcode_atts(
    array(
        'accordion_banner_title' => !empty($accordion_banner_title) ? $accordion_banner_title : esc_html__("Accordion", 'turbo'),
    ),
    $atts
);
extract($atts);
?>
<div id="rq-accordions-portion" class="rq-content-block turbo-accordion-area">
    <div class="container">
        <h3 class="elements-title"><?php echo esc_attr($accordion_banner_title); ?></h3>
        <div class="rq-accordions">
            <!-- start of accordion -->
            <div class="accordion" id="accordionFAQ">
                <?php echo do_shortcode($content) ?>
            </div>
            <!-- end of accordion -->
        </div>
    </div>
</div>