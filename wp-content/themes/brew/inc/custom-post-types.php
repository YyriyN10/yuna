<?php

	/**
	 * Register a reviews post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since brew 1.0
	 */

	function brew_reviews_post_type() {

		$labels = array(
			'name'               => _x( 'Reviews', 'post type general name', 'brew' ),
			'singular_name'      => _x( 'Reviews', 'post type singular name', 'brew' ),
			'menu_name'          => _x( 'Reviews', 'admin menu', 'brew' ),
			'name_admin_bar'     => _x( 'Reviews', 'add new on admin bar', 'brew' ),
			'add_new'            => _x( 'Add New Review', 'actions', 'brew' ),
			'add_new_item'       => __( 'Add New Review', 'brew' ),
			'new_item'           => __( 'New Review', 'brew' ),
			'edit_item'          => __( 'Edit Review', 'brew' ),
			'view_item'          => __( 'View Review', 'brew' ),
			'all_items'          => __( 'All Reviews', 'brew' ),
			'search_items'       => __( 'Search Reviews', 'brew' ),
			'parent_item_colon'  => __( 'Parent Reviews:', 'brew' ),
			'not_found'          => __( 'No Review found.', 'brew' ),
			'not_found_in_trash' => __( 'No Review found in Trash.', 'brew' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => [],
			'description'        => __( 'Description.', 'brew' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'brew_reviews' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'exclude_from_search'=> false,
			'menu_position'      => 5,
			'menu_icon'          => 'dashicons-testimonial',
			'supports'           => array( 'title', 'thumbnail', 'editor',)
		);

		register_post_type( 'brew_reviews', $args );
	}

	add_action( 'init', 'brew_reviews_post_type' );

	/**
	 * Register a F.A.Q. post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since faq 1.0
	 */

	function brew_faq_post_type() {

		$labels = array(
			'name'               => _x( 'F.A.Q', 'post type general name', 'brew' ),
			'singular_name'      => _x( 'F.A.Q', 'post type singular name', 'brew' ),
			'menu_name'          => _x( 'F.A.Q', 'admin menu', 'brew' ),
			'name_admin_bar'     => _x( 'F.A.Q', 'add new on admin bar', 'brew' ),
			'add_new'            => _x( 'Add New question', 'actions', 'brew' ),
			'add_new_item'       => __( 'Add New question', 'brew' ),
			'new_item'           => __( 'New question', 'brew' ),
			'edit_item'          => __( 'Edit question', 'brew' ),
			'view_item'          => __( 'View question', 'brew' ),
			'all_items'          => __( 'All question', 'brew' ),
			'search_items'       => __( 'Search question', 'brew' ),
			'parent_item_colon'  => __( 'Parent question:', 'brew' ),
			'not_found'          => __( 'No question found.', 'brew' ),
			'not_found_in_trash' => __( 'No question found in Trash.', 'brew' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => ['faq-cat-tax'],
			'description'        => __( 'Description.', 'brew' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'brew_faq' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'exclude_from_search'=> false,
			'menu_position'      => 6,
			'menu_icon'          => 'dashicons-list-view',
			'supports'           => array( 'title', 'thumbnail', 'editor',)
		);

		register_post_type( 'brew_faq', $args );
	}

	add_action( 'init', 'brew_faq_post_type' );


	add_action( 'init', 'create_faq_taxonomy' );
	function create_faq_taxonomy(){

		register_taxonomy('faq-cat-tax', 'brew_faq', array(
			'label'                 => 'faq-cat-tax', // определяется параметром $labels->name
			'labels'                => array(
				'name'              => 'Question category',
				'singular_name'     => 'Question',
				'search_items'      => 'Search question',
				'all_items'         => 'All question',
				'view_item '        => 'View Genre',
				'parent_item'       => 'Parent Genre',
				'parent_item_colon' => 'Parent Genre:',
				'edit_item'         => 'Edit question',
				'update_item'       => 'Update question',
				'add_new_item'      => 'Add new question',
				'new_item_name'     => 'New Genre Name',
				'menu_name'         => 'Question category',
			),
			'description'           => 'faq-cat-tax', // описание таксономии
			'public'                => true,
			'publicly_queryable'    => true, // равен аргументу public
			'show_in_nav_menus'     => true, // равен аргументу public
			'show_ui'               => true, // равен аргументу public
			'show_in_menu'          => true, // равен аргументу show_ui
			'show_tagcloud'         => true, // равен аргументу show_ui
			'show_in_rest'          => true, // добавить в REST API
			'rest_base'             => true, // $taxonomy
			'hierarchical'          => true,
			'supports'           => array( 'title', 'thumbnail', 'revisions' ),

			/*'update_count_callback' => '_update_post_term_count',*/
			'rewrite'               => array('slug' => 'brew_faq'),
			/*'query_var'             => $taxonomy, // название параметра запроса*/
			'capabilities'          => array(),
			'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
			'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
			/*'_builtin'              => false,*/
			'show_in_quick_edit'    => true, // по умолчанию значение show_ui
		) );
	}

	/**
	 * Register a reviews post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since brew 1.0
	 */

	function brew_team_post_type() {

		$labels = array(
			'name'               => _x( 'Our team', 'post type general name', 'brew' ),
			'singular_name'      => _x( 'Our team', 'post type singular name', 'brew' ),
			'menu_name'          => _x( 'Our team', 'admin menu', 'brew' ),
			'name_admin_bar'     => _x( 'Our team', 'add new on admin bar', 'brew' ),
			'add_new'            => _x( 'Add team men', 'actions', 'brew' ),
			'add_new_item'       => __( 'Add team men', 'brew' ),
			'new_item'           => __( 'New team men', 'brew' ),
			'edit_item'          => __( 'Edit team men', 'brew' ),
			'view_item'          => __( 'View team men', 'brew' ),
			'all_items'          => __( 'All team men', 'brew' ),
			'search_items'       => __( 'Search team men', 'brew' ),
			'parent_item_colon'  => __( 'Parent team men', 'brew' ),
			'not_found'          => __( 'No team men found.', 'brew' ),
			'not_found_in_trash' => __( 'No team men found in Trash.', 'brew' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => [],
			'description'        => __( 'Description.', 'brew' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'brew_team' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'exclude_from_search'=> false,
			'menu_position'      => 7,
			'menu_icon'          => 'dashicons-groups',
			'supports'           => array( 'title', 'thumbnail', 'editor',)
		);

		register_post_type( 'brew_team', $args );
	}

	add_action( 'init', 'brew_team_post_type' );

	/**
	 * Register a coffee menu post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since brew 1.0
	 */

	function brew_coffee_menu_post_type() {

		$labels = array(
			'name'               => _x( 'Coffee menu', 'post type general name', 'brew' ),
			'singular_name'      => _x( 'Coffee menu', 'post type singular name', 'brew' ),
			'menu_name'          => _x( 'Coffee menu', 'admin menu', 'brew' ),
			'name_admin_bar'     => _x( 'Coffee menu', 'add new on admin bar', 'brew' ),
			'add_new'            => _x( 'Add coffee', 'actions', 'brew' ),
			'add_new_item'       => __( 'Add coffee', 'brew' ),
			'new_item'           => __( 'New coffee', 'brew' ),
			'edit_item'          => __( 'Edit coffee', 'brew' ),
			'view_item'          => __( 'View coffee', 'brew' ),
			'all_items'          => __( 'All coffee', 'brew' ),
			'search_items'       => __( 'Search coffee', 'brew' ),
			'parent_item_colon'  => __( 'Parent coffee', 'brew' ),
			'not_found'          => __( 'No coffee found.', 'brew' ),
			'not_found_in_trash' => __( 'No coffee found in Trash.', 'brew' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => [],
			'description'        => __( 'Description.', 'brew' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'coffee_menu' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'exclude_from_search'=> false,
			'menu_position'      => 8,
			'menu_icon'          => 'dashicons-coffee',
			'supports'           => array( 'title', 'thumbnail', 'editor',)
		);

		register_post_type( 'coffee_menu', $args );
	}

	add_action( 'init', 'brew_coffee_menu_post_type' );

	add_action( 'init', 'coffee_menu_taxonomy' );
	function coffee_menu_taxonomy(){

		register_taxonomy('coffee-menu-tax', 'coffee_menu', array(
			'label'                 => 'coffee-menu-tax', // определяется параметром $labels->name
			'labels'                => array(
				'name'              => 'Coffee category',
				'singular_name'     => 'Coffee category',
				'search_items'      => 'Search category',
				'all_items'         => 'All category',
				'view_item '        => 'View Genre',
				'parent_item'       => 'Parent Genre',
				'parent_item_colon' => 'Parent Genre:',
				'edit_item'         => 'Edit category',
				'update_item'       => 'Update category',
				'add_new_item'      => 'Add new category',
				'new_item_name'     => 'New Genre Name',
				'menu_name'         => 'Coffee category',
			),
			'description'           => 'coffee-menu-tax', // описание таксономии
			'public'                => true,
			'publicly_queryable'    => true, // равен аргументу public
			'show_in_nav_menus'     => true, // равен аргументу public
			'show_ui'               => true, // равен аргументу public
			'show_in_menu'          => true, // равен аргументу show_ui
			'show_tagcloud'         => true, // равен аргументу show_ui
			'show_in_rest'          => true, // добавить в REST API
			'rest_base'             => true, // $taxonomy
			'hierarchical'          => true,
			'supports'           => array( 'title', 'thumbnail', 'revisions' ),

			/*'update_count_callback' => '_update_post_term_count',*/
			'rewrite'               => array('slug' => 'coffee_menu'),
			/*'query_var'             => $taxonomy, // название параметра запроса*/
			'capabilities'          => array(),
			'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
			'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
			/*'_builtin'              => false,*/
			'show_in_quick_edit'    => true, // по умолчанию значение show_ui
		) );
	}

	/**
	 * Register a pastries menu post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since brew 1.0
	 */

	function brew_pastries_menu_post_type() {

		$labels = array(
			'name'               => _x( 'Pastries menu', 'post type general name', 'brew' ),
			'singular_name'      => _x( 'Pastries menu', 'post type singular name', 'brew' ),
			'menu_name'          => _x( 'Pastries menu', 'admin menu', 'brew' ),
			'name_admin_bar'     => _x( 'Pastries menu', 'add new on admin bar', 'brew' ),
			'add_new'            => _x( 'Add pastries', 'actions', 'brew' ),
			'add_new_item'       => __( 'Add pastries', 'brew' ),
			'new_item'           => __( 'New pastries', 'brew' ),
			'edit_item'          => __( 'Edit pastries', 'brew' ),
			'view_item'          => __( 'View pastries', 'brew' ),
			'all_items'          => __( 'All pastries', 'brew' ),
			'search_items'       => __( 'Search pastries', 'brew' ),
			'parent_item_colon'  => __( 'Parent pastries', 'brew' ),
			'not_found'          => __( 'No pastries found.', 'brew' ),
			'not_found_in_trash' => __( 'No pastries found in Trash.', 'brew' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => [],
			'description'        => __( 'Description.', 'brew' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'pastries_menu' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'exclude_from_search'=> false,
			'menu_position'      => 9,
			'menu_icon'          => 'dashicons-menu',
			'supports'           => array( 'title', 'thumbnail', 'editor',)
		);

		register_post_type( 'pastries_menu', $args );
	}

	add_action( 'init', 'brew_pastries_menu_post_type' );

	add_action( 'init', 'pastries_menu_taxonomy' );
	function pastries_menu_taxonomy(){

		register_taxonomy('pastries-menu-tax', 'pastries_menu', array(
			'label'                 => 'pastries-menu-tax', // определяется параметром $labels->name
			'labels'                => array(
				'name'              => 'Coffee category',
				'singular_name'     => 'Coffee category',
				'search_items'      => 'Search category',
				'all_items'         => 'All category',
				'view_item '        => 'View Genre',
				'parent_item'       => 'Parent Genre',
				'parent_item_colon' => 'Parent Genre:',
				'edit_item'         => 'Edit category',
				'update_item'       => 'Update category',
				'add_new_item'      => 'Add new category',
				'new_item_name'     => 'New Genre Name',
				'menu_name'         => 'Coffee category',
			),
			'description'           => 'pastries-menu-tax', // описание таксономии
			'public'                => true,
			'publicly_queryable'    => true, // равен аргументу public
			'show_in_nav_menus'     => true, // равен аргументу public
			'show_ui'               => true, // равен аргументу public
			'show_in_menu'          => true, // равен аргументу show_ui
			'show_tagcloud'         => true, // равен аргументу show_ui
			'show_in_rest'          => true, // добавить в REST API
			'rest_base'             => true, // $taxonomy
			'hierarchical'          => true,
			'supports'           => array( 'title', 'thumbnail', 'revisions' ),

			/*'update_count_callback' => '_update_post_term_count',*/
			'rewrite'               => array('slug' => 'pastries_menu'),
			/*'query_var'             => $taxonomy, // название параметра запроса*/
			'capabilities'          => array(),
			'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
			'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
			/*'_builtin'              => false,*/
			'show_in_quick_edit'    => true, // по умолчанию значение show_ui
		) );
	}

	/**
	 * Register a news post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 *
	 * @since brew 1.0
	 */

	function brew_news_post_type() {

		$labels = array(
			'name'               => _x( 'Our news', 'post type general name', 'brew' ),
			'singular_name'      => _x( 'Our news', 'post type singular name', 'brew' ),
			'menu_name'          => _x( 'Our news', 'admin menu', 'brew' ),
			'name_admin_bar'     => _x( 'Our news', 'add new on admin bar', 'brew' ),
			'add_new'            => _x( 'Add news', 'actions', 'brew' ),
			'add_new_item'       => __( 'Add news', 'brew' ),
			'new_item'           => __( 'New news', 'brew' ),
			'edit_item'          => __( 'Edit news', 'brew' ),
			'view_item'          => __( 'View news', 'brew' ),
			'all_items'          => __( 'All news', 'brew' ),
			'search_items'       => __( 'Search news', 'brew' ),
			'parent_item_colon'  => __( 'Parent news', 'brew' ),
			'not_found'          => __( 'No news found.', 'brew' ),
			'not_found_in_trash' => __( 'No news found in Trash.', 'brew' )
		);

		$args = array(
			'labels'             => $labels,
			'taxonomies'         => [],
			'description'        => __( 'Description.', 'brew' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'brew_news' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'exclude_from_search'=> false,
			'menu_position'      => 10,
			'menu_icon'          => 'dashicons-text-page',
			'supports'           => array( 'title', 'thumbnail', 'editor', 'excerpt')
		);

		register_post_type( 'brew_news', $args );
	}

	add_action( 'init', 'brew_news_post_type' );