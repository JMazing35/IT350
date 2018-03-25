<?php
include "dbConnect.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();


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
	$un =$_POST['username'];
	$pw =$_POST['password'];
	print $un;
	print $pw;

	echo "IN ELSE STATEMENT <br>";

	/*$dbConnect = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

	if (!$dbConnect) {
		echo "Couldn't connect to DB.";
		die;
	} else {
		echo "CONNECTED SUCCESSFULLY!!";
	}*/


	//protect against sql injection
	$unNoSlash= stripslashes($un);
	$pwNoSlash = stripslashes($pw);
	print "<br>";
	print $unNoSlash;
	print $pwNoSlash;



	$username = mysqli_real_escape_string($dbConnect, $unNoSlash);
	$password = mysqli_real_escape_string($dbConnect, $pwNoSlash);

	#$db = mysql_select_db($dbName, $connection);
	$sql = "SELECT * FROM employee WHERE email = ? AND password = ?";

	$stmt = $dbConnect->prepare($sql);
	print_r($stmt);
	$stmt->bind_param("ss", $username, $password);
	$stmt->execute();

	$result = $stmt->get_result();


	if($row = $result->fetch_assoc()){

		$_SESSION['login_user']=$username; //Initializing Session
		$_SESSION['Logged_in'] = 1;





		#session_register("admin");
		#session_register("password");
		#$_SESSION['name'] = $username;
		#$sqlUpdate = "UPDATE employee SET 'Logged_in' = 1 WHERE Username = '". $username. "';";
		mysqli_query($dbConnect, "UPDATE employee SET Logged_in = 1 WHERE email = '$username' AND password ='$password'");
		header("location:adminPage.php");
	} else {
		$message = "Wrong username or password, try again.";
		echo $message;
		header("location:adminLoginPage.php");
	} 

	mysql_close($dbConnect);















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
	#mysqli_close($result);
	}


?>
