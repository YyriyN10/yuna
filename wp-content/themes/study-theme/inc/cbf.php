<?php

	use Carbon_Fields\Container;
	use Carbon_Fields\Block;
	use Carbon_Fields\Field;


	add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );

	function crb_attach_theme_options() {
		Container::make( 'theme_options', 'Опції сайту')
			->set_icon( 'dashicons-palmtree' )
		         ->add_fields( array(
			         Field::make( 'text', 'crb_text', 'Text Field' ),
		         ) );
	}

	//Home Page Fields

	add_action( 'carbon_fields_register_fields', 'home_page_fields' );

	function home_page_fields() {

		Container::make( 'post_meta', 'Головний екран' )
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'page' );
			         $homeFields->where( 'post_template', '=', 'template-home.php' );
		         } )

             ->add_fields( array(
	             Field::make( 'text', 'main_title'.carbon_lang_prefix(), 'Основний заголовок'  ),
	             Field::make( 'text', 'main_question'.carbon_lang_prefix(), 'Питання'  ),
	             Field::make( 'textarea', 'main_text'.carbon_lang_prefix(), 'Текст'  )
	               ->set_rows( 4 ),
	             Field::make( 'text', 'counter_title'.carbon_lang_prefix(), 'Заголовок лічильника загиблих'  ),
	             Field::make( 'text', 'counter_text'.carbon_lang_prefix(), 'Текст лічильника загиблих'  ),
	             Field::make( 'text', 'counter_number'.carbon_lang_prefix(), 'Кількість загиблих'  ),
	             Field::make( 'complex', 'main_gallery'.carbon_lang_prefix(), 'Галірея зображень' )
	                  ->add_fields( array(
		                  Field::make( 'image', 'photo', 'Фотографія' )
			                  ->set_value_type( 'url' ),
	                  ) )
             ));

		Container::make( 'post_meta', 'Блок "Спонсори олімпіади"' )
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'page' );
			         $homeFields->where( 'post_id', '=', get_option( 'page_on_front' ) );
			         $homeFields->where( 'post_template', '=', 'template-home.php' );
		         } )

		         ->add_fields( array(
			         Field::make( 'text', 'sp_bl_title'.carbon_lang_prefix(), 'Заголовок блоку'  ),
			         Field::make( 'textarea', 'sp_text'.carbon_lang_prefix(), 'Текст блоку'  )
			              ->set_rows( 4 ),
		         ));

		Container::make( 'post_meta', 'Блок "Складом збірної"' )
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'page' );
			         $homeFields->where( 'post_id', '=', get_option( 'page_on_front' ) );
			         $homeFields->where( 'post_template', '=', 'template-home.php' );
		         } )

		         ->add_fields( array(
			         Field::make( 'text', 'syllable_bl_title'.carbon_lang_prefix(), 'Заголовок блоку із складом збірної'  ),

		         ));

		Container::make( 'post_meta', 'Блоок "Призив до виключення"' )
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'page' );
			         $homeFields->where( 'post_id', '=', get_option( 'page_on_front' ) );
			         $homeFields->where( 'post_template', '=', 'template-home.php' );
		         } )

		         ->add_fields( array(
			         Field::make( 'select', 'main_vis_option'.carbon_lang_prefix(), 'Показувати текст блоку?' )
			              ->add_options( array(
				              'yes' => 'Так',
				              'no' => 'Ні',
			              ) ),

			         Field::make( 'radio', 'crb_radio'.carbon_lang_prefix(), 'Радіо перемикач опцій вфідображення та виводу контенту в адмінці та на сайті' )
			              ->set_options( array(
				              'yes' => 'Показати',
				              'no' => 'Приховати',

			              ) ),

			         Field::make( 'text', 'call_bl_title'.carbon_lang_prefix(), 'Заголовок блоку'  )
				         ->set_conditional_logic( array(
					         'relation' => 'AND', // Optional, defaults to "AND"
					         array(
						         'field' => 'crb_radio'.carbon_lang_prefix(),
						         'value' => 'yes', // Optional, defaults to "". Should be an array if "IN" or "NOT IN" operators are used.
						         'compare' => '=', // Optional, defaults to "=". Available operators: =, <, >, <=, >=, IN, NOT IN
					         )
				         ) ),
			         Field::make( 'textarea', 'call_text'.carbon_lang_prefix(), 'Текст блоку'  )
			              ->set_rows( 4 )
					          ->set_conditional_logic( array(
						          'relation' => 'AND', // Optional, defaults to "AND"
						          array(
							          'field' => 'main_vis_option'.carbon_lang_prefix(),
							          'value' => 'yes', // Optional, defaults to "". Should be an array if "IN" or "NOT IN" operators are used.
							          'compare' => '=', // Optional, defaults to "=". Available operators: =, <, >, <=, >=, IN, NOT IN
						          )
					          ) ),

		         ));

		Container::make( 'post_meta', 'Спортсмен' )
		         ->where( function( $homeFields ) {
			         $homeFields->where( 'post_type', '=', 'team' );
		         } )

		         ->add_fields( array(
			         Field::make( 'textarea', 'team_sport_type'.carbon_lang_prefix(), 'Вид спорту та регалії'  )
			              ->set_rows( 4 ),
			         Field::make( 'text', 'team_rank'.carbon_lang_prefix(), 'Військове звання'  ),
			         Field::make( 'image', 'team_rank_pic'.carbon_lang_prefix(), 'Зображення погону' )
			              ->set_value_type( 'url' ),
		         ));

		//

		Container::make( 'term_meta', 'Какие-то настройки таксономии' )
						->add_fields( array(
							Field::make( 'textarea', 'team_sport_type'.carbon_lang_prefix(), 'Вид спорту та регалії'  )
							     ->set_rows( 4 ),
							Field::make( 'text', 'team_rank'.carbon_lang_prefix(), 'Військове звання'  ),
							Field::make( 'image', 'team_rank_pic'.carbon_lang_prefix(), 'Зображення погону' )
							     ->set_value_type( 'url' ),
						));

	}


