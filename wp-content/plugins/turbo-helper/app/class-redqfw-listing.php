<?php
/**
 *
 */

namespace Turbowp_Helper\Admin;

class RedQ_Listing {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this , 'add_metabox' ) );
	}

	public function add_metabox() {
		$query_args = array(
		    'post_type' 		=> 'scholar_metabox',
		    'post_per_page' => -1,
		);
		$the_query = get_posts( $query_args );

		// get dynamic metaboxes from the builder
		$dynamic_metabox = array();

		foreach( $the_query as $post ) {
			$form_data = get_post_meta( $post->ID, 'formBuilder', true );
			$post_type = get_post_meta( $post->ID, 'scholar_post_type_select', true );
			if( !empty( $post_type ) && !empty( $form_data ) ) {
				$dynamic_metabox[] = array(
					'id' 						=> $post->post_name,
					'name' 					=> $post->post_title,
					'meta_preview' 	=> $form_data,
					'post_type' 		=> $post_type,
					'position' 			=> 'high',
					'template_path' => '/form/metabox-preview.php'
				);
			}
		}

		$args = array(
			array(
				'id' 						=> 'turbo_page_settings',
				'name' 					=> esc_html__('Page Settings', 'turbo-helper'),
				'post_type' 		=> 'page',
				'position' 			=> 'high',
				'template_path' => '/page-settings.php',
			),
			array(
				'id' 						=> 'turbo_post_settings',
				'name' 					=> esc_html__('Product/Post Local Settings', 'turbo-helper'),
				'post_type' 		=> array('product', 'post'),
				'position' 			=> 'core',
				'template_path' => '/post-settings.php',
			),


		);

		new RedQ_Generate_MetaBox( array_merge( $args, $dynamic_metabox ) );
	}

}
