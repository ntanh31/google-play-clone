<?php
require('header.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from users where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select count(*) as total from users where status='1'";
$res=mysqli_query($con,$sql);
$values = mysqli_fetch_assoc($res); 
$num_rows = $values['total']; 

$sql1="select count(*) as total1 from categories where status='1'";
$res1=mysqli_query($con,$sql1);
$values1 = mysqli_fetch_assoc($res1); 
$num_rows1 = $values1['total1']; 

$sql2="SELECT categories.id as id, categories.categories, COUNT(*) as number from products, categories where products.categories_id=categories.id and products.status=1  group by categories.categories  order by products.id asc";
$res2=mysqli_query($con,$sql2);

?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Overview </h4>
				</div>
				<div class="card-body--">

				   <div class="table-stats order-table ov-h">
				   	<table class="table">
				   		 <thead>
							<tr>
							   <th><b>Number of Users</b></th>
							   <th></th>

							</tr>
						 </thead>
						 <tbody>
						 	<tr><td><?php echo $num_rows; ?></td>
						 		<td></td></tr>
						 </tbody>
				   	</table>
					  <table class="table ">
						 <thead>
							<tr>
							   <th>Categories</th>
							   <th>Name</th>
							   <th>Number of Product</th>
							</tr>
						 </thead>
						 <tbody>	
						 	<?php
								while($row=mysqli_fetch_assoc($res2)){?>
							<tr>

							   <td><?php echo $row['id']?></td>
							   <td>
							   <?php echo $row['categories']?>
							   </td>
							   <td>
							  	<?php echo $row['number']?>
							   </td>
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.php');
?>