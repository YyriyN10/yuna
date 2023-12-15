<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action('carbon_fields_register_fields', 'brew_categories_fields');

	function brew_categories_fields(){

		Container::make( 'post_meta', __( 'Reviews' ) )

						->where( function( $homeFields ) {
							$homeFields->where( 'post_type', '=', 'brew_reviews' );
						} )

						->add_fields( array(

							Field::make( 'text', 'brew_reviews_position'.brew_lang_prefix(), __( 'Position' )  )

		        ) );

		Container::make( 'post_meta', __( 'Team men' ) )

		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'brew_team' );
		         } )

		         ->add_fields( array(

			         Field::make( 'text', 'brew_team_men_position'.brew_lang_prefix(), __( 'Position' )  ),

			         Field::make( 'text', 'brew_team_men_fb_link'.brew_lang_prefix(), __( 'Facebook link' )  )
				            ->set_attribute('type', 'url'),

			         Field::make( 'text', 'brew_team_men_in_link'.brew_lang_prefix(), __( 'Linkedin link' )  )
			              ->set_attribute('type', 'url'),

			         Field::make( 'text', 'brew_team_men_tweeter_link'.brew_lang_prefix(), __( 'Tweeter link' )  )
			              ->set_attribute('type', 'url'),

			         Field::make( 'text', 'brew_team_men_telegram_link'.brew_lang_prefix(), __( 'Telegram link' )  )
			              ->set_attribute('type', 'url'),

		         ) );

		Container::make( 'post_meta', __( 'Product menu' ) )

		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'coffee_menu' );
			         $homeFields->or_where( 'post_type', '=', 'pastries_menu' );
		         } )

		         ->add_fields( array(

			         Field::make( 'text', 'brew_product_price'.brew_lang_prefix(), __( 'Price' )  )

		         ) );
	}