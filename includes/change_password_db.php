<?php
include("connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


	if(isset($_POST['change_password'])){

		$email = htmlentities(mysqli_real_escape_string($con,$_POST['email']));
		$pass = htmlentities(mysqli_real_escape_string($con,$_POST['pass']));
		$re_pass = htmlentities(mysqli_real_escape_string($con,$_POST['re_pass']));
		$number = preg_match('@[0-9]@', $pass);
		$uppercase = preg_match('@[A-Z]@', $pass);
		$lowercase = preg_match('@[a-z]@', $pass);
		$specialChars = preg_match('@[^\w]@', $pass);

		$check_email = "select user_email from users where user_email = '$email'";
		$run_email = mysqli_query($con, $check_email);
		$check = mysqli_num_rows($run_email); 

		if($check == 0){
			echo "<script>alert('Email is not existed, Please sign up')</script>";
			echo "<script>window.open('signup.php', '_self')</script>";
			exit();
		}

		if(strlen($email) == 0){
			echo"<script>alert('Please Enter Your Email')</script>";
			exit();
		}

		if(strlen($pass) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
 		echo "Password must be at least 8 characters and must contain at least one number, one A-Z, one a-z and one special character.";
		}
		else if($pass != $re_pass){
			echo "Confirm password is not correct";
		}

		$pass = password_hash($pass, PASSWORD_DEFAULT);
		$update="UPDATE users SET user_pass='$pass' where user_email='$email'";


		$query = mysqli_query($con, $update);

		if($query){
			echo"<script>alert('Password change successfully')</script>";
			echo "<script>window.open('login.php','_self')</script>";
		}

		else{
			echo"<script>alert('Password change unsuccessfully')</script>";
			exit();
		}
		
	}

?>