<?php

	class Elementor_How_We_Work_1_Widget extends \Elementor\Widget_Base {

		public function get_name() {
			return 'how_we_work_one';
		}

		public function get_title() {
			return esc_html__( 'How We Work', 'yuna' );
		}

		public function get_icon() {
			return 'eicon-site-identity';
		}

		public function get_custom_help_url() {
			return 'https://go.elementor.com/widget-name';
		}

		public function get_categories() {
			return [ 'yuna-category' ];
		}

		public function get_keywords() {
			return [ 'How We Work', 'How We Work One' ];
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
					'label' => esc_html__( 'About us block ID', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'placeholder' => esc_html__( 'Enter block ID', 'yuna' ),
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
				'block-name',
				[
					'label' => esc_html__( 'How we work block name', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'placeholder' => esc_html__( 'Enter block name', 'yuna' ),
				]
			);

			$this->add_control(
				'block-title',
				[
					'label' => esc_html__( 'How we work block title', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'placeholder' => esc_html__( 'Enter block name', 'yuna' ),
				]
			);

			$this->add_control(
				'step-list',
				[
					'label' => esc_html__( 'List', 'yuna' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'fields' => [
						[
							'name' => 'icon',
							'label' => esc_html__( 'Icon', 'yuna' ),
							'type' => \Elementor\Controls_Manager::ICONS,
							'default' => [
								'value' => 'fas fa-star',
								'library' => 'solid',
							]
						],
						[
							'name' => 'step-name',
							'label' => esc_html__( 'Step name', 'yuna' ),
							'type' => \Elementor\Controls_Manager::TEXT,
							'placeholder' => esc_html__( 'Step name', 'yuna' ),
							'default' => esc_html__( 'Step name', 'yuna' ),
						],
						[
							'name' => 'step-description',
							'label' => esc_html__( 'Description', 'yuna' ),
							'type' => \Elementor\Controls_Manager::TEXTAREA,
							'placeholder' => esc_html__( 'Description', 'yuna' ),
							'default' => esc_html__( 'Description', 'yuna' ),
						],
					],
					'default' => [
						[

							'icon' => esc_html__( 'List Item #1', 'yuna' ),
							'step-name' => esc_html__( 'Step name', 'yuna' ),
							'step-description' => esc_html__( 'Description', 'yuna' ),
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

			$i = 0;

			?>
			<section class="how-we-work indent animate-target" <?php if($settings['block-id']):?> id="<?php echo $settings['block-id'];?>" <?php endif;?> style="background-image: url('<?php echo esc_url($settings['image']['url']);?>')">
				<div class="container">
					<?php /*require ('parts/block-name.php') ;*/?>
					<?php require ('parts/block-title-center-full.php') ;?>
          <?php if( $settings['step-list'] ):?>
            <div class="row second-up">
	            <?php foreach( $settings['step-list'] as $item ): $i = $i + 1;?>
                <div class="col-md-4 col-sm-6 step">
                  <span class="step-number yuna-radius">
                    <?php if( $i < 10 ):?>
                      <span>0<?php echo $i;?></span>
                    <?php else:?>
                      <span><?php echo $i;?></span>
                    <?php endif;?>
                  </span>
                  <div class="inner yuna-radius">
                    <div class="icon-wrapper">
					            <?php
						            if ( $item['icon']) {
							            \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] );
						            }
					            ?>
                    </div>
                    <h3 class="name inner-title"><?php echo esc_html($item['step-name']) ;?></h3>
                    <p class="description"><?php echo esc_html($item['step-description']) ;?></p>
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