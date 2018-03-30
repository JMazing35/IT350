<?php

include "dbConnect.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);


$error='';


$serial_number = $_POST['serial_number'];
$name = $_POST['name'];
$price = $_POST['price'];
$color = $_POST['color'];
$description = $_POST['description'];
$ram = $_POST['ram'];
$storage = $_POST['storage'];

$priceAsInt = intval($price);


$sql = "INSERT INTO product (serial_number, name, price, color, description, ram, storage) VALUES ('$serial_number', '$name', $priceAsInt, '$color', '$description', '$ram', '$storage')";

mysqli_query($dbConnect, $sql);

header("location:adminPage.php");

?>
















