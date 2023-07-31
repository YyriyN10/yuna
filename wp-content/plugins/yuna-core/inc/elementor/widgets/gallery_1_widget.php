<?php

	class Elementor_Gallery_1_Widget extends \Elementor\Widget_Base {


		public function get_name() {
			return 'gallery_one';
		}

		public function get_title() {
			return esc_html__( 'Gallery', 'yuna' );
		}

		public function get_icon() {
			return 'eicon-gallery-grid';
		}

		public function get_custom_help_url() {
			return 'https://go.elementor.com/widget-name';
		}

		public function get_categories() {
			return [ 'yuna-category' ];
		}

		public function get_keywords() {
			return [ 'Gallery', 'Gallery One' ];
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
				'block-name',
				[
					'label' => esc_html__( 'Gallery block name', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'placeholder' => esc_html__( 'Enter block name', 'yuna' ),
				]
			);

			$this->add_control(
				'block-icon',
				[
					'label' => esc_html__( 'Gallery icon', 'yuna' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'fas fa-star',
						'library' => 'solid',
					]
				]
			);

			$this->add_control(
				'block-title',
				[
					'label' => esc_html__( 'Gallery block title', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'placeholder' => esc_html__( 'Enter block name', 'yuna' ),
				]
			);

			$this->add_control(
				'more-btn-text',
				[
					'label' => esc_html__( 'Button more text', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'placeholder' => esc_html__( 'Watch more', 'yuna' ),
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
			<section class="our-gallery indent animate-target" <?php if($settings['block-id']):?> id="<?php echo $settings['block-id'];?>" <?php endif;?>>
				<div class="container-fluid">
					<?php /*require ('parts/block-name.php') ;*/?>
					<?php require ('parts/block-title-center-full.php') ;?>
          <div class="row second-up">
	          <?php
		          $galleryArgs = array(
			          'posts_per_page' => 8,
			          'orderby' 	 => 'date',
			          'post_type'  => 'yuna_galley',
			          'post_status'    => 'publish'
		          );

		          $galleryAllArgs = array(
			          'posts_per_page' => -1,
			          'orderby' 	 => 'date',
			          'post_type'  => 'yuna_galley',
			          'post_status'    => 'publish'
		          );

		          $allGalleryMore = new WP_Query( $galleryAllArgs );
		          $allGalleryCount = $allGalleryMore->post_count;

		          $galleryList = new WP_Query( $galleryArgs );

		          if ( $galleryList->have_posts() ) :

			          while ( $galleryList->have_posts() ) : $galleryList->the_post();
				          ?>
                  <a href="<?php the_post_thumbnail_url();?>" data-fancybox="our-gallery" class="gallery-item col-lg-3 col-md-4 col-sm-6">
                    <div class="inner yuna-radius">
	                    <?php the_post_thumbnail();?>
                    </div>
                  </a>
			          <?php endwhile;?>
		          <?php endif; ?>
	          <?php wp_reset_postdata(); ?>
          </div>
          <?php if( $allGalleryCount > 6 ):?>
            <div class="row">
              <div class="col-12 text-center">
                <a href="<?php echo $settings['more-btn-url']['url'];?>" class="button"><?php echo $settings['more-btn-text'];?></a>
              </div>
            </div>
          <?php endif;?>
				</div>
			</section>

			<?php

		}

	}