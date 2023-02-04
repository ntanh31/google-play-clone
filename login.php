<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
  	<meta name=”viewport” content=”width=device-width, initial-scale=1.0″>
  	<script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>

 	<style type="text/css" media="screen">
 		#signup{
			width: 20%;
			padding: 0;
			border: none;
			background: none;
			color: black;
		}

		#login{
			width: 150px;
			border-radius: 30px;
			color: white;
			background-color: blue;
		}

		body {
  			font-family: "Trirong", serif;
  			background-color: #eee;
		}

		.table1{
			width: 350px;
			height: 350px;
			margin-top: 100px;
			vertical-align: middle;
			margin-left: auto;
			margin-right: auto;
			text-align: center;
			font-size: 15px;
			background-color: #fff;
			border-radius: 20px;
			border: none;
		}
		.table2{
			width: 350px;
			height: 100px;
			margin-top: 15px;
			vertical-align: middle;
			margin-left: auto;
			margin-right: auto;
			text-align: center;
			font-size: 15px;
			border: none;
			background-color: #fff;
			border-radius: 20px;
		}

		.td1{
			padding-top: 10px;
		}

		.fab{
			font-size:30px;
		}

		input{
			border-radius: 20px;
			width: 250px;
			border: 1px solid;
		}

		input[type=text]:focus, input[type=password]:focus {
			border-radius: 20px;
			width: 250px;
			border: 3px solid #58257b;
		}

		.filed-error{
			color: red;
			font-weight: bolder;
		}
 	</style>
</head>


<body>
	<div class="col-lg-12">
			<form action="" method="post">
			<table class="table1">
				<tr>
					<td><a href="index.php"><img src="images/google-play-logo.png" alt="" width="300px"></a></td>
				</tr>

				<tr>
					<td style="padding-top: 20px;"><input type="text" name="email" id="email" placeholder="Enter Your Username"></td>
				</tr>

				<tr>
					<td style="padding-top: 10px;"><input type="password" name="pass" id="pass" placeholder="Enter Your Password"></td>
				</tr>


				<tr>
					<td class="td1"><button id="login" name="login" >LOG IN</button></td>

				</tr>

				<tr>
					<td class="filed-error"><?php include("includes/check.php"); ?></td>
					<?php

					if (isset($_SESSION['user_email'])) {
						header("Location:./index.php");
					// echo $_SESSION['user_email'];
					}
					?>
				</tr>

				<tr>
					<td style="padding-top: 5px;"><a href="forgot_password.php">forgot password ?</a></td>
				</tr>
			</table>
			<table class="table2">
				<tr>
					<td>
						Already have an account?	<button id="signup" name="signup" >SIGN UP</button>
						<?php
							if(isset($_POST['signup'])){
								echo "<script>window.open('signup.php','_self')</script>";
							}
						?>
					</td>
				</tr>
				<tr>
					<td style="padding-top: 5px;">
						Signup with &nbsp;&nbsp;<a href= "#"><i class = "fab fa-facebook"></i>&nbsp;&nbsp;</a> <a href= "#"><i class = "fab fa-google"></i></a>
					</td>
				</tr>
			</table>

			</form>
	</div>


</body>
</html>