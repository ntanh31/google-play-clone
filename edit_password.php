<?php
session_start();
$con = mysqli_connect("localhost", "root","","google_play");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Edit Password</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	h1 {
    margin-bottom: 40px
}

label {
    color: #333
}

.btn-send {
    font-weight: 300;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    width: 80%;
    margin-left: 3px
}

.help-block.with-errors {
    color: #ff5050;
    margin-top: 5px
}

.card {
    margin-left: 10px;
    margin-right: 10px
}

.filed-error{
    color: red;
}
</style>

<body>
	<div class="container"> 
		<div class=" text-center mt-5 ">
        	<img src="images/google-play-logo.png" alt="" width="30%">
    	</div>
    <div class="row ">
    	<?php
					$user = $_SESSION['user_email'];
					$get_user = "SELECT * from users where user_email='$user' and status=1";
					$run_user = mysqli_query($con, $get_user);
					$resultcheck = mysqli_num_rows($run_user);
					$row = mysqli_fetch_array($run_user);
						$user_pass = $row['user_pass'];
		?>

        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container">
                        <form id="contact-form" role="form" method="post" action="edit_password.php">
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">New Password</label> <input id="form_name" type="password" name="new_pass" class="form-control" required="required" data-error="Firstname is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_lastname">Confirm Password *</label> <input id="form_lastname" type="password" name="renew_pass" class="form-control" required="required" data-error="Lastname is required."> </div>
                                    </div>
                                </div>
                               
                                <div class="row">
                                    <div class="col-md-12"> 
                                    	<center><button id="edit" class="btn btn-success btn-send pt-2 btn-block" name="edit">Edit</button></center>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <center class="filed-error"><?php include("includes/insert_edit_pass.php");?></center>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- /.8 -->
        </div> <!-- /.row-->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>