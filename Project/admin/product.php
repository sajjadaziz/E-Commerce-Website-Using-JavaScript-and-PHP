<?php
require('header.php');
$category_id = '';
$brand_id = '';
$product_name = '';
$price = '';
$quantity = '';
$image = '';
$short_desc  = '';
$description = '';
$msg = '';
$image_required = 'required';
if(isset($_GET['product_id']) && $_GET['product_id']!='')
{
    $image_required = '';
    $product_id = get_safe_value($con, $_GET['product_id']);
    $res = mysqli_query($con, "select * from products where product_id = '$product_id'");
    $check = mysqli_num_rows($res);
    if($check>0)
    {
        $row = mysqli_fetch_assoc($res);
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        $product_name = $row['product_name'];
        $price = $row['price'];
        $quantity = $row['quantity'];
        $image = $row['image'];
        $short_desc = $row['short_desc'];
        $description = $row['description'];
    }
    else
    {
        header('location:products.php');
        die();
    }
}
if(isset($_POST['submit']))
{
    $category_id = get_safe_value($con, $_POST['category_id']);
    $brand_id = get_safe_value($con, $_POST['brand_id']);
    $product_name = get_safe_value($con, $_POST['product_name']);
    $price = get_safe_value($con, $_POST['price']);
    $quantity = get_safe_value($con, $_POST['quantity']);
    $image = get_safe_value($con, $_POST['image']);
    $short_desc = get_safe_value($con, $_POST['short_desc']);
    $description = get_safe_value($con, $_POST['description']);
    $res = mysqli_query($con, "select * from products where product_name = '$product_name'");
    $check = mysqli_num_rows($res);
    if($check>0)
    {
        if(isset($_GET['product_id']) && $_GET['product_id']!='')
        {
            $getdata = mysqli_fetch_assoc($res);
            if($product_id == $getdata['product_id'])
            {

            }
            else
            {
                $msg = "Product Already Exist...";
            }
        }
        else
        {
            $msg = "Product Already Exist...";
        }
    }
    if($_FILES['image']['type']!='' && $_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg')
    {
        $msg = "Please Select Correct File...";
    }
    if($msg == '')
    {
        if(isset($_GET['product_id']) && $_GET['product_id']!='')
        {
            if($_FILES['image']['name']!='')
            {
                $image = rand(111111111, 99999999).'_'.$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], '../images/'.$image);
                $sql = "update products set category_id = '$category_id', brand_id = '$brand_id', product_name = '$product_name', price = '$price', quantity = '$quantity', image = '$image', short_desc = '$short_desc', description = '$description' where product_id = '$product_id'";
            }
            else
            {
                $sql = "update products set category_id = '$category_id', brand_id = '$brand_id', product_name = '$product_name', price = '$price', quantity = '$quantity', short_desc = '$short_desc', description = '$description' where product_id = '$product_id'";
            }
            mysqli_query($con, $sql);
        }
        else
        {
            $image = rand(111111111, 99999999).'_'.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], '../images/'.$image);
            mysqli_query($con, "insert into products(category_id, brand_id, product_name, price, quantity, image, short_desc, description) values('$category_id', '$brand_id', '$product_name', '$price', '$quantity', '$image', '$short_desc', '$description')");
        }
        header('location:products.php');
        die();
    }
}
?>
<div class="small-conatiner cart-page">
    <div class="card-header"><strong><h1>Product</h1></strong></div>
        <form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-2" style="padding: 0.625rem;">
                    <br><label for="categories">Categories</label><br>
                    <select name="category_id">
                        <option class="option">Select Category</option>
                        <?php
                        $res = mysqli_query($con, "select * from categories order by category_name");
                        while($row = mysqli_fetch_assoc($res))
                        {
                            if($row['category_id'] == $category_id)
                            {
                                echo "<option selected value=".$row['category_id'].">".$row['category_name']."</option>";
                            }
                            else
                            {
                                echo "<option value=".$row['category_id'].">".$row['category_name']."</option>";
                            }
                        }
                        ?>
                    </select>
                    <br><label for="brands">Brands</label><br>
                    <select name="brand_id">
                        <option class="option">Select Brand</option>
                        <?php
                        $res = mysqli_query($con, "select * from brands order by brand_name");
                        while($row = mysqli_fetch_assoc($res))
                        {
                            if($row['brand_id'] == $brand_id)
                            {
                                echo "<option selected value=".$row['brand_id'].">".$row['brand_name']."</option>";
                            }
                            else
                            {
                                echo "<option value=".$row['brand_id'].">".$row['brand_name']."</option>";
                            }
                        }
                        ?>
                    </select><br>
                    <label for="products" class="form-control-lable">Product Name</label><br>
                    <input type="text" name="product_name" placeholder="Enter Product Name" class="form-control" required value = "<?php echo $product_name ?>"><br>
                    <label for="products" class="form-control-lable">Product Price</label><br>
                    <input type="text" name="price" placeholder="Enter Product Price" class="form-control" required value = "<?php echo $price ?>"><br>
                </div> 
                <div class="col-2"style="padding: 0.3125rem 3.125rem;">
                    <label for="products" class="form-control-lable">Product Quantity</label>
                    <br><input style="width: 18.75rem;" type="text" name="quantity" placeholder="Enter Product Quantity" class="form-control" required value = "<?php echo $quantity ?>"><br>
                    <label for="products" class="form-control-lable">Product Image</label><br>
                    <input type="file" name="image" class="form-control"<?php echo $image_required ?>><br>
                    <label for="products" class="form-control-lable">Product Short Description</label><br>
                    <textarea name="short_desc" placeholder="Enter Short Description" class="form-control" required ><?php echo $short_desc ?></textarea><br>
                    <label for="products" class="form-control-lable">Product Description</label><br>
                    <textarea name="description" placeholder="Enter Description" class="form-control" required ><?php echo $description ?></textarea>
                </div>
            </div>
            <button id="payment-button" type="submit" name = "submit" class="btn btn-lg btn-info btn-block">
            <span id="payment-button-amount">Submit</span>
            </button>
            <?php echo $msg ?>
        </form>
    </div>
</div>
