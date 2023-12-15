<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Add Carbon Fields
	 */

	add_action( 'after_setup_theme', 'carbon_load' );

	function carbon_load() {
		require get_template_directory() . '/vendor/autoload.php';
		\Carbon_Fields\Carbon_Fields::boot();
	}


	/**
	 * WPML Support
	 */

	function brew_lang_prefix() {
		$prefix = '';
		if ( ! defined( 'ICL_LANGUAGE_CODE' ) ) {
			return $prefix;
		}
		$prefix = '_' . ICL_LANGUAGE_CODE;
		return $prefix;
	}

	/**
	 * Templates groups
	 */

	require ('carbon-groups/main-page.php');

	require ('carbon-groups/terms-fields.php');

	require ('carbon-groups/categories-fields.php');

	require ('carbon-groups/option-page.php');

	require ('carbon-groups/about-page.php');