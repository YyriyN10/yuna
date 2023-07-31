<?php
	/*
	 * Plugin Name: Yuna Core
	 * Plugin URI: https://yuna.com.ua
	 * Description: A plugin that impliments Yuna Functionality;
	 * Version: 1.0.0
	 * Author: Yuriy Naiden
	 * Author URI: https://yuna.com.ua
	 * License: GPLv2 or later
	 * Text Domain: yuna-core
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Don't access directly.
	};

	/**
	 * Add Custom Post Types
	 */

	require plugin_dir_path( __FILE__ ) . '/inc/custom_post_type.php';

	/**
	 * Carbon Fields Init
	 */

	if ( defined('Carbon_Fields_Plugin\PLUGIN_FILE')){

		require plugin_dir_path( __FILE__ ) . '/inc/carbon-fields.php';

		function carbon_lang_prefix() {
			$prefix = '';
			if ( ! defined( 'ICL_LANGUAGE_CODE' ) ) {
				return $prefix;
			}
			$prefix = '_' . ICL_LANGUAGE_CODE;
			return $prefix;
		}

	}

	/**
	 * Elementor Widgets
	 */

	if ( defined( 'ELEMENTOR_VERSION' ) ) {
		require plugin_dir_path( __FILE__ ) . '/inc/elementor/index.php';
	}


	/**
	 * Form integration
	 */

	require plugin_dir_path( __FILE__ ) . 'form-integration.php';


