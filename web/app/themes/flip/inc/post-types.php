<?php

/**
 * Use this file to register any custom post types you wish to create.
 */
if ( ! function_exists( 'flip_create_custom_post_type' ) ) {
	// Register Custom Post Type
	function flip_create_custom_post_type() {

		register_post_type( 'resources', array(
			'label'               => __( 'Resources', 'flip' ),
			'description'         => __( 'Resources', 'flip' ),
			//'labels'                => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt' ),
			'taxonomies'          => array( '' ),
			'menu_icon' => 'dashicons-admin-generic',
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest'        => true,
		) );
	}

	add_action( 'init', 'flip_create_custom_post_type', 0 ); // Register Custom Taxonomy
}

if ( ! function_exists( 'flip_create_custom_taxonomy' ) ) {
	function flip_create_custom_taxonomy() {
		
		register_taxonomy('type-resources', array('resources'), array(
			'labels'            => array(
				'name'          => _x('Type', 'Taxonomy General Name', 'flip'),
				'singular_name' => _x('type-resources', 'Taxonomy Singular Name', 'flip'),
				'menu_name'     => __('Type', 'flip'),
				'all_items'     => __('All Type', 'flip'),
				'edit_item'     => __('Edit Type', 'flip'),
				'update_item'   => __('Update Type', 'flip'),
				'add_new_item'  => __('Add New Type', 'flip'),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_in_rest'      => true,
		));

		register_taxonomy('partners', array('resources'), array(
			'labels'            => array(
				'name'          => _x('Partners', 'Taxonomy General Name', 'flip'),
				'singular_name' => _x('partners', 'Taxonomy Singular Name', 'flip'),
				'menu_name'     => __('Partners', 'flip'),
				'all_items'     => __('All Partners', 'flip'),
				'edit_item'     => __('Edit Partner', 'flip'),
				'update_item'   => __('Update Partner', 'flip'),
				'add_new_item'  => __('Add New Partner', 'flip'),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_in_rest'      => true,
		));

		register_taxonomy('campaign', array('resources'), array(
			'labels'            => array(
				'name'          => _x('Campaign', 'Taxonomy General Name', 'flip'),
				'singular_name' => _x('Campaign', 'Taxonomy Singular Name', 'flip'),
				'menu_name'     => __('Campaign', 'flip'),
				'all_items'     => __('All Campaign', 'flip'),
				'edit_item'     => __('Edit Campaign', 'flip'),
				'update_item'   => __('Update Campaign', 'flip'),
				'add_new_item'  => __('Add New Campaign', 'flip'),
			),
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_in_rest'      => true,
		));
	}

	add_action( 'init', 'flip_create_custom_taxonomy', 0 );
}