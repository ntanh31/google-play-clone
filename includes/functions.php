<?php
function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}

function get_safe_value($con,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($con,$str);
	}
}

function get_type($con,$cat_id=''){
	$sql="select DISTINCT products.type from products,categories where products.categories_id=$cat_id";
	$res=mysqli_query($con,$sql);
	$data=array();
	while($row=mysqli_fetch_assoc($res)){
		$data[]=$row;
	}
	return $data;
}

function get_product($con,$limit='',$cat_id='',$product_id='',$search_str='',$sort_order='',$is_best_seller='',$is_recommended='',$type=''){
	$sql="select products.*,categories.categories from products,categories where products.status=1 ";
	if($cat_id!=''){
		$sql.=" and products.categories_id=$cat_id ";
	}
	if($product_id!=''){
		$sql.=" and products.id=$product_id ";
	}
	if($is_best_seller!=''){
		$sql.=" and products.best_seller=1 ";
	}
	if($is_recommended!=''){
		$sql.=" and products.recommend=1";
	}
	if($type!=''){
		$sql.=" and products.type='$type' ";
	}
	$sql.=" and products.categories_id=categories.id ";
	if($search_str!=''){
		$sql.=" and (products.name like '%$search_str%' or products.type like '%$search_str%') ";
	}
	if($sort_order!=''){
		$sql.=$sort_order;
	}else{
		$sql.=" order by products.id asc ";
	}
	if($limit!=''){
		$sql.=" limit $limit";
	}
	
	$res=mysqli_query($con,$sql);
	$data=array();
	while($row=mysqli_fetch_assoc($res)){
		$data[]=$row;
	}
	return $data;
}

?>