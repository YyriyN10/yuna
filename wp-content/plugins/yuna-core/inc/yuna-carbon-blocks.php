<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'yuna_carbon_gutenberg' );

	function yuna_carbon_gutenberg(){
		Block::make( __( 'Yuna custom guttenberg block' ) )
		     ->add_fields( array(
			     Field::make( 'text', 'heading', __( 'Block Heading' ) ),
			     Field::make( 'image', 'image', __( 'Block Image' ) ),
			     Field::make( 'rich_text', 'content', __( 'Block Content' ) ),
		     ) )
         ->set_category( 'custom-category', __( 'Custom Category' ), 'smiley' )
         ->set_inner_blocks( true )
		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>

           <div class="block">
             <div class="block__heading">
               <h1><?php echo esc_html( $fields['heading'] ); ?></h1>
             </div>

             <div class="block__image">
					     <?php echo wp_get_attachment_image( $fields['image'], 'full' ); ?>
             </div>

             <div class="block__content">
					     <?php echo apply_filters( 'the_content', $fields['content'] ); ?>
             </div>
           </div>

			     <?php
		     } );
  }

