<?php

	class Elementor_Test_Widget_2 extends \Elementor\Widget_Base {

		public function get_name() {
			return 'widget_name_2';
		}

		public function get_title() {
			return esc_html__( 'My Widget Name 2', 'textdomain' );
		}

		public function get_icon() {
			return 'eicon-code';
		}

		public function get_custom_help_url() {
			return 'https://go.elementor.com/widget-name';
		}

		public function get_categories() {
			return [ 'general' ];
		}

		public function get_keywords() {
			return [ 'keyword', 'keyword' ];
		}

	}