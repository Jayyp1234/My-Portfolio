<?php
 //defining the contact error variables
$client_name_error = ""; $client_email_error = " "; $client_subject_error = ""; 
$message_error ="";
//array to handle the errors..
$form_error_array  = array();
//form variables/input...
$client_name = " "; $client_email = " "; $client_subject= " "; $message = " "; 
$JPEmail = " "; $success = " ";
	// TRIMMING , REMOVING SLASHES , SPECIAL CHARACTERS from form input fields..
	
function validate_input($input) {
  $input = trim($input);
  $input = stripslashes($input);
  $input = htmlspecialchars($input);
  return $input;
}


if (isset($_POST['ContactUS'])) {
	$client_name = $_POST['client_name'];
	$client_email = $_POST['client_email'];
	$client_subject = $_POST['client_subject'];
	$message = $_POST['message'];

	// form validation
	if (empty($client_name)) {
		$client_name_error = 'Name is required';
		array_push($form_error_array, $client_name_error);
	}
	if (empty($client_email)) {
		$client_email_error = 'Email is required';
		array_push($form_error_array, $client_email_error);
	}
	if (!empty($client_email)) {
		if (!filter_var($client_email,FILTER_VALIDATE_EMAIL)) {
			$client_email_error = 'Invalid Email address';
		array_push($form_error_array, $client_email_error);

		}
	}
	if (empty($client_subject)) {
		$client_subject_error = 'Message Subject is required';
		array_push($form_error_array, $client_subject_error);
	}

	if (empty($message)) {
		$message_error = 'Enter your Message';
		array_push($form_error_array, $message_error);
	}


	if (count($form_error_array) == 0) {
		
		$client_name = validate_input($client_name);
		$client_email = validate_input($client_email);
		$client_subject = validate_input($client_subject);
		$message = validate_input($message);

		// mail sending.....
		$JPEmail = "okekejohnpaul12@gmail.com";

		$message_body = "Name: ".$client_name."\n";
		$message_body .= "Email: ".$client_email."\n";
		$message_body .= "Message Subject: ".$client_subject."\n";
		$message_body .= "Message: ".$message."\n";
	    mail($JPEmail, $client_subject, $message_body);
			
		$success = 'Thank you for contacting me.I will get back to you soon.';
   		array_push($form_error_array, $success);
   
	}
}

