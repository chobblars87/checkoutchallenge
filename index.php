<?php

	require_once ('authentication.php');

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
	$header = ""; $body = ""; $footer = ""; $endbody = "";

	if ($_SESSION['auth'] == true || (!empty($_POST['password']) && $_POST['password'] == PASSWORD)) {
	    $_SESSION['auth'] = true;

	$header = '<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
				<h5 class="my-0 mr-md-auto font-weight-normal">Adyen Checkout Challenge</h5>
				<form id="logoutForm" style="margin-block-end: 0;" method="post">
					<input type="hidden" name="logout" value="true" />
					<button  class="btn btn-success">Logout</button>
				</form>
			</div>';

	$body = '<div id="main">
				<div class="container">
					<div class="intro">
						Thanks for taking your time today! Please see the two follow up challenges below as part of your next step. <br/><br/>
					</div>
					<div class="card">
						<div class="challenge card-body">
							<h5>Challenge 1: Checkout, Checkout, Checkout</h5>
							<p>You will be using Adyen’s Checkout Drop-in web solution to integrate a typical eCommerce shopper checkout flow. Follow the instructions below and don\'t hesitate to reach out to us if you need any help!</p>
							<p>Using the programming language of your choice, integrate the following (including backend server): <br />
							<a href="https://docs.adyen.com/checkout/drop-in-web">https://docs.adyen.com/checkout/drop-in-web</a>.</p>
							<p>At the minimum, your integration needs to meet the conditions below:</p>
							<div class="sc-notice info">
								<ol>
									<li>Accept card payments (Visa and Mastercard)</li>
									<li>Accept at least 1 local payment method - for example:
									 	<ul>
											<li>Alipay (for CN/SG)</li>
											<li>POLi (for AU/NZ)</li>
											<li>iDEAL (NL)</li>
										</ul>
									</li>
									<li>Perform 3DS2 on all card payments - <a href="https://docs.adyen.com/checkout/3d-secure/redirect-3ds2-3ds1/web-drop-in">https://docs.adyen.com/checkout/3d-secure/redirect-3ds2-3ds1/web-drop-in</a></li>
								</ol>
							</div>
							<p>Once you have completed the integration, please be prepared to walk us through it (including any challenges you had) during your next interview. Additionally, please share the following:</p>
							<ul>
								<li>2 pspReferences (unique payment reference) for two example payments - one card payment and one local payment method.</li>
								<li>Example requests / responses for the above-mentioned pspReferences for all API calls (merchantAccount: AdyenRecruitmentCOM)</li>
								<li>Your entire project to us via a ZIP file/Github <strong><u>before</u></strong> the interview so that we can also look at it.</li>
							</ul>
							<p>When making your payment request, make sure that the value for your reference field is set to: ' . (isset($_GET['firstname']) ? $_GET['firstname'] : '{yourFirstName}') . '_checkoutChallenge.</p>
							<p>With regards to the overall UI, feel free to design it in any way you please. Also, the above three conditions are the baseline integration, but feel free to add on more functionality to your checkout flow.</p>
							<p>Lastly, as there are example integrations online, <u><strong>no pre-built libraries or example code</strong> may be used in your solution</u>. Here are some examples of what we are referring to:</p>
								<div class="multi-notice">
									<div class="sc-notice info rorw ok">
										OK to use:
										<div class="fillspace">
											<ul>
												<li>PHP: cURL library for HTTP POST requests</li>
												<li>Python: requests library</li>
												<li>Node: express/axios</li>
												<li>C#: HttpClient</li>
											</ul>
										</div>
									</div>
									<div class="sc-notice info rorw not">
										Not OK to use: any pre-built library that interacts directly with Adyen over API. For example:
										<ul>
											<li><a href = "https://github.com/Adyen/adyen-python-api-library">https://github.com/Adyen/adyen-python-api-library</a></li>
											<li><a href = "https://github.com/Adyen/adyen-java-api-library">https://github.com/Adyen/adyen-java-api-library</a></li>
											<li><a href = "https://github.com/Adyen/adyen-php-api-library">https://github.com/Adyen/adyen-php-api-library</a></li>
											<li><a href = "https://github.com/Adyen/adyen-dotnet-api-library">https://github.com/Adyen/adyen-dotnet-api-library</a></li>
											<li><a href = "https://github.com/Adyen/adyen-node-api-library">https://github.com/Adyen/adyen-node-api-library</a></li>
										</ul>
									</div>
								</div>

							<br />
							<strong>Helpful Links</strong>
							<div class="sc-notice info">
								<ul>
									<li>
										Drop-in Documentation
										<ul>
											<li><a href="https://docs.adyen.com/checkout/drop-in-web">https://docs.adyen.com/checkout/drop-in-web</a></li>
											<li><a href="https://docs.adyen.com/checkout/3d-secure/redirect-3ds2-3ds1/web-drop-in">https://docs.adyen.com/checkout/3d-secure/redirect-3ds2-3ds1/web-drop-in</a></li>
										</ul>
									</li>
									<li>Test credentials: <a href="https://docs.adyen.com/developers/test-cards/test-card-numbers">https://docs.adyen.com/developers/test-cards/test-card-numbers</a></li>
									<li>Code examples: <a href="https://github.com/Adyen/">https://github.com/Adyen/</a></li>
								</ul>
							</div>
							<br />
							<strong>Authentication & Credentials</strong>
							<div class="sc-notice info">
								<ul>
									<li>merchantAccount: <code>AdyenRecruitmentCOM</code></li>
									<li>API Key (x-api-key): <code>AQE1hmfxKo3NaxZDw0m/n3Q5qf3Ve55dHZxYTFdTxWq+l3JOk8J4BO7yyZBJ4o0JviXqoc8j9sYQwV1bDb7kfNy1WIxIIkxgBw==-q7XjkkN/Cud0WELZF+AzXpp/PuCB8+XmcdgqHYUWzTA=-Kk9N4dG837tIyjZF</code></li>
									<li>Client Key (clientKey): <code>test_GWXWP766DVDVHP3NUESVCEBV5AKZCOGJ</code></li>
								</ul>
							</div>
							<div class="sc-notice info">
							The permitted domains for the above <strong>clientKey</strong> are: <br />
								<ul>
									<li>http://localhost:3000</li>
									<li>http://localhost:5000</li>
									<li>http://localhost:8000</li>
									<li>http://localhost:8080</li>
									<li>http://127.0.0.1:5000</li>
								</ul>
								Please ensure that your website is running on one of the above permitted domains; if not you will be unable to load your credit card fields.<br /><em style="font-size:14px">If you do want to run your server on another domain, feel free to reach out to me and we will add it for you.</em>
							</div>
							<p>If you are in the midst of testing credit card payments, and are getting a 422: Unable to decrypt data error, that\'s an issue with the domain where you are hosting your front-end website or the clientKey. Nonetheless, feel free to reach out to us if you still cannot resolve the error.</p>
							<p>You don’t need to publicly host your website (however, please feel free to do so). We will schedule a Zoom call for you to run through your solution with us.</p>';

					$footer = '<div id="footer">
									<hr class="mb-4">

									<b>Adyen\'s Dashboard (Web Portal)</b><br/><br/>
									<div id="caReg">
										<div class="instructions">
											The final piece of the puzzle that you will need is to a user for the Adyen Dashboard; a portal from where you can access data and insights in to the platform, and see your payments coming in once you\'ve completed the first part of the integration to help diagnose any problems you may be facing.
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
											<input type="hidden" name="timezone" id="timezone" value=""><br/>
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

								<h5>Challenge 2: The Adyen (not so) Tech Test </h5><br/>
								In addition, please follow the link below to access a quick quiz and fill out your answers. This should not take any longer than 30 minutes, but please take as much time as you need!<br/><br/>
								<a href="https://www.surveymonkey.com/r/87YYFFZ">https://www.surveymonkey.com/r/87YYFFZ</a>
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
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Adyen Checkout Challenge</title>
    <link type="image/ico" rel="shortcut icon" href="images/favicon.ico">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
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

			var emailhtml = '<?php echo base64_encode(htmlentities($body . $endbody)); ?>';

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
					    			'Thanks for submitting the form, you will now receive an email with an invite to create a password, giving you access to the Adyen Dashboard. <br/><br/>Best of luck!'
					    			);
					    		$.post(
							    	'mail.php',
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
					    		alert("Error... please contact your Adyen interviewer or paul@adyen.com");
					    	}

					    }
				    );
				});
		    });

		</script>
	</body>
</html>
