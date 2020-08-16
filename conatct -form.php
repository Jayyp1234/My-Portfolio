<?php 
	$name = $_POST["client_name"];
	$visitor_email = $_POST["client_email"];
	$subject = $_POST["client_subject"];
	$message = $_POST["message"];

	$email_from = "okekejohnpaulport.netlify.app";
	$email_subject = $subject;
	$email_body = $message;




	$to = "okekejohnpaul12@gmail.com";

	$headers = "From: $email_form \r\n";
	$headers .= "Reply To: $visitor_email \r\n ";

	mail($to,$email_subject,$email_body,$headers);

	header("Location : index.html");



?>