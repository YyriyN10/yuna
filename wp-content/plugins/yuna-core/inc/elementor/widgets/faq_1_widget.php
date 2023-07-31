<?php

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
					'label' => esc_html__( 'Content', 'elementor-oembed-widget' ),
					'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				]
			);

			$this->add_control(
				'block-id',
				[
					'label' => esc_html__( 'FAQ block ID', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'placeholder' => esc_html__( 'Enter block ID', 'yuna' ),
				]
			);

			$this->add_control(
				'block-name',
				[
					'label' => esc_html__( 'FAQ block name', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'placeholder' => esc_html__( 'Enter block name', 'yuna' ),
				]
			);

			$this->add_control(
				'block-title',
				[
					'label' => esc_html__( 'FAQ block title', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'placeholder' => esc_html__( 'Enter block name', 'yuna' ),
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
			<section class="faq indent animate-target" <?php if($settings['block-id']):?> id="<?php echo $settings['block-id'];?>" <?php endif;?>>
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
											<div class="card-header">
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