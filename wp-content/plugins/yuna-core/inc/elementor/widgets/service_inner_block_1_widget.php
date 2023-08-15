<?php

	class Elementor_Service_inner_block_1_Widget extends \Elementor\Widget_Base {

		public function get_name() {
			return 'service_inner_block_one';
		}

		public function get_title() {
			return esc_html__( 'Service Inner Block One', 'yuna' );
		}

		public function get_icon() {
			return 'eicon-cogs';
		}

		public function get_custom_help_url() {
			return 'https://go.elementor.com/widget-name';
		}

		public function get_categories() {
			return [ 'yuna-category' ];
		}

		public function get_keywords() {
			return [ 'Service Inner Block', 'Service Inner Block One' ];
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
					'label' => esc_html__( 'Block ID', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
					'placeholder' => esc_html__( 'Enter block ID', 'yuna' ),
				]
			);

			$this->add_control(
				'block-name',
				[
					'label' => esc_html__( 'Block name', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
					'placeholder' => esc_html__( 'Enter block name', 'yuna' ),
				]
			);

			$this->add_control(
				'block-title',
				[
					'label' => esc_html__( 'Block title', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'label_block' => true,
					'placeholder' => esc_html__( 'Enter block title', 'yuna' ),
				]
			);

			$this->add_control(
				'image',
				[
					'label' => esc_html__( 'Choose image', 'yuna' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'label_block' => true,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);


			$this->add_control(
				'text',
				[
					'label' => esc_html__( 'About us description', 'yuna' ),
					'type' => \Elementor\Controls_Manager::WYSIWYG,
					'label_block' => true,
					'placeholder' => esc_html__( 'Enter text', 'yuna' ),
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
			<section class="services indent animate-target" <?php if($settings['block-id']):?> id="<?php echo $settings['block-id'];?>" <?php endif;?>>
				<div class="container">
					<?php require ('parts/block-name.php') ;?>
					<?php require ('parts/block-title-center-full.php') ;?>
					<div class="row">
						<div class="pic-wrapper second-up col-lg-6 ">
							<div class="inner yuna-radius">
								<img src="<?php echo esc_html($settings['image']['url']) ;?>" alt="">
							</div>
						</div>
						<div class="text-wrapper third-up col-lg-6">
							<?php echo wp_kses_post($settings['text']) ;?>
						</div>
					</div>
				</div>
			</section>
			<?php

		}

	}