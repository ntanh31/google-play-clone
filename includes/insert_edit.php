<?php
include("connection.php");
	if(isset($_GET['edit'])){
		$user = $_SESSION['user_email'];
		$new_fname = htmlentities(mysqli_real_escape_string($con,$_GET['fname']));
		$new_lname = htmlentities(mysqli_real_escape_string($con,$_GET['lname']));
		$new_phone = htmlentities(mysqli_real_escape_string($con,$_GET['phone']));
		$new_country = htmlentities(mysqli_real_escape_string($con,$_GET['country']));
		$new_gender = htmlentities(mysqli_real_escape_string($con,$_GET['gender']));
		$new_birthday = htmlentities(mysqli_real_escape_string($con,$_GET['birthday']));
		$new_username = htmlentities(mysqli_real_escape_string($con,$_GET['username']));

		$sql = mysqli_query($con,"SELECT user_name from users where user_email='$user'");
		$row = mysqli_fetch_array($sql);

		$old_username = $row['user_name'];

		if($old_username==$new_username){
			$old_username=$new_username;
		}

		else{
			$check_username =mysqli_query($con,"select user_name from users");
			while($row1=mysqli_fetch_array($check_username)){
				if($new_username==$row1['user_name']){
				echo"<script>alert('Your username has been existed')</script>";
				exit();
			}
			else{
				if (!preg_match('/^[a-z\d_]{5,20}$/i', $new_username)) {
					echo"<script>alert('Your username must not include special character')</script>";
				}
			}
			}
			
		}

		$update = "UPDATE users SET user_name='$new_username', f_name='$new_fname', l_name='$new_lname', user_phone='$new_phone', user_country='$new_country', user_gender='$new_gender', user_birthday='$new_birthday' WHERE user_id='$user_id'";
		
		$query = mysqli_query($con, $update);

		if($query){
			echo"<script>alert('Your profile change successfully')</script>";
			echo "<script>window.open('profile.php','_self')</script>";
		}
}

	
?>