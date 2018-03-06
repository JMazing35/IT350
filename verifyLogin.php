<?php
include "dbConnect.php";

#session_start();
$error='';



if(empty($_POST['username'])){
	print "USERNAME IS EMPTY<br>";
} else {
	print $_POST['username'];
	print " is the username<br>";
}

if(empty($_POST['password'])){
	print "PASSWORD IS EMPTY<br>";
} else {
	print $_POST['password'];
	print " is the password<br>";
}



if(empty($_POST['username']) || empty($_POST['password'])) {
	$error = "Username or Password is INVALID";

	
} else {
 //define $username and $password
	$username =$_POST['username'];
	$password =$_POST['password'];

	echo "IN ELSE STATEMENT <br>";

	$dbConnect = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

	if (!$dbConnect) {
		die('Error connecting to Database'.mysqli_connect_error());
	} else {
		echo "CONNECTED SUCCESSFULLY!!";
	}


	//protect against sql injection
	#$un = stripslashes($username);
	#$pw = stripslashes($password);
	#$USERNAME = mysql_real_escape_string($un);
	#$PASSWORD = mysql_real_escape_string($pw);

	#$db = mysql_select_db($dbName, $connection);



	$result = mysqli_query($dbConnect, "SELECT * FROM employee WHERE username = '$username' AND password = '$password'");

	$countNumRows = mysqli_num_rows($result);

	echo "The number of rows that match is: ".$countNumRows."<br>";

	if($countNumRows == 1){
		#session_register("admin");
		#session_register("password");
		#$_SESSION['name'] = $username;
		#$sqlUpdate = "UPDATE employee SET 'Logged_in' = 1 WHERE Username = '". $username. "';";
		mysqli_query($dbConnect, "UPDATE employee SET Logged_in = 1 WHERE username = '$username' AND password ='$password'");
		header("location:adminPage.php");
	} else {
		$message = "Wrong username or password, try again.";
		echo $message;
		header("location:adminLoginPage.php");
	} 


	/*

	$sha1password = sha1($password);

	//SQL query to fetch information of registered users and finds user match.
	$query = mysqli_query("SELECT * FROM employee WHERE Password='$password' AND Username = '$username'", $dbConnect);
	$sql = "UPDATE employee SET 'Logged_in' = 1 WHERE Username = '". $username. "';";
	//$updatequery = mysql_query($sql);
	$rows = mysqli_num_rows($query);

	if($rows) {
		$_SESSION['login_user']=$username; //Initializing Session
		$_SESSION["Logged_in"] = 1;
		//$_SESSION['userID'] = 
		$updatequery = mysqli_query($sql);
		//die($_SESSION['login_user']);
		header("location:adminPage.php"); //Redirecting to admin  page
	} else {
		$error = "Username or password is invalid";
	}*/
	mysqli_close($dbConnect); //Closing connection
	}


?>
