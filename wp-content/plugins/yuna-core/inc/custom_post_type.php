<?php

	/**
	 * Register a team post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since yuna 1.0
	 */

	function yuna_team_post_type() {

		$labels = array(
			'name'               => _x( 'Our Team', 'post type general name', 'yuna' ),
			'singular_name'      => _x( 'Our Team', 'post type singular name', 'yuna' ),
			'menu_name'          => _x( 'Our Team', 'admin menu', 'yuna' ),
			'name_admin_bar'     => _x( 'Our Team', 'add new on admin bar', 'yuna' ),
			'add_new'            => _x( 'Add New Team Men', 'actions', 'yuna' ),
			'add_new_item'       => __( 'Add New Team Men', 'yuna' ),
			'new_item'           => __( 'New Team Men', 'yuna' ),
			'edit_item'          => __( 'Edit Team Men', 'yuna' ),
			'view_item'          => __( 'View Team Men', 'yuna' ),
			'all_items'          => __( 'All Team Men', 'yuna' ),
			'search_items'       => __( 'Search Team Men', 'yuna' ),
			'parent_item_colon'  => __( 'Parent Team Men:', 'yuna' ),
			'not_found'          => __( 'No Team Men found.', 'yuna' ),
			'not_found_in_trash' => __( 'No Team Men found in Trash.', 'yuna' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => [],
			'description'        => __( 'Description.', 'yuna' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'yuna_team' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'exclude_from_search'=> false,
			'menu_position'      => 5,
			'menu_icon'          => 'dashicons-groups',
			'supports'           => array( 'title', 'thumbnail',)
		);

		register_post_type( 'yuna_team', $args );
	}

	add_action( 'init', 'yuna_team_post_type' );

	/**
	 * Register a services post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since yuna 1.0
	 */

	function yuna_services_post_type() {

		$labels = array(
			'name'               => _x( 'Our Services', 'post type general name', 'yuna' ),
			'singular_name'      => _x( 'Our Services', 'post type singular name', 'yuna' ),
			'menu_name'          => _x( 'Our Services', 'admin menu', 'yuna' ),
			'name_admin_bar'     => _x( 'Our Services', 'add new on admin bar', 'yuna' ),
			'add_new'            => _x( 'Add New Service', 'actions', 'yuna' ),
			'add_new_item'       => __( 'Add New Service', 'yuna' ),
			'new_item'           => __( 'New Service', 'yuna' ),
			'edit_item'          => __( 'Edit Service', 'yuna' ),
			'view_item'          => __( 'View Service', 'yuna' ),
			'all_items'          => __( 'All Services', 'yuna' ),
			'search_items'       => __( 'Search Service', 'yuna' ),
			'parent_item_colon'  => __( 'Parent Services:', 'yuna' ),
			'not_found'          => __( 'No Service found.', 'yuna' ),
			'not_found_in_trash' => __( 'No Service found in Trash.', 'yuna' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => [],
			'description'        => __( 'Description.', 'yuna' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'yuna_services' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => true,
			'menu_position'      => 6,
			'menu_icon'          => 'dashicons-list-view',
			'supports'           => array( 'title', 'thumbnail',)
		);

		register_post_type( 'yuna_services', $args );
	}

	add_action( 'init', 'yuna_services_post_type' );

	/**
	 * Register a galley post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since yuna 1.0
	 */

	function yuna_galley_post_type() {

		$labels = array(
			'name'               => _x( 'Our Gallery', 'post type general name', 'yuna' ),
			'singular_name'      => _x( 'Our Gallery', 'post type singular name', 'yuna' ),
			'menu_name'          => _x( 'Our Gallery', 'admin menu', 'yuna' ),
			'name_admin_bar'     => _x( 'Our Gallery', 'add new on admin bar', 'yuna' ),
			'add_new'            => _x( 'Add New Photo', 'actions', 'yuna' ),
			'add_new_item'       => __( 'Add New Photo', 'yuna' ),
			'new_item'           => __( 'New Photo', 'yuna' ),
			'edit_item'          => __( 'Edit Photo', 'yuna' ),
			'view_item'          => __( 'View Photo', 'yuna' ),
			'all_items'          => __( 'All Photos', 'yuna' ),
			'search_items'       => __( 'Search Photo', 'yuna' ),
			'parent_item_colon'  => __( 'Parent Photos:', 'yuna' ),
			'not_found'          => __( 'No Photo found.', 'yuna' ),
			'not_found_in_trash' => __( 'No Photo found in Trash.', 'yuna' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => [],
			'description'        => __( 'Description.', 'yuna' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'yuna_galley' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'exclude_from_search'=> false,
			'menu_position'      => 7,
			'menu_icon'          => 'dashicons-camera-alt',
			'supports'           => array( 'title', 'thumbnail',)
		);

		register_post_type( 'yuna_galley', $args );
	}

	add_action( 'init', 'yuna_galley_post_type' );

	/**
	 * Register a reviews post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since yuna 1.0
	 */

	function yuna_reviews_post_type() {

		$labels = array(
			'name'               => _x( 'Reviews', 'post type general name', 'yuna' ),
			'singular_name'      => _x( 'Reviews', 'post type singular name', 'yuna' ),
			'menu_name'          => _x( 'Reviews', 'admin menu', 'yuna' ),
			'name_admin_bar'     => _x( 'Reviews', 'add new on admin bar', 'yuna' ),
			'add_new'            => _x( 'Add New Review', 'actions', 'yuna' ),
			'add_new_item'       => __( 'Add New Review', 'yuna' ),
			'new_item'           => __( 'New Review', 'yuna' ),
			'edit_item'          => __( 'Edit Review', 'yuna' ),
			'view_item'          => __( 'View Review', 'yuna' ),
			'all_items'          => __( 'All Reviews', 'yuna' ),
			'search_items'       => __( 'Search Reviews', 'yuna' ),
			'parent_item_colon'  => __( 'Parent Reviews:', 'yuna' ),
			'not_found'          => __( 'No Review found.', 'yuna' ),
			'not_found_in_trash' => __( 'No Review found in Trash.', 'yuna' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => [],
			'description'        => __( 'Description.', 'yuna' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'yuna_reviews' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'exclude_from_search'=> false,
			'menu_position'      => 8,
			'menu_icon'          => 'dashicons-testimonial',
			'supports'           => array( 'title', 'thumbnail', 'editor',)
		);

		register_post_type( 'yuna_reviews', $args );
	}

	add_action( 'init', 'yuna_reviews_post_type' );

	/**
	 * Register a cases post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since yuna 1.0
	 */

	function yuna_cases_post_type() {

		$labels = array(
			'name'               => _x( 'Our Cases', 'post type general name', 'yuna' ),
			'singular_name'      => _x( 'Our Cases', 'post type singular name', 'yuna' ),
			'menu_name'          => _x( 'Our Cases', 'admin menu', 'yuna' ),
			'name_admin_bar'     => _x( 'Our Cases', 'add new on admin bar', 'yuna' ),
			'add_new'            => _x( 'Add New Case', 'actions', 'yuna' ),
			'add_new_item'       => __( 'Add New Case', 'yuna' ),
			'new_item'           => __( 'New Case', 'yuna' ),
			'edit_item'          => __( 'Edit Case', 'yuna' ),
			'view_item'          => __( 'View Case', 'yuna' ),
			'all_items'          => __( 'All Cases', 'yuna' ),
			'search_items'       => __( 'Search Case', 'yuna' ),
			'parent_item_colon'  => __( 'Parent Cases:', 'yuna' ),
			'not_found'          => __( 'No Case found.', 'yuna' ),
			'not_found_in_trash' => __( 'No Case found in Trash.', 'yuna' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => [],
			'description'        => __( 'Description.', 'yuna' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'yuna_cases' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => true,
			'menu_position'      => 9,
			'menu_icon'          => 'dashicons-excerpt-view',
			'supports'           => array( 'title', 'thumbnail',)
		);

		register_post_type( 'yuna_cases', $args );
	}

	add_action( 'init', 'yuna_cases_post_type' );

	/**
	 * Register a faq post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since yuna 1.0
	 */

	function yuna_faq_post_type() {

		$labels = array(
			'name'               => _x( 'FAQ', 'post type general name', 'yuna' ),
			'singular_name'      => _x( 'FAQ', 'post type singular name', 'yuna' ),
			'menu_name'          => _x( 'FAQ', 'admin menu', 'yuna' ),
			'name_admin_bar'     => _x( 'FAQ', 'add new on admin bar', 'yuna' ),
			'add_new'            => _x( 'Add New Question', 'actions', 'yuna' ),
			'add_new_item'       => __( 'Add New Question', 'yuna' ),
			'new_item'           => __( 'New Question', 'yuna' ),
			'edit_item'          => __( 'Edit Question', 'yuna' ),
			'view_item'          => __( 'View Question', 'yuna' ),
			'all_items'          => __( 'All Questions', 'yuna' ),
			'search_items'       => __( 'Search Question', 'yuna' ),
			'parent_item_colon'  => __( 'Parent Question:', 'yuna' ),
			'not_found'          => __( 'No Question found.', 'yuna' ),
			'not_found_in_trash' => __( 'No Question found in Trash.', 'yuna' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => [],
			'description'        => __( 'Description.', 'yuna' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'yuna_faq' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'exclude_from_search'=> false,
			'menu_position'      => 10,
			'menu_icon'          => 'dashicons-clipboard',
			'supports'           => array( 'title', 'editor',)
		);

		register_post_type( 'yuna_faq', $args );
	}

	add_action( 'init', 'yuna_faq_post_type' );