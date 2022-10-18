<?php

/**
 * Registers the `services` taxonomy,
 * for use with 'digi'.
 */
function services_init() {
	register_taxonomy( 'services', [ 'digi' ], [
		'hierarchical'          => true,
		'public'                => true,
		'show_in_nav_menus'     => true,
		'show_ui'               => true,
		'show_admin_column'     => false,
		'query_var'             => true,
		'rewrite'               => true,
		'capabilities'          => [
			'manage_terms' => 'edit_posts',
			'edit_terms'   => 'edit_posts',
			'delete_terms' => 'edit_posts',
			'assign_terms' => 'edit_posts',
		],
		'labels'                => [
			'name'                       => __( 'Services', 'digital-business-card' ),
			'singular_name'              => _x( 'Services', 'taxonomy general name', 'digital-business-card' ),
			'search_items'               => __( 'Search Services', 'digital-business-card' ),
			'popular_items'              => __( 'Popular Services', 'digital-business-card' ),
			'all_items'                  => __( 'All Services', 'digital-business-card' ),
			'parent_item'                => __( 'Parent Services', 'digital-business-card' ),
			'parent_item_colon'          => __( 'Parent Services:', 'digital-business-card' ),
			'edit_item'                  => __( 'Edit Services', 'digital-business-card' ),
			'update_item'                => __( 'Update Services', 'digital-business-card' ),
			'view_item'                  => __( 'View Services', 'digital-business-card' ),
			'add_new_item'               => __( 'Add New Services', 'digital-business-card' ),
			'new_item_name'              => __( 'New Services', 'digital-business-card' ),
			'separate_items_with_commas' => __( 'Separate Services with commas', 'digital-business-card' ),
			'add_or_remove_items'        => __( 'Add or remove Services', 'digital-business-card' ),
			'choose_from_most_used'      => __( 'Choose from the most used Services', 'digital-business-card' ),
			'not_found'                  => __( 'No Services found.', 'digital-business-card' ),
			'no_terms'                   => __( 'No Services', 'digital-business-card' ),
			'menu_name'                  => __( 'Services', 'digital-business-card' ),
			'items_list_navigation'      => __( 'Services list navigation', 'digital-business-card' ),
			'items_list'                 => __( 'Services list', 'digital-business-card' ),
			'most_used'                  => _x( 'Most Used', 'services', 'digital-business-card' ),
			'back_to_items'              => __( '&larr; Back to Services', 'digital-business-card' ),
		],
		'show_in_rest'          => true,
		'rest_base'             => 'services',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	] );

}

add_action( 'init', 'services_init' );

/**
 * Sets the post updated messages for the `services` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `services` taxonomy.
 */
function services_updated_messages( $messages ) {

	$messages['services'] = [
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Services added.', 'digital-business-card' ),
		2 => __( 'Services deleted.', 'digital-business-card' ),
		3 => __( 'Services updated.', 'digital-business-card' ),
		4 => __( 'Services not added.', 'digital-business-card' ),
		5 => __( 'Services not updated.', 'digital-business-card' ),
		6 => __( 'Services deleted.', 'digital-business-card' ),
	];

	return $messages;
}

add_filter( 'term_updated_messages', 'services_updated_messages' );
