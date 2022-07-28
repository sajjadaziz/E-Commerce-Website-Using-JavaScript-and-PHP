<?php
require('header.php');
require('connection.php');
require('functions.php');
?>
<div class="small-conatiner cart-page">
    <table>
        <thead>
            <tr>
                <th class="product-thumbnail">Product</th>
                <th class="product-name">Product Name</th>
                <th class="product-price">Price</th>
                <th class="product-quantity">Quantity</th>
                <th class="product-subtotal">Total</th>
                <th class="product-remove">Remove</th>
            </tr>
        </thead>
        <tbody>
			<?php
			if(isset($_SESSION['cart'])){
			foreach($_SESSION['cart'] as $key=>$val){
                $res = mysqli_query($con, "select * from products where product_id = '$key'");
                $row = mysqli_fetch_assoc($res);
                $product_name = $row['product_name'];
                $price = $row['price'];
                $image = $row['image'];
                $qty = $row['quantity'];
				$quantity=$val['quantity'];
			?>
			<tr>
                <td><a href="#"><img src="../images/<?php echo $image?>"/></a></td>
				<td><a href="#"><?php echo $product_name?></a></td>
				<td><?php echo $price?></td>
				<td><input type="number" min="1" max="<?php echo $qty?>" id="<?php echo $key?>quantity" value="<?php echo $quantity?>"/>
				<br/><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')">update</a>
				</td>
				<td><?php echo $quantity*$price?></td>
				<td><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="fas fa-trash-alt fa-2x"></i></a></td>
			</tr>
			<?php } } ?>
        </tbody>
    </table>
    <br><button style="float: left;"class="button" type="submit" onclick="location.href='products.php'">Continue Shopping</button>
    <button style="float: right;" class="button" type="submit" onclick="location.href='checkout.php'">Check Out</button>
    <div class="total-price">
        </div>
    
    </div>
<?php
require('footer.php');
?>