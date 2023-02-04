<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Forgot Password</title>
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

		#reset_password{
			width: 150px;
			border-radius: 30px;
			color: white;
			background-color: blue;
			padding-top: -5px;
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
		
	

		.fab{
			font-size:30px;
		}

		input{
			border-radius: 20px;
			width: 250px;
			border: 1px solid;
		}

 	</style>	
</head>


<body>
	<div class="col-lg-12">
			<form action="" method="post">
			<table class="table1">
				<tr>
					<td ><a href="main.php"><img src="images/google-play-logo.png" alt="" width="300px"></a></td>
				</tr>

				<tr>
					<td><input type="text" name="email" id="email" placeholder="Enter Your Email"></td>
				</tr>

				<tr>
					<td ><button id="forgot_password" name="forgot_password" >Send Email</button></td>
					<?php include("includes/check_forgot_password.php"); ?>
				</tr>
				
			</form>
	</div>
</body>
</html>