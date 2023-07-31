<?php
	/**
	 * Register a team post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since olympics_without_russia 1.0
	 */

	function team_post_type() {

		$labels = array(
			'name'               => _x( 'Збірна', 'post type general name', 'olympics_without_russia' ),
			'singular_name'      => _x( 'Збірна', 'post type singular name', 'olympics_without_russia' ),
			'menu_name'          => _x( 'Збірна', 'admin menu', 'olympics_without_russia' ),
			'name_admin_bar'     => _x( 'Збірна', 'add new on admin bar', 'olympics_without_russia' ),
			'add_new'            => _x( 'Додати нового спортсмена', 'actions', 'olympics_without_russia' ),
			'add_new_item'       => __( 'Додати нового спортсмена', 'olympics_without_russia' ),
			'new_item'           => __( 'Новий спортсмен', 'olympics_without_russia' ),
			'edit_item'          => __( 'Редагувати спортсмена', 'olympics_without_russia' ),
			'view_item'          => __( 'Переглянути спортсмена', 'olympics_without_russia' ),
			'all_items'          => __( 'Всі спортсмени', 'olympics_without_russia' ),
			'search_items'       => __( 'Шукати спортсмена', 'olympics_without_russia' ),
			'parent_item_colon'  => __( 'Батько спортсмена:', 'olympics_without_russia' ),
			'not_found'          => __( 'Спортсмена не знайдено.', 'olympics_without_russia' ),
			'not_found_in_trash' => __( 'У кошику спортсмена не знайдено.', 'olympics_without_russia' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => [],
			'description'        => __( 'Описание.', 'olympics_without_russia' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'team' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => true,
			'menu_position'      => 5,
			'menu_icon'          => 'dashicons-groups',
			'supports'           => array( 'title', 'thumbnail',)
		);

		register_post_type( 'team', $args );
	}

	add_action( 'init', 'team_post_type' );