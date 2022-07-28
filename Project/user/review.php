<?php
if(isset($_POST['submit']))
{
    $email=$_SESSION['user_email'];
    $res = mysqli_query($con, "select * from account where email = '$email'");
    $row = mysqli_fetch_assoc($res);
    $user_id = $row['id'];
    $rating=get_safe_value($con,$_POST['rating']);
    $review=get_safe_value($con,$_POST['review']);
    $added_on=date('Y-m-d h:i:s');
    mysqli_query($con,"insert into review(user_id, product_id, rating, review, added_on) values('$user_id','$product_id','$rating','$review','$added_on')");
}
?>
            <?php
            $email=$_SESSION['user_email'];
            $res = mysqli_query($con, "select * from account where email = '$email'");
            $row = mysqli_fetch_assoc($res);
            $user_id = $row['id'];
            $sql = "select * from products where product_id in (select product_id from order_details where order_id in (select id from orders where user_id = '$user_id' and order_status = 5)) and product_id = $product_id";
            $res = mysqli_query($con, $sql);
            $count = mysqli_num_rows($res);
        if($count>0)
        {
            echo "<div class='container1'>";
            echo"<form method='post'>";
            echo "<h1>Give Your Review</h1>";
            echo "<select name='rating'>";
            echo "<br><option class='option' required style='width: 12.5rem;'>Select Rating</option>";
            echo "<option value='5'>5 star</option>";
            echo "<option value='4'>4 star</option>";
            echo "<option value='3'>3 star</option>";
            echo "<option value='2'>2 star</option>";
            echo "<option value='1'>1 star</option>";
            echo "</select>";
            echo "<br><br><textarea id='review' name='review' placeholder='Write here...' style='height:3.125rem; width: 18.75rem;' required></textarea>";
            echo "<br><br><button type='submit' class='button' name='submit'>Submit</button>";
        }?>
    </form>
</div>