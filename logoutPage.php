<?php
include 'dbConnect.php';
include 'verifyLogin.php';

mysqli_query($dbConnect, "UPDATE employee SET Logged_in = 0 WHERE username = '$username' AND password ='$password'");

if(session_destroy())
{
	print($logout);
	header("location:adminLoginPage.php?msg=Logged out successfully.");
}

?>