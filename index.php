<?php

	require_once 'authentication.php';

	session_start();

	if (isset($_POST['logout'])) {
		if ($_POST['logout'] == true) {
			$_SESSION['auth'] = false;
		}
	}

	if ($_SESSION['auth'] == true || (!empty($_POST['password']) && $_POST['password'] == PASSWORD)) {
	    $_SESSION['auth'] = true;
	
		$html = '
			<form id="logoutForm" method="post">
				<input type="hidden" name="logout" value="true" />
				<button id="logout">Logout</button>
			</form>
			<div id="container">
				<div class="intro">
					Thanks for taking your first interview with Adyen. <br/>
					For the next stage, we\'d love for you to complete the below tech challenges. If you could complete this within the next 10 days, it would be much appreciated! <br/>
					Based on your submission, we’ll then schedule the next round of interviews! <br/>
					There will be two parts to this technical test...<br/>
					<div class="challenge" id="chal1">
						<div class="header">Challenge 1: The Adyen (not so) Tech Test </div><br/>

						Please follow the link below to access a quick quiz and fill out your answers. This should not take any longer than 10 minutes, but please take as much time as you need.<br/><br/>

						<a href="https://www.surveymonkey.com/r/87YYFFZ">https://www.surveymonkey.com/r/87YYFFZ</a> <br/><br/>
					</div>
					<div class="challenge" id="chal2">
						<div class="header">Challenge 2: Integrate to Adyen\'s Platform</div>
						<div class="intro">
							One of the integration options with Adyen is to integrate with our Checkout API (backend) & DropIn Components (frontend). Using the programming language of your choice integrate the following (including backend server - you can use your own web hosting or this free web hosting online <a href="https://www.000webhost.com/">https://www.000webhost.com/</a>):<br/><br/>

							You can refer to the following documentations on how to do a payment integration: <a href="https://docs.adyen.com/checkout/drop-in-web">https://docs.adyen.com/checkout/drop-in-web</a><br/><br/>

							<b>Backend</b><br/><br/>

							You would also be able to try the responses with our API explorer just to get familiarize with the formats of the Checkout API - <a href="https://docs.adyen.com/api-explorer/#/PaymentSetupAndVerificationService/v49/payments">https://docs.adyen.com/api-explorer/#/PaymentSetupAndVerificationService/v49/payments</a>. You can scroll through all the API calls for /paymentMethods, /payments and /payment/details to understand request parameters required for each request/response. The interaction of these APIs with frontend is demonstrated by the flow chart that is in the checkout manual above. You can also make use the various libraries that we have available in our GitHub sample codes <a href="https://github.com/Adyen/adyen-python-api-library">https://github.com/Adyen/adyen-python-api-library</a><br/><br/>

							<b>Frontend</b><br/><br/>

							With the Dropin solution handing the front end, you would be able display the required fields for each payment method without needing to know the actual flow of each payment method. You can refer to the sample front end JS code that we have, referring to the “Dropin” portion of the js (<a href="https://github.com/Adyen/adyen-components-js-sample-code">https://github.com/Adyen/adyen-components-js-sample-code</a>)<br/><br/>

							(Couple of hints: the .env.default file needs to be saved in the systems format)<br/><br/>

							<b>3D 2 Secure Flow</b><br/><br/>

							In payments, we struggle to maintain the balance between Fraud and Auth Rate. As much as we want to get all the transactions through seamlessly, we do not want to let the fraudsters into our radar. As such we balance this by introducing the new standard for 3D secure from the card schemes. You can refer to more information here - <a href="https://docs.adyen.com/checkout/3d-secure">https://docs.adyen.com/checkout/3d-secure<a/><br/><br/>

							To help you with creating the 3D2, you can refer to the web (or mobile should you wish) payment - <a href="https://docs.adyen.com/checkout/3d-secure/native-3ds2/api-integration#submit-a-payment-request">https://docs.adyen.com/checkout/3d-secure/native-3ds2/api-integration#submit-a-payment-request</a>, if you are using drop-in, you would need to handle onAdditionalDetails (<a href="https://docs.adyen.com/checkout/drop-in-web#step-4-additional-front-end">https://docs.adyen.com/checkout/drop-in-web#step-4-additional-front-end</a>)<br/><br/>

							Once you have completed the integration, please send me the link to the page you have created. Please be prepared to walk myself through it (including any challenges you had) during your next interview. Additionally, Please share the following:<br/>
							* Example requests / responses from your integration for all API call\'s<br/>
							* 2 PSP references (unique payment reference) for two example payments - one using Visa/Mastercard with 3DS2, and one alternative local payment of your choice (Bank transfer / Vouchers / etc)<br/><br/>

							You can find a list of test credit card numbers / credentials here for testing purposes: <a href="https://docs.adyen.com/developers/test-cards/test-card-numbers">https://docs.adyen.com/developers/test-cards/test-card-numbers</a>, in specific you should be looking for 3D Secure 2 Test cards<br/><br/>

							(Some hints: You should be able to see alternative payment methods if you use the following combination of currency and country code: { "countryCode":"DE", "amount":{ "currency":"EUR", "value":1000 } }) in the paymentMethods request if you want to try this out.
						<div id="caReg">
							<div class="instructions">
								The first step is to create a user for the Adyen Dashboard. This is where you can access our portal in to the platform, and see your payments coming in once you\'ve completed the first part of the integration and can help diagnose any problems you may be facing during your integration.
							</div>
							<form id="reqUser">
								<input type="text" name="firstname" />
								<input type="text" name="lastname" />
								<input type="email" name="email" />
								<input type="hidden" name="timezone" id="timezone" value="">
								<input type="submit" />
							</form>
						</div>

						<!-- replacement caUser registration div -->
						<div id="userCreated" style="display: none;">
							
						</div>
					</div>
				</div>
			</div>';
	} else {
		$_SESSION['auth'] = false;

		$html = '<!-- The Modal -->
				<div id="id01" class="modal">
				  <!-- Modal Content -->
				  <form class="modal-content animate" method="post">
				    <div class="container">

				      <label for="psw"><b>Password</b></label>
				      <input type="password" placeholder="Enter Password" name="password" required>

				      <button id="submitLogin" type="submit">Connect</button>
				    </div>
				  </form>
				</div>
				<script>
					var modal = document.getElementById(\'id01\');
					modal.style.display = "block";
				</script>';
	}

?>

<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  		<script src="addons/jstimezonedetect/dist/jstz.min.js"></script>
	</head>
	<body>
		<div id="main">
			<?php echo $html; ?>
		</div>
		<script>
			
			$(function() {

				if ('#timezone') {
					var tz = jstz.determine();
				    $('#timezone').val(tz.name());
				}

				$('#reqUser').submit(function(e){
					e.preventDefault();
				    $.post(
				    	'caUser.php', 
				    	$(this).serialize(),
				    	function(data,status){
					    	if (status == "success") {
					    		$('#reqUser').remove();
					    		$('#caReg .instructions').html(
					    			'Thanks for submitting the form, you will now receive an email with an invite to create a password, giving you access to the Adyen Dashboard. <br/><br/>Best of luck!'
					    			);
					    	} else {
					    		alert("Error... please contact your Adyen interviewer or paul@adyen.com");	
					    	}
					    	
					    }
				    );
				});
		    });

			
		</script>
	</body>
</html>