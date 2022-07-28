<?php
require('connection.php');
require('add_to_cart.php');
$obj=new add_to_cart();
$totalProduct=$obj->totalProduct();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta property="og:url"           content="https://www.your-domain.com/your-page.html" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Your Website Title" />
    <meta property="og:description"   content="Your description" />
    <meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />
    <title>Red Store</title>
    <link rel="stylesheet"  href="../style.css">
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c9d26b8f0a.js" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="app.js"></script>
</head>
<div class="header">
    <div class="container">
        <div class="navbar">
        <div class="logo">
            <img src="../images/logo.png" width="7.8125rem">
        </div>
        <nav>
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="products.php">PRODUCTS</a></li>
                <li><a href="contact.php">CONTACT</a></li>
                <?php
                if(isset($_SESSION['user_login']))
                {
                    echo '<li><a href="my_order.php">MY ORDER</a></li>';
                    echo '<li><a href="logout.php">LOGOUT</a></li>';
                }
                else
                {
                    echo '<li><a href="login.php">LOGIN</a></li>';
                    echo '<li><a href="account.php">SIGN UP</a></li>';
                }
                ?>
                <div class="header__account">
            </ul>
        </nav>
        <div class="search-box">
            <form action="search.php" method="get">
                <input type="text" name = "str" class="search-txt" placeholder="Search here...">
                <button type="submit" class="search-btn"><i class="fa fa-search fa-lg"></i></button>
            </form>
        </div><?php error_reporting(0);?>
        &nbsp;&nbsp;&nbsp;&nbsp;<a href="cart.php"><i class="fas fa-shopping-bag fa-lg"></i></a>
        <a href="cart.php" class="cnt"><?php echo $totalProduct ?></a>
    </div>