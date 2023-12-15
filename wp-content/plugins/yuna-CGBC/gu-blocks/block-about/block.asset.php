<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Don't access directly.
	}

	return

	array( 'dependencies' =>

		       array(
			       'react',
			       'wp-blocks',
			       'wp-block-editor',
			       'wp-polyfill'
		       ),
	       'version' => '0.3'
	);
