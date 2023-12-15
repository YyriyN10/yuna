<?php

	/*
	 * Plugin Name: Yuna Stydy
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

	define ('YUNA_STUDY_DIR', plugin_dir_path(__FILE__));

	require YUNA_STUDY_DIR . 'functions.php';

	register_activation_hook(__FILE__, 'yunaActivation');

	register_deactivation_hook(__FILE__,'yunaDeactivation');

	add_action( 'admin_menu', 'yuna_study_option_page');

	add_action( 'admin_enqueue_scripts', 'yuna_admin_scripts');

	add_action( 'admin_init', 'yuna_test_options');

	/**
	 * Plugin Name: Gutenberg examples 01
	 */

	add_action( 'init', 'gutenberg_examples_01_register_block' );