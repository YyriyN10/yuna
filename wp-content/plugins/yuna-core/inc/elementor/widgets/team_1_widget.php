<?php

	class Elementor_Team_1_Widget extends \Elementor\Widget_Base {

		public function get_name() {
			return 'team_one';
		}

		public function get_title() {
			return esc_html__( 'Team One', 'yuna' );
		}

		public function get_icon() {
			return 'eicon-person';
		}

		public function get_custom_help_url() {
			return 'https://go.elementor.com/widget-name';
		}

		public function get_categories() {
			return [ 'yuna-category' ];
		}

		public function get_keywords() {
			return [ 'Team', 'Team One' ];
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
					'label' => esc_html__( 'Team block name', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
					'placeholder' => esc_html__( 'Enter block name', 'yuna' ),
				]
			);


			$this->add_control(
				'block-title',
				[
					'label' => esc_html__( 'Team block title', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'label_block' => true,
					'placeholder' => esc_html__( 'Enter block name', 'yuna' ),
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

			$this->end_controls_section();

			$this->start_controls_section(
				'section_style',
				[
					'label' => esc_html__( 'Style', 'yuna' ),
					'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);

			$this->add_control(
				'accent-color',
				[
					'label' => esc_html__( 'Accent color', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}}  li.slick-active' => 'background-color: {{VALUE}}; border-color: {{VALUE}}',

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
			<section class="team indent animate-target" <?php if($settings['block-id']):?> id="<?php echo $settings['block-id'];?>" <?php endif;?> style="background-image: url('<?php echo esc_url($settings['image']['url']);?>')">
				<div class="container">
					<?php /*require ('parts/block-name.php') ;*/?>

					<?php require ('parts/block-title-center-full.php') ;?>

          <div class="row justify-content-center second-up">
	            <?php
		            $teamArgs = array(
			            'posts_per_page' => -1,
			            'orderby' 	 => 'date',
			            'post_type'  => 'yuna_team',
			            'post_status'    => 'publish'
		            );

		            $teamList = new WP_Query( $teamArgs );

		            if ( $teamList->have_posts() ) :

			            while ( $teamList->have_posts() ) : $teamList->the_post();
				            $teamMenPost = carbon_get_post_meta(  get_the_ID(), 'yuna_team_men_position' );

				            ?>
                    <div class="team-men col-lg-3 col-sm-4 col-6">
                      <div class="inner yuna-radius">
                        <div class="team-pic ">
							            <?php the_post_thumbnail();?>
                        </div>
                        <div class="team-men-info">
                          <h3 class="name inner-title"><?php the_title();?></h3>
                          <p class="men-post"><?php echo $teamMenPost;?></p>
                        </div>
                      </div>
                    </div>
			            <?php endwhile;?>
		            <?php endif; ?>
	            <?php wp_reset_postdata(); ?>
          </div>
				</div>
			</section>

			<?php

		}

	}