<?php
session_start();
include("connection.php");
	if (isset($_POST['login'])) {

		$email = $con->real_escape_string($_POST['email']);
		$pass = $con->real_escape_string($_POST['pass']);
		$msg="";

		if ($email == "" || $pass == ""){
			$msg="Please check your inputs!";
			echo $msg;
		}
		else {
			$sql = $con->query("SELECT user_id, user_pass, status FROM users WHERE user_email='$email'");
			if ($sql->num_rows > 0) {
                $data = $sql->fetch_array();
                if (password_verify($pass, $data['user_pass'])) {
                    if ($data['status'] == 0)
	                	echo"Please verify your email!";
                    else {
                    	$insert = "insert into reset_password(user_email, token, expire_on)
                    	values('$email','','0')";
                    	$_SESSION["user_email"] = $email;
                    	$query = mysqli_query($con, $insert);
	                    echo "<script>window.open('http://localhost/Google_Play/home.php','_self')</script>";
                    }
                } else
	                echo"Please check your inputs!";
			} else {
				$msg="Please check your inputs!";
				echo $msg;
			}
		}
	}
?>
