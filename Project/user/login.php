<?php
require('header.php');
require('connection.php');
require('functions.php');
$msg='';
if(isset($_POST['submit']))
{
    $email = get_safe_value($con, $_POST['email']);
    $password = get_safe_value($con, $_POST['password']);
    $sql = "select * from account where email = '$email' and password = '$password'";
    $res = mysqli_query($con, $sql);
    $count = mysqli_num_rows($res);
    if($count>0)
    {
        $_SESSION['user_login'] = 1;
        $_SESSION['user_email'] = $email;
        header('location:checkout.php');
        die();
    }
    else
    {
        $msg = "Incorrect Email or Password...!";
    }
}
?>
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="../images/image1.png" width="100%">
                </div> 
                <div class="col-2">
                    <div class="form-container">
                        <h1>Login</h1>
                        <form id="Loginform" method = "post">
                            <input type="text" name="email" placeholder="Email" required>    
                            <input type="password" name="password" placeholder="Password"required>
                            <button class="btn" type="submit" name="submit">Login</button>
                            <a href="account.php" style="float: right;">Not Registered?</a>
                    <?php echo $msg?>
                        </form>
                    </div>
                </div> 
            </div>
        </div>     
    </div>
    <script>
        var Loginform = document.getElementById("Loginform");
        var RegForm = document.getElementById("RegForm");
        var Indicator=document.getElementById("Indicator");
        function register()
        {
            RegForm.style.transform = "translateX(0rem)";
            Loginform.style.transform = "translateX(0rem)";
            Indicator.style.transform="translateX(6.25rem)";
        }
        function sss()
        {
            RegForm.style.transform = "translateX(18.75rem)";
            Loginform.style.transform = "translateX(18.75rem)";
            Indicator.style.transform="translateX(0rem)";
        }
    </script>
</body>
</html>
<?php
require('footer.php');
?>