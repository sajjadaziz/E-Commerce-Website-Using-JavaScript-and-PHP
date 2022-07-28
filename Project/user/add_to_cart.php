<?php
class add_to_cart{
	function addProduct($product_id, $quantity){
		$_SESSION['cart'][$product_id]['quantity']=$quantity;
	}
	function updateProduct($product_id, $quantity){
		if(isset($_SESSION['cart'][$product_id])){
			$_SESSION['cart'][$product_id]['quantity']=$quantity;
		}
	}
	function removeProduct($product_id){
		if(isset($_SESSION['cart'][$product_id])){
			unset($_SESSION['cart'][$product_id]);
		}
	}
	function emptyProduct(){
		unset($_SESSION['cart']);
	}
	function totalProduct(){
		if(isset($_SESSION['cart'])){
			return count($_SESSION['cart']);
		}else{
			return 0;
		}
	}
}
?>