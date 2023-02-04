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
		$exp = time() + 3600*24;
		$sql = mysqli_query($con,"SELECT id FROM reset_password WHERE user_email='$email' AND token='$token' AND expire_on<$exp");

		if ($sql->num_rows > 0) {
			mysqli_query($con,"UPDATE reset_password SET expire_on=0, token='' WHERE user_email='$email'");
			echo "<script>window.open('change_password.php','_self')</script>";
		} else
			redirect();
	}
?>