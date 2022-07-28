<?php
require('header.php');
$category_name = '';
$msg = '';
if(isset($_GET['category_id']) && $_GET['category_id']!='')
{
    $category_id = get_safe_value($con, $_GET['category_id']);
    $res = mysqli_query($con, "select category_name from categories where category_id = '$category_id'");
    $check = mysqli_num_rows($res);
    if($check>0)
    {
        $row = mysqli_fetch_assoc($res);
        $category_name = $row['category_name'];
    }
    else
    {
        header('location:categories.php');
        die();
    }
}
if(isset($_POST['submit']))
{
    $category_name = get_safe_value($con, $_POST['category_name']);
    $res = mysqli_query($con, "select * from categories where category_name = '$category_name'");
    $check = mysqli_num_rows($res);
    if($check>0)
    {
        if(isset($_GET['category_id']) && $_GET['category_id']!='')
        {
            $getdata = mysqli_fetch_assoc($res);
            if($category_id == $getdata['category_id'])
            {

            }
            else
            {
                $msg = "Category Already Exist...";
            }
        }
        else
        {
            $msg = "Category Already Exist...";
        }
    }
    if($msg == '')
    {
        if(isset($_GET['category_id']) && $_GET['category_id']!='')
        {
            mysqli_query($con, "update categories set category_name = '$category_name' where category_id = '$category_id'");
        }
        else
        {
            mysqli_query($con, "insert into categories(category_name) values('$category_name')");
        }
        header('location:categories.php');
        die();
    }
}
?>
<div class="small-conatiner cart-page">
    <div class="card-body">
        <h1 class="box-title">Category </h1>
    </div>
                            <form method="post">
                                <div class="card-body card-block">
                                    <div class="form-group">
                                    <br><label for="categories" class="form-control-lable">Category Name</label><br>
                                        <input style="width: 25rem;" type="text" name="category_name" placeholder="Enter Category Name" class="form-control" required value = "<?php echo $category_name ?>">
                                    </div>
                           <button style="width: 25rem;" id="payment-button" type="submit" name = "submit" class="btn btn-lg btn-info btn-block">
                           <span id="payment-button-amount">Submit</span>
                           </button>
                           <?php echo $msg ?></div>
                        </div>
                            </form>
                     </div>
                  </div>
               </div>
            </div