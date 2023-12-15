<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Don't access directly.
	};

	/**
	 * Add Option Page
	 */

	function yuna_db_update_option_page(){

		add_menu_page(
			__('Yuna DB Update Options', YUNA_TD ),
			__('Yuna DB Update Options', YUNA_TD ),
			'manage_options',
			'yuna-db-update-options',
			'yuna_db_update_options_template',
			'dashicons-hammer',
		);

	}

	function yuna_db_update_options_template(){
		require YUNA_DB_UPDATE_DIR . 'templates/yuna-db-options-page.php';
	}

	function yuna_db_update_options_fields(){

		//Settings name
		register_setting( 'yuna_db_update_main_option_group', 'yuna_db_update_url' );


		//Settings group
		add_settings_section( 'yuna_db_update_section_1', __('Main Options', YUNA_TD ), 'yuna_db_update_s1_content', 'yuna-db-update-options' );

		function yuna_db_update_s1_content(){
			echo '<p>'.__('Enter your data to get started', YUNA_TD ).'</p>';
		}

		//Settings field
		add_settings_field( 'yuna_db_update_url', __('Database update address', YUNA_TD ), 'yuna_db_update_url_field', 'yuna-db-update-options', 'yuna_db_update_section_1' );

		function yuna_db_update_url_field(){
			echo '<input name="yuna_db_update_url" id="yuna_db_update_url" type="url" value="'.get_option('yuna_db_update_url').'" class="regular-text code">';
		}
		//

	}


	/**
	 * Get server answer
	 */
	$requestArgs = array(// час очичування до 20 секунд
		'timeout'     => 20,
	);

	$targetUrl = get_option('yuna_db_update_url'); // Адреса запиту

	$response = wp_remote_get($targetUrl, $requestArgs); //Запит

	$responseCode = wp_remote_retrieve_response_code( $response ); // Отримуємо код відповіді

	function getResponseContent ( $response ){

		$responseBody = wp_remote_retrieve_body($response);

		$responseBody = json_decode( $responseBody, true);

		$productCount = count($responseBody['data']);

		$arrayCounter = 0;

		if ( $responseBody ){

			foreach ( $responseBody['data'] as $item ){

				$arrayCounter = $arrayCounter + 1;

				if ( $arrayCounter > 10 ){
					break;
				}

				$sku = $item['sku'];

				$inStock = $item['in_stock'];

				$product_id = wc_get_product_id_by_sku( $sku );

				if ( $product_id != null ) {


					if ( $inStock <= 0 ) {
						$inStock = 0;
					}

					$product = wc_get_product( $product_id );

					$product->set_manage_stock( true );
					$product->set_stock_quantity( $inStock );
					$product->save();

				}else{
					/*$postAttr = array(
						'post_title' => $item['name'],
						'post_type' => 'product',
						'post_status' => 'publish',
						'post_content' => $item['description'],
						'post_excerpt' => $item['description'],
					);

					$post_id = wp_insert_post( $postAttr );
					$product = wc_get_product( $post_id );
					$product->set_sku( $sku );
					$product->set_price( $item['price'] );
					$product->set_regular_price( $item['price'] );
					$product->save();*/
				}

				echo '<pre>';
				print_r($item);
				echo '</pre>';
			}
		}
	}

	if ( $responseCode >= 200 && $responseCode < 400 ){ //перевіряємо код відповіді

		//якщо код відповіді у межах миіж 200 та 400 робимо операції з даними

		getResponseContent($response);

	}else{
		echo 'error';

	}



//	echo $response;

	/*

	if ( !empty( $targetUrl ) ){

		$request = wp_remote_get($targetUrl);

		$request = $request['body'];

		$request = json_decode($request, true);



		if ( !empty( $request ) && $request['error'] === false ){

			foreach ( $request['data'] as $item ){


			}

		}


	}*/
