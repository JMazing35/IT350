<?php
include 'verifyCustomerLogin.php';

if(session_destroy())
{
	print($logout);
	header("location:customerLoginPage.html?msg=Logged out successfully.");
}

?>