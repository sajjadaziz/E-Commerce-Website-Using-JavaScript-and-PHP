<?php
require('header.php');
if(isset($_GET['type']) && $_GET['type']!='')
{
    $type = get_safe_value($con, $_GET['type']);
    if($type == 'delete')
    {
        $brand_id = get_safe_value($con, $_GET['brand_id']);
        $sql = "delete from brands where brand_id = '$brand_id'";
        mysqli_query($con, $sql);
    }
}
$sql = "select * from brands order by brand_id";
$res = mysqli_query($con, $sql);
?>
<div class="small-conatiner cart-page">
   <div class="card-body">
      <h1 class="box-title">Brands </h1>
      <h2 style="margin-left: 37.5rem;"><a href="brand.php">Add Brand </a></h2>
   </div>
   <table class="table ">
      <thead>
         <tr>
            <th class="serial">Serial #</th>
            <th>Brand Id</th>
            <th>Brand Name</th>
         </tr>
      </thead>
      <tbody>
         <?php
         $i = 1;
         while($row = mysqli_fetch_assoc($res)){?>
         <tr>
            <td class="serial"><?php echo $i ?></td>
            <td><?php echo $row['brand_id'] ?></td>
            <td><?php echo $row['brand_name'] ?></td>
            <?php
            echo "<td><a href = 'brand.php?brand_id=".$row['brand_id']."'><i class='fas fa-edit fa-2x'></i></a></td>";
            echo "<td><a href = '?type=delete&brand_id=".$row['brand_id']."'><i class='fas fa-trash-alt fa-2x'></i></a></td>";
            ++$i;
            } ?>
         </tr>
      </tbody>
   </table>
</div>