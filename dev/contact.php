<?php
		if(isset($_POST['name'])){
          $name=$_POST['name'];
        }if(isset($_POST['email'])){
          $email=$_POST['email'];
        }if(isset($_POST['companyName'])){
          $companyName=$_POST['companyName'];
        }if(isset($_POST['job'])){
          $job=$_POST['job'];
        }if(isset($_POST['guests'])){
          $guests=$_POST['guests'];
        }if(isset($_POST['date'])){
          $date=$_POST['date'];
        }if(isset($_POST['phone'])){
          $phone=$_POST['phone'];
        }if(isset($_POST['where'])){
          $where=$_POST['where'];
        }if(isset($_POST['know'])){
          $know=$_POST['know'];
        }if(isset($_POST['how'])){
          $know=$_POST['how'];
        }if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          header('Location: error.html');
          exit;
        }
        $secretKey = "6LdFXBsUAAAAAK4HDkcCgWd5ZQkfcNTvTl4bbMjI";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
          header('Location: error.html');
        } else {
        	$formcontent="Here are the details:\n\nName: $name\n\nCompany name: $companyName\n\nJob title: $job\n\nNumber of guests: $guests\n\nPreferred date: $date\n\nPhone: $phone\n\nEmail: $email\n\nWhere was your xmas party held last year?: $where\n\nAnything else?: $know\n\nHow did you find out about us?: $how";
			$recipient = "christmassocial@kinlondon.co.uk";
			$subject = "Christmas Social Contact Form";
			$mailheader = "From: $email \r\n";
			mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
          header('Location: thanks.html');
        }
?>

