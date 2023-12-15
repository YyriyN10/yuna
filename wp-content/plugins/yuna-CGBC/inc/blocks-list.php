<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Don't access directly.
	}

	function yuna_cgbc_about_block() {
		register_block_type( YUNA_CGBC_DIR . 'gu-blocks/block-about');
	}
	add_action( 'init', 'yuna_cgbc_about_block' );
