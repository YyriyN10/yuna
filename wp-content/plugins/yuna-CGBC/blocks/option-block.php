<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Container;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'yuna_cgbc_options' );

	function yuna_cgbc_options() {
		Container::make( 'theme_options', __('CGBC Options'))
		         ->set_icon( 'dashicons-admin-generic' )
		         ->add_tab( __( 'Contacts' ), array(



		         ) )

		         ->add_tab( __( 'Site options' ), array(

		         ) )

		         ->add_tab( __( 'Contact form options' ), array(

		         ) );

	}
