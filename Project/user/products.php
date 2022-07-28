<?php
require('header.php');
require('connection.php');
require('functions.php');
?>
    <div class="small-conatiner">
    <h2 class="title"> All Products</h2> 
        <div class="row">
        <?php
            $get_product = get_product($con, 'all');
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
        <div class="page-btn">
        <span>1</span>
        <span>2</span>
        <span>3</span>
        <span>4</span>
        <span>&#8594;</span>
        
        
        </div>
    </div>
<?php
require('footer.php');
?>