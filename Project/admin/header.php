<?php
require('connection.php');
require('functions.php');
if(isset($_SESSION['admin_login']) && $_SESSION['admin_login']!=''){}
else
{
    header('location:login.php');
    die();
}
?>
<!DOCTYPE html>
<head>
   <meta charset="UTF-8">
   <title>Admin</title>
   <link rel="stylesheet"  href="../style.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" rel="stylesheet">
   <script src="https://kit.fontawesome.com/c9d26b8f0a.js" crossorigin="anonymous"></script>
</head>
<div class="header">
    <div class="container">
        <div class="navbar">
        <div class="logo">
            <img src="../images/logo.png" width="7.8125rem">
        </div>
        <nav>
            <ul>
                <li><a href="products.php">PRODUCTS</a></li>
                <li><a href="categories.php">CATEGORIES</a></li>
                <li><a href="brands.php">BRANDS</a></li>
                <li><a href="users.php">USERS</a></li>
                <li><a href="orders.php">ORDERS</a></li>
                <li><a href="contact_us.php">CONTACT US</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </nav>
    </div>