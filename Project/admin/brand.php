<?php
require('header.php');
$brand_name = '';
$msg = '';
if(isset($_GET['brand_id']) && $_GET['brand_id']!='')
{
    $brand_id = get_safe_value($con, $_GET['brand_id']);
    $res = mysqli_query($con, "select brand_name from brands where brand_id = '$brand_id'");
    $check = mysqli_num_rows($res);
    if($check>0)
    {
        $row = mysqli_fetch_assoc($res);
        $brand_name = $row['brand_name'];
    }
    else
    {
        header('location:brands.php');
        die();
    }
}
if(isset($_POST['submit']))
{
    $brand_name = get_safe_value($con, $_POST['brand_name']);
    $res = mysqli_query($con, "select * from brands where brand_name = '$brand_name'");
    $check = mysqli_num_rows($res);
    if($check>0)
    {
        if(isset($_GET['brand_id']) && $_GET['brand_id']!='')
        {
            $getdata = mysqli_fetch_assoc($res);
            if($brand_id == $getdata['brand_id'])
            {

            }
            else
            {
                $msg = "Brand Already Exist...";
            }
        }
        else
        {
            $msg = "Brand Already Exist...";
        }
    }
    if($msg == '')
    {
        if(isset($_GET['brand_id']) && $_GET['brand_id']!='')
        {
            mysqli_query($con, "update brands set brand_name = '$brand_name' where brand_id = '$brand_id'");
        }
        else
        {
            mysqli_query($con, "insert into brands(brand_name) values('$brand_name')");
        }
        header('location:brands.php');
        die();
    }
}
?>
<div class="small-conatiner cart-page">
    <div class="card-body">
        <h1 class="box-title">Brands </h1>
    </div>
    <form method="post">
        <div class="card-body card-block">
            <div class="form-group">
                <br><label for="brands" class="form-control-lable">Brand Name</label><br>
                <input style="width: 25rem;" type="text" name="brand_name" placeholder="Enter Brand Name" class="form-control" required value = "<?php echo $brand_name ?>">
            </div>
            <button style="width: 25rem;" id="payment-button" type="submit" name = "submit" class="btn btn-lg btn-info btn-block">
            <span id="payment-button-amount">Submit</span>
            </button>
            <?php echo $msg ?></div>
        </div>
    </form>
</div>