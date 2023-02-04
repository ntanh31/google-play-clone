<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<style>
	body{
		overflow-x: hidden;
	}
	.main-content{
		width: 50%;
		height: 40%;
		margin: 10px auto;
		background-color: #fff;
		border: 2px solid #e6e6e6;
		padding: 40px 50px;
		border-radius: 20px;
	}
	.header{
		border: 0px solid #000;
		margin-bottom: 5px;
	}
	.well{
		background-color: #E4E4E4;
		padding-top: 20px;
	}
	#signup{
		width: 60%;
		border-radius: 30px;
	}

</style>

<script>
	function hideError(){
		let e = document.getElementById("error");
		e.style.display = 'none';
	}

	function hideError1(){
		let e = document.getElementById("error1");
		e.style.display = 'none';
	}

	function hideError2(){
		let e = document.getElementById("error2");
		e.style.display = 'none';
	}

	function displayError(message){
		let e = document.getElementById("error");
		e.style.display = '';
		e.innerHTML = message;
		e.style.color = red;
	}

	function displayError1(message){
		let e = document.getElementById("error1");
		e.style.display = '';
		e.innerHTML = message;
		e.style.color = red;
	}

	function displayError2(message){
		let e = document.getElementById("error2");
		e.style.display = '';
		e.innerHTML = message;
		e.style.color = red;
	}

	function checkInput(){
		try{
			let passBox = document.getElementById("password");
			let repassBox = document.getElementById("re_password");
			let passValue = passBox.value;
			let repassValue = repassBox.value;
			let strongRegex = "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})";

			if(passValue.length<8){
				displayError('Mật khẩu tối thiểu 8 ký tự');
				passBox.focus();
			}

			else if(passValue.length==0 && passValue.length<8) {
				displayError('Mật khẩu tối thiểu 8 ký tự');
				passBox.focus();
			}

			else if(!passValue.match(strongRegex)){
				displayError('Mật khẩu cần có A-Z, a-z, number and special character');
				passBox.focus();
			}

			else if(passValue != repassValue){
				displayError1("Mật khẩu viết lại không trùng khớp");
				repassBox.focus();
			}

			else{
				return true;
			}

			return false;
		}

		catch (e){
			return false;
		}
	}

	window.onload = function(){
		hideError();
		hideError1();
		hideError2();
	}

</script>


<body style="background-color: #E4E4E4;">

<div class="row">
	<div class="col-sm-12">
		<div class="well">
			<center><a href="signup.php"><img src="images/google-play-logo.png" alt="" width="300px"></a></center>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="main-content">
			<div class="header">
				<h3 style="text-align: center;"><strong>CREATE YOUR ACCOUNT</strong></h3>
				<hr>
			</div>

			<div class="l-part">
				<form action="signup.php" method="post">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input id="email" type="email" class="form-control" placeholder="Email" name="u_email" required="required">
					</div><br>

					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input id="password" type="password" class="form-control" placeholder="Password" name="u_pass"  required="required">
					</div><br>
					<p id="error" style="margin-top: -10px;margin-left: 40px;margin-bottom: 20px; color: red; font-weight: bold;">Error message will be here</p>

					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input id="re_password" type="password" class="form-control" placeholder="Rewrite Your Password" name="re_pass" required="required">
					</div><br>
					<p id="error1" style="margin-top: -10px;margin-left: 40px;margin-bottom: 20px; color: red; font-weight: bold;">Error message will be here</p>

					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
						<input type="text" class="form-control" placeholder="First Name" name="first_name" required="required">
					</div><br>

					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
						<input type="text" class="form-control" placeholder="Last Name" name="last_name" required="required">
					</div><br>

					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
						<input type="text" class="form-control input-md" name="u_phone" placeholder="Phone Number" required="required">
					</div><br>
					<p id="error2" style="margin-top: -10px;margin-left: 40px;margin-bottom: 20px; color: red; font-weight: bold;">Error message will be here</p>

					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
						<select class="form-control" name="u_country" required="required">
							<option disabled>Select Your Country</option>
							<option>Vietnam</option>
							<option>USA</option>
							<option>India</option>
							<option>Japan</option>
							<option>UK</option>
							<option>France</option>
							<option>Germany</option>
						</select>
					</div><br>

					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
						<select class="form-control input-md" name="u_gender" required="required">
							<option disabled>Select Your Gender</option>
							<option>Male</option>
							<option>Female</option>
							<option>Others</option>
						</select>
					</div><br>

					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						<input type="date" class="form-control input-md" name="u_birthday" required="required">
					</div><br>



					<a style="text-decoration: none;float: right;color: #187FAB;" data-toggle="tooltip" title="Signin" href="login.php">Already have an account?</a><br><br>

					<center><button id="signup" class="btn btn-info btn-lg" name="sign_up" onclick="return checkInput();">Signup</button></center>
					<?php include("includes/insert_user.php");?>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>