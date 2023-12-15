<?php

	class Elementor_Services_1_Widget extends \Elementor\Widget_Base {

		public function __construct($data = [], $args = null) {
			parent::__construct($data, $args);

			wp_register_script( 'services-slider', plugins_url( '/js/yuna-services.js', __FILE__ ), [ 'elementor-frontend' ], '1.0.1', true );
		}

		public function get_script_depends() {
			return [ 'services-slider'];
		}

		public function get_name() {
			return 'services_one';
		}

		public function get_title() {
			return esc_html__( 'Services One', 'yuna' );
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
			return [ 'Services', 'Services One' ];
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
					'label_block' => true,
					'placeholder' => esc_html__( 'Enter block ID', 'yuna' ),
				]
			);

			$this->add_control(
				'block-title',
				[
					'label' => esc_html__( 'Services block title', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'label_block' => true,
					'placeholder' => esc_html__( 'Enter block name', 'yuna' ),
				]
			);

			$this->add_control(
				'block-text',
				[
					'label' => esc_html__( 'Block text', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'label_block' => true,
					'placeholder' => esc_html__( 'Enter block text', 'yuna' ),
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
				'block-bg-color',
				[
					'label' => esc_html__( 'Cases block background color ', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .services' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'btn-bg-color',
				[
					'label' => esc_html__( 'Button background color ', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .button' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'accent-color',
				[
					'label' => esc_html__( 'Accent color', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .dot-navigation .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'background-color: {{VALUE}}; border-color: {{VALUE}}',

					],
				]
			);

			$this->add_control(
				'card-title-bg-color',
				[
					'label' => esc_html__( 'Service cart title background color', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .service-item .service-pic .name' => 'background-color: {{VALUE}}',

					],
				]
			);

			$this->add_control(
				'card-hover-bg-color',
				[
					'label' => esc_html__( 'Service cart hover background color', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .service-item .service-text' => 'background-color: {{VALUE}}',

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
				'block-text-color',
				[
					'label' => esc_html__( 'Block text color', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .block-text' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'service-prev-title-color',
				[
					'label' => esc_html__( 'The color of the service name in the preview', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .service-pic .name' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'service-hover-title-color',
				[
					'label' => esc_html__( 'The color of the service name when hovering', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .service-text .name' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'service-hover-text-color',
				[
					'label' => esc_html__( 'The color of the brief description of the service when hovering', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .service-text .description' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'service-btn-text-color',
				[
					'label' => esc_html__( 'Button text color', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .button' => 'color: {{VALUE}}',
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
			<section class="services indent animate-target" <?php if($settings['block-id']):?> id="<?php echo $settings['block-id'];?>" <?php endif;?>>
				<div class="container-fluid">
					<?php require ('parts/block-title-center-full.php') ;?>
          <?php if( $settings['block-text'] ):?>
            <div class="row">
              <p class="text-center col-12 block-text">
			          <?php echo $settings['block-text'];?>
              </p>
            </div>
          <?php endif;?>
          <div class="row">
            <div class="content col-xl-4 offset-xl-3 swiper services-list">
              <div class="swiper-wrapper">
	              <?php
		              $servicesArgs = array(
			              'posts_per_page' => -1,
			              'orderby' 	 => 'date',
			              'post_type'  => 'yuna_services',
			              'post_status'    => 'publish'
		              );

		              $servicesList = new WP_Query( $servicesArgs );

		              if ( $servicesList->have_posts() ) :

			              while ( $servicesList->have_posts() ) : $servicesList->the_post();
				              $shortDescription = carbon_get_post_meta(  get_the_ID(), 'yuna_service_description' );
				              $btnText = carbon_get_post_meta(  get_the_ID(), 'yuna_service_more_btn_text' );
				              ?>
                      <div class="service-item swiper-slide">
                        <div class="inner yuna-radius">
                          <div class="service-pic second-up">
							              <?php the_post_thumbnail();?>
                            <h3 class="name subtitle"><?php the_title();?></h3>
                          </div>
                          <div class="service-text third-up">
                            <h3 class="name subtitle"><?php the_title();?></h3>
                            <p class="description"><?php echo $shortDescription;?></p>
                          </div>
                          <?php if( $btnText ):?>
                            <a href="<?php the_permalink();?>" class="button"><?php echo $btnText;?></a>
                          <?php endif;?>

                        </div>
                      </div>
			              <?php endwhile;?>
		              <?php endif; ?>
	              <?php wp_reset_postdata(); ?>
              </div>
            </div>
            <div class="dot-navigation"></div>
          </div>
				</div>
			</section>

			<?php

		}

	}