<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Don't access directly.
	};

	function yunaActivation(){
		$site = get_home_url();

		wp_mail('1987elessar@gmail.com', 'Plugin activation', "Plugin work in {$site}");
	}

	function yunaDeactivation(){
		file_put_contents( YUNA_STUDY_DIR . 'log.txt', 'Plugin deactivation. ', FILE_APPEND);
	}

	/**
	 * Add Option Page
	 */

	function yuna_study_option_page(){

		add_menu_page(
			__('Yuna Options', 'yuna-study'),
			__('Yuna Options', 'yuna-study'),
			'manage_options',
			'yuna-main-options',
			'yuna_main_options_page',
			'dashicons-hammer',
			3.3,
		);

		add_submenu_page(
			'yuna-main-options',
			__('Options main', 'yuna-study'),
			__('Options main', 'yuna-study'),
			'manage_options',
			'yuna-sub-options',
			'yuna_sub_options_page'
		);

	}

	function yuna_main_options_page(){
		require YUNA_STUDY_DIR . 'templates/main-page.php';
	}

	function yuna_sub_options_page(){
		require YUNA_STUDY_DIR . 'templates/sub-page.php';
	}

	function yuna_admin_scripts( $hook_suffix ){

		if ( ! in_array( $hook_suffix, array('toplevel_page_yuna-main-options', 'yuna-options_page_yuna_sub_options'))){
			return;
		}

		wp_enqueue_script('yuna-admin-js', plugins_url('/assets/admin/js/admin.js', __FILE__));
	}

	function yuna_test_options(){

		//Settings name
		register_setting( 'yuna_test_option_group', 'test_option_1' );
		register_setting( 'yuna_test_option_group', 'test_option_2' );
		register_setting( 'yuna_test_option_group2', 'test_option_3' );

		//Settings group
		add_settings_section( 'yuna_test_section_1', __('Test section 1', 'yuna_study'), 'yuna_test_section_1_content', 'yuna-main-options' );

		function yuna_test_section_1_content(){
			echo '<p>'.__('Test section 1 description', 'yuna_study').'</p>';
		}
		//

		add_settings_section( 'yuna_test_section_2', __('Test section 2', 'yuna_study'), 'yuna_test_section_2_content', 'yuna-sub-options' );

		function yuna_test_section_2_content(){
			echo '<p>'.__('Test section 2 description', 'yuna_study').'</p>';
		}

		//Settings field
		add_settings_field( 'test_option_1', __('Field 1', 'yuna_study'), 'yuna_option_field_1', 'yuna-main-options', 'yuna_test_section_1' );

		function yuna_option_field_1(){
			echo '<input name="test_option_1" id="test_option_1" type="email" value="'.get_option('test_option_1').'" class="regular-text code">';
		}
		//

		add_settings_field( 'test_option_2', __('Field 2', 'yuna_study'), 'yuna_option_field_2', 'yuna-main-options', 'yuna_test_section_1' );

		function yuna_option_field_2(){
			echo '<input name="test_option_2" id="test_option_2" type="tel" value="'.get_option('test_option_2').'" class="regular-text code">';
		}
		//

		add_settings_field( 'test_option_3', __('Field 3', 'yuna_study'), 'yuna_option_field_3', 'yuna-sub-options', 'yuna_test_section_2' );

		function yuna_option_field_3(){
			echo '<input name="test_option_3" id="test_option_3" type="name" value="'.get_option('test_option_3').'" class="regular-text code">';
		}



	}


	function gutenberg_examples_01_register_block() {
		register_block_type( __DIR__ . '/blocks/block_1' );
	}