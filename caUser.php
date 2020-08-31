<?php

	require_once '../auth/credentials.php';

	$prefix = "https://ca-test.adyen.com/ca/services/CAAccountService/";

	function camelCase($str, array $noStrip = [])
	{
        // non-alpha and non-numeric characters become spaces
        $str = preg_replace('/[^a-z0-9' . implode("", $noStrip) . ']+/i', ' ', $str);
        $str = trim($str);
        // uppercase the first character of each word
        $str = ucwords($str);
        $str = str_replace(" ", "", $str);
        $str = lcfirst($str);

        return $str;
	}

	function doCurl($url, $json) {
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POSTFIELDS => $json,
			CURLOPT_HTTPHEADER => array(
				"Content-Type: application/json",
				"Content-Length: " . strlen($json),
				"x-api-key: " . apikeyCAUserv2
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			return json_decode($response, true);
		}
	}

	if (!isset($_POST['email']) || !isset($_POST['firstname']) || !isset($_POST['lastname'])) {
		echo "Error not all entries filled in!<br/>";
		error_log("Error not all entries filled in!");
	} else {
		$email = $_POST['email'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];

		if (isset($_POST['timezone'])) {
			$timezone = $_POST['timezone'];
		} else {
			$timezone = "Asia/Singapore";
		}

		$username = strtolower($firstname . "." . $lastname);

		$data = array(
			'email' => $email,
			'merchantCodes' => array('MerchantAccount' . merchantAccountv2),
			'name' => array('firstName' => $firstname, 'lastName' => $lastname),
			'roles' => array("Merchant_standard_role", "Merchant_technical_integrator", "View_Payments"),
			'timeZoneCode' => $timezone,
			'userName' => $username
		);

		$json = json_encode($data);

		$inviteWebUser = doCurl($prefix . "inviteWebUser", $json);

		echo json_encode($data);
	}
