<?php
require('header.php');
?>
<div class="small-conatiner cart-page">
    <div class="card-body">
        <h1 class="box-title">Orders</h1>
    </div>
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
            $res = mysqli_query($con, "select o.*, os.status as order_status_2 from orders o, order_status os where os.id = o.order_status order by o.id desc");
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
				<td><?php echo $row['order_status_2']?></td>
                <?php
                echo "<td><a href='order_details.php?order_id=".$row['id']."'><button class='button' type='submit'>View Details</button></a></td>";?>
			</tr>
			<?php }?>
        </tbody>
    </table>
</div>