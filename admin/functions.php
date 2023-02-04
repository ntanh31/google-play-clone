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

function create_card($price=''){
	$code = '';
    $value = '';
    $price = (string)$price;
	if($price<100000){
		$value = substr($price, 0, 2);
		$value = "0".$value;
	}
	else{
		$value = substr($price, 0, 3);
	}
	$code.=$value;
    $temp = mt_rand(1000000,9999999);
    $temp = (string)$temp;
    
    $code.=$temp;
	return $code;
}	
?>