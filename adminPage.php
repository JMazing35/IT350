<?php
include 'dbConnect.php';

session_start();
define(ADMIN, $_SESSION['name']);
if(!session_is_registered("admin")){
	header("location:adminLoginPage.php");
} 

?>

<!DOCTYPE html>
<html>
<body>

<center>
<h1>Buy My Apple</h1>
<h2>Welcome <?php echo ADMIN?> to the Admin Webpage</h2>
<p><a href="logoutPage.php">Logout?</a></p>
</center>


