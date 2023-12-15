<?php

	require get_template_directory() . '/vendor/autoload.php';

	use LisDev\Delivery\NovaPoshtaApi2;


	add_action('wp_ajax_delivery_region', 'delivery_region_callback');
	add_action('wp_ajax_nopriv_delivery_region', 'delivery_region_callback');

	function delivery_region_callback(){

		$deliveryApiKey = '9eb2e53deb1466cc1d962c6489b7e8d9';

		$np = new NovaPoshtaApi2($deliveryApiKey);

		$regionList = $np
			->model('Address')
			->method('getSettlementAreas')
			->params(array(
				'Ref' => '',

			))
			->execute();

		echo '<option>Region</option>';

		foreach ($regionList['data'] as $region ){
			echo '<option value="'.$region['Ref'].'">'.$region['Description'].'</option>';
		}

//		foreach ($regionList['data'] as $region ){
//			echo '<li data-region-ref="'.$region['Ref'].'" class="item">'.$region['Description'].' '.$region['RegionType'].'</li>';
//		}

		wp_die();

	}

	add_action('wp_ajax_delivery_area_list', 'delivery_area_list_callback');
	add_action('wp_ajax_nopriv_delivery_area_list', 'delivery_area_list_callback');

	function delivery_area_list_callback(){

		$deliveryApiKey = '9eb2e53deb1466cc1d962c6489b7e8d9';

		$refRegion = $_POST['refRegion'];

		$np = new NovaPoshtaApi2($deliveryApiKey);

		$areaCityList = $np
			->model('Address')
			->method('getSettlementCountryRegion')
			->params(array(
				'AreaRef' => $refRegion,
			))
			->execute();

		foreach ($areaCityList['data'] as $area ){
			echo '<option value="'.$area['Ref'].','.$area['AreasCenter'].'">'.$area['Description'].' '.$area['RegionType'].'</option>';
		}

		wp_die();

	}


	add_action('wp_ajax_delivery_city_list', 'delivery_city_list_callback');
	add_action('wp_ajax_nopriv_delivery_city_list', 'delivery_city_list_callback');

	function delivery_city_list_callback(){

		$deliveryApiKey = '9eb2e53deb1466cc1d962c6489b7e8d9';
		$area = $_POST['area'];
		$regionCenter = $_POST['regionCenter'];

		$np = new NovaPoshtaApi2($deliveryApiKey);

		$regionCenterRef = $np
			->model('Address')
			->method('getSettlements')
			->params(array(
				'Ref' => $regionCenter

			))
			->execute();

		$cityList = $np
			->model('AddressGeneral')
			->method('getSettlements')
			->params(array(
				'RegionRef' => $area,
				'Ref' => ''
			))
			->execute();

		if ($regionCenterRef['data'][0]['Ref'] === $regionCenter ){
			echo '<option value="'.$regionCenterRef['data'][0]['Ref'].'">'.$regionCenterRef['data'][0]['Description'].' '.$regionCenterRef['data'][0]['SettlementTypeDescription'].'</option>';
		}

		foreach ($cityList['data'] as $city ){
			echo '<option value="'.$city['Ref'].'">'.$city['Description'].' '.$city['SettlementTypeDescription'].'</option>';
		}

		wp_die();

	}

	add_action('wp_ajax_delivery_address_list', 'delivery_address_list_callback');
	add_action('wp_ajax_nopriv_delivery_address_list', 'delivery_address_list_callback');

	function delivery_address_list_callback(){

		$deliveryApiKey = '9eb2e53deb1466cc1d962c6489b7e8d9';

		$refCity = $_POST['refCity'];

		$np = new NovaPoshtaApi2($deliveryApiKey);

		$addressList = $np
			->model('Address')
			->method('getWarehouses')
			->params(array(
				'SettlementRef' => $refCity,
			))
			->execute();

		/*echo $refCity;

		var_dump($addressList);*/

		foreach ($addressList['data'] as $address ){
			echo '<option value="'.$address['Ref'].'">Department№ '.$address['Number'].' '.$address['ShortAddress'].'</option>';
		}


		wp_die();

	}


