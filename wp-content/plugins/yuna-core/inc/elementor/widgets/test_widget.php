<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	class Elementor_Test_Widget extends \Elementor\Widget_Base {

		/*public function get_script_depends(){
			if(\Elementor\Plugin::$instance->preview->is_preview_mode()){
				wp_register_script('yuna-gallery', plugins_url('/js/yuna-gallery.js', __FILE__), ['elementor-frontend'], ' 1.0', true);
				return ['yuna-gallery'];
			}
			return [];
		}*/

		public function get_name() {
			return 'test_one';
		}

		public function get_title() {
			return esc_html__( 'Test One', 'yuna' );
		}

		public function get_icon() {
			return 'eicon-toggle';
		}

		public function get_custom_help_url() {
			return 'https://go.elementor.com/widget-name';
		}

		public function get_categories() {
			return [ 'yuna-category' ];
		}

		public function get_keywords() {
			return [ 'Test', 'Test One' ];
		}

		protected function register_controls() {

			$this->start_controls_section(
				'content_section',
				[
					'label' => esc_html__( 'Content', 'yuna' ),
					'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);


			$this->add_control(
				'block-id',
				[
					'label' => esc_html__( 'FAQ block ID', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
					'placeholder' => esc_html__( 'Enter block ID', 'yuna' ),
				]
			);


			$this->add_control(
				'block-title',
				[
					'label' => esc_html__( 'FAQ block title', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'label_block' => true,
					'placeholder' => esc_html__( 'Enter block name', 'yuna' ),
				]
			);

			$this->add_control(
				'block-text',
				[
					'label' => esc_html__( 'FAQ block title', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'label_block' => true,
					'placeholder' => esc_html__( 'Enter block name', 'yuna' ),
				]
			);


			$this->end_controls_section();
	//
			$this->start_controls_section(
				'section_style',
				[
					'label' => esc_html__( 'Style', 'yuna' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_control(
				'title_options',
				[
					'label' => esc_html__( 'Title Options', 'yuna' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' => esc_html__( 'Color', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#f00',
					'selectors' => [
						'{{WRAPPER}} .color-text' => 'color: {{VALUE}}',
					],
				]
			);



// OUR CODE FOR STYLE OPTIONS WILL BE HERE

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

			/*var_dump($settings);
			echo $settings['title_color'];*/

			?>
			<section class="faq pe-wrapper-latest-posts indent animate-target" <?php if($settings['block-id']):?> id="<?php echo $settings['block-id'];?>" <?php endif;?>>
				<div class="container">
					<?php require ('parts/block-title-center-full.php') ;?>
					<div class="row second-up">
						<p class="color-text" style="color: <?php echo $settings['title_color'];;?>"><?php echo $settings['block-text'];?></p>
					</div>
				</div>
			</section>

			<?php

		}

	}