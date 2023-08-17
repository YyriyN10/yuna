<?php

	class Elementor_Cases_1_Widget extends \Elementor\Widget_Base {

		public function get_name() {
			return 'cases_one';
		}

		public function get_title() {
			return esc_html__( 'Cases One', 'yuna' );
		}

		public function get_icon() {
			return 'eicon-post-list';
		}

		public function get_custom_help_url() {
			return 'https://go.elementor.com/widget-name';
		}

		public function get_categories() {
			return [ 'yuna-category' ];
		}

		public function get_keywords() {
			return [ 'Cases', 'Cases One' ];
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
				'block-name',
				[
					'label' => esc_html__( 'Cases block name', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
					'placeholder' => esc_html__( 'Enter block name', 'yuna' ),
				]
			);

			$this->add_control(
				'block-title',
				[
					'label' => esc_html__( 'Cases block title', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'label_block' => true,
					'placeholder' => esc_html__( 'Enter block name', 'yuna' ),
				]
			);

			$this->add_control(
				'go-to-btn-text',
				[
					'label' => esc_html__( 'Button go to text', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'label_block' => true,
					'placeholder' => esc_html__( 'More detail', 'yuna' ),
				]
			);

			$this->add_control(
				'more-btn-text',
				[
					'label' => esc_html__( 'Button all text', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'label_block' => true,
					'placeholder' => esc_html__( 'All cases', 'yuna' ),
				]
			);

			$this->add_control(
				'image',
				[
					'label' => esc_html__( 'Choose Background Image', 'yuna' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'label_block' => true,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);

			$this->add_control(
				'more-btn-url',
				[
					'label' => esc_html__( 'Link', 'yuna' ),
					'type' => \Elementor\Controls_Manager::URL,
					'placeholder' => esc_html__( 'https://your-link.com', 'yuna' ),
					'options' => [ 'url', 'is_external', 'nofollow' ],
					'default' => [
						'url' => '',
						'is_external' => true,
						'nofollow' => true,
						// 'custom_attributes' => '',
					],
					'label_block' => true,
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
				'item-bg-color',
				[
					'label' => esc_html__( 'Case item background color ', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .inner' => 'background-color: {{VALUE}}',
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
				'before-bg-color',
				[
					'label' => esc_html__( 'Before background color ', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .cases:before' => 'background-color: {{VALUE}}',

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
			<section class="cases indent animate-target" <?php if($settings['block-id']):?> id="<?php echo $settings['block-id'];?>" <?php endif;?> style="background-image: url('<?php echo esc_url($settings['image']['url']);?>')">
				<div class="container">
					<?php require ('parts/block-title-center-full.php') ;?>
					<div class="row second-up">
						<?php
							$casesArgs = array(
								'posts_per_page' => 3,
								'orderby' 	 => 'date',
								'post_type'  => 'yuna_cases',
								'post_status'    => 'publish'
							);

							$casesAllArgs = array(
								'posts_per_page' => -1,
								'orderby' 	 => 'date',
								'post_type'  => 'yuna_cases',
								'post_status'    => 'publish'
							);

							$allCasesMore = new WP_Query( $casesAllArgs );
							$allCasesCount = $allCasesMore->post_count;

							$casesList = new WP_Query( $casesArgs );

							if ( $casesList->have_posts() ) :

								while ( $casesList->have_posts() ) : $casesList->the_post();
							    $caseShortDescription = carbon_get_post_meta(  get_the_ID(), 'yuna_case_short_description' );
									?>
									<a href="<?php esc_url( the_permalink() );?>" class="case-item col-lg-4">
										<div class="inner yuna-radius">
                      <div class="prev-pic">
	                      <?php the_post_thumbnail();?>
                      </div>
                      <h3 class="name inner-title"><?php esc_html( the_title() );?></h3>
                      <p class="description"><?php echo esc_html($caseShortDescription);?></p>
                      <button class="button"><?php echo esc_html($settings['go-to-btn-text']);?></button>
										</div>
									</a>
								<?php endwhile;?>
							<?php endif; ?>
						<?php wp_reset_postdata(); ?>
					</div>
					<?php if( $allCasesCount > 3 ):?>
						<div class="row">
							<div class="col-12 text-center">
								<a href="<?php echo esc_url($settings['more-btn-url']['url']) ;?>" class="button"><?php echo esc_html($settings['more-btn-text']);?></a>
							</div>
						</div>
					<?php endif;?>
					</div>

				</div>
			</section>

			<?php

		}

	}