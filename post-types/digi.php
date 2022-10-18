<?php

/**
 * Registers the `digi` post type.
 */
function digi_init() {
	register_post_type(
		'digi',
		[
			'labels'                => [
				'name'                  => __( 'Digital Bussiness Cards', 'digital-business-card' ),
				'singular_name'         => __( 'Digital Bussiness Card', 'digital-business-card' ),
				'all_items'             => __( 'All Digital Bussiness Cards', 'digital-business-card' ),
				'archives'              => __( 'Digital Bussiness Card Archives', 'digital-business-card' ),
				'attributes'            => __( 'Digital Bussiness Card Attributes', 'digital-business-card' ),
				'insert_into_item'      => __( 'Insert into Digital Bussiness Card', 'digital-business-card' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Digital Bussiness Card', 'digital-business-card' ),
				'featured_image'        => _x( 'Featured Image', 'digi', 'digital-business-card' ),
				'set_featured_image'    => _x( 'Set featured image', 'digi', 'digital-business-card' ),
				'remove_featured_image' => _x( 'Remove featured image', 'digi', 'digital-business-card' ),
				'use_featured_image'    => _x( 'Use as featured image', 'digi', 'digital-business-card' ),
				'filter_items_list'     => __( 'Filter Digital Bussiness Cards list', 'digital-business-card' ),
				'items_list_navigation' => __( 'Digital Bussiness Cards list navigation', 'digital-business-card' ),
				'items_list'            => __( 'Digital Bussiness Cards list', 'digital-business-card' ),
				'new_item'              => __( 'New Digital Bussiness Card', 'digital-business-card' ),
				'add_new'               => __( 'Add New', 'digital-business-card' ),
				'add_new_item'          => __( 'Add New Digital Bussiness Card', 'digital-business-card' ),
				'edit_item'             => __( 'Edit Digital Bussiness Card', 'digital-business-card' ),
				'view_item'             => __( 'View Digital Bussiness Card', 'digital-business-card' ),
				'view_items'            => __( 'View Digital Bussiness Cards', 'digital-business-card' ),
				'search_items'          => __( 'Search Digital Bussiness Cards', 'digital-business-card' ),
				'not_found'             => __( 'No Digital Bussiness Cards found', 'digital-business-card' ),
				'not_found_in_trash'    => __( 'No Digital Bussiness Cards found in trash', 'digital-business-card' ),
				'parent_item_colon'     => __( 'Parent Digital Bussiness Card:', 'digital-business-card' ),
				'menu_name'             => __( 'Digital Bussiness Cards', 'digital-business-card' ),
			],
			'public'                => true,
			'hierarchical'          => false,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'supports'              => [ 'title', 'editor' ],
			'has_archive'           => true,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-admin-post',
			'show_in_rest'          => true,
			'rest_base'             => 'digi',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		]
	);

}

add_action( 'init', 'digi_init' );

/**
 * Sets the post updated messages for the `digi` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `digi` post type.
 */
function digi_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['digi'] = [
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Digital Bussiness Card updated. <a target="_blank" href="%s">View Digital Bussiness Card</a>', 'digital-business-card' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'digital-business-card' ),
		3  => __( 'Custom field deleted.', 'digital-business-card' ),
		4  => __( 'Digital Bussiness Card updated.', 'digital-business-card' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Digital Bussiness Card restored to revision from %s', 'digital-business-card' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false, // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Digital Bussiness Card published. <a href="%s">View Digital Bussiness Card</a>', 'digital-business-card' ), esc_url( $permalink ) ),
		7  => __( 'Digital Bussiness Card saved.', 'digital-business-card' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Digital Bussiness Card submitted. <a target="_blank" href="%s">Preview Digital Bussiness Card</a>', 'digital-business-card' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Digital Bussiness Card scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Digital Bussiness Card</a>', 'digital-business-card' ), date_i18n( __( 'M j, Y @ G:i', 'digital-business-card' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Digital Bussiness Card draft updated. <a target="_blank" href="%s">Preview Digital Bussiness Card</a>', 'digital-business-card' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	];

	return $messages;
}

add_filter( 'post_updated_messages', 'digi_updated_messages' );

/**
 * Sets the bulk post updated messages for the `digi` post type.
 *
 * @param  array $bulk_messages Arrays of messages, each keyed by the corresponding post type. Messages are
 *                              keyed with 'updated', 'locked', 'deleted', 'trashed', and 'untrashed'.
 * @param  int[] $bulk_counts   Array of item counts for each message, used to build internationalized strings.
 * @return array Bulk messages for the `digi` post type.
 */
function digi_bulk_updated_messages( $bulk_messages, $bulk_counts ) {
	global $post;

	$bulk_messages['digi'] = [
		/* translators: %s: Number of Digital Bussiness Cards. */
		'updated'   => _n( '%s Digital Bussiness Card updated.', '%s Digital Bussiness Cards updated.', $bulk_counts['updated'], 'digital-business-card' ),
		'locked'    => ( 1 === $bulk_counts['locked'] ) ? __( '1 Digital Bussiness Card not updated, somebody is editing it.', 'digital-business-card' ) :
						/* translators: %s: Number of Digital Bussiness Cards. */
						_n( '%s Digital Bussiness Card not updated, somebody is editing it.', '%s Digital Bussiness Cards not updated, somebody is editing them.', $bulk_counts['locked'], 'digital-business-card' ),
		/* translators: %s: Number of Digital Bussiness Cards. */
		'deleted'   => _n( '%s Digital Bussiness Card permanently deleted.', '%s Digital Bussiness Cards permanently deleted.', $bulk_counts['deleted'], 'digital-business-card' ),
		/* translators: %s: Number of Digital Bussiness Cards. */
		'trashed'   => _n( '%s Digital Bussiness Card moved to the Trash.', '%s Digital Bussiness Cards moved to the Trash.', $bulk_counts['trashed'], 'digital-business-card' ),
		/* translators: %s: Number of Digital Bussiness Cards. */
		'untrashed' => _n( '%s Digital Bussiness Card restored from the Trash.', '%s Digital Bussiness Cards restored from the Trash.', $bulk_counts['untrashed'], 'digital-business-card' ),
	];

	return $bulk_messages;
}

add_filter( 'bulk_post_updated_messages', 'digi_bulk_updated_messages', 10, 2 );
