<?php
	/*
	 * Plugin name: Yuna Blocks
	 * Author: Yuriy Naiden
	 * Author URI: https://yuna.com
	 *
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Don't access directly.
	}

	/**
	 * Add Define
	 */

	define ( 'YUNA_BLOCKS_DIR', plugin_dir_path(__FILE__) );
	define ( 'YUNA_BLOCKS_URL', plugin_dir_url(__FILE__) );

	/**
	 * Create Block Category
	 */

	add_filter( 'block_categories_all' , function( $categories ) {

		$categories[] = array(
			'slug'  => 'yuna-custom-category',
			'title' => 'Yuna Blocks'
		);

		return $categories;
	} );

	/**
	 * Add Blocks
	 */

	function yuna_blocks_list() {
		register_block_type( YUNA_BLOCKS_DIR . 'blocks/about');
	}
	add_action( 'init', 'yuna_blocks_list' );



