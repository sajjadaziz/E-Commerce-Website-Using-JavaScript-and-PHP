<?php
require('header.php');
if(isset($_GET['type']) && $_GET['type']!='')
{
   $type = get_safe_value($con, $_GET['type']);
   if($type == 'delete')
   {
      $id = get_safe_value($con, $_GET['id']);
      $sql = "delete from account where id = '$id'";
      mysqli_query($con, $sql);
   }
}
$res = mysqli_query($con, "select * from account where email!='admin@gmail.com' order by id");
?>
<div class="small-conatiner cart-page">
               <div class="card-body">
                  <h1 class="box-title">USERS </h1>
               </div>
                     <table class="table ">
                        <thead>
                           <tr>
                              <th class="serial">Serial #</th>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Mobile</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           $i = 1;
                           while($row = mysqli_fetch_assoc($res)){?>
                           <tr>
                                <td class="serial"><?php echo $i ?></td>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['mobile'] ?></td>
                                <?php
                                echo "<td><a href = '?type=delete&id=".$row['id']."'><i class='fas fa-trash-alt fa-2x'></i></a></td>";
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