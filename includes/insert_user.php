<?php
include("connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


	if(isset($_POST['sign_up'])){

		$first_name = htmlentities(mysqli_real_escape_string($con,$_POST['first_name']));
		$last_name = htmlentities(mysqli_real_escape_string($con,$_POST['last_name']));
		$pass = htmlentities(mysqli_real_escape_string($con,$_POST['u_pass']));
		$pass = password_hash($pass, PASSWORD_DEFAULT);
		$email = htmlentities(mysqli_real_escape_string($con,$_POST['u_email']));
		$phone = htmlentities(mysqli_real_escape_string($con,$_POST['u_phone']));
		$country = htmlentities(mysqli_real_escape_string($con,$_POST['u_country']));
		$gender = htmlentities(mysqli_real_escape_string($con,$_POST['u_gender']));
		$birthday = htmlentities(mysqli_real_escape_string($con,$_POST['u_birthday']));
		$status = 0;
		$newgid = sprintf('%05d', rand(0, 999999));

		$username = strtolower($first_name . "_" . $last_name . "_" . $newgid);
		$check_username_query = "select user_name from users where user_email='$email'";
		$run_username = mysqli_query($con, $check_username_query);

		if(strlen($pass) <9 ){
			echo"<script>alert('Password should be minimum 9 characters!')</script>";
			exit();
		}

		$check_email = "select user_email from users where user_email = '$email'";
		$run_email = mysqli_query($con, $check_email);
		$check = mysqli_num_rows($run_email);

		if($check == 1){
			echo "<script>alert('Email already exist, Please try using another email')</script>";
			echo "<script>window.open('signup.php', '_self')</script>";
			exit();
		}

		$token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9asdasdjasdasdlaskdSKDJASKDJASKD895454234562!$()*/';
		$token = str_shuffle($token);
		$token = substr($token,0,10);

		$insert = "insert into users (f_name,l_name,user_name,user_pass,user_email,user_country,user_phone, user_gender,user_birthday,user_avatar,user_reg_date,token,status)
		values('$first_name','$last_name','$username','$pass','$email','$country',$phone,'$gender','$birthday','avatar/avatar.png',NOW(),'$token','$status')";

		$query = mysqli_query($con, $insert);

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
                    <a href='http://localhost/Google_Play/includes/confirm.php?user_email=$email&token=$token'>Click Here</a>
                ";


			    $mail->send();
			    echo "<script>alert('Please Check Your Email To Verify')</script>";
			} catch (Exception $e) {
			    echo "<script>alert('Something wrong happened! Please try again!'')</script>";
			}
    	}

		else{
			echo "<script>alert('Registration failed, please try again!')</script>";
			echo "<script>window.open('http://localhost/Google_Play/signup.php', '_self')</script>";
		}
	}
?>