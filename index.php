<?php

	require_once 'authentication.php';

	session_start();

	if (isset($_POST['logout'])) {
		if ($_POST['logout'] == true) {
			$_SESSION['auth'] = false;
		}
	}
	$countDetails = 0;

	if (isset($_GET['email'])) {
		$countDetails++;
	}
	if (isset($_GET['firstname'])) {
		$countDetails++;
	}
	if (isset($_GET['lastname'])) {
		$countDetails++;
	}

	if ($_SESSION['auth'] == true || (!empty($_POST['password']) && $_POST['password'] == PASSWORD)) {
	    $_SESSION['auth'] = true;

		$html = '
			<div class="container">
				<div class="intro">
					Thanks for taking your first interview with Adyen! <br/><br/>
					For the next stage, we\'d love for you to complete the below tech challenges. If you could complete this within the next 10 days, it would be much appreciated! <br/>
					Based on your submission, we’ll then schedule the next round of interviews! <br/><br/>
					There will be two parts to this technical test...<br/><br/>


					<div  class="card">
						<div class="card-body">
						<h5>Challenge 1: The Adyen (not so) Tech Test </h5><br/>

						Please follow the link below to access a quick quiz and fill out your answers. This should not take any longer than 10 minutes, but please take as much time as you need.<br/><br/>

						<a href="https://www.surveymonkey.com/r/87YYFFZ">https://www.surveymonkey.com/r/87YYFFZ</a> <br/><br/>


					<hr class="mb-4">


						<h5>Challenge 2: Integrate to Adyen\'s Platform</h5><br/>
						<div class="intro">
							One of the integration options with Adyen is to integrate with our Checkout API (back-end) & Drop-in Components (front-end). Using the programming language of your choice integrate the following (including back-end server):<br/><br/>

							<b>Frontend</b><br/><br/>

							With the Drop-in solution handing the front-end, you would be able display the required fields for each payment method without needing to know the actual flow of each payment method. You can refer to the sample front-end JS code that we have, referring to the “Drop-in” portion of the js (<a href="https://github.com/Adyen/adyen-components-js-sample-code">https://github.com/Adyen/adyen-components-js-sample-code</a>)

							<div class="sc-notice info"><div>
							<p>Hint: The .env.default file needs to be saved in the systems format.</p>
							</div></div>

							<b>Backend</b><br/><br/>

							Make the necessary API calls like <code>/paymentMethods</code>, <code>/payments</code> and <code>/payment/details</code> to Adyen from your back-end server to complete the payment. You would also be able to try the responses with our API explorer just to get familiarize with the formats of the Checkout API - <a href="https://docs.adyen.com/api-explorer/#/PaymentSetupAndVerificationService/v49/payments">https://docs.adyen.com/api-explorer/#/PaymentSetupAndVerificationService/v49/payments</a>. <br/><br/>

							<b>3D 2 Secure Flow</b><br/><br/>

							In payments, we struggle to maintain the balance between Fraud and Auth Rate. As much as we want to get all the transactions through seamlessly, we do not want to let the fraudsters into our radar. As such we balance this by introducing the new standard for 3D secure from the card schemes. You can refer to more information here - <a href="https://docs.adyen.com/checkout/3d-secure">https://docs.adyen.com/checkout/3d-secure<a/><br/><br/>

							To help you with creating the 3D2, you can refer to the web (or mobile should you wish) payment - <a href="https://docs.adyen.com/checkout/3d-secure/native-3ds2/api-integration#submit-a-payment-request">https://docs.adyen.com/checkout/3d-secure/native-3ds2/api-integration#submit-a-payment-request</a>, if you are using Drop-in, you would need to handle <code>onAdditionalDetails</code> (<a href="https://docs.adyen.com/checkout/drop-in-web#step-4-additional-front-end">https://docs.adyen.com/checkout/drop-in-web#step-4-additional-front-end</a>)<br/><br/>

							<hr class="mb-4">
								<div class="sc-notice info">
									Please feel free to run this locally on your machine using any of the following ports: <br />
									<ul>
										<li>3000</li>
										<li>5000</li>
										<li>8000</li>
										<li>8080</li>
									</ul>
									Using any of these ports will allow you to successfully connect to Adyen using the following clientKey:<br/>
									<pre><code>test_GWXWP766DVDVHP3NUESVCEBV5AKZCOGJ</code></pre>
								</div>
								During your next interview, we will ask you to walk us through your code and your demo implementation. Additionally, please share the following:<br/><br/>

							<ul>
  							<li>Example requests / responses from your integration for all API calls</li>
  							<li>2 PSP references (unique payment reference) for two example payments - one using Visa/Mastercard with 3DS2, and one alternative local payment of your choice (Bank transfer / Vouchers / etc)</li>
							</ul>


								<div class="sc-notice info"><div>
								<p>Hint: You should be able to see alternative payment methods if you use the following combination of currency and country code in the paymentMethods request:
									<pre><code>{ "countryCode":"DE", "amount":{ "currency":"EUR", "value":1000 } }</code></pre></p>
								</div></div>

								<div class="sc-notice info"><div>
								<p>Useful links:
								<ul>
									<li>Adyen Drop-in Integration: <a href="https://docs.adyen.com/checkout/drop-in-web">https://docs.adyen.com/checkout/drop-in-web</a></li>
									<li>Adyen Git Libraries: <a href="https://github.com/Adyen">https://github.com/Adyen</a></li>
									<li>Adyen Test Cards: <a href="https://docs.adyen.com/developers/test-cards/test-card-numbers">https://docs.adyen.com/developers/test-cards/test-card-numbers</a></li>
								</ul>
								</p>
								</div>
							</div>

						<hr class="mb-4">
						<div id="caReg">

							<div class="instructions">
								The first step is to create a user for the Adyen Dashboard. This is where you can access our portal in to the platform, and see your payments coming in once you\'ve completed the first part of the integration and can help diagnose any problems you may be facing during your integration.
							</div>
							<form id="reqUser">
								<br/>
								<div class="instructions" ';
						if ($countDetails == 0) {
							$html .= '>
									Please fill out the following details ';
						}
						if ($countDetails > 0 && $countDetails < 3) {
							$html .= '
								id="contactPassed">
									Please check the following details below and complete the additional required fields ';
						} elseif ($countDetails == 3) {
							$html .= '
								id="contactPassed">
									Please check the following details below ';
						}

						$html .= 'in order to be sent an invite link to the Adyen Dashboard before clicking submit:
								</div>
							<br/><div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" name="firstname" placeholder="" value="' . $_GET['firstname'] . '" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" name="lastname" placeholder="" value="' . $_GET['lastname'] . '" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" placeholder="you@example.com" value="' . $_GET['email'] . '" required>
            </div>
								<input type="hidden" name="timezone" id="timezone" value=""><br/>
								<button class="btn btn-success" type="submit">Create Account</button>
							</form>
						</div>
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

				      <button id="submitLogin" class="btn btn-success" type="submit">Connect</button>
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
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css">
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  	<script src="addons/jstimezonedetect/dist/jstz.min.js"></script>
	</head>
	<body>
		<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
			<h5 class="my-0 mr-md-auto font-weight-normal">Adyen Checkout Challenge</h5>

				<?php
				if($_SESSION['auth'] == true){
					?>
					<form id="logoutForm" style="margin-block-end: 0;" method="post">
						<input type="hidden" name="logout" value="true" />
						<button  class="btn btn-success">Logout</button>
					</form>
					<?php
				}
				?>


		</div>
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
