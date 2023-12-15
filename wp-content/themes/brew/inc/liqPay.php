<?php

	require_once get_template_directory() . '/inc/LiqPay.php';

	$ch = 'https://www.liqpay.ua/uk/checkout/card/i65684918187';

	define('LIQPAY_PUBLIC_KEY', 'sandbox_i49255680107');//i86136820175
	define('LIQPAY_PRIVATE_KEY', 'sandbox_uTpzB6HZ1HTexQCmM1gTIkJs1mTY9iLrDhbiM46l');//R63odwxDs93cZg0EB0wMsyz0QQ95RgpMdwGcem1R

	function liqpay_form($params) {

		$liqpay = new LiqPay(LIQPAY_PUBLIC_KEY, LIQPAY_PRIVATE_KEY);

		/*$params['sandbox'] = 1;*/
		$params['version'] = '3';
		$params['action'] = 'pay';
		$params['type'] = 'buy';
		$params['language'] = 'ru';
		$params['server_url'] = 'https://' . $_SERVER['HTTP_HOST'] . '/send2.php';
		$params['result_url'] = 'https://' . $_SERVER['HTTP_HOST'] . '/pay-thx.php';

		$out = $liqpay->cnb_form($params);

		return $out;
	}

	function liqpay_catch($data, $signature) {

		$sign = base64_encode( sha1(
			LIQPAY_PRIVATE_KEY .
			$data .
			LIQPAY_PRIVATE_KEY
			, 1
		));

		if ($signature == $sign) {
			return @json_decode(base64_decode($data), true);
		} else {
			return false;
		}
	}