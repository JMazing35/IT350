<?php
include 'verifyLogin.php';
session_start();
session_destroy();
mysqli_query($dbConnect, "UPDATE employee SET Logged_in = 0 WHERE username = '$username' AND password ='$password'")
header("location:adminLoginPage.php?msg=Logged out successfully.");
?>