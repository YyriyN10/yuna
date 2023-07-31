<?php

	class Elementor_Advantages_1_Widget extends \Elementor\Widget_Base {

		public function get_name() {
			return 'advantages_one';
		}

		public function get_title() {
			return esc_html__( 'Advantages One', 'yuna' );
		}

		public function get_icon() {
			return 'eicon-checkbox';
		}

		public function get_custom_help_url() {
			return 'https://go.elementor.com/widget-name';
		}

		public function get_categories() {
			return [ 'yuna-category' ];
		}

		public function get_keywords() {
			return [ 'Advantages', 'Advantages One' ];
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
					'placeholder' => esc_html__( 'Enter block ID', 'yuna' ),
				]
			);

			$this->add_control(
				'advantages-list',
				[
					'label' => esc_html__( 'List', 'yuna' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => [
						[
							'name' => 'icon',
							'label' => esc_html__( 'Icon', 'yuna' ),
							'type' => \Elementor\Controls_Manager::MEDIA,
							'default' => [
								'url' => \Elementor\Utils::get_placeholder_image_src(),
							],
						],
						[
							'name' => 'advantages-name',
							'label' => esc_html__( 'Advantages name', 'yuna' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'placeholder' => esc_html__( 'Advantages name', 'yuna' ),
							'default' => esc_html__( 'Advantages name', 'yuna' ),
						],

					],
					'default' => [
						[

							'icon' => esc_html__( 'List Item #1', 'yuna' ),
							'step-name' => esc_html__( 'Advantages name', 'yuna' ),
						],
					],
					/*'title_field' => '{{{ text }}}',*/
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
			<section class="advantages animate-target" <?php if($settings['block-id']):?> id="<?php echo $settings['block-id'];?>" <?php endif;?>>
				<div class="container">
          <?php if( $settings['advantages-list'] ):?>
            <div class="row advantages-slider second-up">
	            <?php foreach( $settings['advantages-list'] as $item ): ?>
                <div class="slide col-lg-3">
                  <div class="inner yuna-radius">
                    <div class="icon-wrapper">
                      <img class="svg-pic" src="<?php echo $item['icon']['url'];?>" alt="">
                    </div>
                    <h3 class="name"><?php echo esc_html($item['advantages-name']) ;?></h3>
                  </div>
                </div>
	            <?php endforeach;?>
            </div>
          <?php endif;?>
				</div>
			</section>

			<?php

		}

	}