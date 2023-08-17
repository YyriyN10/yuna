<?php

	class Elementor_Contact_Form_1_Widget extends \Elementor\Widget_Base {

		public function get_name() {
			return 'contact_form_one';
		}

		public function get_title() {
			return esc_html__( 'Contact Form', 'yuna' );
		}

		public function get_icon() {
			return 'eicon-form-horizontal';
		}

		public function get_custom_help_url() {
			return 'https://go.elementor.com/widget-name';
		}

		public function get_categories() {
			return [ 'yuna-category' ];
		}

		public function get_keywords() {
			return [ 'Contact Form', 'Contact Form One' ];
		}

		protected function register_controls() {

			$inputName = carbon_get_theme_option( 'yuna_form_input_name' );
			$inputPhone = carbon_get_theme_option( 'yuna_form_input_phone' );
			$inputEmail = carbon_get_theme_option( 'yuna_form_input_email' );
			$inputMassage = carbon_get_theme_option( 'yuna_form_input_message' );
			$phoneMaskType = carbon_get_theme_option('yuna_form_phone_mask_type');

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
				'block-icon',
				[
					'label' => esc_html__( 'Contact form icon', 'yuna' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'label_block' => true,
					'default' => [
						'value' => 'fas fa-star',
						'library' => 'solid',
					]
				]
			);

			$this->add_control(
				'block-title',
				[
					'label' => esc_html__( 'Contact form block title', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'label_block' => true,
					'placeholder' => esc_html__( 'Enter block name', 'yuna' ),
				]
			);

			$this->add_control(
				'form-call-to-action',
				[
					'label' => esc_html__( 'Call to form submit text', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'label_block' => true,
					'placeholder' => esc_html__( 'Enter call to action text', 'yuna' ),
				]
			);

			if ( $inputName == 'yes'){
				$this->add_control(
					'name-placeholder',
					[
						'label' => esc_html__( 'Form field name placeholder', 'yuna' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => esc_html__( 'Name', 'yuna' ),
					]
				);
			}

			if ( $inputEmail == 'yes' ){
				$this->add_control(
					'email-placeholder',
					[
						'label' => esc_html__( 'Form field e-mail placeholder', 'yuna' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => esc_html__( 'E-mail', 'yuna' ),
					]
				);
			}

			$this->add_control(
				'phone-placeholder',
				[
					'label' => esc_html__( 'Form field phone placeholder', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
					'placeholder' => esc_html__( 'Telephone', 'yuna' ),
				]
			);

			if ( $inputMassage == 'yes' ){
				$this->add_control(
					'massage-placeholder',
					[
						'label' => esc_html__( 'Form field massage placeholder', 'yuna' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => esc_html__( 'Send your massage', 'yuna' ),
					]
				);
			}

			$this->add_control(
				'btn-send-text',
				[
					'label' => esc_html__( 'Form button submit text', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
					'placeholder' => esc_html__( 'Send', 'yuna' ),
				]
			);

			$this->add_control(
				'working-hovers-title',
				[
					'label' => esc_html__( 'Header with work schedule', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
					'placeholder' => esc_html__( 'Work schedule', 'yuna' ),
				]
			);

			$this->add_control(
				'working-week-title',
				[
					'label' => esc_html__( 'Field signature with schedule from Monday to Friday', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
					'placeholder' => esc_html__( 'Mon - Fri', 'yuna' ),
				]
			);

			$this->add_control(
				'working-saturday-title',
				[
					'label' => esc_html__( 'Field signature with schedule from saturday', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
					'placeholder' => esc_html__( 'Sat', 'yuna' ),
				]
			);

			$this->add_control(
				'working-sunday-title',
				[
					'label' => esc_html__( 'Field signature with schedule from sunday', 'yuna' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'label_block' => true,
					'placeholder' => esc_html__( 'Sun', 'yuna' ),
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
						'{{WRAPPER}} .button' => 'background-color: {{VALUE}}',
						'{{WRAPPER}} .contact-info svg path' => 'fill: {{VALUE}}',
						'{{WRAPPER}} .inner .work-schedule .working-hovers svg path' => 'fill: {{VALUE}}',


					],
				]
			);

			$this->add_control(
				'card-bg-color',
				[
					'label' => esc_html__( 'Contact card background color ', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .contact-info .inner' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'form-input-bg-color',
				[
					'label' => esc_html__( 'Form input background color ', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .form-group .form-control' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'before-bg-color',
				[
					'label' => esc_html__( 'Before background color ', 'yuna' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .contact-form:before' => 'background-color: {{VALUE}}',

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

			$inputName = carbon_get_theme_option( 'yuna_form_input_name' );
			$inputPhone = carbon_get_theme_option( 'yuna_form_input_email' );
			$inputEmail = carbon_get_theme_option( 'yuna_form_input_phone' );
			$inputMassage = carbon_get_theme_option( 'yuna_form_input_message');
			$sitePhone = carbon_get_theme_option( 'yuna_phone_number' );
			$siteAddress = carbon_get_theme_option( 'yuna_address' );
			$siteMail = carbon_get_theme_option( 'yuna_site_email' );
			$weekStartWork = carbon_get_theme_option( 'yuna_work_time_week_start' );
			$weekStopWork = carbon_get_theme_option( 'yuna_work_time_week_stop' );
			$saturdayStartWork = carbon_get_theme_option( 'yuna_work_time_saturday_start' );
			$saturdayStopWork = carbon_get_theme_option( 'yuna_work_time_saturday_stop' );
			$sundayStartWork = carbon_get_theme_option( 'yuna_work_time_sunday_start' );
			$sundayStopWork = carbon_get_theme_option( 'yuna_work_time_sunday_stop' );

			$inputErrorText = carbon_get_theme_option('yuna_form_input_error_text'.carbon_lang_prefix());

			$addPhoneMask = carbon_get_theme_option('yuna_form_phone_mask');
			$phoneMaskType = '';
			$customMask = '';

			if ( $addPhoneMask == 'yes' ){
				$phoneMaskType = carbon_get_theme_option('yuna_form_phone_mask_type');
				$customMask = carbon_get_theme_option('yuna_form_phone_custom_mask');
      }


			?>
			<section class="contact-form indent animate-target" <?php if($settings['block-id']):?> id="<?php echo $settings['block-id'];?>" <?php endif;?>style="background-image: url('<?php echo esc_url($settings['image']['url']);?>')">

				<div class="container">
					<?php /*require ('parts/block-name.php') ;*/?>
					<?php require ('parts/block-title-center-full.php') ;?>
          <div class="row content">
            <div class="contact-info col-lg-5 col-md-6 second-up">
              <div class="inner yuna-radius">
                <?php if( $siteAddress ):?>
                  <p>
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 92.25 122.88" style="enable-background:new 0 0 92.25 122.88" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M68.51,106.28c-5.59,6.13-12.1,11.62-19.41,16.06c-0.9,0.66-2.12,0.74-3.12,0.1 c-10.8-6.87-19.87-15.12-27-24.09C9.14,86.01,2.95,72.33,0.83,59.15c-2.16-13.36-0.14-26.22,6.51-36.67 c2.62-4.13,5.97-7.89,10.05-11.14C26.77,3.87,37.48-0.08,48.16,0c10.28,0.08,20.43,3.91,29.2,11.92c3.08,2.8,5.67,6.01,7.79,9.49 c7.15,11.78,8.69,26.8,5.55,42.02c-3.1,15.04-10.8,30.32-22.19,42.82V106.28L68.51,106.28z M46.12,23.76 c12.68,0,22.95,10.28,22.95,22.95c0,12.68-10.28,22.95-22.95,22.95c-12.68,0-22.95-10.27-22.95-22.95 C23.16,34.03,33.44,23.76,46.12,23.76L46.12,23.76z"/></g>
                    </svg>
                    <span><?php echo $siteAddress;?></span>
                  </p>
                <?php endif;?>
                <?php if( $siteMail ):?>
                  <a href="mailto:<?php echo $siteMail;?>">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="122.88px" height="78.607px" viewBox="0 0 122.88 78.607" enable-background="new 0 0 122.88 78.607" xml:space="preserve"><g><path fill-rule="evenodd" clip-rule="evenodd" d="M61.058,65.992l24.224-24.221l36.837,36.836H73.673h-25.23H0l36.836-36.836 L61.058,65.992L61.058,65.992z M1.401,0l59.656,59.654L120.714,0H1.401L1.401,0z M0,69.673l31.625-31.628L0,6.42V69.673L0,69.673z M122.88,72.698L88.227,38.045L122.88,3.393V72.698L122.88,72.698z"/></g>
                    </svg>
                    <span> <?php echo $siteMail;?></span>
                  </a>
                <?php endif;?>
	              <?php if( $sitePhone ): $phoneToColl = preg_replace( '/[^0-9]/', '', $sitePhone);?>
                  <a href="tel:<?php echo esc_html($phoneToColl);?>"
                     class="header-phone table-phone">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 122.27" style="enable-background:new 0 0 122.88 122.27" xml:space="preserve"><g><path d="M33.84,50.25c4.13,7.45,8.89,14.6,15.07,21.12c6.2,6.56,13.91,12.53,23.89,17.63c0.74,0.36,1.44,0.36,2.07,0.11 c0.95-0.36,1.92-1.15,2.87-2.1c0.74-0.74,1.66-1.92,2.62-3.21c3.84-5.05,8.59-11.32,15.3-8.18c0.15,0.07,0.26,0.15,0.41,0.21 l22.38,12.87c0.07,0.04,0.15,0.11,0.21,0.15c2.95,2.03,4.17,5.16,4.2,8.71c0,3.61-1.33,7.67-3.28,11.1 c-2.58,4.53-6.38,7.53-10.76,9.51c-4.17,1.92-8.81,2.95-13.27,3.61c-7,1.03-13.56,0.37-20.27-1.69 c-6.56-2.03-13.17-5.38-20.39-9.84l-0.53-0.34c-3.31-2.07-6.89-4.28-10.4-6.89C31.12,93.32,18.03,79.31,9.5,63.89 C2.35,50.95-1.55,36.98,0.58,23.67c1.18-7.3,4.31-13.94,9.77-18.32c4.76-3.84,11.17-5.94,19.47-5.2c0.95,0.07,1.8,0.62,2.25,1.44 l14.35,24.26c2.1,2.72,2.36,5.42,1.21,8.12c-0.95,2.21-2.87,4.25-5.49,6.15c-0.77,0.66-1.69,1.33-2.66,2.03 c-3.21,2.33-6.86,5.02-5.61,8.18L33.84,50.25L33.84,50.25L33.84,50.25z"/></g>
                    </svg>
                    <span><?php echo esc_html($sitePhone);?></span>
                  </a>
	              <?php endif;?>
                <?php if( $weekStartWork && $weekStopWork ):?>
                  <div class="work-schedule">
                    <h3 class="working-hovers inner-title">
                      <svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 502 511.82"><path fill-rule="nonzero" d="M279.75 471.21c14.34-1.9 25.67 12.12 20.81 25.75-2.54 6.91-8.44 11.76-15.76 12.73a260.727 260.727 0 0 1-50.81 1.54c-62.52-4.21-118.77-31.3-160.44-72.97C28.11 392.82 0 330.04 0 260.71 0 191.37 28.11 128.6 73.55 83.16S181.76 9.61 251.1 9.61c24.04 0 47.47 3.46 69.8 9.91a249.124 249.124 0 0 1 52.61 21.97l-4.95-12.96c-4.13-10.86 1.32-23.01 12.17-27.15 10.86-4.13 23.01 1.32 27.15 12.18L428.8 68.3a21.39 21.39 0 0 1 1.36 6.5c1.64 10.2-4.47 20.31-14.63 23.39l-56.03 17.14c-11.09 3.36-22.8-2.9-26.16-13.98-3.36-11.08 2.9-22.8 13.98-26.16l4.61-1.41a210.71 210.71 0 0 0-41.8-17.12c-18.57-5.36-38.37-8.24-59.03-8.24-58.62 0-111.7 23.76-150.11 62.18-38.42 38.41-62.18 91.48-62.18 150.11 0 58.62 23.76 111.69 62.18 150.11 34.81 34.81 81.66 57.59 133.77 61.55 14.9 1.13 30.23.76 44.99-1.16zm-67.09-312.63c0-10.71 8.69-19.4 19.41-19.4 10.71 0 19.4 8.69 19.4 19.4V276.7l80.85 35.54c9.8 4.31 14.24 15.75 9.93 25.55-4.31 9.79-15.75 14.24-25.55 9.93l-91.46-40.2c-7.35-2.77-12.58-9.86-12.58-18.17V158.58zm134.7 291.89c-15.62 7.99-13.54 30.9 3.29 35.93 4.87 1.38 9.72.96 14.26-1.31 12.52-6.29 24.54-13.7 35.81-22.02 5.5-4.1 8.36-10.56 7.77-17.39-1.5-15.09-18.68-22.74-30.89-13.78a208.144 208.144 0 0 1-30.24 18.57zm79.16-69.55c-8.84 13.18 1.09 30.9 16.97 30.2 6.21-.33 11.77-3.37 15.25-8.57 7.86-11.66 14.65-23.87 20.47-36.67 5.61-12.64-3.13-26.8-16.96-27.39-7.93-.26-15.11 4.17-18.41 11.4-4.93 10.85-10.66 21.15-17.32 31.03zm35.66-99.52c-.7 7.62 3 14.76 9.59 18.63 12.36 7.02 27.6-.84 29.05-14.97 1.33-14.02 1.54-27.9.58-41.95-.48-6.75-4.38-12.7-10.38-15.85-13.46-6.98-29.41 3.46-28.34 18.57.82 11.92.63 23.67-.5 35.57zM446.1 177.02c4.35 10.03 16.02 14.54 25.95 9.96 9.57-4.4 13.86-15.61 9.71-25.29-5.5-12.89-12.12-25.28-19.69-37.08-9.51-14.62-31.89-10.36-35.35 6.75-.95 5.03-.05 9.94 2.72 14.27 6.42 10.02 12 20.44 16.66 31.39z"/>
                      </svg>
                      <span><?php echo esc_html($settings['working-hovers-title']);?></span>
                    </h3>
                    <p>
                      <span><?php echo esc_html($settings['working-week-title']);?>:</span>
		                  <?php echo $weekStartWork;?> - <?php echo $weekStopWork;?>
                    </p>
	                  <?php if( $saturdayStartWork && $saturdayStopWork ):?>
                      <p>
                        <span><?php echo esc_html($settings['working-saturday-title']);?>:</span>
			                  <?php echo $saturdayStartWork;?> - <?php echo $saturdayStopWork;?>
                      </p>
	                  <?php endif;?>
	                  <?php if( $sundayStartWork && $sundayStopWork ):?>
                      <p>
                        <span><?php echo esc_html($settings['working-sunday-title']);?>:</span>
			                  <?php echo $sundayStartWork;?> - <?php echo $sundayStopWork;?>
                      </p>
	                  <?php endif;?>
                  </div>
                <?php endif;?>

              </div>
	            <?php /*require ('parts/social.php');*/?>
            </div>
            <div class="form-wrapper offset-lg-2 col-lg-5 col-md-6 offset-md-0 third-up">
              <h3 class="cal-to-action subtitle"><?php echo esc_html($settings['form-call-to-action']);?></h3>
              <form method="post"  class="form-communication">
                <input type="hidden" name="action" value="yuna_form_integration">
								<?php if( $inputName == 'yes'):?>
                  <div class="form-group name-field">
                    <input type="text" name="name" class="form-control" placeholder="<?php echo esc_attr($settings['name-placeholder']);?>" required>
                    <p class="error-text"><?php echo esc_html($inputErrorText);?></p>
                  </div>
								<?php endif;?>
								<?php if( $inputPhone == 'yes'):?>
                  <div class="form-group phone-field">
                    <input type="tel"
                           name="phone"
                           data-custommask="<?php echo $customMask;?>"
                           class="form-control<?php if( $phoneMaskType == 'ipmask' ):?> ip-multi-mask<?php elseif ($phoneMaskType == 'custom'):?> custom-mask<?php endif;?>"
                           placeholder="<?php echo esc_attr($settings['phone-placeholder']);?>"
                           required>
                    <p class="error-text"><?php echo esc_html($inputErrorText);?></p>
                  </div>
								<?php endif;?>
								<?php if( $inputEmail == 'yes'):?>
                  <div class="email-field form-group">
                    <input type="email" name="email" class="form-control" placeholder="<?php echo esc_attr($settings['email-placeholder']);?>" required>
                    <p class="error-text"><?php echo esc_html($inputErrorText);?></p>
                  </div>
								<?php endif;?>
								<?php if( $inputMassage == 'yes'):?>
                  <div class="form-group textarea-group">
                    <textarea name="massage" class="form-control" placeholder="<?php echo esc_attr($settings['massage-placeholder']) ;?>"></textarea>
                  </div>
								<?php endif;?>
                <button type="submit" class="button"><?php echo esc_html($settings['btn-send-text']);?></button>
                <input type="hidden" name="form-lang" value="">
                <input type="hidden" name="home-url" value="<?php echo home_url( '/' ); ?>">
                <input type="hidden" name="form-name" value="">

              </form>
            </div>
          </div>
				</div>
			</section>

			<?php

		}

	}