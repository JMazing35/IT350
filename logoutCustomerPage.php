<?php
include 'verifyCustomerLogin.php';

if(session_destroy())
{
	print($logout);
	header("location:customerLoginPage.php?msg=Logged out successfully.");
}

?>
