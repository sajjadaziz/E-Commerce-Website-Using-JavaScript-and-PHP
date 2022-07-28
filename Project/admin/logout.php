<?php
session_start();
unset ($_SESSION['admin_login']);
unset ($_SESSION['admin_email']);
header('location:login.php');
die();
?>