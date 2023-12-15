<?php

	/*
	 * Plugin Name: Yuna DB update
	 * Plugin URI: https://yuna.com.ua
	 * Description: A plugin that impliments Yuna Functionality;
	 * Version: 1.0.0
	 * Author: Yuriy Naiden
	 * Author URI: https://yuna.com.ua
	 * License: GPLv2 or later
	 * Text Domain: yuna-db-update
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Don't access directly.
	};


	define ('YUNA_DB_UPDATE_DIR', plugin_dir_path(__FILE__));
	define ('YUNA_DB_UPDATE_URL', plugin_dir_url(__FILE__));
	define('YUNA_TD', 'yuna-db-update');

	require YUNA_DB_UPDATE_DIR . 'functions.php';

	/**
	 * Add Option Page
	 */

	add_action( 'admin_menu', 'yuna_db_update_option_page');

	add_action( 'admin_init', 'yuna_db_update_options_fields');