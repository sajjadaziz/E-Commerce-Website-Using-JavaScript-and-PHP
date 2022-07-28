<?php
require('header.php');
if(isset($_GET['type']) && $_GET['type']!='')
{
   $type = get_safe_value($con, $_GET['type']);
   if($type == 'delete')
   {
      $product_id = get_safe_value($con, $_GET['product_id']);
      $sql = "delete from products where product_id = '$product_id'";
      mysqli_query($con, $sql);
   }
}
$sql = "select p.*, c.category_name, b.brand_name from products p, categories c, brands b where p.brand_id = b.brand_id and p.category_id = c.category_id order by p.product_id";
$res = mysqli_query($con, $sql);
?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <br><h1 class="box-title">Products </h1>
                  <h2 style="margin-left: 46.875rem;"><a href="product.php">Add Product </a></h2>
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
                     <table class="table ">
                        <thead>
                           <tr>
                              <th class="serial">Serial #</th>
                              <th>Product Id</th>
                              <th>Category Name</th>
                              <th>Brand Name</th>
                              <th>Product Name</th>
                              <th>Image</th>
                              <th>Price</th>
                              <th>Quantity</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $i = 1;
                           while($row = mysqli_fetch_assoc($res)){?>
                           <tr>
                              <td class="serial"><?php echo $i ?></td>
                              <td><?php echo $row['product_id'] ?></td>
                              <td><?php echo $row['category_name'] ?></td>
                              <td><?php echo $row['brand_name'] ?></td>
                              <td><?php echo $row['product_name'] ?></td>
                              <td><img src="../images/<?php echo $row['image'] ?>"/></td>
                              <td><?php echo $row['price'] ?></td>
                              <td><?php echo $row['quantity'] ?></td>
                              <?php
                              echo "<td><a href = 'product.php?product_id=".$row['product_id']."'><i class='fas fa-edit fa-2x'></i></a></td>";
                              echo "<td><a href = '?type=delete&product_id=".$row['product_id']."'><i class='fas fa-trash-alt fa-2x'></i></a></td>";
                              ++$i;
                              } ?>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>