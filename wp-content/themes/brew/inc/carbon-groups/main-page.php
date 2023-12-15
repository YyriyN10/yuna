<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action('carbon_fields_register_fields', 'brew_main_page_fields');

	function brew_main_page_fields(){
		Container::make( 'post_meta', __('Mein screen') )
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'page' );
			         $homeFields->where( 'post_template', '=', 'template-main.php' );
		         } )

		         ->add_fields( array(

			         Field::make( 'image', 'brew_main_screen_bg'.brew_lang_prefix(), __( 'Background image' ) )
			              ->set_value_type( 'url' ),

			         Field::make( 'text', 'brew_main_screen_about_link'.brew_lang_prefix(), __( 'Button "About" link' )  )
			              ->set_attribute('type', 'url'),

			         Field::make( 'text', 'brew_main_screen_order_link'.brew_lang_prefix(), __( 'Button "Order Now" link' )  )
			              ->set_attribute('type', 'url'),

		         ));

		Container::make( 'post_meta', __('Exclusive coffee') )
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'page' );
			         $homeFields->where( 'post_template', '=', 'template-main.php' );
		         } )

		         ->add_fields( array(

			         Field::make( 'text', 'brew_exclusive_block_title'.brew_lang_prefix(), __( 'Block title' )  ),

			         Field::make( 'text', 'brew_exclusive_left_text'.brew_lang_prefix(), __( 'Left text' )  ),

			         Field::make( 'text', 'brew_exclusive_right_text'.brew_lang_prefix(), __( 'Right text' )  ),

			         Field::make( 'complex', 'brew_exclusive_list'.brew_lang_prefix(), __( 'Products list' ) )

			              ->add_fields( array(
				              Field::make( 'text', 'name', __( 'Product name' ) ),
				              Field::make( 'text', 'description', __( 'Product description' ) ),
				              Field::make( 'text', 'price', __( 'Product price' ) ),
				              Field::make( 'image', 'photo', __( 'Product photo' ) )
				                   ->set_value_type( 'url' ),
			              ) ),

			         Field::make( 'text', 'brew_exclusive_menu_link'.brew_lang_prefix(), __( 'Button "Order Now" link' )  )
			              ->set_attribute('type', 'url'),

		         ));

		Container::make( 'post_meta', __('About us') )
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'page' );
			         $homeFields->where( 'post_template', '=', 'template-main.php' );
		         } )

		         ->add_fields( array(

			         Field::make( 'complex', 'brew_about_us_numbers'.brew_lang_prefix(), __( 'Our numbers' ) )

			              ->add_fields( array(
				              Field::make( 'text', 'number', __( 'Number' ) ),
				              Field::make( 'text', 'description', __( 'Description' ) ),

			              ) ),

			         Field::make( 'rich_text', 'brew_about_us_text'.brew_lang_prefix(), __( 'Text content' )  ),

			         Field::make( 'image', 'brew_about_us_pic'.brew_lang_prefix(), __( 'Block image' )  )
				            ->set_value_type( 'url' ),

		         ));

		Container::make( 'post_meta', __('Our client') )
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'page' );
			         $homeFields->where( 'post_template', '=', 'template-main.php' );
		         } )

		         ->add_fields( array(

			         Field::make( 'complex', 'brew_our_client_list'.brew_lang_prefix(), __( 'Our client list' ) )

			              ->add_fields( array(
				              Field::make( 'image', 'client', __( 'Client logo' )  )
				                   ->set_value_type( 'url' ),

			              ) ),

		         ));

		Container::make( 'post_meta', __('F.A.Q.') )
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'page' );
			         $homeFields->where( 'post_template', '=', 'template-main.php' );
		         } )

		         ->add_fields( array(

			         Field::make( 'text', 'brew_faq_block_title'.brew_lang_prefix(), __( 'Block title' )  ),

			         Field::make( 'text', 'brew_faq_left_text'.brew_lang_prefix(), __( 'Text' )  ),

			         Field::make( 'text', 'brew_faq_about_link'.brew_lang_prefix(), __( 'Button "About" link' )  )
			              ->set_attribute('type', 'url'),

			         Field::make( 'text', 'brew_faq_contact_link'.brew_lang_prefix(), __( 'Button "Contact" link' )  )
			              ->set_attribute('type', 'url'),


		         ));

		Container::make( 'post_meta', __('Contact form') )
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'page' );
			         $homeFields->where( 'post_template', '=', 'template-main.php' );
			         $homeFields->or_where( 'post_template', '=', 'template-contact.php' );
		         } )

		         ->add_fields( array(

			         Field::make( 'text', 'brew_contact_form_block_title'.brew_lang_prefix(), __( 'Block title' )  ),

			         Field::make( 'text', 'brew_contact_form_text'.brew_lang_prefix(), __( 'Text' )  ),


		         ));
	}