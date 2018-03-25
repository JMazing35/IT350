<?php
#require '/home/justin35/vendor/autoload.php';
#$connection = new \MongoDB\Driver\Manager("mongodb://localhost:27017");
#$collection = (new MongoDB\Driver\Manager());
#$dbname = $connection->selectDB('BuyMyApple');
#$collection = $dbname->selectCollection('collection');
session_start();

$connection = new MongoDB\Driver\Manager("mongodb://localhost:27017");
#$db = $connection->BuyMyApple;
#$collection = $db->customers;


if ($connection){
	print "it works mongodb driver<br>";
}

$error='';

if(empty($_POST['email'])){
	print "EMAIL IS EMPTY<br>";
} else {
	print $_POST['email'];
	print " is the EMAIL<br>";
}
if(empty($_POST['password'])){
	print "PASSWORD IS EMPTY<br>";
} else {
	print $_POST['password'];
	print " is the password<br>";
}
if(empty($_POST['email']) || empty($_POST['password'])) {
	$error = "Email or Password is INVALID";
	
} else {
 //define $username and $password
	$username =$_POST['email'];
	$password =$_POST['password'];
	print $username;
	print $password;
	echo "IN ELSE STATEMENT <br>";


	$customerLogin = array(
		'email' => $username,
		'password' => $password
	);

	#$options = array(
	# 'limit' => 1
	#);

	#$query = new MongoDB\Driver\Query($customerLogin, $options);
	#$document = $connection->executeQuery('BuyMyApple.customers', $query);
	#print $document;
	#print "<br>This is what the document is";
	#if ($document == 1){
	#	print "found a match";
	#} else {
	#	print "no match found";
	#}



	$filter = [];

	$options = [
		'sort' => ['_id' => -1],
	];

	$query = new MongoDB\Driver\Query($filter, $options);

	$cursor = $connection->executeQuery('BuyMyApple.customers', $query);

	foreach ($cursor as $document){
		$emailFromMongo = $document->email;
		$passwordFromMongo = $document->password;
		$nameFromMongo = $document->first_name;
		print $emailFromMongo;
		print "<br>";
		print $nameFromMongo;
		$_SESSION['Logged_in_user'] = $nameFromMongo;
		print $_SESSION['Logged_in_user'];

		if ($emailFromMongo == $username && $passwordFromMongo == $password){
			print "We have a match.";
			$_SESSION['Logged_in_user'] = $nameFromMongo; //Initializing Session
			$_SESSION["Logged_in"] = 1;
			header("location:homePage.php");	
		} else {
			header("location:customerLoginPage.html");
		}
	}
	}
?>