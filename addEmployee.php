<?php

include "dbConnect.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);


$error='';


$ssn = $_POST['ssn'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];


$ssnAsInt = intval($ssn);
$zipAsInt = intval($zip);
$phoneAsInt = intval($phone);


$sql = "INSERT INTO employee (ssn, first_name, last_name, street, city, state, zip, phone, email, password) 
VALUES ($ssnAsInt, '$first_name', '$last_name', '$street', '$city', '$state', $zipAsInt, $phoneAsInt, '$email', '$password')";

mysqli_query($dbConnect, $sql);

header("location:adminPage.php");

?>

