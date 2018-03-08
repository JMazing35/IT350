<?php
$dbHost = 'localhost';
$dbUser = 'justin35';
$dbPassword = 'gojazz';
$dbName = 'BuyMyApple';
$dbConnect = new mysqli($dbHost, $dbUser, $dbPassword, $dbName) or die('Error connecting to Database');
#$test = mysqli_query($dbConnect, "UPDATE employee SET Logged_in = 1;");
?>

