<?php
	/*
	 * Plugin Name: Wfmstudy-one
	 * Plugin URI: https://yuna.com.ua
	 * Description: A plugin that impliments Yuna Functionality;
	 * Version: 1.0.0
	 * Author: Yuriy Naiden
	 * Author URI: https://yuna.com.ua
	 * License: GPLv2 or later
	 * Text Domain: wfmstudy-one
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Don't access directly.
	};

	define ('WFM_STUDY_ONE_DIR', plugin_dir_path(__FILE__));
	define ('WFM_STUDY_ONE_URL', plugin_dir_url(__FILE__));
	define ('WFM_STUDY_ONE', 'wfmstudy-one');

	function wfmstudy_one_activate() {

		require_once WFM_STUDY_ONE_DIR . 'inc/class-wfmstudy-one-activation.php';

		Wfmstudy_One_Activation::activation();
	}

	register_activation_hook( __FILE__, 'wfmstudy_one_activate' );

	require WFM_STUDY_ONE_DIR . "inc/class-wfmstudy-one.php";

	function run_wfmstudy_one(){

		$plugin = new Wfmstudy_One();
	}

	run_wfmstudy_one();