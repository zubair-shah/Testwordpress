<?php
/**
 * Save MetaBox
 */

namespace Turbowp_Helper\Admin;

class SaveMeta {

	public function __construct() {
		add_action( 'save_post', array( $this, 'save_metabox' ), 9 );
	}

	public function save_metabox( $post_id ){

		$query_args = array(
		    'post_type' 	=> 'scholar_metabox',
		    'post_per_page' => -1,
		);
		$the_query = get_posts( $query_args );

		// get dynamic metaboxes from the builder
		$dynamic_args = array();

		foreach( $the_query as $post ) {

			$post_type = get_post_meta( $post->ID, 'scholar_post_type_select', true );

			$generated_id = str_replace( '-', '_', strtolower( $post->post_name ) );
			$dynamic_input_name = '_scholar_dynamic_meta_data_' . $generated_id;

			$dynamic_args[] = array(
				'post_id' 			=> $post_id,
				'post_type' 		=> $post_type,
				'has_individual' 	=> true,
				'meta_fields' 		=> array(
					$dynamic_input_name,
				),
			);
		}

		$args = array(
			array(
				'post_id' 			=> $post_id,
				'post_type' 		=> 'page',
				'has_individual' 	=> true,
				'meta_fields' 		=> array(
					'_turbo_page_settings',
				),
			),
			array(
				'post_id' 			=> $post_id,
				'post_type' 		=> 'product',
				'has_individual' 	=> true,
				'meta_fields' 		=> array(
					'_turbo_post_settings',
				),
			),
		);

		new Redq_Generate_Metabox_Saver( array_merge( $args, $dynamic_args ) );
	}
}
