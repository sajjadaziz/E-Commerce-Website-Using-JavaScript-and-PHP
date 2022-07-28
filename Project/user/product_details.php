<?php
require('header.php');
require('connection.php');
require('functions.php');
$product_id = mysqli_real_escape_string($con, $_GET['product_id']);
$res = mysqli_query($con, "select * from products where product_id = '$product_id'");
$row = mysqli_fetch_assoc($res);
$count = mysqli_num_rows($res);
if($count<=0)
{
    ?>
    <script>
        window.location.href='index.php';
    </script>
    <?php
}
$category_id = $row['category_id'];
$product_name = $row['product_name'];
$price = $row['price'];
$image = $row['image'];
$quantity = $row['quantity'];
$short_desc = $row['short_desc'];
$description = $row['description'];
?>
    <div class="small-conatiner single-product">
    <div class="row">
    <div class="col-2">
    <img src="../images/<?php echo $image?>" width="100%" id="PrImg">
   </div>
    <div class="col-2">
    <h1><?php echo "$product_name" ?></h1>
    <h3><p><?php echo "$short_desc" ?></p></h3>
    <h4> <?php echo "Rs. $price" ?> </h4>
    <input type="number" min="1" max= "<?php echo $quantity?>" value="1" id="quantity">
    <a class="btn" href="javascript:void(0)" onclick="manage_cart('<?php echo $product_id ?>','add')">Add to Cart</a>
    <h3> Product Details </h3>
    <p><?php echo "$description" ?></p>
        </div>

    
   </div>
        </div>
    <h2 style="margin-left: 120;"> Related Products</h2>
    <div class="small-conatiner">
    <div class="row row-2">
    <a href="products.php"><h4 style="margin-left: 51.875rem;"> View More</h4></a>
        
    </div>
    
    </div>
    
    <div class="small-conatiner">
         <div class="row">
        <?php
            $res = mysqli_query($con, "select p.* from products p, categories c where p.category_id = c.category_id and p.category_id = '$category_id' and p.product_id!= '$product_id' limit 4");
            while($row = mysqli_fetch_assoc($res))
            {?>
                <div class="col-4">
                    <a href="product_details.php?product_id=<?php echo $row['product_id']?>">
                    <img src="../images/<?php echo $row['image'] ?>"/>
                    <h4> <?php echo $row['product_name']?> </h4>
                    <p> <?php echo 'Rs.'.$row['price']?> </p></a>
            </div>
            <?php }?>
    </div>
    </div>
    <div class="small-conatiner">
    <?php
    $res = mysqli_query($con, "select * from review where product_id = '$product_id'");
    $count = mysqli_num_rows($res);
    if($count>0)
    {
        echo "<h1>Product Reviews</h1>";
    }
    while($row = mysqli_fetch_assoc($res))
    {
        echo "<h4>Ratings : ".$row['rating']."</h4>";
        echo "<h4>Review : ".$row['review']."</h4><br><br><br>";
    }?></div>
<?php
if(isset($_SESSION['user_login']))
{
    require('review.php');
}
require('footer.php');
?>