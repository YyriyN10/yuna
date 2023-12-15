<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action('carbon_fields_register_fields', 'brew_terms_fields');

	function brew_terms_fields(){
		Container::make( 'term_meta', __( 'Book Category Data' ) )
						->where( function( $homeFields ) {
							$homeFields->where( 'term_taxonomy', '=', 'faq-cat-tax' );
						} )
		         ->add_fields( array(
			         Field::make( 'image', 'faq_term_pic'.brew_lang_prefix(), __( 'Term pic' ) )
			              ->set_value_type( 'url' ),
		         ) );



	}
