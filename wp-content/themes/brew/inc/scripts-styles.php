<?php

	function brew_scripts() {
		wp_enqueue_style( 'brew-style', get_stylesheet_uri(), array(), _S_VERSION );
		wp_enqueue_style( 'brew-style-main', get_template_directory_uri() . '/assets/css/style.min.css', array(), _S_VERSION );


//		wp_enqueue_script( 'N_P-API', get_template_directory_uri() . '/assets/js/novaPoshtaApi', array('jquery'), _S_VERSION, true );
		wp_enqueue_script( 'brew-script-main', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), _S_VERSION, true );

	}
	add_action( 'wp_enqueue_scripts', 'brew_scripts' );
