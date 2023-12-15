<?php

	/*
	 * Plugin Name: Yuna Carbon Gutenberg Block Constructor
	 * Plugin URI: https://yuna.com.ua
	 * Description: A plugin that impliments Yuna Functionality;
	 * Version: 1.0.0
	 * Author: Yuriy Naiden
	 * Author URI: https://yuna.com.ua
	 * License: GPLv2 or later
	 * Text Domain: yuna-cgbc
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Don't access directly.
	}

	define ( 'YUNA_CGBC_DIR', plugin_dir_path(__FILE__) );
	define ( 'YUNA_CGBC_URL', plugin_dir_url(__FILE__) );
	define ( 'YUNA_CGBC_TD', 'yuna-cgbc' );

	add_action('plugins_loaded', 'yuna_cgbc_add_fields');

	function yuna_cgbc_add_fields(){

		require YUNA_CGBC_DIR . 'vendor/autoload.php';

		\Carbon_Fields\Carbon_Fields::boot();
	}

	require YUNA_CGBC_DIR . 'inc/block-container.php';

	require YUNA_CGBC_DIR . 'inc/blocks-list.php';

	function yuna_cgbc_lang_prefix() {
		$prefix = '';
		if ( ! defined( 'ICL_LANGUAGE_CODE' ) ) {
			return $prefix;
		}
		$prefix = '_' . ICL_LANGUAGE_CODE;
		return $prefix;
	}

	require YUNA_CGBC_DIR . 'inc/scripts-styles.php';

	add_filter( 'theme_page_templates', 'yuna_add_template_to_list' );

	function yuna_add_template_to_list( $templates ) {
		$templates[ YUNA_CGBC_DIR . 'template-yuna-cgbc-full.php'] = __( 'Template CGBC Full', YUNA_CGBC_TD );

		return $templates;
	}

	add_filter( 'template_include', 'yuna_change_page_template', 99);

	function yuna_change_page_template($template) {

		if (is_page()) {
			$meta = get_post_meta(get_the_ID());

			if (!empty($meta['_wp_page_template'][0]) && $meta['_wp_page_template'][0] != $template) {
				$template = $meta['_wp_page_template'][0];
			}
		}

		return $template;
	}

	function ccm_get_template_part($slug, $name = null) {

		do_action("ccm_get_template_part_{$slug}", $slug, $name);

		$templates = array();
		if (isset($name))
			$templates[] = "{$slug}-{$name}.php";

		$templates[] = "{$slug}.php";

		ccm_get_template_path($templates, true, false);
	}

	function ccm_get_template_path($template_names, $load = false, $require_once = true ) {
		$located = '';
		foreach ( (array) $template_names as $template_name ) {
			if ( !$template_name )
				continue;

			/* search file within the PLUGIN_DIR_PATH only */
			if ( file_exists(YUNA_CGBC_DIR . $template_name)) {
				$located = YUNA_CGBC_DIR . $template_name;
				break;
			}
		}

		if ( $load && '' != $located )
			load_template( $located, $require_once );

		return $located;
	}

	/**
	 * Create Block Category
	 */

	add_filter( 'block_categories_all' , function( $categories ) {

		// Adding a new category.
		$categories[] = array(
			'slug'  => 'yuna-custom-category',
			'title' => 'Yuna Blocks'
		);

		return $categories;
	} );