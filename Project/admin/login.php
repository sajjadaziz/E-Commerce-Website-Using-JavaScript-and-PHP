<?php
require('connection.php');
require('functions.php');
$msg='';
if(isset($_POST['submit']))
{
    $email = get_safe_value($con, $_POST['email']);
    $password = get_safe_value($con, $_POST['password']);
    $res = mysqli_query($con, "select email, password from account where email = '$email' and password = '$password'");
    $row = mysqli_fetch_assoc($res);
    $count = mysqli_num_rows($res);
    if($count>0 && ($row['email'] == 'admin@gmail.com'))
    {
        $_SESSION['admin_login'] = 'yes';
        $_SESSION['admin_email'] = $email;
        header('location:products.php');
        die();
    }
    else
    {
        $msg = "Incorrect Email or Password...!";
    }
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet"  href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" rel="stylesheet">
</head>
<body>
    <div class="account-page">
        <div class="container">
            <div class="logo">
                <img src="../images/logo.png" width="7.8125rem">
            </div>
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
                        </form>
                        <?php echo $msg?>
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