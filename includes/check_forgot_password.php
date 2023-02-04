<?php
include("connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


	if(isset($_POST['forgot_password'])){

		$email = htmlentities(mysqli_real_escape_string($con,$_POST['email']));

		$check_email = "select user_email from reset_password where user_email = '$email'";
		$run_email = mysqli_query($con, $check_email);
		$check = mysqli_num_rows($run_email); 

		if($check == 0){
			echo "<script>alert('Email is not existed, Please sign up')</script>";
			echo "<script>window.open('signup.php', '_self')</script>";
			exit();
		}

		$token = 'dkalsjkLKAJKDAJSLDKJLASKlakkfdsji9i93204803klwJE389204UPsdoksd12164565989230jassjFIJSDIFdja*/';
		$token = str_shuffle($token);
		$token = substr($token,0,10);

		$exp = time() + 3600*24;

		$update = "UPDATE reset_password SET token='$token', expire_on='$exp' where user_email='$email'";
		
		$query = mysqli_query($con, $update);

		if($query){
		$mail = new PHPMailer(true);
			try {
		                
			    $mail->isSMTP();                                            //Send using SMTP
			    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			    $mail->Username   = 'tuan310801anh@gmail.com';                     //SMTP username
			    $mail->Password   = 'cepwqwwxyaszfveq';                               //SMTP password
			    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; 
			    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for 

			    //Recipients
			    $mail->setFrom('tuan310801anh@gmail.com', 'Handsome Admin');
			    $mail->addAddress($email, 'Pretty User');     //Add a recipient
			 
			    $mail->isHTML(true);                                  //Set email format to HTML
			    $mail->Subject = 'Here is the subject';
			    $mail->Body    = "Please click on the link below:<br><br>
                    <a href='http://localhost/Google_Play/change_password.php?user_email=$email&token=$token'>Click Here</a>
                ";
			    

			    $mail->send();
			    echo "<script>alert('Please Check Your Email To Verify')</script>";
			} catch (Exception $e) {
			    echo "<script>alert('Something wrong happened! Please try again!'')</script>";
			}
    	}

		else{
			echo "<script>alert('Registration failed, please try again!')</script>";
			echo "<script>window.open('signup.php', '_self')</script>";
		}
	}
?>


