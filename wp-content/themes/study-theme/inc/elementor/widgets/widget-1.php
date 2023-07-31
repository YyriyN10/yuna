<?php

	class Elementor_Test_Widget extends \Elementor\Widget_Base {

		public function get_name() {
			return 'widget_name';
		}

		public function get_title() {
			return esc_html__( 'My Widget Name', 'textdomain' );
		}

		public function get_icon() {
			return 'eicon-code';
		}

		public function get_custom_help_url() {
			return 'https://go.elementor.com/widget-name';
		}

		public function get_categories() {
			return [ 'yuna-category' ];
		}

		public function get_keywords() {
			return [ 'keyword', 'keyword' ];
		}

		protected function register_controls() {

			$this->start_controls_section(
				'content_section',
				[
					'label' => esc_html__( 'Content', 'elementor-oembed-widget' ),
					'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);

			$this->add_control(
				'url',
				[
					'label' => esc_html__( 'URL to embed', 'elementor-oembed-widget' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'input_type' => 'url',
					'placeholder' => esc_html__( 'https://your-link.com', 'elementor-oembed-widget' ),
				]
			);

			$this->end_controls_section();

		}

		/**
		 * Render oEmbed widget output on the frontend.
		 *
		 * Written in PHP and used to generate the final HTML.
		 *
		 * @since 1.0.0
		 * @access protected
		 */
		protected function render() {

			$settings = $this->get_settings_for_display();
			$html = wp_oembed_get( $settings['url'] );

			echo '<div class="oembed-elementor-widget">';
			echo ( $html ) ? $html : $settings['url'];
			echo '</div>';

		}

	}