<?php
session_start();
unset ($_SESSION['user_login']);
unset ($_SESSION['user_email']);
unset ($_SESSION['cart']);
header('location:login.php');
die();
?>