<?php
/**
 * VC Row Core Shortcode Override
 *
 * @return array
 */
vc_map(
  array(
      'name' => __( 'Row', 'turbo-helper' ),
      'is_container' => true,
      'icon' => 'icon-wpb-row',
      'base' => 'vc_row',
      'show_settings_on_create' => false,
      'category' => __( 'Content', 'turbo-helper' ),
      'class' => 'vc_main-sortable-element',
      'description' => __( 'Place content elements inside the row', 'turbo-helper' ),
      'params' => array(
        array(
          'type' => 'dropdown',
          'heading' => __( 'ShortCode Wrapper Type', 'turbo-helper' ),
          'param_name' => 'turbo_section_wrapper',
          'value' => array(
            __( 'Default', 'turbo-helper' ) => '',
            __( 'In Container Section', 'turbo-helper' ) => 'turbo_container',
            __( 'In Container Fluid Section', 'turbo-helper' ) => 'turbo_container_fluid',
            __( 'Full Width', 'turbo-helper' ) => 'turbo_full_width',
          ),
        ),

        array(
            'type' => 'dropdown',
            'heading' => __( 'Row stretch', 'turbo-helper' ),
            'param_name' => 'full_width',
            'value' => array(
                __( 'Default', 'turbo-helper' ) => '',
                __( 'Stretch row', 'turbo-helper' ) => 'stretch_row',
                __( 'Stretch row and content', 'turbo-helper' ) => 'stretch_row_content',
                __( 'Stretch row and content (no paddings)', 'turbo-helper' ) => 'stretch_row_content_no_spaces',
            ),
            'description' => __( 'Select stretching options for row and content (Note: stretched may not work properly if parent container has "overflow: hidden" CSS property).', 'turbo-helper' ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Columns gap', 'turbo-helper' ),
            'param_name' => 'gap',
            'value' => array(
                '0px' => '0',
                '1px' => '1',
                '2px' => '2',
                '3px' => '3',
                '4px' => '4',
                '5px' => '5',
                '10px' => '10',
                '15px' => '15',
                '20px' => '20',
                '25px' => '25',
                '30px' => '30',
                '35px' => '35',
            ),
            'std' => '0',
            'description' => __( 'Select gap between columns in row.', 'turbo-helper' ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => __( 'Full height row?', 'turbo-helper' ),
            'param_name' => 'full_height',
            'description' => __( 'If checked row will be set to full height.', 'turbo-helper' ),
            'value' => array( __( 'Yes', 'turbo-helper' ) => 'yes' ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Columns position', 'turbo-helper' ),
            'param_name' => 'columns_placement',
            'value' => array(
                __( 'Middle', 'turbo-helper' ) => 'middle',
                __( 'Top', 'turbo-helper' ) => 'top',
                __( 'Bottom', 'turbo-helper' ) => 'bottom',
                __( 'Stretch', 'turbo-helper' ) => 'stretch',
            ),
            'description' => __( 'Select columns position within row.', 'turbo-helper' ),
            'dependency' => array(
                'element' => 'full_height',
                'not_empty' => true,
            ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => __( 'Equal height', 'turbo-helper' ),
            'param_name' => 'equal_height',
            'description' => __( 'If checked columns will be set to equal height.', 'turbo-helper' ),
            'value' => array( __( 'Yes', 'turbo-helper' ) => 'yes' ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Content position', 'turbo-helper' ),
            'param_name' => 'content_placement',
            'value' => array(
                __( 'Default', 'turbo-helper' ) => '',
                __( 'Top', 'turbo-helper' ) => 'top',
                __( 'Middle', 'turbo-helper' ) => 'middle',
                __( 'Bottom', 'turbo-helper' ) => 'bottom',
            ),
            'description' => __( 'Select content position within columns.', 'turbo-helper' ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => __( 'Use video background?', 'turbo-helper' ),
            'param_name' => 'video_bg',
            'description' => __( 'If checked, video will be used as row background.', 'turbo-helper' ),
            'value' => array( __( 'Yes', 'turbo-helper' ) => 'yes' ),
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'YouTube link', 'turbo-helper' ),
            'param_name' => 'video_bg_url',
            'value' => 'https://www.youtube.com/watch?v=lMJXxhRFO1k',
            // default video url
            'description' => __( 'Add YouTube link.', 'turbo-helper' ),
            'dependency' => array(
                'element' => 'video_bg',
                'not_empty' => true,
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Parallax', 'turbo-helper' ),
            'param_name' => 'video_bg_parallax',
            'value' => array(
                __( 'None', 'turbo-helper' ) => '',
                __( 'Simple', 'turbo-helper' ) => 'content-moving',
                __( 'With fade', 'turbo-helper' ) => 'content-moving-fade',
            ),
            'description' => __( 'Add parallax type background for row.', 'turbo-helper' ),
            'dependency' => array(
                'element' => 'video_bg',
                'not_empty' => true,
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'Parallax', 'turbo-helper' ),
            'param_name' => 'parallax',
            'value' => array(
                __( 'None', 'turbo-helper' ) => '',
                __( 'Simple', 'turbo-helper' ) => 'content-moving',
                __( 'With fade', 'turbo-helper' ) => 'content-moving-fade',
            ),
            'description' => __( 'Add parallax type background for row (Note: If no image is specified, parallax will use background image from Design Options).', 'turbo-helper' ),
            'dependency' => array(
                'element' => 'video_bg',
                'is_empty' => true,
            ),
        ),
        array(
            'type' => 'attach_image',
            'heading' => __( 'Image', 'turbo-helper' ),
            'param_name' => 'parallax_image',
            'value' => '',
            'description' => __( 'Select image from media library.', 'turbo-helper' ),
            'dependency' => array(
                'element' => 'parallax',
                'not_empty' => true,
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Parallax speed', 'turbo-helper' ),
            'param_name' => 'parallax_speed_video',
            'value' => '1.5',
            'description' => __( 'Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)', 'turbo-helper' ),
            'dependency' => array(
                'element' => 'video_bg_parallax',
                'not_empty' => true,
            ),
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Parallax speed', 'turbo-helper' ),
            'param_name' => 'parallax_speed_bg',
            'value' => '1.5',
            'description' => __( 'Enter parallax speed ratio (Note: Default value is 1.5, min value is 1)', 'turbo-helper' ),
            'dependency' => array(
                'element' => 'parallax',
                'not_empty' => true,
            ),
        ),
        vc_map_add_css_animation( false ),
        array(
            'type' => 'el_id',
            'heading' => __( 'Row ID', 'turbo-helper' ),
            'param_name' => 'el_id',
            'description' => sprintf( __( 'Enter row ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'turbo-helper' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
        ),
        array(
            'type' => 'checkbox',
            'heading' => __( 'Disable row', 'turbo-helper' ),
            'param_name' => 'disable_element',
            // Inner param name.
            'description' => __( 'If checked the row won\'t be visible on the public side of your website. You can switch it back any time.', 'turbo-helper' ),
            'value' => array( __( 'Yes', 'turbo-helper' ) => 'yes' ),
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Extra class name', 'turbo-helper' ),
            'param_name' => 'el_class',
            'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'turbo-helper' ),
        ),
        array(
            'type' => 'css_editor',
            'heading' => __( 'CSS box', 'turbo-helper' ),
            'param_name' => 'css',
            'group' => __( 'Design Options', 'turbo-helper' ),
        ),
    ),
    'js_view' => 'VcRowView',
  )
);
