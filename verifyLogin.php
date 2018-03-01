<?php
define(DOC_ROOT,dirname(__FILE__));
$userName = $_POST['userName']; //get User Name from POST 
$password = $_POST['password']; //get password from POST

if(isset($userName, $password)){
	
	//Need to protect against SQL Injection

	ob_start(); //What does this do?
    include(DOC_ROOT.'/dbConnect.php'); //Start MySQL connection
	$sql = "SELECT * FROM User WHERE userName = '$userName' AND password = '$password'";
	$result = mysqli_query($dbConnect, $sql);

	$countNumRows = mysqli_num_rows($result);

	if($countNumRows == 1){
		session_register("admin");
		session_register("password");
		$_SESSION['name'] = $userName;
		header("location:adminPage.php");
	} else {
		$message = "Wrong username or password, try again.";
		header("location:adminLoginPage.php");
	}

	ob_end_flush();
} else {
	header("location:adminLoginPage.php?msg=Please enter a username and password");
}

?>
