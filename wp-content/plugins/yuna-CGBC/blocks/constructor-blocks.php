<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	use Carbon_Fields\Field;
	use Carbon_Fields\Container;

	add_action( 'carbon_fields_register_fields', 'yuna_cgbc_constructor' );

	function yuna_cgbc_constructor(){
		Container::make( 'post_meta', __('Конструктор сторінок', YUNA_CGBC_TD) )
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'page' );
			         $homeFields->where( 'post_template', '=', YUNA_CGBC_DIR . 'template-yuna-cgbc-full.php' );
		         } )
						->add_fields( array(

						Field::make( 'complex', 'yuna_cgbc_block_ch'.yuna_cgbc_lang_prefix(), __('Перелік блоків', YUNA_CGBC_TD) )
			            ->add_fields( array(
				          Field::make( 'select', 'yuna_cgbc_block_list'.yuna_cgbc_lang_prefix(), __('Оберіть який блок відображати', YUNA_CGBC_TD) )
				               ->set_options( array(
					               'block1' => __('Блок "Інформація про курс"'),
					               'block2' => __('Блок "Вчителі"'),
					               'block3' => __('Блок "Пробне заняття"'),
					               'block4' => __('Блок "Інфографіка"'),
					               'block5' => __('Блок "Теми курсу"'),
					               'block6' => __('Блок "Призов до дії"'),
					               'block7' => __('Блок "Відгуки"'),
					               'block8' => __('Блок "Контакти"'),
					               'block9' => __('Вимкнути'),

				               ) ),

				          Field::make( 'select', 'about_cgbc_grid'.yuna_cgbc_lang_prefix(), __( 'Оберіть тип обгортки блоку', YUNA_CGBC_TD  ) )
					             ->set_conditional_logic( array(
						             'relation' => 'AND',
						             array(
							             'field' => 'yuna_cgbc_block_list'.yuna_cgbc_lang_prefix(),
							             'value' => 'block1',
							             'compare' => '=',
						             )
					             ) )
				               ->add_options( array(
					               'container' => __( 'Обгортка з фіксованою ширеною', YUNA_CGBC_TD ),
					               'container-fluid' => __( 'Обгортка з гумовою ширеною на весь екран', YUNA_CGBC_TD  ),
				               ) ),

				            Field::make( 'select', 'about_cgbc_background_type'.yuna_cgbc_lang_prefix(), __( 'Оберіть тип фону блоку', YUNA_CGBC_TD ) )
				                 ->set_conditional_logic( array(
					                 'relation' => 'AND',
					                 array(
						                 'field' => 'yuna_cgbc_block_list'.yuna_cgbc_lang_prefix(),
						                 'value' => 'block1',
						                 'compare' => '=',
					                 )
				                 ) )
				                 ->add_options( array(
					                 'background-color' => __( 'Фоновий колір', YUNA_CGBC_TD ),
					                 'background-image' => __( 'Фонове зображення', YUNA_CGBC_TD ),
				                 ) ),

				            Field::make( 'color', 'about_cgbc_background_color'.yuna_cgbc_lang_prefix(), __( 'Оберіть фоновий колір', YUNA_CGBC_TD ) )
				                 ->set_conditional_logic( array(
					                 'relation' => 'AND',
					                 array(
						                 'field' => 'yuna_cgbc_block_list'.yuna_cgbc_lang_prefix(),
						                 'value' => 'block1',
						                 'compare' => '=',
					                 ),
					                 array(
						                 'field' => 'about_cgbc_background_type'.yuna_cgbc_lang_prefix(),
						                 'value' => 'background-color',
						                 'compare' => '=',
					                 )
				                 ) ),

				            Field::make( 'image', 'about_cgbc_background_image'.yuna_cgbc_lang_prefix(), __( 'Оберіть напівпрозорий колір поверх фонового зображення', YUNA_CGBC_TD ) )
				                 ->set_conditional_logic( array(
					                 'relation' => 'AND',
					                 array(
						                 'field' => 'yuna_cgbc_block_list'.yuna_cgbc_lang_prefix(),
						                 'value' => 'block1',
						                 'compare' => '=',
					                 ),
					                 array(
						                 'field' => 'about_cgbc_background_type'.yuna_cgbc_lang_prefix(),
						                 'value' => 'background-image',
						                 'compare' => '=',
					                 )
				                 ) )
					               ->set_value_type( 'url' ),

				            Field::make( 'color', 'about_cgbc_background_color_before_image'.yuna_cgbc_lang_prefix(), __( 'Оберіть напівпрозорий колір поверх фонового зображення', YUNA_CGBC_TD ) )
				                 ->set_conditional_logic( array(
					                 'relation' => 'AND',
					                 array(
						                 'field' => 'yuna_cgbc_block_list'.yuna_cgbc_lang_prefix(),
						                 'value' => 'block1',
						                 'compare' => '=',
					                 ),
					                 array(
						                 'field' => 'about_cgbc_background_type'.yuna_cgbc_lang_prefix(),
						                 'value' => 'background-image',
						                 'compare' => '=',
					                 )
				                 ) ),


				          Field::make( 'text', 'yuna_cgbc_block_1'.yuna_cgbc_lang_prefix(), 'Блок 1'  )

				               ->set_conditional_logic( array(
					               'relation' => 'AND',
					               array(
						               'field' => 'yuna_cgbc_block_list'.yuna_cgbc_lang_prefix(),
						               'value' => 'block1',
						               'compare' => '=',
					               )
				               ) ),

				            //

				            Field::make( 'text', 'yuna_cgbc_block_2'.yuna_cgbc_lang_prefix(), 'Блок 2'  )

				                 ->set_conditional_logic( array(
					                 'relation' => 'AND',
					                 array(
						                 'field' => 'yuna_cgbc_block_list'.yuna_cgbc_lang_prefix(),
						                 'value' => 'block2',
						                 'compare' => '=',
					                 )
				                 ) ),

				            //

				            Field::make( 'text', 'yuna_cgbc_block_3'.yuna_cgbc_lang_prefix(), 'Блок 3'  )

				                 ->set_conditional_logic( array(
					                 'relation' => 'AND',
					                 array(
						                 'field' => 'yuna_cgbc_block_list'.yuna_cgbc_lang_prefix(),
						                 'value' => 'block3',
						                 'compare' => '=',
					                 )
				                 ) ),

			     ) ),

		));
	}