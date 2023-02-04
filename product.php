<?php
session_start();
if(isset($_SESSION['user_email'])){
include("includes/header.php");
}
else{
  include("includes/header_index.php");
}

$cat_res=mysqli_query($con,"select * from categories where status=1 and id<=3 order by categories desc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
  $cat_arr[]=$row['id'];
}

$cat_res1=mysqli_query($con,"select * from categories where status=1 and id>3 order by categories desc");
$cat_arr1=array();
while($row1=mysqli_fetch_assoc($cat_res1)){
  $cat_arr1[]=$row1;
}

if(isset($_GET['id'])){
  $product_id=mysqli_real_escape_string($con,$_GET['id']);
  if($product_id>0){
    $get_product=get_product($con,'','',$product_id);
  }
  if(isset($_POST['submit'])){
    if(isset($_SESSION['user_email'])){
         $user=$_SESSION['user_email'];
          $comment=htmlentities(mysqli_real_escape_string($con, $_POST['comment']));
          $get_user = mysqli_query($con,"select * from users where user_email='$user'");
          $row = mysqli_fetch_array($get_user);
          $user_name=$row['user_name'];
          $user_avatar=$row['user_avatar'];
          $fname = $row['f_name'];
          $lname = $row['l_name'];
          $check= mysqli_query($con,"select user_name from comment where user_name='$user_name' and product_id='$product_id'");

          if($check !== false){
             $insert="insert into comment(product_id,user_email,user_name,fname,lname,user_avatar,content,time) values('$product_id','$user','$user_name','$fname','$lname','$user_avatar','$comment',NOW())";
              mysqli_query($con,$insert);
              echo "<script>alert('Comment Successfully')</script>";
          } 
    }
    else{
      echo "<script>alert('You need to login to comment')</script>";
    }
  }
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Google Play</title>
  <link rel="shortcut icon" href="https://e1.pngegg.com/pngimages/551/207/png-clipart-google-play-icon-logo-1024-google-playstore-icon-thumbnail.png" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
  <script src="main.js" type="text/javascript"></script>
</head>
<body style="background-color: #eee;">
	
<div class="sidebar">
  <a href="#" style="font-size: 18px;"><i class="fa fa-archive"></i>&emsp;Entertainment</a>
  <a href="categories.php?id=<?php echo $cat_arr[2]?>" style="font-size: 18px;"><i class="fa fa-list-ul" style="font-size: 20px;"></i>&emsp;Application</a>
  <a href="categories.php?id=<?php echo $cat_arr[0]?>" style="font-size: 18px;"><i class="fa fa-film" style="font-size: 20px;"></i>&emsp;Movie</a>
  <a href="categories.php?id=<?php echo $cat_arr[1]?>" style="font-size: 18px;"><i class="fa fa-book" style="font-size: 20px;"></i>&emsp;Book</a>
   <?php
    foreach($cat_arr1 as $list){
    ?>
      <a href="categories.php?id=<?php echo $list['id']?>" style="font-size: 18px;"><i class="  fa fa-server" style="font-size: 20px;"></i>&emsp;<?php echo $list['categories']?></a>
    <?php
    }
    ?>
</div>

<div class="content">
	<div class="row ml-5">
		<div class='col-md-8 col-7 con-sm-7' style="background-color:#fff; ">
			 <div class="row mb-3">
                      <img  src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>" alt="Card image cap" class="des_img">
                      <div class="card-body ml-5">
                        <h2 title="<?php echo $get_product['0']['name']?>" class="product_name1"><?php echo $get_product['0']['name']?></h2>
                        <p class="card-text"><?php echo $get_product['0']['type']?></p>
                        <p class="align-text-bottom"><?php echo $get_product['0']['price']?> VND</p>
                      </div>
            </div>

            <div class="row mt-5 ml-5 mr-5" >
            	<p class="card-text1"><?php echo $get_product['0']['description']?></p>
            </div>
            <div class="row container">
        <div class="col-md-12 ">
          <form action="product.php?id=<?php echo $product_id?>" method="post">
        	<h3><b>Reviews</b></h3>
        	<input type="hidden" name="demo_id" id="demo_id" value="1">
        <div class="col-md-12">
        <textarea class="form-control" rows="2" placeholder="Write your review here..." name="comment" id="remark" required></textarea><br>
        <p><button  class="btn btn-default btn-sm btn-info" id="srr_rating" name="submit">Submit</button></p>
        </div>
        </form>
        </div>

        <div class="col-md-12">
          <?php  
              $query = mysqli_query($con,"select * from comment where product_id='$product_id' order by time desc");
              while($row=mysqli_fetch_array($query)){
                  echo "<hr>";
                  echo "<img src=".$row['user_avatar']." width='70px' height='70px' class='rounded-circle' object-fit: cover;>"; 
                  echo"<b>";
                  echo "&emsp;";
                  echo $row['fname'];
                  echo "&nbsp;";
                  echo $row['lname'];
                  echo"</b>";
                  echo "<br>";
                  echo "<h5>";
                  echo "&emsp;&emsp;&emsp;&emsp;&ensp;";
                  echo $row['content'];
                  echo "</h5>";
                  echo "<br><br><br>";
                  echo"<i style='font-size:13px;'>";
                  echo"Comment at ";
                  echo $row['time'];
                  echo"</i>";
                  echo "<hr>";

              }
          ?>
        </div>
        </div><br>
		</div>

		<div class='col-md-4 col-7 con-sm-7 '>
			<h5>Similar Product</h5>
      <div class="row ml-2">
        <?php
              $number=mysqli_query($con,"select * from products where id='$product_id'");
              $values1 = mysqli_fetch_assoc($number); 
              $num_rows1 = $values1['type'];
              $type=mysqli_query($con,"select * from products where type='$num_rows1' order by RAND() LIMIT 1");
              $typerow = mysqli_fetch_assoc($type); 
              $random=$typerow['id'];
              $get_product=get_product($con,'','',$random,'','','','');
              foreach($get_product as $list){
        ?>
      <a href="product.php?id=<?php echo $list['id']?>">
            <div class="card-1 card-product-1 mb-3">
                      <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="Card image cap" class="card-img-top_pro">
                      <div class="card-body">
                        <h5 title="<?php echo $list['name']?>" class="card-title1"><?php echo $list['name']?></h5>
                        <p title="<?php echo $list['type']?>" class="card-text"><?php echo $list['type']?></p>
                        <p class="card-price"><?php echo $list['price']?> VND</p>
                        <p style='font-size: 15px;'><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                      </div>
            </div>
            </a>
          </div>
              <?php } ?>
		</div>
	</div>
  <div class="footer-copyright text-center py-3 mt-5">© 2021 Copyright:
      <a href="#">GOOGLE PLAY</a>
    </div>
</div>

</body>
</html>