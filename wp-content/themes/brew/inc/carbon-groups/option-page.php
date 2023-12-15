<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'brew_theme_options' );
	function brew_theme_options() {
		Container::make( 'theme_options', __( 'Theme Options' ) )
						->add_tab( __( 'Address map' ), array(
							Field::make( 'text', 'brew_address', __( 'Address' )  ),
							Field::make( 'map', 'brew_map', __( 'Map' ) )

						) )
						->add_tab( __( 'Social' ), array(
							Field::make( 'text', 'brew_facebook_link', __( 'Facebook link' )  )
							     ->set_attribute('type', 'url'),
							Field::make( 'text', 'brew_instagram_link', __( 'Instagram link' )  )
							     ->set_attribute('type', 'url'),
							Field::make( 'text', 'brew_apple_link', __( 'Apple link' )  )
							     ->set_attribute('type', 'url'),
							Field::make( 'text', 'brew_google_link', __( 'Google link' )  )
							     ->set_attribute('type', 'url'),

						) )
						->add_tab( __( 'Contacts' ), array(
							Field::make( 'text', 'brew_phone', __( 'Phone' )  )
							     ->set_attribute('type', 'tel'),
							Field::make( 'text', 'brew_email', __( 'E-mail' )  )
							     ->set_attribute('type', 'email'),
							Field::make( 'text', 'brew_copy_name', __( 'Copyright company name' )  ),

						) );

	}
