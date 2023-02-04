<?php
include("connection.php");
	if(isset($_POST['edit'])){
		$user = $_SESSION['user_email'];
		$new_pass = htmlentities(mysqli_real_escape_string($con,$_POST['new_pass']));
		$renew_pass = htmlentities(mysqli_real_escape_string($con,$_POST['renew_pass']));
		$number = preg_match('@[0-9]@', $new_pass);
		$uppercase = preg_match('@[A-Z]@', $new_pass);
		$lowercase = preg_match('@[a-z]@', $new_pass);
		$specialChars = preg_match('@[^\w]@', $new_pass);
		
		if(strlen($new_pass) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
 		echo "Password must be at least 8 characters and must contain at least one number, one A-Z, one a-z and one special character.";
		}
		else if($new_pass != $renew_pass){
			echo "Confirm password is not correct";
		}

		else{
			$new_pass= password_hash($new_pass, PASSWORD_DEFAULT);
			$update = "UPDATE users SET user_pass='$new_pass' WHERE user_email='$user'";
		
			$query = mysqli_query($con, $update);

			if($query){
				echo"<script>alert('Your password change successfully')</script>";
				echo "<script>window.open('profile.php','_self')</script>";
			}
		}
		
}
?>