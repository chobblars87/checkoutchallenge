<?php

	require_once '../auth/credentials.php';

	$to = "";
	$name = "";

	if (isset($_POST['email']) && isset($_POST['firstname'])) {
		$to = $_POST['email'];
		$name = $_POST['firstname'] . " " . $_POST['lastname'];
		$user = strtolower($_POST['firstname'] . "." . $_POST['lastname']);
		$ver = $_POST['version'];
	}
	if (isset($_GET['email']) && isset($_GET['firstname'])) {
		$to = $_GET['email'];
		$name = $_GET['firstname'] . " " . $_GET['lastname'];
		$user = strtolower($_GET['firstname'] . "." . $_GET['lastname']);
		$ver = $_GET['version'];
	}

	$terminalid = 'V400m-346190779';

		$html = '<body style="box-sizing: border-box;margin: 0;font-family: -apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Arial,&quot;Noto Sans&quot;,sans-serif,&quot;Apple Color Emoji&quot;,&quot;Segoe UI Emoji&quot;,&quot;Segoe UI Symbol&quot;,&quot;Noto Color Emoji&quot;;font-size: 1rem;font-weight: 400;line-height: 1.5;color: #212529;text-align: left;background-color: #fff;min-width: 992px!important;">
				<div id="body" style="box-sizing: border-box;">
					<div id="main" style="box-sizing: border-box;">
						<div class="container" style="box-sizing: border-box;width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;min-width: 992px!important;">
							<div class="intro" style="box-sizing: border-box;">
								Thank you for your time today! Please see the two tech challenges below. <br style="box-sizing: border-box;"><br style="box-sizing: border-box;">
							</div>
							<div class="card" style="box-sizing: border-box;position: relative;display: flex;-ms-flex-direction: column;flex-direction: column;min-width: 0;word-wrap: break-word;background-color: #fff;background-clip: border-box;border: 1px solid rgba(0,0,0,.125);border-radius: .25rem;">
								<div class="challenge card-body" style="box-sizing: border-box;-ms-flex: 1 1 auto;flex: 1 1 auto;min-height: 1px;padding: 1.25rem;">
									<h5 style="box-sizing: border-box;margin-top: 0;margin-bottom: .5rem;font-weight: 500;line-height: 1.2;font-size: 1.25rem;">Challenge 1: Terminal API</h5>
									<p style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;">You will be using Adyen’s Terminal API solution to integrate a typical POS payment flow.<br style="box-sizing: border-box;">Follow the instructions below and don\'t hesitate to reach out to us if you need any help!</p>
									<p style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;">Using the programming language of your choice, integrate the following:<br style="box-sizing: border-box;">
									<a href="https://docs.adyen.com/point-of-sale/make-a-payment" style="box-sizing: border-box;color: #007bff;text-decoration: underline;background-color: transparent;">https://docs.adyen.com/point-of-sale/make-a-payment</a>.</p>
									<p style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;">Please use our <strong style="box-sizing: border-box;font-weight: bolder;">cloud</strong> endpoint with a <strong style="box-sizing: border-box;font-weight: bolder;">synchronous</strong> request/response structure. At the minimum, your integration needs to meet the conditions below:</p>
									<div class="sc-notice info" style="box-sizing: border-box;">
										<ol style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;">
											<li style="box-sizing: border-box;">The ability to query a card\'s details: CardAcquisiton</li>
											<li style="box-sizing: border-box;">The ability to process a payment: PaymentRequest</li>
											<li style="box-sizing: border-box;">The ability to cancel a payment: AbortRequest</li>
										</ol>
									</div>
									<p style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;">Once you have completed the integration, please be prepared to walk us through it (including any challenges you had) during your next interview. Additionally, please share the following:</p>
									<ul style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;">
										<li style="box-sizing: border-box;">Example requests / responses from your integration for all API calls</li>
										<li style="box-sizing: border-box;">Your code via a ZIP file <strong style="box-sizing: border-box;font-weight: bolder;"><u style="box-sizing: border-box;">before</u></strong> the interview so that we can also look at it.</li>
									</ul>
									<p style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;">A terminal has been set up and is ready for you to integrate with. Please keep the transaction amount below $100 AUD - this is the limit at which cards require a PIN in AU.</p>
									<strong style="box-sizing: border-box;font-weight: bolder;">Helpful Links</strong>
									<div class="sc-notice info" style="box-sizing: border-box;">
										<ul style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;">
											<li style="box-sizing: border-box;">Make a payment - <a href="https://docs.adyen.com/point-of-sale/make-a-payment" style="box-sizing: border-box;color: #007bff;text-decoration: underline;background-color: transparent;">- Make a payment - https://docs.adyen.com/point-of-sale/make-a-payment</a></li>
											<li style="box-sizing: border-box;">Card acquisition - <a href="https://docs.adyen.com/point-of-sale/card-acquisition" style="box-sizing: border-box;color: #007bff;text-decoration: underline;background-color: transparent;">https://docs.adyen.com/point-of-sale/card-acquisition</a></li>
											<li style="box-sizing: border-box;">Code examples: <a href="https://github.com/Adyen/" style="box-sizing: border-box;color: #007bff;text-decoration: underline;background-color: transparent;">https://github.com/Adyen/</a></li>
											Our .NET and PHP libraries (amongst others) include implementations of the Terminal API.
										</ul>
									</div>
									<br style="box-sizing: border-box;">
									<strong style="box-sizing: border-box;font-weight: bolder;">Connection Details</strong>
									<div class="sc-notice info" style="box-sizing: border-box;">
										<ul style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;">
											<li style="box-sizing: border-box;">Terminal: <code style="box-sizing: border-box;font-family: SFMono-Regular,Menlo,Monaco,Consolas,&quot;Liberation Mono&quot;,&quot;Courier New&quot;,monospace;font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">' . $terminalid . '</code></li>
											<li style="box-sizing: border-box;">Merchant Account: <code style="box-sizing: border-box;font-family: SFMono-Regular,Menlo,Monaco,Consolas,&quot;Liberation Mono&quot;,&quot;Courier New&quot;,monospace;font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">' . merchantAccountPOS . '</code></li>
											<li style="box-sizing: border-box;">User: <code style="box-sizing: border-box;font-family: SFMono-Regular,Menlo,Monaco,Consolas,&quot;Liberation Mono&quot;,&quot;Courier New&quot;,monospace;font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">' . userPOS . '</code></li>
											<li style="box-sizing: border-box;">API Key (x-api-key): <code style="box-sizing: border-box;font-family: SFMono-Regular,Menlo,Monaco,Consolas,&quot;Liberation Mono&quot;,&quot;Courier New&quot;,monospace;font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">' . apikeyPOS . '</code></li>
										</ul>
									</div>

									<p style="box-sizing: border-box;margin-top: 0;margin-bottom: 1rem;orphans: 3;widows: 3;">We will schedule a Zoom call for you to share your screen and run through your solution with us.</p><div id="footer" style="box-sizing: border-box;">

									<hr class="mb-4 nobot" style="box-sizing: content-box;height: 0;overflow: visible;margin-top: 1rem;margin-bottom: 1.5rem!important;border: 0;border-top: 1px solid rgba(0,0,0,.1);margin-right: 0;margin-left: 0;">
									<div class="challenge card-body" style="box-sizing: border-box;-ms-flex: 1 1 auto;flex: 1 1 auto;min-height: 1px;padding: 1.25rem;">

										<h5 style="box-sizing: border-box;margin-top: 0;margin-bottom: .5rem;font-weight: 500;line-height: 1.2;font-size: 1.25rem;">Challenge 2: The Adyen POS Test </h5><br style="box-sizing: border-box;">
										Please follow the link below to access a quick quiz and fill out your answers. This should not take any longer than 30 minutes, but please take as much time as you need! <br style="box-sizing: border-box;"><br style="box-sizing: border-box;">
										<a href="https://forms.gle/TCtKcABDUVwh6qicA" style="box-sizing: border-box;color: #007bff;text-decoration: underline;background-color: transparent;">Adyen POS Test</a>
										<div class="bottom-spacer" style="box-sizing: border-box;"></div>
									</div>
								</div>
								<br style="box-sizing: border-box;">Please reach out if you have any questions. Best of luck and I hope you enjoy the challenge!<br style="box-sizing: border-box;">
								<div class="bottom-spacer" style="box-sizing: border-box;"></div>
							</div>
						</div>
					</div>
			</body>';

		//echo $html;// . $_POST['username'] . '

		$mail = newMailer();

		try {
		    //Recipients
		    $mail->setFrom('recruitment@adyen.com', 'Adyen Recruitment');
		    $mail->addAddress($to, $name);

		    // Content
				$mail->CharSet = 'UTF-8';
		    $mail->isHTML(true);
		    $mail->Subject = 'Adyen POS Test';
		    $mail->Body    = $html;

		    $mail->send();
		    echo 'Message has been sent';
		} catch (Exception $e) {
		    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
