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
?>
<div class="small-conatiner cart-page">
    <table>
        <thead>
            <tr>
                <th class="product-thumbnail">Order ID</th>
                <th class="product-name">Order Date</th>
                <th class="product-price">Address</th>
                <th class="product-quantity">Payment Type</th>
                <th class="product-subtotal">Payment Status</th>
                <th class="product-remove">Order Status</th>
                <th class="product-remove">Details</th>
            </tr>
        </thead>
        <tbody>
			<?php
            $email=$_SESSION['user_email'];
            $res = mysqli_query($con, "select * from account where email = '$email'");
            $row = mysqli_fetch_assoc($res);
            $user_id = $row['id'];
            $res = mysqli_query($con, "select o.*, os.status as order_status from orders o, order_status os where o.user_id = '$user_id' and os.id = o.order_status order by o.id desc");
            while($row = mysqli_fetch_assoc($res))
            {?>
			<tr>
                <td><?php echo $row['id']?></td>
				<td><?php echo $row['added_on']?></td>
				<td>
                    <?php echo $row['address']?><br>
                    <?php echo $row['city']?><br>
                    <?php echo $row['pincode']?>
                </td>
				<td><?php echo $row['payment_type']?></td>
				<td><?php echo $row['payment_status']?></td>
				<td><?php echo $row['order_status']?></td>
                <?php
                echo "<td><a href='my_order_details.php?order_id=".$row['id']."'><button class='button' type='submit'>View Details</button></a></td>";?>
			</tr>
			<?php }?>
        </tbody>
    </table>
</div>
<?php
require('footer.php');
?>