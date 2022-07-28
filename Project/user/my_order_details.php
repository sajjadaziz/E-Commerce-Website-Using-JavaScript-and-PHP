<?php
require('header.php');
require('connection.php');
require('functions.php');
if(!isset($_SESSION['user_login'])){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
$order_id=get_safe_value($con, $_GET['order_id']);
?>
<div class="small-conatiner cart-page">
    <table>
        <thead>
            <tr>
                <th class="product-thumbnail">Product</th>
                <th class="product-name">Product Name</th>
                <th class="product-price">Price</th>
                <th class="product-quantity">Quantity</th>
                <th class="product-subtotal">Total Price</th>
            </tr>
        </thead>
        <tbody>
			<?php
            $total_amount = 0;
            $email=$_SESSION['user_email'];
            $res = mysqli_query($con, "select * from account where email = '$email'");
            $row = mysqli_fetch_assoc($res);
            $user_id = $row['id'];
            $res = mysqli_query($con, "select distinct(od.id), od.*, p.product_name, p.image from order_details od, products p, orders o where od.order_id = '$order_id' and o.user_id = '$user_id' and od.product_id = p.product_id");
            while($row = mysqli_fetch_assoc($res)){
                $total_amount=$total_amount+($row['quantity']*$row['price']);?>
			<tr>
                <td><a href="#"><img src="../images/<?php echo $row['image']?>"/></a></td>
				<td><?php echo $row['product_name']?></td>
				<td><?php echo 'Rs.'.$row['price']?></td>
				<td><?php echo $row['quantity']?></td>
				<td><?php echo 'Rs.'.$row['quantity']*$row['price']?></td>
			</tr>
			<?php }?>
            <tr>
				<td colspan="3"></td>
				<td>Total Amount</td>
				<td><?php echo 'Rs.'.$total_amount?></td>
            </tr>
        </tbody>
    </table>
<?php
require('footer.php');
?>