<?php
	
$name = $_POST['name'];
$companyName = $_POST['companyName'];
$guests = $_POST['guests'];
$date = $_POST['date'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$where = $_POST['where'];
$know = $_POST['know'];
	
// create email body and send it	
$to = 'joeldelane@gmail.com'; // PUT YOUR EMAIL ADDRESS HERE
$email_subject = "Christmas Social Contact Form:  $name"; // EDIT THE EMAIL SUBJECT LINE HERE
$email_body = "You have received a new message from your the contact form.\n\n"."Here are the details:\n\nName: $name\n\nCompany name: $companyName\n\nNumber of guests: $guests\n\nPrefered date: $date\n\nPhone: $phone\n\nEmail: $email\n\nWhere was your xmas party held last year?: $where\n\nAnything else?: $know";
$headers = "From: joeldelane@gmail.com\n";
$headers .= "Reply-To: $email";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>