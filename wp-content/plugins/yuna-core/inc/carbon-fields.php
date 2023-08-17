<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;


	add_action( 'carbon_fields_register_fields', 'yuna_carbon_theme_options' );

	function yuna_carbon_theme_options() {
		Container::make( 'theme_options', __('Site Options'))
		        ->set_icon( 'dashicons-admin-generic' )
						->add_tab( __( 'Contacts' ), array(
							Field::make( 'text', 'yuna_phone_number', __( 'Phone Number' ) )
							     ->set_attribute( 'placeholder', '(***) ***-****' ),
							Field::make( 'text', 'yuna_site_email', __( 'Site E-mail' ) )
							     ->set_attribute( 'type', 'email' )
							     ->set_attribute( 'placeholder', 'sitemail@meil.meil' ),
							Field::make( 'text', 'yuna_in_link', __( 'Linkedin link' ) )
							     ->set_attribute( 'type', 'url' )
							     ->set_attribute( 'placeholder', 'https://www.linkedin.com/' ),
							Field::make( 'text', 'yuna_fb_link', __( 'Facebook link' ) )
							     ->set_attribute( 'type', 'url' )
							     ->set_attribute( 'placeholder', 'https://www.facebook.com/' ),
							Field::make( 'text', 'yuna_instagram_link', __( 'Instagram link' ) )
							     ->set_attribute( 'type', 'url' )
							     ->set_attribute( 'placeholder', 'https://www.instagram.com/' ),
							Field::make( 'text', 'yuna_youtube_link', __( 'YouTube link' ) )
							     ->set_attribute( 'type', 'url' )
							     ->set_attribute( 'placeholder', 'https://www.youtube.com/' ),
							Field::make( 'text', 'yuna_twitter_link', __( 'Twitter link' ) )
							     ->set_attribute( 'type', 'url' )
							     ->set_attribute( 'placeholder', 'https://twitter.com/' ),
							Field::make( 'text', 'yuna_telegram_bot_link', __( 'Telegram bot link' ) )
							     ->set_attribute( 'type', 'url' )
							     ->set_attribute( 'placeholder', 'https://telegram.me/you_bot' ),
							Field::make( 'textarea', 'yuna_address', __('You address')  )
							     ->set_attribute( 'placeholder', '10 Road Broklyn Street, 600 New York, USA' )
							     ->set_rows( 2 ),
							Field::make( 'time', 'yuna_work_time_week_start', __('Start of work on weekdays')  )
							     ->set_attribute( 'placeholder', '09:00 or 09:00 AM' )
									 ->set_storage_format( 'H:i' ),
							Field::make( 'time', 'yuna_work_time_week_stop', __('Stop of work on weekdays')  )
							     ->set_attribute( 'placeholder', '18:00 or 06:00 PM' )
							     ->set_storage_format( 'H:i' ),
							Field::make( 'time', 'yuna_work_time_saturday_start', __('Start work on saturday')  )
							     ->set_attribute( 'placeholder', '10:00 or 10:00 AM' )
							     ->set_storage_format( 'H:i' ),
							Field::make( 'time', 'yuna_work_time_saturday_stop', __('Stop work on saturday')  )
							     ->set_attribute( 'placeholder', '18:00 or 06:00 PM' )
							     ->set_storage_format( 'H:i' ),
							Field::make( 'time', 'yuna_work_time_sunday_start', __('Start work on sunday')  )
							     ->set_attribute( 'placeholder', '10:00 or 10:00 AM' )
							     ->set_storage_format( 'H:i' ),
							Field::make( 'time', 'yuna_work_time_sunday_stop', __('Stop work on sunday')  )
							     ->set_attribute( 'placeholder', '18:00 or 06:00 PM' )
							     ->set_storage_format( 'H:i' ),

						) )

						->add_tab( __( 'Site options' ), array(
							Field::make( 'image', 'yuna_site_header_logo', __('Site Header Logo') )
							     ->set_value_type( 'url' ),
							Field::make( 'image', 'yuna_site_footer_logo', __('Site Footer Logo') )
							     ->set_value_type( 'url' ),
							Field::make( 'image', 'yuna_default_inner_page_main_pic', __('Background image in the header of internal pages by default') )
							     ->set_value_type( 'url' ),
							Field::make( 'color', 'yuna_accent_color', __( 'Accent color' ) )
									 ->set_help_text(__( 'Choose an accent color for elements that are not edited directly in Elementor' )),
							Field::make( 'color', 'yuna_header_bg_color', __( 'Header background color' ) )
							     ->set_help_text(__( 'Choose header background color' )),
							Field::make( 'color', 'yuna_footer_bg_color', __( 'Footer background color' ) )
							     ->set_help_text(__( 'Choose footer background color' )),
							Field::make( 'color', 'yuna_btn_go_top_bg_color', __( 'Button scroll top background color' ) )
							     ->set_help_text(__( 'Choose Button scroll top background color' )),

							Field::make( 'radio', 'yuna_tgm_question', __('Add Google Tag Manager?') )
							     ->set_options( array(
								     'yes' => __('Yes'),
								     'no' => __('No'),

							     ) ),

							Field::make( 'header_scripts', 'yuna_tag_manager_head', __( 'Head teg manager code' ) )
								->set_hook_name( 'wp_head' )
								->set_attribute( 'placeholder', '<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({"gtm.start":
new Date().getTime(),event:"gtm.js"});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!="dataLayer"?"&l="+l:"";j.async=true;j.src=
"https://www.googletagmanager.com/gtm.js?id="+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,"script","dataLayer","GTM-XXXXXXX");</script>' )
								->set_conditional_logic( array(
									'relation' => 'AND',
									array(
										'field' => 'yuna_tgm_question',
										'value' => 'yes',
										'compare' => '=',
									)
								) ),
							Field::make( 'header_scripts', 'yuna_tag_manager_body', __( 'Body teg manager code' ) )
							     ->set_hook_name( 'wp_body_open' )
							     ->set_attribute( 'placeholder', '<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-XXXXXXX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
' )
								->set_conditional_logic( array(
									'relation' => 'AND',
									array(
										'field' => 'yuna_tgm_question',
										'value' => 'yes',
										'compare' => '=',
									)
								) ),

							Field::make( 'radio', 'yuna_pixel_question', __('Add Facebook Pixel Code?') )
							     ->set_options( array(
								     'yes' => __('Yes'),
								     'no' => __('No'),

							     ) ),
							Field::make( 'header_scripts', 'yuna_fb_pixel', __( 'Facebook Pixel Code' ) )
							     ->set_hook_name( 'wp_head' )
							     ->set_attribute( 'placeholder', '<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version="2.0";
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,"script",
"https://connect.facebook.net/en_US/fbevents.js");
fbq("init", "{your-pixel-id-goes-here}");
fbq("track", "PageView");
</script>
<noscript>
  <img height="1" width="1" style="display:none" 
       src="https://www.facebook.com/tr?id={your-pixel-id-goes-here}&ev=PageView&noscript=1"/>
</noscript>' )
							     ->set_conditional_logic( array(
								     'relation' => 'AND',
								     array(
									     'field' => 'yuna_pixel_question',
									     'value' => 'yes',
									     'compare' => '=',
								     )
							     ) ),

							Field::make( 'radio', 'yuna_multi_language', __('Add Multi Language?') )
									 ->set_help_text( __('Activate the "Polylang" plugin for the option to work correctly') )
							     ->set_options( array(
								     'yes' => __('Yes'),
								     'no' => __('No'),

							     ) ),
						) )

						->add_tab( __( 'Contact form options' ), array(
							Field::make( 'radio', 'yuna_form_input_name', __('Add field "Name"?') )
							     ->set_options( array(
								     'no' => __('No'),
								     'yes' => __('Yes'),

							     ) ),

							Field::make( 'radio', 'yuna_form_input_email', __('Add field "Email"?') )
							     ->set_options( array(
								     'no' => __('No'),
								     'yes' => __('Yes'),
							     ) ),

							Field::make( 'radio', 'yuna_form_input_phone', __('Add field "Phone"?') )
							     ->set_options( array(
								     'no' => __('No'),
								     'yes' => __('Yes'),
							     ) ),

							Field::make( 'radio', 'yuna_form_phone_mask', __('Add phone mask?') )
							     ->set_options( array(
								     'no' => __('No'),
								     'yes' => __('Yes'),

							     ) )
							     ->set_conditional_logic( array(
							     	'relation' => 'AND',
								     array(
								     	'field' => 'yuna_form_input_phone',
								      'value' => 'yes',
								      'compare' => '=',
								     )
							     ) ),

							Field::make( 'radio', 'yuna_form_phone_mask_type', __('What type of phone mask do you need?') )
							     ->set_options( array(
								     'ipmask' => __('International with auto-substitution by IP'),
								     'custom' => __('Custom according to the specified template'),

							     ) )
									->set_conditional_logic( array(
										'relation' => 'AND',
										array(
											'field' => 'yuna_form_phone_mask',
											'value' => 'yes',
											'compare' => '=',
										)
									) ),

							Field::make( 'text', 'yuna_form_phone_custom_mask', __( 'Phone custom mask' ) )
							     ->set_attribute( 'placeholder', '+1(999)999-9999' )
							     ->set_conditional_logic( array(
								     'relation' => 'AND',
								     array(
									     'field' => 'yuna_form_phone_mask_type',
									     'value' => 'custom',
									     'compare' => '=',
								     )
							     ) ),

							Field::make( 'radio', 'yuna_form_input_message', __('Add field "Message"?') )
							     ->set_options( array(
								     'no' => __('No'),
								     'yes' => __('Yes'),
							     ) ),


							Field::make( 'radio', 'yuna_form_integration_gmail', __('Send mail to your gmail address?') )
							     ->set_options( array(
								     'no' => __('No'),
								     'yes' => __('Yes'),

							     ) ),

							Field::make( 'text', 'yuna_you_gmail_address', __( 'Your gmail address' ) )
							     ->set_attribute( 'type', 'email' )
							     ->set_attribute( 'placeholder', 'you@gmail.com' )
							     ->set_conditional_logic( array(
							     	'relation' => 'AND',
								     array(
								     	'field' => 'yuna_form_integration_gmail',
								      'value' => 'yes',
								      'compare' => '=',
								     )
							     ) ),

							Field::make( 'radio', 'yuna_form_integration_domen_mail', __('Send mail to your domain mail?') )
							     ->set_options( array(
								     'no' => __('No'),
								     'yes' => __('Yes'),
							     ) ),

							Field::make( 'text', 'yuna_you_domen_mail_address', __( 'Your domen mail address' ) )
							     ->set_attribute( 'type', 'email' )
							     ->set_attribute( 'placeholder', 'you@donem.com' )
							     ->set_conditional_logic( array(
								     'relation' => 'AND',
								     array(
									     'field' => 'yuna_form_integration_domen_mail',
									     'value' => 'yes',
									     'compare' => '=',
								     )
							     ) ),


							Field::make( 'text', 'yuna_you_domen_mail_login', __( 'Your domen mail login' ) )
							     ->set_attribute( 'placeholder', 'Login' )
							     ->set_conditional_logic( array(
								     'relation' => 'AND',
								     array(
									     'field' => 'yuna_form_integration_domen_mail',
									     'value' => 'yes',
									     'compare' => '=',
								     )
							     ) ),

							Field::make( 'text', 'yuna_you_domen_mail_password', __( 'Your domen mail password' ) )
							     ->set_attribute( 'placeholder', 'Password' )
							     ->set_conditional_logic( array(
								     'relation' => 'AND',
								     array(
									     'field' => 'yuna_form_integration_domen_mail',
									     'value' => 'yes',
									     'compare' => '=',
								     )
							     ) ),

							Field::make( 'text', 'yuna_you_domen_mail_port', __( 'Your domen mail SMTP port' ) )
							     ->set_attribute( 'placeholder', '255' )
							     ->set_conditional_logic( array(
								     'relation' => 'AND',
								     array(
									     'field' => 'yuna_form_integration_domen_mail',
									     'value' => 'yes',
									     'compare' => '=',
								     )
							     ) ),
							Field::make( 'text', 'yuna_you_domen_host', __( 'Your domen SMTP host name' ) )
							     ->set_attribute( 'placeholder', 'mail.adm.tools' )
							     ->set_conditional_logic( array(
								     'relation' => 'AND',
								     array(
									     'field' => 'yuna_form_integration_domen_mail',
									     'value' => 'yes',
									     'compare' => '=',
								     )
							     ) ),

							Field::make( 'radio', 'yuna_form_integration_telegram', __('Send messages in Telegram?') )
							     ->set_options( array(
								     'no' => __('No'),
								     'yes' => __('Yes'),

							     ) ),

							Field::make( 'text', 'yuna_telegram_bot_api_key', __( 'Your telegram bot API key' ) )
							     ->set_attribute( 'placeholder', 'Bot API key' )
							     ->set_conditional_logic( array(
								     'relation' => 'AND',
								     array(
									     'field' => 'yuna_form_integration_telegram',
									     'value' => 'yes',
									     'compare' => '=',
								     )
							     ) ),

							Field::make( 'text', 'yuna_telegram_chat_id', __( 'Your chat ID to which your bot is added' ) )
							     ->set_attribute( 'placeholder', 'Chat ID' )
							     ->set_conditional_logic( array(
								     'relation' => 'AND',
								     array(
									     'field' => 'yuna_form_integration_telegram',
									     'value' => 'yes',
									     'compare' => '=',
								     )
							     ) ),

							Field::make( 'text', 'yuna_form_input_error_text'.carbon_lang_prefix(), __( 'Error text when filling out a field in the form' ) )
							     ->set_attribute( 'placeholder', 'This field is required' ),

							Field::make( 'text', 'yuna_form_subject'.carbon_lang_prefix(), __( 'Site letter subject' ) )
							     ->set_attribute( 'placeholder', 'Application from the site' ),

							Field::make( 'rich_text', 'yuna_thx_popup_text'.carbon_lang_prefix(), __( 'Thank you text for the submitted form in a pop-up window' ) )
							     ->set_attribute( 'placeholder', 'The form has been sent successfully. We will contact you shortly' ),

						) );

	}

	add_action( 'carbon_fields_register_fields', 'yuna_carbon_services_post_meta' );

	function yuna_carbon_services_post_meta(){
		Container::make( 'post_meta', __( 'Services fields' ) )
		         ->where( 'post_type', '=', 'yuna_services' )
		         ->add_fields( array(
			         Field::make( 'text', 'yuna_service_more_btn_text', __( 'More button text' ) )
			              ->set_attribute( 'placeholder', __('Read more')),
			         Field::make( 'textarea', 'yuna_service_description', __( 'Short description' ) )
			              ->set_attribute( 'placeholder', __('Short description')),
		         ) );
	}

	add_action( 'carbon_fields_register_fields', 'yuna_carbon_team_post_meta' );

	function yuna_carbon_team_post_meta(){
		Container::make( 'post_meta', __( 'Team fields' ) )
		         ->where( 'post_type', '=', 'yuna_team' )
		         ->add_fields( array(

			         Field::make( 'textarea', 'yuna_team_men_position', __( 'Team men position' ) )
			              ->set_attribute( 'placeholder', __('Team men position')),
		         ) );
	}

	add_action( 'carbon_fields_register_fields', 'yuna_carbon_cases_post_meta' );

	function yuna_carbon_cases_post_meta(){
		Container::make( 'post_meta', __( 'Case fields' ) )
		         ->where( 'post_type', '=', 'yuna_cases' )
		         ->add_fields( array(

			         Field::make( 'textarea', 'yuna_case_short_description', __( 'Preview short description' ) )
			              ->set_attribute( 'placeholder', __('Description')),
		         ) );
	}

	add_action( 'carbon_fields_register_fields', 'yuna_carbon_reviews_post_meta' );

	function yuna_carbon_reviews_post_meta(){
		Container::make( 'post_meta', __( 'Reviews fields' ) )
		         ->where( 'post_type', '=', 'yuna_reviews' )
		         ->add_fields( array(

			         Field::make( 'textarea', 'yuna_reviews_car_name', __( 'Car name' ) )
			              ->set_attribute( 'placeholder', __('Audi A4 B6')),
		         ) );
	}