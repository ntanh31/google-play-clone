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


if(!isset($_GET['id']) && $_GET['id']!=''){
  ?>
  <script>
  window.location.href='index.php';
  </script>
  <?php
}

$cat_id=mysqli_real_escape_string($con,$_GET['id']);
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
  <?php
              $get_type=get_type($con, $cat_id);
              foreach($get_type as $list){
              ?>
       <div class="row ml-5 mr-2 mt-5 mb-3">
            <div class="col-6">
                    <a href="#" style="text-decoration: none; color: black;"><h2><?php echo $list['type']?></h2></a>
            </div> 
       </div> 

       <div class="row ml-5 mr-2 ">
        <?php
              $get_product = get_product($con,'',$cat_id,'','','','','',$list['type'],'');
              foreach($get_product as $list){
              ?>
        <div class='col-md-2 col-7 con-sm-7 ml-4 mb-5'>
            <a href="product.php?id=<?php echo $list['id']?>">
            <div class="card card-product mb-3">
                      <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="Card image cap" class="card-img-top">
                      <div class="card-body">
                        <h5 title="<?php echo $list['name']?>" class="card-title"><?php echo $list['name']?></h5>

                        <p title="<?php echo $list['type']?>" class="card-text"><?php echo $list['type']?></p>
                        <p class="card-price"><?php echo $list['price']?> VND</p>
                        <p style='font-size: 15px;'><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                      </div>
            </div>
            </a>
          </div>
              <?php } ?>
      </div> 
       <?php } ?>
    <div class="footer-copyright text-center py-3 mt-5">© 2021 Copyright:
      <a href="#">GOOGLE PLAY</a>
    </div>
</div>

</body>
</html>