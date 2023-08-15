<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	function add_elementor_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'yuna-category',
			[
				'title' => esc_html__( 'Yuna Category', 'yuna' ),
				'icon' => 'fa fa-plug',
			]
		);

	}

	add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );

	function register_new_widgets( $widgets_manager ) {

		require_once( __DIR__ . '/widgets/header_1_widget.php' );
		require_once( __DIR__ . '/widgets/about_us_1_widget.php' );
		require_once( __DIR__ . '/widgets/how_we_work_1_widget.php' );
		require_once( __DIR__ . '/widgets/gallery_1_widget.php' );
		require_once( __DIR__ . '/widgets/advantages_1_widget.php' );
		require_once( __DIR__ . '/widgets/services_1_widget.php' );
		require_once( __DIR__ . '/widgets/team_1_widget.php' );
		require_once( __DIR__ . '/widgets/reviews_1_widget.php' );
		require_once( __DIR__ . '/widgets/cases_1_widget.php' );
		require_once( __DIR__ . '/widgets/contact_form_1_widget.php' );
		require_once( __DIR__ . '/widgets/faq_1_widget.php' );
		require_once( __DIR__ . '/widgets/service_inner_block_1_widget.php' );
		require_once( __DIR__ . '/widgets/result_1_widget.php' );
		require_once( __DIR__ . '/widgets/content_1_widget.php' );
		require_once( __DIR__ . '/widgets/team_2_widget.php' );
		require_once( __DIR__ . '/widgets/test_widget.php' );

		$widgets_manager->register( new \Elementor_Main_Screen_1_Widget() );
		$widgets_manager->register( new \Elementor_About_Us_1_Widget() );
		$widgets_manager->register( new \Elementor_How_We_Work_1_Widget() );
		$widgets_manager->register( new \Elementor_Gallery_1_Widget() );
		$widgets_manager->register( new \Elementor_Advantages_1_Widget() );
		$widgets_manager->register( new \Elementor_Services_1_Widget() );
		$widgets_manager->register( new \Elementor_Team_1_Widget());
		$widgets_manager->register( new \Elementor_Reviews_1_Widget());
		$widgets_manager->register( new \Elementor_Cases_1_Widget());
		$widgets_manager->register( new \Elementor_Contact_Form_1_Widget());
		$widgets_manager->register( new \Elementor_FAQ_1_Widget());
		$widgets_manager->register( new \Elementor_Service_inner_block_1_Widget());
		$widgets_manager->register( new \Elementor_Result_1_Widget());
		$widgets_manager->register( new \Elementor_Content_1_Widget());
		$widgets_manager->register( new \Elementor_Team_2_Widget());
		$widgets_manager->register( new \Elementor_Test_Widget());

	}

	add_action( 'elementor/widgets/register', 'register_new_widgets' );








