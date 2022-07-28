<?php
require('header.php');
require('connection.php');
require('functions.php');
if(!isset($_SESSION['user_login']))
{
    header('location:login.php');
    die();
}
if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
	?>
	<script>
		window.location.href='index.php';
	</script>
	<?php
}
$cart_total=0;
if(isset($_POST['isubmit']))
{
    $address = get_safe_value($con, $_POST['address']);
    $city = get_safe_value($con, $_POST['city']);
    $pincode = get_safe_value($con, $_POST['pincode']);
    $payment_type = get_safe_value($con, $_POST['payment_type']);
    $email=$_SESSION['user_email'];
    $res = mysqli_query($con, "select * from account where email = '$email'");
    $row = mysqli_fetch_assoc($res);
    $user_id = $row['id'];
    foreach($_SESSION['cart'] as $key=>$val)
    {
        $res = mysqli_query($con, "select * from products where product_id = '$key'");
        $row = mysqli_fetch_assoc($res);
        $product_name = $row['product_name'];
        $price = $row['price'];
        $image = $row['image'];
        $quantity=$val['quantity'];
        $cart_total=$cart_total+($price*$quantity);
    }
    $total_amount=$cart_total;
	$payment_status='success';
	if($payment_type=='cod'){
		$payment_status='pending';
	}
	$order_status='1';
	$added_on=date('Y-m-d h:i:s');
	mysqli_query($con,"insert into orders(user_id, address, city,pincode, payment_type, total_amount, payment_status, order_status, added_on) values('$user_id', '$address', '$city', '$pincode', '$payment_type', '$total_amount','$payment_status','$order_status','$added_on')");
	$order_id=mysqli_insert_id($con);
	foreach($_SESSION['cart'] as $key=>$val)
    {
        $res = mysqli_query($con, "select * from products where product_id = '$key'");
        $row = mysqli_fetch_assoc($res);
        $price = $row['price'];
        $quantity=$val['quantity'];
		mysqli_query($con,"insert into order_details(order_id, product_id, quantity, price) values('$order_id', '$key', '$quantity', '$price')");
		mysqli_query($con,"update products set quantity = (quantity - '$quantity') where product_id = '$key'");
	}
	unset($_SESSION['cart']);
}
?>
<div class="row">
    <div class="col-2">
        <div style="width: 31.25rem;">
            <h2>ADDRESS INFORMATION</h2>
            <form method="post">
                <input type="text" name="address" placeholder="Enter your Address"required>
                <input type="text" name="city" placeholder="Enter your City/State Name"required>
                <input type="text" name="pincode" placeholder="Enter your Post/Zip Code" required>
                <h2>PAYMENT INFORMATION</h2>
                <select style="width: 25rem; height: 2.5rem;" name="payment_type" id="payment_type">
                    <option value="cod" selected>Cash on Delivery</option>
                    <option value="cod">Credit Card</option>
                </select>
                <button type="submit" class="btn" name="isubmit">Submit</button>
            </form>
        </div>
    </div>
    <div class="col-2">
        <div class="col-md-4">
            <div class="order-details" >
                <h5 class="order-details__title">Your Order</h5>
                <div class="order-details__item">
                    <?php
					$cart_total=0;
                    foreach($_SESSION['cart'] as $key=>$val)
                    {
                        $res = mysqli_query($con, "select * from products where product_id = '$key'");
                        $row = mysqli_fetch_assoc($res);
                        $product_name = $row['product_name'];
                        $price = $row['price'];
                        $image = $row['image'];
                        $quantity=$val['quantity'];
						$cart_total=$cart_total+($price*$quantity);
					?>
					<div class="single-item">
                        <div class="single-item__thumb">
                            <img style="height: 10.625rem;" src="../images/<?php echo $image?>"/>
                        </div>
                        <div class="single-item__content">
                            <a href="#"><?php echo $product_name?></a>
                            <span class="price"><?php echo $price*$quantity?></span>
                        </div>
                        <div class="single-item__remove">
                            <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="fas fa-trash-alt fa-lg"></i></a>
                        </div>
                    </div>
					<?php } ?>
                </div>
                <div class="ordre-details__total">
                    <h5>Order total</h5>
                    <span class="price"><?php echo $cart_total?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require('footer.php');
?>