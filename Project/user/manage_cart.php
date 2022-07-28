<?php
require('connection.php');
require('functions.php');
require('add_to_cart.php');
$product_id=get_safe_value($con,$_POST['product_id']);
$quantity=get_safe_value($con,$_POST['quantity']);
$type=get_safe_value($con,$_POST['type']);

$obj=new add_to_cart();

if($type=='add'){
	$obj->addProduct($product_id,$quantity);
}

if($type=='remove'){
	$obj->removeProduct($product_id);
}

if($type=='update'){
	$obj->updateProduct($product_id,$quantity);
}

echo $obj->totalProduct();
?>