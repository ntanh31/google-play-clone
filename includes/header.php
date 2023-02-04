<?php
include("connection.php");
include("functions.php");
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  	<div class="container-fluid">
       	<a class="navbar-brand" href="home.php"><img src="images/google-play-logo.png" alt="" width="200px" style="" /></a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>
  	<div class="collapse navbar-collapse" id="navbarText">
    	<ul class="navbar-nav" style="width: 100%;">
      		<li class="nav-item active">
      			<form action="search.php" method="get">
          		<div class="input-group">
            		<input type="text" name="str" class="form-control" placeholder="Search" />
            		<div class="input-group-append">
                		<button class="btn btn-secondary" type="submit">
                    	<i class="fa fa-search"></i>
                		</button>
            		</div>
        		</div>
        		</form>
      		</li>
      	</ul>

    	<span class="navbar-text">
    		<?php
    			if(isset($_SESSION['user_email'])){
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
				}
				?>
			<a href='profile.php?<?php echo"user_name=$user_name"?>'><img src="<?php echo"$user_avatar"?>" class="rounded-circle" width="70px;" height="70px" style="float:right;object-fit: cover;"></a>

			<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span><i class='glyphicon glyphicon-chevron-down'></i></span>
				<li style="text-align: center; list-style: none; font-size: 25px; margin-top: 65px;"><?php echo"$first_name $last_name"?></li>
			</a>
					<li class='dropdown' style='list-style: none;'>
						<ul class='dropdown-menu'>
							<li style="text-align: center;">
								<a name='edit' href='edit_profile.php?<?php echo"user_id=$user_id"?>'>Edit Account</a>
							</li>
							<hr>
							<li style="text-align: center;">
								<a href='logout.php'>Logout</a>
							</li>
						</ul>
					</li>
     	</span>
  	</div>
  	</div>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
