<?php
require('header.php');
require('connection.php');
require('functions.php');
$msg='';
if(isset($_POST['submit']))
{
    $name = get_safe_value($con, $_POST['name']);
    $email = get_safe_value($con, $_POST['email']);
    $password = get_safe_value($con, $_POST['password']);
    $mobile = get_safe_value($con, $_POST['mobile']);
    $sql = "select * from account where email = '$email'";
    $res = mysqli_query($con, $sql);
    $count = mysqli_num_rows($res);
    if($count>0)
    {
        $msg = "User Already Exist...";
    }
    else
    {
        mysqli_query($con,"insert into account(name,email,password,mobile) values('$name','$email','$password','$mobile')");
        header('location:login.php');
        die();
    }
}
?>
<div class="row">
    <div class="col-2">
        <div class="col-2">
            <img src="../images/image1.png" width="100%">
        </div> 
    </div>
    <div class="col-2">
        <div style="height: 20.625rem;" class="form-container">
            <h1>REGISTER</h1>
            <form method="post">
                <input type="text" id="name" name="name" placeholder="Enter your Name"required>
                <input type="text" id="email" name="email" placeholder="Enter your Email"required>
                <input type="password" id="password" name="password" placeholder="Enter your Password" required>
                <input type="text" id="mobile" name="mobile" placeholder="Enter your Phone Number"required>
                <button type="submit" id="register" class="btn" name="submit">Register</button>
                <?php echo $msg?>
            </form>
        </div>
    </div>
<?php
require('footer.php');
?>