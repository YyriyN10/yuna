<?php

	class Elementor_Content_1_Widget extends \Elementor\Widget_Base {

		public function get_name() {
			return 'content_one';
		}

		public function get_title() {
			return esc_html__( 'Content One', 'yuna' );
		}

		public function get_icon() {
			return 'eicon-single-post';
		}

		public function get_custom_help_url() {
			return 'https://go.elementor.com/widget-name';
		}

		public function get_categories() {
			return [ 'yuna-category' ];
		}

		public function get_keywords() {
			return [ 'Content', 'Content One' ];
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
				'block-id',
				[
					'label' => esc_html__( 'Content block ID', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
					'placeholder' => esc_html__( 'Enter block ID', 'yuna' ),
				]
			);


			$this->add_control(
				'block-title',
				[
					'label' => esc_html__( 'Content block name', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'label_block' => true,
					'placeholder' => esc_html__( 'Enter block title', 'yuna' ),
				]
			);


			$this->add_control(
				'text',
				[
					'label' => esc_html__( 'Content text', 'yuna' ),
					'type' => \Elementor\Controls_Manager::WYSIWYG,
					'label_block' => true,
					'placeholder' => esc_html__( 'Enter text', 'yuna' ),
				]
			);


			$this->end_controls_section();

			$this->start_controls_section(
				'section_style',
				[
					'label' => esc_html__( 'Style', 'yuna' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_control(
				'background-color',
				[
					'label' => esc_html__( 'Background color', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .content-block' => 'background-color: {{VALUE}}',
					],
				]
			);


			$this->add_control(
				'title-text-color',
				[
					'label' => esc_html__( 'Block title color', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .block-title' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'contacts-text-color',
				[
					'label' => esc_html__( 'Contacts info text color', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .content-block' => 'color: {{VALUE}}',

					],
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

			?>
			<section class="content-block indent animate-target" <?php if($settings['block-id']):?> id="<?php echo $settings['block-id'];?>" <?php endif;?>>
				<div class="container">
					<?php require ('parts/block-title-center-full.php') ;?>
					<div class="row">
						<div class="third-up col-12">
							<?php echo wp_kses_post($settings['text']) ;?>
						</div>
					</div>
				</div>
			</section>
			<?php

		}

	}