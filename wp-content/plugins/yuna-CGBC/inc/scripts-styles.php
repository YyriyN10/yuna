<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	function yuna_cgbc_scripts() {

		wp_enqueue_style('yuna-cgbc', YUNA_CGBC_URL . 'assets/css/style.min.css', array(), _S_VERSION);

		wp_enqueue_script( 'yuna-cgbc', YUNA_CGBC_URL . 'assets/js/main.min.js', array('jquery'), _S_VERSION, true );

	}

	add_action( 'wp_enqueue_scripts', 'yuna_cgbc_scripts' );
