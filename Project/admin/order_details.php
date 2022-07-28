<?php
require('header.php');
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
            if(isset($_GET['order_id']) && $_GET['order_id']!='')
            {
                $user_id = get_safe_value($con, $_GET['order_id']);
            }
            $res = mysqli_query($con, "select distinct(od.id), od.*, p.product_name, p.image from order_details od, products p, orders o where od.order_id = '$order_id' and od.product_id = p.product_id");
            while($row = mysqli_fetch_assoc($res)){
                $total_amount=$total_amount+($row['quantity']*$row['price']);?>
			<tr>
                <td><a href="#"><img src="../images/<?php echo $row['image']?>"/></a></td>
				<td><?php echo $row['product_name']?></td>
				<td><?php echo $row['price']?></td>
				<td><?php echo $row['quantity']?></td>
				<td><?php echo $row['quantity']*$row['price']?></td>
			</tr>
			<?php }?>
            <tr>
				<td colspan="3"></td>
				<td>Total Amount</td>
				<td><?php echo $total_amount?></td>
            </tr>
        </tbody>
    </table>
    <?php
    $res = mysqli_query($con, "select o.*, os.status from orders o, order_status os where o.id = '$order_id' and os.id = o.order_status");
    $row = mysqli_fetch_assoc($res);
    ?>
    <h3>Addres : <?php echo $row['address']; echo ', '.$row['city']; echo ', '.$row['pincode'].'.'?></h3><br>
    <h3>Order Status</h3><br>
    <form action="" method="post">
        <select style="width: 25rem; height: 2.5rem;" name="stat" id="stat">
            <?php
            echo "<option selected value=".$row['id'].">".$row['status']."</option>";
            $x = $row['order_status'];
            $res2 = mysqli_query($con, "select * from order_status where id != '$x'");
            while($row2 = mysqli_fetch_assoc($res2))
            {
                echo "<option value=".$row2['id'].">".$row2['status']."</option>";
            }?>
        </select>
        <br><a href=""><button style="width: 25rem;" type="submit" name = "submit" class="btn">Update</button></a>
    </form>
    <?php
    if(isset($_POST['submit']) && (!empty($_POST['stat'])))
    {
        $status = $_POST['stat'];
        $x = $row['id'];
        mysqli_query($con, "update orders set order_status='$status' where id = '$x'");
        header('location:orders.php');
        die();
    }?>