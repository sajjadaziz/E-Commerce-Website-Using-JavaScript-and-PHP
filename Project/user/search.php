<?php
require('header.php');
$str = mysqli_real_escape_string($con, $_GET['str']);
if($str=='')
{
    ?>
	<script>
		window.location.href="javascript:history.back()";
	</script>
	<?php
}
else
{
    $res = mysqli_query($con, "select * from products where product_name like '%$str%' or description like '%$str%' or short_desc like '%$str%'");
    $count = mysqli_num_rows($res);
    ?>
    <h2>About <?php echo $count?> results found related to '<?php echo $str?>'</h2>
    <?php
    while($row = mysqli_fetch_assoc($res))
    {?>
        <div class="col-4">
            <a href="product_details.php?product_id=<?php echo $row['product_id']?>">
            <img src="../images/<?php echo $row['image'] ?>"/>
            <h4> <?php echo $row['product_name']?> </h4>
            <p> <?php echo 'Rs.'.$row['price']?> </p>
            </a>
        </div>
        <?php 
    }
}
?>