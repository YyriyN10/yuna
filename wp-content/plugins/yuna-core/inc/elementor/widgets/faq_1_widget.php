<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	class Elementor_FAQ_1_Widget extends \Elementor\Widget_Base {

		/*public function get_script_depends(){
			if(\Elementor\Plugin::$instance->preview->is_preview_mode()){
				wp_register_script('yuna-gallery', plugins_url('/js/yuna-gallery.js', __FILE__), ['elementor-frontend'], ' 1.0', true);
				return ['yuna-gallery'];
			}
			return [];
		}*/

		public function get_name() {
			return 'faq_one';
		}

		public function get_title() {
			return esc_html__( 'FAQ One', 'yuna' );
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
			return [ 'FAQ', 'FAQ One' ];
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


			$this->end_controls_section();

			$this->start_controls_section(
				'section_style',
				[
					'label' => esc_html__( 'Style', 'yuna' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_control(
				'bg-color',
				[
					'label' => esc_html__( 'Background color', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .card-header' => 'background-color: {{VALUE}}',
					],
				]
			);

      $this->add_control(
				'block-bg-color',
				[
					'label' => esc_html__( 'F.A.Q. block background color ', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .faq' => 'background-color: {{VALUE}}',
					],
				]
			);

      $this->add_control(
				'text-bg-color',
				[
					'label' => esc_html__( 'Answer background color ', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .card-body' => 'background-color: {{VALUE}}',
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
				'question-text-color',
				[
					'label' => esc_html__( 'Question text color', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .accordion-faq .card .card-header .card-link' => 'color: {{VALUE}}',
					],
				]
			);

      $this->add_control(
				'question-svg-color',
				[
					'label' => esc_html__( 'Question arrow color', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .accordion-faq .card .card-header .card-link .icon path' => 'fill: {{VALUE}}',
					],
				]
			);

      $this->add_control(
				'answer-text-color',
				[
					'label' => esc_html__( 'Answer text color', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .card-body' => 'color: {{VALUE}}',
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
			<section class="faq pe-wrapper-latest-posts indent animate-target" <?php if($settings['block-id']):?> id="<?php echo $settings['block-id'];?>" <?php endif;?> <!--style="background-color: --><?php /*echo $settings['bg-color'];*/?>">
				<div class="container">
					<?php /*require ('parts/block-name.php') ;*/?>
					<?php require ('parts/block-title-center-full.php') ;?>
					<div class="row second-up">
						<div class="accordion-faq col-lg-10 offset-lg-1 col-12" id="accordion-faq">
							<?php
								$faqArgs = array(
									'posts_per_page' => 6,
									'orderby' 	 => 'date',
									'post_type'  => 'yuna_faq',
									'post_status'    => 'publish'
								);

								$faqList = new WP_Query( $faqArgs );

								if ( $faqList->have_posts() ) :

									while ( $faqList->have_posts() ) : $faqList->the_post();
										?>
										<div class="card yuna-radius">
											<div class="card-header your-class">
												<a class="card-link inner-title collapsed" data-toggle="collapse" href="#faq<?php the_ID();?>">
													<?php the_title();?>
                          <svg width="800px" height="800px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <path d="M903.232 256l56.768 50.432L512 768 64 306.432 120.768 256 512 659.072z" fill="#000000" />
                          </svg>
												</a>
											</div>
											<div id="faq<?php the_ID();?>" class="collapse" data-parent="#accordion-faq">
												<div class="card-body">
													<?php the_content();?>
												</div>
											</div>
										</div>
									<?php endwhile;?>
								<?php endif; ?>
							<?php wp_reset_postdata(); ?>
						</div>
					</div>
				</div>
			</section>

			<?php

		}

	}