<?php

	class Elementor_About_Us_1_Widget extends \Elementor\Widget_Base {

		public function get_name() {
			return 'about_us_one';
		}

		public function get_title() {
			return esc_html__( 'About Us One', 'yuna' );
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
			return [ 'About Us', 'About Us One' ];
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
					'label' => esc_html__( 'About us block ID', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
					'placeholder' => esc_html__( 'Enter block ID', 'yuna' ),
				]
			);

			$this->add_control(
				'block-title',
				[
					'label' => esc_html__( 'About us block title', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'label_block' => true,
					'placeholder' => esc_html__( 'Enter block title', 'yuna' ),
				]
			);

			$this->add_control(
				'image-animate-1',
				[
					'label' => esc_html__( 'Choose first image', 'yuna' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'label_block' => true,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);

			$this->add_control(
				'image-animate-2',
				[
					'label' => esc_html__( 'Choose second image', 'yuna' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'label_block' => true,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);

			$this->add_control(
				'image-animate-3',
				[
					'label' => esc_html__( 'Choose the third image', 'yuna' ),
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
			<section class="about-us indent animate-target" <?php if($settings['block-id']):?> id="<?php echo $settings['block-id'];?>" <?php endif;?>>
				<div class="container">
          <div class="row">
            <div class="pic-wrapper second-up col-xl-5 col-lg-6 col-md-4">
              <div class="inner-pic inner-pic-1 yuna-radius">
                <img src="<?php echo esc_html($settings['image-animate-1']['url']) ;?>" alt="">
              </div>
              <div class="inner-pic inner-pic-2 yuna-radius">
                <img src="<?php echo esc_html($settings['image-animate-2']['url']) ;?>" alt="">
              </div>
              <div class="inner-pic inner-pic-3 yuna-radius">
                <img src="<?php echo esc_html($settings['image-animate-3']['url']) ;?>" alt="">
              </div>
            </div>
            <div class="text-wrapper third-up col-xl-7 col-lg-6 col-md-7">
              <h2 class="block-title"><?php echo esc_html($settings['block-title']) ;?></h2>
              <div class="text"><?php echo wp_kses_post($settings['text']) ;?></div>
            </div>
          </div>
				</div>
			</section>
			<?php

		}

	}