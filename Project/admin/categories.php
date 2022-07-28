<?php
require('header.php');
if(isset($_GET['type']) && $_GET['type']!='')
{
    $type = get_safe_value($con, $_GET['type']);
    if($type == 'delete')
    {
        $category_id = get_safe_value($con, $_GET['category_id']);
        $sql = "delete from categories where category_id = '$category_id'";
        mysqli_query($con, $sql);
    }
}
$sql = "select * from categories order by category_id";
$res = mysqli_query($con, $sql);
?>
<div class="small-conatiner cart-page">
                        <div class="card-body">
                           <h1 class="box-title">Categories </h1>
                           <h2 style="margin-left: 36.25rem;"><a href="category.php">Add Category </a></h2>
                        </div>
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">Serial #</th>
                                       <th>Category Id</th>
                                       <th>Category Name</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                     $i = 1;
                                     while($row = mysqli_fetch_assoc($res)){?>
                                    <tr>
                                       <td class="serial"><?php echo $i ?></td>
                                       <td><?php echo $row['category_id'] ?></td>
                                       <td><?php echo $row['category_name'] ?></td>
                                       <?php
                              echo "<td><a href = 'category.php?category_id=".$row['category_id']."'><i class='fas fa-edit fa-2x'></i></a></td>";
                              echo "<td><a href = '?type=delete&category_id=".$row['category_id']."'><i class='fas fa-trash-alt fa-2x'></i></a></td>";
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