<?php

	// ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);
	// error_reporting(E_ALL);

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
				"x-api-key: AQE1hmfxKYLNYhVCw0m/n3Q5qf3Ve55dHZxYTFdTxWq+l3JOk8J4BGGAsaK1Bbth5MDZdcIf73UQwV1bDb7kfNy1WIxIIkxgBw==-U8Vb1wx2fIYweMnC4sDMdBBh2Tw1mMaTMJzhGOc3nRk=-ISKY5HrhUxR7Y4Vz"
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

		$email = "paul.barns@adyen.com";
		$firstname = "Paul";
		$lastname = "Barns";
	} else {
		$email = $_POST['email'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];

		if (isset($_POST['timezone'])) {
			$timezone = $_POST['timezone'];
		} else {
			$timezone = "Asia/Singapore";
		}

		$data = array(
			'email' => $email,
			'merchantCodes' => array('MerchantAccount.SupportRecruitementCOM'),
			'name' => array('firstName' => $firstname, 'lastName' => $lastname),
			'roles' => array("Merchant_standard_role", "Merchant_technical_integrator", "Merchant_manage_payments"),
			'timeZoneCode' => $timezone,
			'userName' => strtolower($firstname . "." . $lastname)
		);

		$json = json_encode($data);

		$inviteWebUser = doCurl($prefix . "inviteWebUser", $json);
	}






	// GET LIST OF ALL USERS
	/*$data = "{}";
	$allUsers = doCurl($prefix . "getWebUserNames", $data);

	$userNames = $allUsers['userNames'];

	$json = json_encode(array("userName"=>$userNames[0]));

	// GET DETAILS OF EACH USER -> Too resource intensive
	foreach ($userNames as $user) {
		$json = json_encode(array("userName"=>$user));
		$userDetails = doCurl($prefix . "getWebUser", $json);
		echo $userDetails['email'];
	}*/
