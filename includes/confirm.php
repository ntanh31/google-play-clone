<?php
include("connection.php");

	function redirect() {
		header('Location: signup.php');
		exit();
	}
	
	if (!isset($_GET['user_email']) || !isset($_GET['token'])) {
		redirect();
	} 

	else {
		$email =  mysqli_real_escape_string($con, $_GET['user_email']); 
		$token =  mysqli_real_escape_string($con, $_GET['token']); 

		$sql = mysqli_query($con,"SELECT user_id FROM users WHERE user_email='$email' AND token='$token' AND status=0");

		if ($sql->num_rows > 0) {
			mysqli_query($con,"UPDATE users SET status=1, token='' WHERE user_email='$email'");
			echo "<script>window.open('http://localhost/Google_Play/login.php','_self')</script>";
		} else
			redirect();
	}
?>