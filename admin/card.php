<?php
require('header.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$code=get_safe_value($con,$_GET['code']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update card set status='$status' where code='$code'";
		mysqli_query($con,$update_status_sql);
	}
	
	if($type=='delete'){
		$code=get_safe_value($con,$_GET['code']);
		$delete_sql="delete from card where code='$code'";
		mysqli_query($con,$delete_sql);
	}
}


$sql1="select * from card";
$res1=mysqli_query($con,$sql1);

?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Cards </h4>
				   <h4 class="box-link"><a href="manage_card.php">Add Card</a> </h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th width="34%">Card Code</th>
							   <th width="33%">Price</th>
							   <th width="33%"></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							while($row=mysqli_fetch_assoc($res1)){?>
							<tr>
							
							   <td><?php echo $row['code']?></td>
							   <td><?php echo $row['price']?> VND</td>

							   <td>
								<?php
								if($row['status']==1){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&code=".$row['code']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=active&code=".$row['code']."'>Deactive</a></span>&nbsp;";
								}
								
								echo "<span class='badge badge-delete'><a href='?type=delete&code=".$row['code']."'>Delete</a></span>";
								
								?>
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