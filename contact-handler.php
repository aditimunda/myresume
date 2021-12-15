<?php

	$first_name = $_POST['first_name']; 
	$last_name = $_POST['last_name']; 
	$visitor_email = $_POST['email'];
	$message = $_POST['message']; 

	
	$email_from = 'aditi.munda@gmail.com';
	
	$email_subject = "New Form Submission";

	$email_body = "User First Name: $first_name. \n".
						"Last Name: $last_name. \n".
							"User Email: $visitor_email.\n"'
								"User Message: $message.\n";

	$to ="aditi.munda@gmail.com";
	
	$headers .="From: $email_form \r\n";

	$headers .= "Reply-To: $visitor_email \r\n";

	mail($to, $email_subject, $email_body, $headers);

	header("Location: contact.html");
?>
