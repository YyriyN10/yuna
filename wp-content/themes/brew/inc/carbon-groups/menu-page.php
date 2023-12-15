<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action('carbon_fields_register_fields', 'brew_menu_page_fields');

	function brew_menu_page_fields(){
		Container::make( 'post_meta', __('About us') )
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'page' );
			         $homeFields->where( 'post_template', '=', 'template-menu.php' );
		         } )

		         ->add_fields( array(

			         Field::make( 'text', 'brew_menu_block_about_title'.brew_lang_prefix(), __( 'Block title' )  ),

			         Field::make( 'rich_text', 'brew_menu_block_about_text'.brew_lang_prefix(), __( 'Text content' )  ),

			         Field::make( 'image', 'brew_menu_block_about_image'.brew_lang_prefix(), __( 'Block image' ) )
			              ->set_value_type( 'url' ),

		         ));
	}