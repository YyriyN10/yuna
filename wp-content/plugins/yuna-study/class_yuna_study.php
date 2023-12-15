<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Don't access directly.
	};

	class class_yuna_study {

		public function yuna_title(){
			add_filter('the_title', 'first_upper_case', 10, 2);

			function first_upper_case($title, $post_id){

				if ( is_singular()){
					return mb_convert_case($title, MB_CASE_TITLE);
				}

				return $title;
			}
		}
	}