<?php

	add_action('wp_ajax_yuna_form_integration', 'yuna_form_integration_callback');
	add_action('wp_ajax_nopriv_yuna_form_integration', 'yuna_form_integration_callback');

	use Telegram\Bot\Api;
	use PHPMailer\PHPMailer\PHPMailer;

	function yuna_form_integration_callback(){

		require_once( 'vendor/autoload.php' );

		function clearData($data) {
			return addslashes(strip_tags(trim($data)));
		}

		$name = clearData($_POST['name']);
		$phone = clearData($_POST['phone']);
		$email = clearData($_POST['email']);
		$messageUser = clearData($_POST['massage']);

		$utmSource = clearData($_POST['utm_source']);
		$utmMedium = clearData($_POST['utm_medium']);
		$utmCampaign = clearData($_POST['utm_campaign']);
		$utmTerm = clearData($_POST['utm_term']);
		$utmContent = clearData($_POST['utm_content']);

		$tgBotApiKey = carbon_get_theme_option('yuna_telegram_bot_api_key');
		$tgChatId = carbon_get_theme_option('yuna_telegram_chat_id');
		$gmailAddress = carbon_get_theme_option('yuna_you_gmail_address');
		$domainMailAddress = carbon_get_theme_option('yuna_you_domen_mail_address');
		$domainMailLogin = carbon_get_theme_option('yuna_you_domen_mail_login');
		$domainMailPassword = carbon_get_theme_option('yuna_you_domen_mail_password');
		$domainMailPort = carbon_get_theme_option('yuna_you_domen_mail_port');
		$domainMailHost = carbon_get_theme_option('yuna_you_domen_host');
		$mailSubject = carbon_get_theme_option('yuna_form_subject'.carbon_lang_prefix());

		/**
		 * Send Mail to Google
		 */

		if ( $gmailAddress != ''){

			$to = $gmailAddress;
			$headers = 'From: My Name <myname@mydomain.com>';
			$subject = $mailSubject;
			$message = "Name: $name \n E-mail: $email \n Phone: $phone \n Massage: $messageUser \n \n \n Analytics \n UTM source: $utmSource \n UTM medium: $utmMedium \n UTM campaign: $utmCampaign \n UTM term: $utmTerm \n UTM content: $utmContent \n";

			/*$send = mail ($to, $subject, $message);*/

			$sent_message = wp_mail( $to, $subject, $message, $headers);

			if ( $send ) {
				echo 'success';
			} else {
				echo 'error';
			}
		}

		/**
		 * Send message to telegram
		 */

		if ( $tgBotApiKey != '' && $tgChatId !='' ){

			$telegram = new Api( $tgBotApiKey);

			$response = $telegram->sendMessage([
				'chat_id' => $tgChatId,
				'text'    => $mailSubject."\r\n"."\r\n".'Name: '.$name."\r\n".'Phone: '.$phone."\r\n".'E-mail: '.$email."\r\n".'Message: '.$messageUser."\r\n".'Analytics'."\r\n"."\r\n".'utmSource: '.$utmSource."\r\n".'utmMedium: '.$utmMedium."\r\n".'utmCampaign: '.$utmCampaign."\r\n".'utmTerm: '. $utmTerm."\r\n".'utmContent: '.$utmContent.''
			]);

		}

		/**
		 * Send mail to SMTP
		 */

		if ( $domainMailAddress && $domainMailHost && $domainMailPort && $domainMailPassword && $domainMailLogin ){

			$mail = new PHPMailer(true);

			try {

				$mail->isSMTP();
				$mail->Host = $domainMailHost;
				$mail->SMTPAuth = true;
				$mail->Username = $domainMailLogin;
				$mail->Password = $domainMailPassword;
				$mail->SMTPSecure = 'tls';
				$mail->Port = $domainMailPort;
				$mail->CharSet = 'UTF-8';

				$mail->setFrom($email, 'info');
				$mail->addAddress($domainMailAddress, 'info');

				$mail->isHTML(true);
				$mail->Subject = $mailSubject;
				$mail->Body = "<p>Name: $name</p><p>Phone: $phone</p><p>E-mail: $email</p><p>Massage: $messageUser</p><p>utmSource: $utmSource</p><p>utmMedium: $utmMedium</p><p>utmCampaign: $utmCampaign</p><p>utmTerm: $utmTerm</p><p>utmContent: $utmContent</p>";

				$mail->send();

			} catch (Exception $e) {
				echo 'Message could not be sent.';

				echo 'Mailer Error: ' . $mail->ErrorInfo;
			}
		}

		wp_die();

	}
