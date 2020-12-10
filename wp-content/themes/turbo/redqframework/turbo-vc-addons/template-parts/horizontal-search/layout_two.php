<?php
$attrs_data = $template_args['attrs_data'];
$helper_data = $template_args['helper_data'];
$content = $template_args['content'];

extract($attrs_data);
extract($helper_data);
?>
<div class="header <?php echo esc_attr($layout_class); ?>">
    <div class="header-body"
         style="background: url('<?php echo esc_url($feature_image[0]); ?>') top center no-repeat; background-size: 100% auto;">
        <div class="container">
            <div class="rq-home-banner-conetnt <?php echo esc_attr($content_class); ?>">
                <?php if ($heading_sub_title): ?>
                    <h6>
                        <span><?php echo esc_attr($heading_tag_title); ?></span><?php echo esc_attr($heading_sub_title); ?>
                    </h6>
                <?php endif; ?>
                <h1><?php echo esc_attr($heading_title); ?></h1>
                <p><?php echo do_shortcode($content); ?><p>
                    <?php if ($search_button_section === 'show'): ?>
                <div class="rq-search-banner-buttons">
                    <a class="rq-search-explore-btn <?php echo esc_attr($search_button_section_class); ?>"
                       href="<?php echo esc_url($explore_button_link); ?>">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M256,0C153.755,0,70.573,83.182,70.573,185.426c0,126.888,165.939,313.167,173.004,321.035
                                            c6.636,7.391,18.222,7.378,24.846,0c7.065-7.868,173.004-194.147,173.004-321.035C441.425,83.182,358.244,0,256,0z M256,278.719
                                            c-51.442,0-93.292-41.851-93.292-93.293S204.559,92.134,256,92.134s93.291,41.851,93.291,93.293S307.441,278.719,256,278.719z"/>
                                    </g>
                                </g>
                            </svg>
                        <span class="btn-text">
                                <?php echo esc_attr($explore_button_text); ?>
                            </span>
                    </a>
                    <a class="rq-search-details-btn <?php echo esc_attr($search_button_section_class); ?>"
                       href="<?php echo esc_url($details_button_link); ?>">
                            <span class="btn-text">
                                <?php echo esc_attr($details_button_text); ?>
                            </span>
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 31.49 31.49" style="enable-background:new 0 0 31.49 31.49;"
                             xml:space="preserve">
                            <path d="M21.205,5.007c-0.429-0.444-1.143-0.444-1.587,0c-0.429,0.429-0.429,1.143,0,1.571l8.047,8.047H1.111
                                C0.492,14.626,0,15.118,0,15.737c0,0.619,0.492,1.127,1.111,1.127h26.554l-8.047,8.032c-0.429,0.444-0.429,1.159,0,1.587
                                c0.444,0.444,1.159,0.444,1.587,0l9.952-9.952c0.444-0.429,0.444-1.143,0-1.571L21.205,5.007z"/>
                            </svg>
                    </a>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<div class="turbo-horizontal-search-bottom">
    <div class="container">
        <?php turbo_search_form($attrs_data); ?>
    </div>
</div>