<?php
require('header.php');
require('connection.php');
require('functions.php');
?>
<div clas="row">
        <div class="col-2">
            <h1>Give your Workout<br>A New style! </h1>
            <p> Sucess isnt always about greatness.Its about consistency. Consistent<br> hard work gains sucess.Greatness will come.</p>
            <a href="" class="btn">Explore Now &#8594;</a>

        </div>
        <div class="col-2">
            <img style="height:100%;" src="../images/image1.png">
        </div>
    </div>
    </div>
    </div>
    <!----featured categoreis ------->

    <!----featured product ------->
    <div class="small-conatiner">
    <br><h2 class="title"> Featured Products</h2> 
        <div class="row">
            <?php
            $get_product = get_product($con, 'featured', 4);
            foreach($get_product as $list)
            {?>
        <div class="col-4">
        <a href="product_details.php?product_id=<?php echo $list['product_id']?>">
            <img src="../images/<?php echo $list['image'] ?>"/>
            <h4> <?php echo $list['product_name']?> </h4>
            <p> <?php echo 'Rs.'.$list['price']?> </p>
            </a>
            </div>
            <?php }?>
    </div>
        <h2 class="title"> New Arrivals </h2>
        <div class="row">
        <?php
            $get_product = get_product($con, 'latest', 4);
            foreach($get_product as $list)
            {?>
            <div class="col-4">
            <a href="product_details.php?product_id=<?php echo $list['product_id']?>">
            <img src="../images/<?php echo $list['image'] ?>"/>
            <h4> <?php echo $list['product_name']?> </h4>
            <p> <?php echo 'Rs.'.$list['price']?> </p>
            </a>
            </div>
            <?php }?>
    </div>
    </div>
    <!------offer------>
    <div class="offer">
    <div class="small-conatiner">
        <div class="row">
            <?php $res = mysqli_query($con, "select * from products where product_id = (select product_id from order_details group by product_id order by count(product_id) desc limit 1)");
            $row = mysqli_fetch_assoc($res);?>
        <div class="col-5">
            <a href="product_details.php?product_id=<?php echo $row['product_id']?>">
            <img src="../images/<?php echo $row['image'] ?>"class="offer-img"/>
            </a>
        </div>
        <div class="col-5">
        <h1 class="c1"> Best Selling Product</h1>
        <h2> <?php echo $row['product_name']?> </h2>
        <small> <?php echo $row['description']?> </small>
        <br><a href="product_details.php?product_id=<?php echo $row['product_id']?>" class="btn"> Buy Now &#8594;</a>
        </div>
        </div>
    </div>
    
    </div>
    <!------brands------>
    <div class="brands">
    <div class="small-conatiner">
    <div class="row">
    <div class="col-6">
        <img src="../images/logo-godrej.png">
        </div>
        <div class="col-6">
        <img src="../images/logo-oppo.png">
        </div>
        <div class="col-6">
        <img src="../images/logo-coca-cola.png">
        </div>
        <div class="col-6">
        <img src="../images/logo-paypal.png">
        </div>
        <div class="col-6">
        <img src="../images/logo-philips.png">
        </div>
    </div>
        </div>
        </div>
<?php
require('footer.php');
?>