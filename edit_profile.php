<?php
session_start();
$con = mysqli_connect("localhost", "root","","google_play");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Edit Profile</title>
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
						$user_id = $row['user_id'];
						$user_name = $row['user_name'];
						$first_name = $row['f_name'];
						$last_name = $row['l_name'];
						$user_pass = $row['user_pass'];
						$user_email = $row['user_email'];
						$user_country = $row['user_country'];
						$user_phone = $row['user_phone'];
						$user_gender = $row['user_gender'];
						$user_birthday = $row['user_birthday'];
						$register_date = $row['user_reg_date'];
						$user_avatar = $row['user_avatar'];
		?>

        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container">
                        <form id="contact-form" role="form">
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">Firstname *</label> <input id="form_name" type="text" name="fname" class="form-control" value="<?php echo"$first_name"?>" required="required" data-error="Firstname is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_lastname">Lastname *</label> <input id="form_lastname" type="text" name="lname" class="form-control" value="<?php echo"$last_name"?>" required="required" data-error="Lastname is required."> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_username">Username *</label> <input id="form_username" type="text" name="username" class="form-control" value="<?php echo"$user_name"?>" required="required" data-error="Valid email is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_country">Country *</label> <select id="form_country" name="country" class="form-control" required="required" data-error="Please specify your need.">
												<option selected><?php echo"$user_country"?></option>
												<option>Vietnam</option>
												<option>USA</option>
												<option>India</option>
												<option>Japan</option>
												<option>UK</option>
												<option>France</option>
												<option>Germany</option>
                                            </select> 
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_email">Phone *</label> <input id="form_email" type="text" name="phone" class="form-control" value="<?php echo"$user_phone"?>" required="required" data-error="Valid email is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_gender">Gender *</label> <select id="form_gender" name="gender" class="form-control" required="required" data-error="Please specify your need.">
												<option selected><?php echo"$user_gender"?></option>
												<option>Male</option>
												<option>Female</option>
												<option>Other</option>
                                            </select> 
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"> <label for="form_birthday">Birthday *</label> <input id="form_birthday" type="date" name="birthday" class="form-control" value="<?php echo"$user_birthday"?>" required="required" data-error="Valid email is required."> </div>
                                    </div>
                                    <div class="col-md-12"> 
                                    	<center><button id="edit" class="btn btn-success btn-send pt-2 btn-block" name="edit">Edit</button></center>
                                    </div>
                                    <?php include("includes/insert_edit.php");?>
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