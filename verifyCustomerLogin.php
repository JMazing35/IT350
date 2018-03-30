<?php
$connection = new MongoDB\Driver\Manager("mongodb://localhost:27017");
#$db = $connection->BuyMyApple;
#$collection = $db->customers;
if (session_start()){
	print "SESSION HAS BEEN STARTED";
}else {
	print "SESSION DID NOT START";
}

if ($connection){
	print "it works mongodb driver<br>";
}

$error='';

if(empty($_POST['email']) || empty($_POST['password'])) {
	$error = "Email or Password is INVALID";
} else {
 //define $username and $password
	$username =$_POST['email'];
	$password =$_POST['password'];
	$cleanEmail = filter_var($username, FILTER_SANITIZE_EMAIL);
	$validEmail = filter_var($cleanEmail, FILTER_VALIDATE_EMAIL);	
	
	$password = stripslashes($password);
	$password = strip_tags($password);

	
	$filter = [];

	$options = [
		'sort' => ['_id' => -1],
	];

	$query = new MongoDB\Driver\Query($filter, $options);

	$cursor = $connection->executeQuery('BuyMyApple.customers', $query);

	foreach ($cursor as $document){
		$emailFromMongo = $document->email;
		$passwordFromMongo = $document->password;

		if ($emailFromMongo == $validEmail && $passwordFromMongo == $password){
			//Obtain customer information from MongoDB
			$firstNameFromMongo = $document->first_name;
			$lastNameFromMongo = $document->last_name;
			$streetFromMongo = $document->street;
			$cityFromMongo = $document->city;
			$stateFromMongo = $document->state;
			$zipFromMongo = $document->zipCode;
			$emailFromMongo = $document->email;
			$phoneFromMongo = $document->phone;
			$id = $document->_id;

			//Set session variables for user
			$_SESSION['Logged_in_user'] = $firstNameFromMongo;
			$_SESSION['Logged_in'] = 1;
			$_SESSION['ID'] = (string) $id;
			$_SESSION['first_name'] = $firstNameFromMongo;
			$_SESSION['last_name'] = $lastNameFromMongo;
			$_SESSION['street'] = $streetFromMongo;
			$_SESSION['city'] = $cityFromMongo;
			$_SESSION['state'] = $stateFromMongo;
			$_SESSION['zip'] = $zipFromMongo;
			$_SESSION['email'] = $emailFromMongo;
			$_SESSION['phone'] = $phoneFromMongo;
			#print $_SESSION['Logged_in_user'];
			#print "TESTINGSSSSSSSSSSSSSS";
			header("location:homePage.php");	
		} else {
			header("location:customerLoginPage.php");
		}
	}
	}
?>
