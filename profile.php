<?php
session_start();
include("includes/connection.php");

if(!isset($_SESSION['user_email'])){
	header("location: login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<?php
		$user = $_SESSION['user_email'];
		$get_user = "SELECT * from users where user_email = '$user'";
		$run_user = mysqli_query($con, $get_user);
		$row = mysqli_fetch_array($run_user);
		if($row){
			$user_name = $row['user_name']; 
		}
	?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo "$user_name"; ?></title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style>
  #cover-img{
    height: 400px;width:100%;
  }
  #profile-img{
    top: 160px;
    left: 40px;
    position: absolute;
  }
  #update_profile{
    position: relative;
    top: 13px;
    cursor:pointer;
    height: 40px;
    left:-5px;
    border-radius: 5px;
    transform: translate(-50%;-50%);
    background-color: rgba(0,0,0,0.5);
    color:#FFFFFF;
  }
  #update_profile:hover{
    background-color: rgba(0,0,0,1);
  }
  #button_profile{
    position: absolute;
    top:13px;
    width: 150px;
    height: 40px;
    left: 100px;
    cursor: pointer;
    transform: translate(-50%;-50%);
  }

  label{
  padding:7px;
  display: table;
  color:red;
}

input[type='file']{
  display: none;
}

ul li{
  list-style: none;
}


 

  
</style>
<body style="background-color: #eee">
    <?php
        $user = $_SESSION['user_email'];

        $get_user = "SELECT * from users where user_email='$user' and status=1";
        $run_user = mysqli_query($con, $get_user);
                    
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
        $since = $row['user_reg_date'];
    ?>
    
    
<div class="container">
    <div class="main-body">
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
              <li class="ml-auto">        
                <div class="btn-group">
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Setting
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href='edit_profile.php?<?php echo"user_id=$user_id"?>'>Edit Profile</a>
                      <a class="dropdown-item" href='edit_password.php?<?php echo"user_id=$user_id"?>'>Change Password</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                  </div>
              </li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card" style="background-color: #eee; border: none;">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="<?php echo"$user_avatar"?>" alt="Admin" class="rounded-circle" width="150" 
                    height='150' style='object-fit: cover;'>
                    <div id='profile-img'>  
                      <form action='profile.php?u_id="$user_id"' method='post' enctype='multipart/form-data'>
                        <label id='update_profile'> Select Avatar
                        <input type='file' name='u_image' size='60' />
                        </label><br><br>
                        <button id='button_profile' name='update' class='btn btn-info'>Update Avatar</button>
                      </form>
                    </div>
<?php
  if(isset($_POST['update'])){
    $u_image = $_FILES['u_image']['name'];
    $image_temp = $_FILES['u_image']['tmp_name'];
    $random_num = rand(1,100);
      if($u_image==''){
        echo"<script>alert('Please Select Your Cover Imgae')</script>";
        echo"<script>window.open('profile.php?u_id=$user_id','_self')</script>";
        exit();
      }
      else{
        move_uploaded_file($image_temp, "avatar/$u_image.$random_num");
        $update = "update users set user_avatar='avatar/$u_image.$random_num' where user_id='$user_id'";
        $run = mysqli_query($con, $update);

        if($run){
          echo"<script>alert('Your Profile Updated')</script>";
          echo"<script>window.open('profile.php?u_id=$user_id','_self')</script>";
              
        }
      }
  }  
?>
<br><br>
                    <div class="mt-3">
                      <h3><?php echo "$first_name $last_name";?></h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8 mt-3">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">User Name:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo "$user_name";?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo "$user_email";?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo "0$user_phone";?>
                    </div>
                  </div>
                  <hr>
                 
                 <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo "$user_gender";?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Country</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo "$user_country";?>
                    </div>
                  </div>
                  <hr>
                   <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Birthday</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo "$user_birthday";?>
                    </div>
                  </div>
                  <hr>
                   <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Member Since</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo "$since";?>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>

<footer class="bg-gray text-center text-lg-start" style="position:absolute;
   bottom:0; width: 100%">
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3 mt-5">© 2021 Copyright:
      <a href="#">GOOGLE PLAY</a>
    </div>
  <!-- Copyright -->
</footer> 

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>