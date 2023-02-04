<?php
require('header.php');
$price='';
$msg='';
if(isset($_GET['code']) && $_GET['code']!=''){
	$code=get_safe_value($con,$_GET['code']);
	$res=mysqli_query($con,"select * from card where card='$card'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories=$row['categories'];
	}else{
		header('location:categories.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$price=get_safe_value($con,$_POST['price']);
	$get_code = create_card($price);
	
	mysqli_query($con,"insert into card(code,price,status) values('$get_code','$price',1)");
	header('location:card.php');
	die();
	
}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Categories</strong><small> Form</small></div>
                        <form method="post">
							<div class="card-body card-block">
							   <div class="form-group">
									<label for="categories" class=" form-control-label">Price</label>
									<input type="text" name="price" placeholder="Enter Price" class="form-control" required value="<?php echo $price?>">
								</div>
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
require('footer.php');
?>