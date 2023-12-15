<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Block;
	use Carbon_Fields\Field;

	add_action( 'carbon_fields_register_fields', 'yuna_cgbc_about' );

	function yuna_cgbc_about(){

		Block::make( __( 'CGBC_about' ) )
		     ->add_fields( array(
			     Field::make( 'radio', 'about_cgbc_grid'.yuna_cgbc_lang_prefix(), __( 'Select block greed', WFM_STUDY_ONE ) )
			          ->add_options( array(
				          'container' => __( 'Fixed greed' ),
				          'container-fluid' => __( 'Fluid-greed' ),
			          ) ),

			     Field::make( 'text', 'heading'.yuna_cgbc_lang_prefix(), __( 'Block Heading' ) )
            ->set_attribute( 'data-color'),
			     Field::make( 'image', 'image'.yuna_cgbc_lang_prefix(), __( 'Block Image' ) ),
			     Field::make( 'rich_text', 'content'.yuna_cgbc_lang_prefix(), __( 'Block Content' ) ),

			     Field::make( 'complex', 'list'.yuna_cgbc_lang_prefix(), 'Перелік інфографіки' )
			          ->add_fields( array(
				          Field::make( 'text', 'infographics_item_text', 'Значення'  )
				               ->set_attribute('type', 'number')
				               ->set_attribute( 'placeholder', __( '5' ) ),
				          Field::make( 'text', 'infographics_item_symbol', 'Додатковий символ'  )
				               ->set_attribute( 'placeholder', __( '+' ) ),
				          Field::make( 'text', 'infographics_item_description', 'Опис'  )
				               ->set_attribute( 'placeholder', __( 'років досвіду' ) ),
			          ) ),
		     ) )


		     ->set_category( 'yuna-cgbc', __( 'Yuna CGBC', YUNA_CGBC_TD ), 'layout' )

		     ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
			     ?>
             <section class="about">
               <div class="<?php echo esc_attr($fields['about_cgbc_grid'.yuna_cgbc_lang_prefix()]);?>">
                 <div class="row">
                   <h2 class="block-title col-12"><?php echo esc_html( $fields['heading'.yuna_cgbc_lang_prefix()] ); ?></h2>
                 </div>
                 <div class="row">
                   <div class="image-wrapper col-lg-6">
	                   <?php echo wp_get_attachment_image( $fields['image'.yuna_cgbc_lang_prefix()], 'full' ); ?>
                   </div>
                   <div class="text-content col-lg-6">
	                   <?php echo apply_filters( 'the_content', $fields['content'.yuna_cgbc_lang_prefix()] ); ?>
                   </div>
                 </div>
                 <?php if( $fields['list'.yuna_cgbc_lang_prefix()] ):?>
                   <div class="row">
                     <?php foreach( $fields['list'.yuna_cgbc_lang_prefix()] as $item ):?>
                       <div class="item col-lg-4">
                         <p class="number"><?php echo $item['infographics_item_text'];?></p>
                         <p class="name"><?php echo $item['infographics_item_symbol'];?></p>
                         <p class="description"><?php echo $item['infographics_item_description'];?></p>
                       </div>
                     <?php endforeach;?>
                   </div>
                 <?php endif;?>

               </div>
             </section>

			     <?php
		     } );
	}


