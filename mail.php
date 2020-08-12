<?php
	$to = "";
	$name = "";

	if (isset($_POST['email']) && isset($_POST['firstname'])) {
		$to = $_POST['email'];
		$name = $_POST['firstname'] . " " . $_POST['lastname'];
		$user = strtolower($_POST['firstname'] . "." . $_POST['lastname']);
	}
	if (isset($_GET['email']) && isset($_GET['firstname'])) {
		$to = $_GET['email'];
		$name = $_GET['firstname'] . " " . $_GET['lastname'];
		$user = strtolower($_GET['firstname'] . "." . $_GET['lastname']);
	}

		$html = '<body style="box-sizing:border-box;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";font-size:1rem;font-weight:400;line-height:1.5;color:#212529;text-align:left;background-color:#fff;" ><div id="main" style="box-sizing:border-box;height:100vh;" >
				<div class="container" style="box-sizing:border-box;padding-top:16px;padding-bottom:16px;padding-right:16px;padding-left:16px;" >
					<div class="intro" style="box-sizing:border-box;" >
						Thanks for taking your first interview with Adyen! <br style="box-sizing:border-box;" /><br style="box-sizing:border-box;" />
						For the next stage, we\'d love for you to complete the below tech challenges. If you could complete this within the next 10 days, it would be much appreciated! <br style="box-sizing:border-box;" />
						Based on your submission, we\’ll then schedule the next round of interviews! <br style="box-sizing:border-box;" /><br style="box-sizing:border-box;" />
						There will be two parts to this technical test...<br style="box-sizing:border-box;" /><br style="box-sizing:border-box;" />

					</div>
					<div  class="card" style="box-sizing:border-box;padding-bottom:7px;" >
						<div class="challenge card-body" style="box-sizing:border-box;-ms-flex:1 1 auto;flex:1 1 auto;min-height:1px;padding-top:1.25rem;padding-right:1.25rem;padding-left:1.25rem;padding-bottom:0px;" >
							<h5 style="box-sizing:border-box;margin-top:0;margin-bottom:.5rem;font-weight:500;line-height:1.2;font-size:1.25rem;" >Challenge 1: The Adyen (not so) Tech Test </h5><br style="box-sizing:border-box;" />

							Please follow the link below to access a quick quiz and fill out your answers. This should not take any longer than 10 minutes, but please take as much time as you need.<br style="box-sizing:border-box;" /><br style="box-sizing:border-box;" />

							<a href="https://www.surveymonkey.com/r/87YYFFZ" style="box-sizing:border-box;color:#007bff;text-decoration:none;background-color:transparent;cursor:pointer;" >https://www.surveymonkey.com/r/87YYFFZ</a>
						</div>
						<div class="challenge card-body" style="box-sizing:border-box;-ms-flex:1 1 auto;flex:1 1 auto;min-height:1px;padding-top:1.25rem;padding-right:1.25rem;padding-left:1.25rem;padding-bottom:0px;" >
							<hr class="mb-4" style="box-sizing:content-box;height:0;overflow:visible;margin-top:1rem;border-width:0;border-top-width:1px;border-top-style:solid;border-top-color:rgba(0,0,0,.1);margin-bottom:1.5rem!important;" >

								<h5 style="box-sizing:border-box;margin-top:0;margin-bottom:.5rem;font-weight:500;line-height:1.2;font-size:1.25rem;" >Challenge 2: Integrate to Adyen\'s Platform</h5><br style="box-sizing:border-box;" />
								<div class="intro" style="box-sizing:border-box;" >
									One of the integration options with Adyen is to integrate with our Checkout API (back-end) & Drop-in Components (front-end). Using the programming language of your choice integrate the following (including back-end server):<br style="box-sizing:border-box;" /><br style="box-sizing:border-box;" />

									<b style="box-sizing:border-box;" >Frontend</b><br style="box-sizing:border-box;" /><br style="box-sizing:border-box;" />

									With the Drop-in solution handing the front-end, you would be able display the required fields for each payment method without needing to know the actual flow of each payment method. You can refer to the sample front-end JS code that we have, referring to the “Drop-in” portion of the js (<a href="https://github.com/Adyen/adyen-components-js-sample-code" style="box-sizing:border-box;color:#007bff;text-decoration:none;background-color:transparent;cursor:pointer;" >https://github.com/Adyen/adyen-components-js-sample-code</a>)

									<div class="sc-notice info" style="box-sizing:border-box;border-radius:3px;margin-top:12px;margin-bottom:12px;margin-right:0;margin-left:0;min-height:20px;padding-top:12px;padding-bottom:12px;padding-right:12px;padding-left:48px;position:relative;display:table;border-width:3px;border-style:solid;border-color:#cce0ff;" ><div style="box-sizing:border-box;" >
									<p style="box-sizing:border-box;margin-top:0;margin-bottom:1rem;" >Hint: The .env.default file needs to be saved in the systems format.</p>
									</div></div>
									<br style="box-sizing:border-box;" />
									<b style="box-sizing:border-box;" >Backend</b><br style="box-sizing:border-box;" /><br style="box-sizing:border-box;" />

									Make the necessary API calls like <code style="box-sizing:border-box;font-family:SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;font-size:87.5%;color:#e83e8c;word-wrap:break-word;" >/paymentMethods</code>, <code style="box-sizing:border-box;font-family:SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;font-size:87.5%;color:#e83e8c;word-wrap:break-word;" >/payments</code> and <code style="box-sizing:border-box;font-family:SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;font-size:87.5%;color:#e83e8c;word-wrap:break-word;" >/payment/details</code> to Adyen from your back-end server to complete the payment. You would also be able to try the responses with our API explorer just to get familiarize with the formats of the Checkout API - <a href="https://docs.adyen.com/api-explorer/#/PaymentSetupAndVerificationService/v49/payments" style="box-sizing:border-box;color:#007bff;text-decoration:none;background-color:transparent;cursor:pointer;" >https://docs.adyen.com/api-explorer/#/PaymentSetupAndVerificationService/v49/payments</a>. <br style="box-sizing:border-box;" /><br style="box-sizing:border-box;" />

									<b style="box-sizing:border-box;" >3D 2 Secure Flow</b><br style="box-sizing:border-box;" /><br style="box-sizing:border-box;" />

									In payments, we struggle to maintain the balance between Fraud and Auth Rate. As much as we want to get all the transactions through seamlessly, we do not want to let the fraudsters into our radar. As such we balance this by introducing the new standard for 3D secure from the card schemes. You can refer to more information here - <a href="https://docs.adyen.com/checkout/3d-secure" style="box-sizing:border-box;color:#007bff;text-decoration:none;background-color:transparent;cursor:pointer;" >https://docs.adyen.com/checkout/3d-secure<a style="box-sizing:border-box;color:#007bff;text-decoration:none;background-color:transparent;cursor:pointer;" /><br style="box-sizing:border-box;" /><br style="box-sizing:border-box;" />

									To help you with creating the 3D2, you can refer to the web (or mobile should you wish) payment - <a href="https://docs.adyen.com/checkout/3d-secure/native-3ds2/api-integration#submit-a-payment-request" style="box-sizing:border-box;color:#007bff;text-decoration:none;background-color:transparent;cursor:pointer;" >https://docs.adyen.com/checkout/3d-secure/native-3ds2/api-integration#submit-a-payment-request</a>, if you are using Drop-in, you would need to handle <code style="box-sizing:border-box;font-family:SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;font-size:87.5%;color:#e83e8c;word-wrap:break-word;" >onAdditionalDetails</code> (<a href="https://docs.adyen.com/checkout/drop-in-web#step-4-additional-front-end" style="box-sizing:border-box;color:#007bff;text-decoration:none;background-color:transparent;cursor:pointer;" >https://docs.adyen.com/checkout/drop-in-web#step-4-additional-front-end</a>)<br style="box-sizing:border-box;" /><br style="box-sizing:border-box;" />

									<hr class="mb-4" style="box-sizing:content-box;height:0;overflow:visible;margin-top:1rem;border-width:0;border-top-width:1px;border-top-style:solid;border-top-color:rgba(0,0,0,.1);margin-bottom:1.5rem!important;" >

									<div class="sc-notice info" style="box-sizing:border-box;border-radius:3px;margin-top:12px;margin-bottom:12px;margin-right:0;margin-left:0;min-height:20px;padding-top:12px;padding-bottom:12px;padding-right:12px;padding-left:48px;position:relative;display:table;border-width:3px;border-style:solid;border-color:#cce0ff;" >
										Please feel free to run this locally on your machine using any of the following ports: <br />
										<ul style="box-sizing:border-box;margin-top:0;margin-bottom:1rem;" >
											<li style="box-sizing:border-box;" >3000</li>
											<li style="box-sizing:border-box;" >5000</li>
											<li style="box-sizing:border-box;" >8000</li>
											<li style="box-sizing:border-box;" >8080</li>
										</ul>
										Using any of these ports will allow you to successfully connect to Adyen using the following clientKey:<br/>
										<pre style="box-sizing:border-box;font-family:SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;margin-top:0;margin-bottom:1rem;overflow:auto;display:block;font-size:87.5%;color:#212529;" ><code style="box-sizing:border-box;font-family:SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;font-size:87.5%;color:#e83e8c;word-wrap:break-word;" >test_GWXWP766DVDVHP3NUESVCEBV5AKZCOGJ</code></pre>
									</div>
									During your next interview, we will ask you to walk us through your code and your demo implementation. Additionally, please share the following:<br/><br/>

									<ul style="box-sizing:border-box;margin-top:0;margin-bottom:1rem;" >
		  							<li style="box-sizing:border-box;" >Example requests / responses from your integration for all API calls</li>
		  							<li style="box-sizing:border-box;" >2 PSP references (unique payment reference) for two example payments - one using Visa/Mastercard with 3DS2, and one alternative local payment of your choice (Bank transfer / Vouchers / etc)</li>
									</ul>




										<div class="sc-notice info" style="box-sizing:border-box;border-radius:3px;margin-top:12px;margin-bottom:12px;margin-right:0;margin-left:0;min-height:20px;padding-top:12px;padding-bottom:12px;padding-right:12px;padding-left:48px;position:relative;display:table;border-width:3px;border-style:solid;border-color:#cce0ff;" ><div style="box-sizing:border-box;" >
										<p style="box-sizing:border-box;margin-top:0;margin-bottom:1rem;" >Hint: You should be able to see alternative payment methods if you use the following combination of currency and country code in the paymentMethods request:
											<pre style="box-sizing:border-box;font-family:SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;margin-top:0;margin-bottom:1rem;overflow:auto;display:block;font-size:87.5%;color:#212529;" ><code style="box-sizing:border-box;font-family:SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;font-size:87.5%;color:#e83e8c;word-wrap:break-word;" >{ "countryCode":"DE", "amount":{ "currency":"EUR", "value":1000 } }</code></pre></p>
										</div></div>

										<div class="sc-notice info" style="box-sizing:border-box;border-radius:3px;margin-top:12px;margin-bottom:12px;margin-right:0;margin-left:0;min-height:20px;padding-top:12px;padding-bottom:12px;padding-right:12px;padding-left:48px;position:relative;display:table;border-width:3px;border-style:solid;border-color:#cce0ff;" ><div style="box-sizing:border-box;" >
										<p style="box-sizing:border-box;margin-top:0;margin-bottom:1rem;" >Useful links:
										<ul style="box-sizing:border-box;margin-top:0;margin-bottom:1rem;" >
											<li style="box-sizing:border-box;" >Adyen Drop-in Integration: <a href="https://docs.adyen.com/checkout/drop-in-web" style="box-sizing:border-box;color:#007bff;text-decoration:none;background-color:transparent;cursor:pointer;" >https://docs.adyen.com/checkout/drop-in-web</a></li>
											<li style="box-sizing:border-box;" >Adyen Git Libraries: <a href="https://github.com/Adyen" style="box-sizing:border-box;color:#007bff;text-decoration:none;background-color:transparent;cursor:pointer;" >https://github.com/Adyen</a></li>
											<li style="box-sizing:border-box;" >Adyen Test Cards: <a href="https://docs.adyen.com/developers/test-cards/test-card-numbers" style="box-sizing:border-box;color:#007bff;text-decoration:none;background-color:transparent;cursor:pointer;" >https://docs.adyen.com/developers/test-cards/test-card-numbers</a></li>
										</ul>
										</p>
									</div>
								</div>
							</div>
							<div id="intro" style="box-sizing:content-box; display:block;">
								<hr class="mb-4" style="box-sizing:content-box;height:0;overflow:visible;margin-top:1rem;border-width:0;border-top-width:1px;border-top-style:solid;border-top-color:rgba(0,0,0,.1);margin-bottom:1.5rem!important;" >
								<b style="box-sizing:border-box;" >Authentication</b><br style="box-sizing:border-box;" />
									In order to interface with the Adyen API\'s, you would normally be required to generate a new API Key for your "WS User". However for ease, please use the following key for all Adyen API interactions:<br style="box-sizing:border-box;" />
									<div style="margin-left: 40px"><code style="box-sizing:border-box;font-family:SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;font-size:87.5%;color:#e83e8c;word-wrap:break-word;">AQE1hmfxKo3NaxZDw0m/n3Q5qf3Ve55dHZxYTFdTxWq+l3JOk8J4BO7yyZBJ4o0JviXqoc8j9sYQwV1bDb7kfNy1WIxIIkxgBw==-q7XjkkN/Cud0WELZF+AzXpp/PuCB8+XmcdgqHYUWzTA=-Kk9N4dG837tIyjZF</code></div>
									<br style="box-sizing:border-box;" />
								<div id="userCreated" style="box-sizing:border-box;" >
									You will receive a separate email from Adyen with your user credentials. Your new username for the Adyen Customer Area should be:<br/>
										' . $user . '
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>';

		//echo $html;// . $_POST['username'] . '

		include '../auth/mailauth.php';

		$mail = newMailer();

		try {
		    //Recipients
		    $mail->setFrom('recruitment@adyen.com', 'Adyen Recruitment');
		    $mail->addAddress($to, $name);

		    // Content
		    $mail->isHTML(true);
		    $mail->Subject = 'Adyen Technical Test';
		    $mail->Body    = $html;

		    $mail->send();
		    echo 'Message has been sent';
		} catch (Exception $e) {
		    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
