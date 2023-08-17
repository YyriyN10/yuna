<?php

	class Elementor_Advantages_1_Widget extends \Elementor\Widget_Base {

		public function __construct($data = [], $args = null) {
			parent::__construct($data, $args);

			wp_register_script( 'advantages-slider', plugins_url( '/js/yuna-advantages.js', __FILE__ ), [ 'elementor-frontend' ], '1.0.1', true );
		}

		public function get_script_depends() {
			return [ 'advantages-slider'];
		}

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
					'label_block' => true,
					'placeholder' => esc_html__( 'Enter block ID', 'yuna' ),
				]
			);

			$repeater = new \Elementor\Repeater();

			$repeater->add_control(
				'icon',
				[
					'label' => esc_html__( 'Icon', 'yuna' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'label_block' => true,
					'default' => [
						'url' => \Elementor\Utils::get_placeholder_image_src(),
					],
				]
			);

			$repeater->add_control(
				'name',
				[
					'label' => esc_html__( 'Advantages name', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
					'placeholder' => esc_html__( 'Advantages name', 'yuna' ),
					'default' => esc_html__( 'Advantages name', 'yuna' ),
				]
			);

			$this->add_control(
				'advantages-list',
				[
					'label' => __( 'List', 'yuna' ),
					'type' => \Elementor\Controls_Manager::REPEATER,
					'label_block' => true,
					'fields' => $repeater->get_controls(),
					'title_field' => 'Advantages list',
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
					'label' => esc_html__( 'Advantage item background color ', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .bg-color' => 'background-color: {{VALUE}}',
						'{{WRAPPER}}  li.slick-active' => 'background-color: {{VALUE}}; border-color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'block-bg-color',
				[
					'label' => esc_html__( 'Advantages background color ', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .advantages' => 'background-color: {{VALUE}}',
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
			<section class="advantages animate-target" <?php if($settings['block-id']):?> id="<?php echo $settings['block-id'];?>" <?php endif;?>>
				<div class="container">
          <?php if( $settings['advantages-list'] ):?>
            <div class="row justify-content-center advantages-slider second-up" id="advantages-slider">
	            <?php foreach( $settings['advantages-list'] as $item ): ?>
                <div class="slide col-lg-3">
                  <div class="inner bg-color yuna-radius">
                    <div class="icon-wrapper">
                      <img class="svg-pic" src="<?php echo $item['icon']['url'];?>" alt="">
                    </div>
                    <h3 class="name"><?php echo esc_html($item['name']) ;?></h3>
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