<?PHP

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	$sender = 'Adyen Recruitment';
	$recipient = 'p.barns@gmail.com';

	$subject = "Adyen Tech Test";
	$message = "Hear ye hear ye";
	$headers = 'From:' . $sender;

	if (mail($recipient, $subject, $message, $headers))
	{
	    echo "Message accepted";
	}
	else
	{
	    echo "Error: Message not accepted";
	}