<?php

	class Elementor_Main_Screen_1_Widget extends \Elementor\Widget_Base {

		public function get_name() {
			return 'widget_name';
		}

		public function get_title() {
			return esc_html__( 'Main Screen One', 'yuna' );
		}

		public function get_icon() {
			return 'eicon-header';
		}

		public function get_custom_help_url() {
			return 'https://go.elementor.com/widget-name';
		}

		public function get_categories() {
			return [ 'yuna-category' ];
		}

		public function get_keywords() {
			return [ 'Main Screen', 'Main Screen one' ];
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
				'image',
				[
					'label' => esc_html__( 'Choose Background Image', 'yuna' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);

			$this->add_control(
				'title',
				[
					'label' => esc_html__( 'Main title', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'placeholder' => esc_html__( 'Enter site main title', 'yuna' ),
				]
			);

			$this->add_control(
				'subtitle',
				[
					'label' => esc_html__( 'Main subtitle', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'placeholder' => esc_html__( 'Enter subtitle', 'yuna' ),
				]
			);

			$this->add_control(
				'text',
				[
					'label' => esc_html__( 'Main text', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'placeholder' => esc_html__( 'Enter text', 'yuna' ),
				]
			);

			$this->add_control(
				'btn-text',
				[
					'label' => esc_html__( 'Button text', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'placeholder' => esc_html__( 'Enter button text', 'yuna' ),
				]
			);

			$this->add_control(
				'block-id',
				[
					'label' => esc_html__( 'Button scroll down to block ID', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'placeholder' => esc_html__( 'Enter block ID', 'yuna' ),
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
				<section class="main-screen" style="background-image: url('<?php echo esc_url($settings['image']['url']);?>')">
					<div class="container">
            <div class="row">
              <div class="content col-12 text-center">
                <h1><?php echo esc_html($settings['title']) ;?></h1>
                <h2><?php echo esc_html($settings['subtitle']) ;?></h2>
                <p><?php echo esc_html($settings['text']) ;?></p>
                <a href="#" data-toggle="modal" data-target="#formModal" class="button">
                  <span><?php echo esc_html($settings['btn-text']) ;?></span>
                </a>
              </div>
            </div>
					</div>
          <?php /*if( $settings['block-id'] ):*/?><!--
            <a href="#<?php /*echo esc_attr( $settings['block-id']);*/?>" class="go-down scroll-to">
              <i class="fa fa-angle-down" aria-hidden="true"></i>
            </a>
          --><?php /*endif;*/?>

				</section>

			<?php

		}

	}