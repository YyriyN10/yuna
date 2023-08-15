<?php

	class Elementor_Result_1_Widget extends \Elementor\Widget_Base {

		public function __construct($data = [], $args = null) {
			parent::__construct($data, $args);

			wp_register_script( 'result-slider', plugins_url( '/js/yuna-result.js', __FILE__ ), [ 'elementor-frontend' ], '1.0.1', true );
		}

		public function get_script_depends() {
			return [ 'result-slider'];
		}

		public function get_name() {
			return 'result_one';
		}

		public function get_title() {
			return esc_html__( 'Result One', 'yuna' );
		}

		public function get_icon() {
			return 'eicon-bullet-list';
		}

		public function get_custom_help_url() {
			return 'https://go.elementor.com/widget-name';
		}

		public function get_categories() {
			return [ 'yuna-category' ];
		}

		public function get_keywords() {
			return [ 'Result', 'Result One' ];
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
					'label' => esc_html__( 'Block ID', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
					'placeholder' => esc_html__( 'Enter block ID', 'yuna' ),
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

			$repeaterSlider = new \Elementor\Repeater();

			$repeaterSlider->add_control(
				'repeater-image',
				[
					'label' => esc_html__( 'image', 'yuna' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'label_block' => true,
					'frontend_available' => true,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					]
				]
			);

			$this->add_control(
				'slider',
				[
					'label' => __( 'Slider', 'yuna' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'label_block' => true,
					'fields' => $repeaterSlider->get_controls(),
					'title_field' => 'Image slider',
				]
			);

			$repeaterItems = new \Elementor\Repeater();

			$repeaterItems->add_control(
				'icon',
				[
					'label' => esc_html__( 'Icon', 'yuna' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'label_block' => true,
					'default' => [
						'value' => 'fas fa-star',
						'library' => 'solid',
					]
				]
			);

			$repeaterItems->add_control(
				'result-name',
				[
					'label' => esc_html__( 'Result text', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
					'placeholder' => esc_html__( 'Result text', 'yuna' ),
					'default' => esc_html__( 'SResult text', 'yuna' ),
				]
			);

			$this->add_control(
				'result-list',
				[
					'label' => __( 'List', 'yuna' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'label_block' => true,
					'fields' => $repeaterItems->get_controls(),
					'title_field' => 'Items list',
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
			<section class="result indent animate-target" <?php if($settings['block-id']):?> id="<?php echo $settings['block-id'];?>" <?php endif;?>>
				<div class="container">
					<?php require ('parts/block-name.php') ;?>
					<?php require ('parts/block-title-center-full.php') ;?>
					<div class="row content">
            <?php if( $settings['result-list'] ):?>
              <ul class="result-list second-up col-lg-5 ">
                <?php foreach( $settings['result-list'] as $item ):?>
                  <li>
                    <span class="icon-wrapper">
                      <?php
	                      if ( $item['icon']) {
		                      \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] );
	                      }
                      ?>
                    </span>
                    <span class="description inner-title"><?php echo $item['result-name'];?></span>
                  </li>
                <?php endforeach;?>
              </ul>
            <?php endif;?>
						<?php if( $settings['slider'] ):?>
              <div class="result-slider third-up col-lg-7" id="result-slider">
								<?php foreach( $settings['slider'] as $item ):?>
                  <div class="slide yuna-radius">
                    <img src="<?php echo $item['repeater-image']['url'];?>" alt="">
                  </div>
								<?php endforeach;?>
              </div>
						<?php endif;?>
					</div>
				</div>
			</section>
			<?php

		}

	}