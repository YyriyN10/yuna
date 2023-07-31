<?php

	function yuna_scripts() {
		/*wp_enqueue_style( 'yuna-style', get_stylesheet_uri(), array(), _S_VERSION );
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.6.1');*/
		wp_enqueue_style('yuna-main-styles', get_template_directory_uri() . '/assets/css/style.min.css', array(), _S_VERSION);

		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), '4.6.1', true );
		wp_enqueue_script( 'yuna-main-js', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), _S_VERSION, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'yuna_scripts' );