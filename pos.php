<?php

	require_once '../auth/credentials.php';

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

	$terminalid = 'V400m-346190779';

	$header = ""; $body = ""; $footer = ""; $endbody = "";

	if ($_SESSION['auth'] == true || (!empty($_POST['password']) && $_POST['password'] == PASSWORD)) {
	    $_SESSION['auth'] = true;

	$header = '<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
				<h5 class="my-0 mr-md-auto font-weight-normal">Adyen POS Challenge</h5>
				<form id="logoutForm" style="margin-block-end: 0;" method="post">
					<input type="hidden" name="logout" value="true" />
					<button  class="btn btn-success">Logout</button>
				</form>
			</div>';

	$body = '<div id="main">
				<div class="container">
					<div class="intro">
						Thank you for your time today! Please see the two tech challenges below. <br/><br/>
					</div>
					<div class="card">
						<div class="challenge card-body">
							<h5>Challenge 1: Terminal API</h5>
							<p>You will be using Adyen’s Terminal API solution to integrate a typical POS payment flow.<br />Follow the instructions below and don\'t hesitate to reach out to us if you need any help!</p>
							<p>Using the programming language of your choice, integrate the following:<br />
							<a href="https://docs.adyen.com/point-of-sale/make-a-payment">https://docs.adyen.com/point-of-sale/make-a-payment</a>.</p>
							<p>Please use our <strong>cloud</strong> endpoint with a <strong>synchronous</strong> request/response structure. At the minimum, your integration needs to meet the conditions below:</p>
							<div class="sc-notice info">
								<ol>
									<li>The ability to query a card\'s details: CardAcquistion</li>
									<li>The ability to process a payment: PaymentRequest</li>
									<li>The ability to cancel a payment: AbortRequest</li>
								</ol>
							</div>
							<p>Once you have completed the integration, please be prepared to walk us through it (including any challenges you had) during your next interview. Additionally, please share the following:</p>
							<ul>
								<li>Example requests / responses from your integration for all API calls</li>
								<li>Your code via a ZIP file <strong><u>before</u></strong> the interview so that we can also look at it.</li>
							</ul>
							<p>A terminal has been set up and is ready for you to integrate with. Please keep the transaction amount below $100 AUD - this is the limit at which cards require a PIN in AU.</p>
							<strong>Helpful Links</strong>
							<div class="sc-notice info">
								<ul>
									<li>Make a payment: <a href="https://docs.adyen.com/point-of-sale/make-a-payment">https://docs.adyen.com/point-of-sale/make-a-payment</a></li>
									<li>Card acquisition: <a href="https://docs.adyen.com/point-of-sale/card-acquisition">https://docs.adyen.com/point-of-sale/card-acquisition</a></li>
									<li>Code examples: <a href="https://github.com/Adyen/">https://github.com/Adyen/</a></li>
									Our .NET and PHP libraries (amongst others) include implementations of the Terminal API.
								</ul>
							</div>
							<br />
							<strong>Connection Details</strong>
							<div class="sc-notice info">
								<ul>
									<li>Terminal: <code>' . $terminalid . '</code></li>
									<li>Merchant Account: <code>' . merchantAccountPOS . '</code></li>
									<li>User: <code>' . userPOS . '</code></li>
									<li>API Key (x-api-key): <code>' . apikeyPOS . '</code></li>
								</ul>
							</div>

							<p>We will schedule a Zoom call for you to share your screen and run through your solution with us.</p>';

					$footer = '<div id="footer">
									<hr class="mb-4">

									<strong>Adyen’s Dashboard (Web Portal)</strong><br/><br/>
									<div id="caReg">
										<div class="instructions">
											The final piece of the puzzle that you will need is to a user for the Adyen Dashboard; a portal from where you can access data and insights in to the platform, and see your payments coming in once you’ve completed the first part of the integration to help diagnose any problems you may be facing.
										</div>
										<form id="reqUser">
											<br/>
											<div class="instructions" ';
									if ($countDetails == 0) {
										$footer .= '>
												Please fill out the following details ';
									}
									if ($countDetails > 0 && $countDetails < 3) {
										$footer .= '
											id="contactPassed">
												Please check the following details below and complete the additional required fields ';
									} elseif ($countDetails == 3) {
										$footer .= '
											id="contactPassed">
												Please check the following details below ';
									}

									$footer .= 'in order to be sent an invite link to the Adyen Dashboard before clicking submit:
											</div><br />

											<div class="row">
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
											<input type="hidden" name="timezone" id="timezone" value="">
											<input type="hidden" name="merchantaccount" id="merchantaccount" value="' . merchantAccountPOS . '">
											<input type="hidden" name="version" id="version" value="' . $ver . '"><br/>
											<button class="btn btn-success" type="submit">Create Account</button>
										</form>
									</div>
								</div>';

				$endbody = '</div>
							<!-- replacement caUser registration div -->
							<div id="userCreated" style="display: none;">

							</div>
							<hr class="mb-4 nobot">
							<div class="challenge card-body">

								<h5>Challenge 2: The Adyen POS Test </h5><br />
								Please follow the link below to access a quick quiz and fill out your answers. This should not take any longer than 30 minutes, but please take as much time as you need! <br /><br />
								<a href="https://forms.gle/TCtKcABDUVwh6qicA">Adyen POS Test</a>
								<div class="bottom-spacer"></div>
							</div>
						</div>
						<br />Please reach out if you have any questions. Best of luck and I hope you enjoy the challenge!<br />
						<div class="bottom-spacer"></div>
					</div>
				</div>
			</div>';

	} else {
		$_SESSION['auth'] = false;

		$body = '<!-- The Modal -->
				<div id="id01" class="modal">
				  <!-- Modal Content -->
				  <form class="modal-content animate" method="post">
				    <div class="container">

				      <label for="psw"><strong>Password</strong></label>
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
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Adyen POS Challenge</title>
    <link type="image/ico" rel="shortcut icon" href="images/favicon.ico">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="style.css">
	 	<script src="addons/jstimezonedetect/dist/jstz.min.js"></script>
	</head>
	<body>
		<div id="header">
			<?php echo $header; ?>
		</div>
		<div id="body">
			<?php
				echo $body;
				echo $footer;
				echo $endbody;
			?>
		</div>

		<script>

			$(function() {

				if ('#timezone') {
					var tz = jstz.determine();
				    $('#timezone').val(tz.name());
				}

				$('#reqUser').submit(function(e){
					e.preventDefault();
					var postdata = $(this).serialize();
					  $.post(
				    	'caUser.php',
				    	postdata,
				    	function(data,status){
					    	if (status == "success") {
					    		data = JSON.parse(data);
					    		console.log(data);
					    		console.log("Username: " + data.userName);
					    		$('#reqUser').remove();
					    		$('#caReg .instructions').html(
					    			'Thanks for submitting the form, you will now receive an email with an invite to create a password, giving you access to the Adyen Dashboard. <br/><br/>If you have any issues logging in, please contact your Adyen interviewer. <br/><br/>Best of luck!'
					    			);
					    		$.post(
							    	'mailpos.php',
							    	postdata + '&username=' + data.userName,
							    	function(data,status) {
							    		if (status == "success") {
							    			console.log(data);
							    		} else {
							    			console.log("Mail failed...");
							    		}
							    	}
						    	);

					    	} else {
					    		alert("Error submitting the request for Customer Area access... please contact your Adyen interviewer or paul@adyen.com");
					    	}

					    }
				    );
				});
		    });

		</script>
	</body>
</html>
