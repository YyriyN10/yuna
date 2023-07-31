<?php

	class Elementor_Reviews_1_Widget extends \Elementor\Widget_Base {

		public function __construct($data = [], $args = null) {
			parent::__construct($data, $args);

			wp_register_script( 'reviews-slider', plugins_url( '/js/yuna-reviews.js', __FILE__ ), [ 'elementor-frontend' ], '1.0.0', true );
		}


		public function get_script_depends() {
			return [ 'reviews-slider'];
		}

		public function get_name() {
			return 'reviews_one';
		}

		public function get_title() {
			return esc_html__( 'Reviews One', 'yuna' );
		}

		public function get_icon() {
			return 'eicon-testimonial';
		}

		public function get_custom_help_url() {
			return 'https://go.elementor.com/widget-name';
		}

		public function get_categories() {
			return [ 'yuna-category' ];
		}

		public function get_keywords() {
			return [ 'Reviews', 'Reviews One' ];
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
				'block-name',
				[
					'label' => esc_html__( 'Reviews block name', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'placeholder' => esc_html__( 'Enter block name', 'yuna' ),
				]
			);

			$this->add_control(
				'block-title',
				[
					'label' => esc_html__( 'Reviews block title', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'placeholder' => esc_html__( 'Enter block name', 'yuna' ),
				]
			);

			$this->add_control(
				'review-bg-icon',
				[
					'label' => esc_html__( 'Review background image', 'yuna' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);

			$this->add_control(
				'avatar-icon',
				[
					'label' => esc_html__( 'Default avatar icon', 'yuna' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-star',
						'library' => 'solid',
					]
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
			<section class="reviews indent animate-target" <?php if($settings['block-id']):?> id="<?php echo $settings['block-id'];?>" <?php endif;?>>
				<div class="container">
					<?php /*require ('parts/block-name.php') ;*/?>
					<?php require ('parts/block-title-center-full.php') ;?>
          <div class="row second-up">
            <div class="rev-slider col-lg-8 offset-lg-2 col-sm-10 offset-sm-1 col-12 offset-0" id="rev-slider">
	            <?php
		            $revArgs = array(
			            'posts_per_page' => -1,
			            'orderby' 	 => 'date',
			            'post_type'  => 'yuna_reviews',
			            'post_status'    => 'publish'
		            );

		            $revList = new WP_Query( $revArgs );

		            if ( $revList->have_posts() ) :

			            while ( $revList->have_posts() ) : $revList->the_post();
				            $carName = carbon_get_post_meta(  get_the_ID(), 'yuna_reviews_car_name' );
				            ?>

                    <div class="slide ">
                      <div class="image-wrapper yuna-radius">
	                      <?php the_post_thumbnail();?>
                      </div>
                      <div class="text-wrapper yuna-radius">
                        <div class="text-content">
                          <svg class="quotes quotes-top" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 92.81" style="enable-background:new 0 0 122.88 92.81" xml:space="preserve"><g><path fill="#ffffff" d="M106.97,92.81H84.89c-8.5,0-15.45-6.95-15.45-15.45c0-31.79-8.12-66.71,30.84-76.68 c17.65-4.51,22.25,14.93,3.48,16.27c-11.45,0.82-13.69,8.22-14.04,19.4h17.71c8.5,0,15.45,6.95,15.45,15.45v25.09 C122.88,85.65,115.72,92.81,106.97,92.81L106.97,92.81z M38.23,92.81H16.15c-8.5,0-15.45-6.95-15.45-15.45 c0-31.79-8.12-66.71,30.84-76.68C49.2-3.84,53.8,15.6,35.02,16.95c-11.45,0.82-13.69,8.22-14.04,19.4H38.7 c8.5,0,15.45,6.95,15.45,15.45v25.09C54.14,85.65,46.98,92.81,38.23,92.81L38.23,92.81z"/></g>
                          </svg>
	                        <?php echo the_content();?>
                          <svg class="quotes quotes-bottom" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 92.81" style="enable-background:new 0 0 122.88 92.81" xml:space="preserve"><g><path fill="#ffffff" d="M15.91,0h22.08c8.5,0,15.45,6.95,15.45,15.45c0,31.79,8.13,66.71-30.84,76.68 C4.94,96.64,0.34,77.2,19.12,75.86c11.45-0.82,13.69-8.22,14.04-19.4H15.45C6.95,56.45,0,49.5,0,41.01V15.91C0,7.16,7.16,0,15.91,0 L15.91,0z M84.65,0h22.08c8.5,0,15.45,6.95,15.45,15.45c0,31.79,8.13,66.71-30.84,76.68c-17.65,4.51-22.25-14.93-3.48-16.27 c11.45-0.82,13.69-8.22,14.04-19.4H84.18c-8.5,0-15.45-6.95-15.45-15.45V15.91C68.74,7.16,75.9,0,84.65,0L84.65,0z"/></g>
                          </svg>
                        </div>
                        <div class="info-text">
                          <h3 class="name inner-title"><?php esc_html(the_title());?></h3>
	                        <?php if( $carName ):?>
                            <p class="car-name"><?php echo esc_html($carName);?></p>
	                        <?php endif;?>
                        </div>
                      </div>
	                    <?php /*if($settings['review-bg-icon']):*/?><!--
                        <img class="background-pic" src="<?php /*echo $settings['review-bg-icon']['url'];*/?>" alt="">
                      <?php /*endif;*/?>
                      <div class="client">
                        <div class="rev-pic yuna-radius">
		                      <?php /*$revPic = get_the_post_thumbnail_url(); if( $revPic ):*/?>
			                      <?php /*the_post_thumbnail();*/?>
		                      <?php /*else:*/?>
			                      <?php
/*			                      if ( $settings['avatar-icon']) {
				                      \Elementor\Icons_Manager::render_icon( $settings['avatar-icon'], [ 'aria-hidden' => 'true' ] );
			                      }
			                      */?>
		                      <?php /*endif;*/?>
                        </div>
                        <div class="info yuna-radius">
                          <h3 class="name inner-title"><?php /*esc_html(the_title());*/?></h3>
	                        <?php /*if( $carName ):*/?>
                            <p class="car-name"><?php /*echo esc_html($carName);*/?></p>
	                        <?php /*endif;*/?>
                        </div>
                      </div>

                      <div class="rev-text yuna-radius">
	                      <?php /*echo the_content();*/?>
                      </div>-->
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