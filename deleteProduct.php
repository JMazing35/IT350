<?php
include "dbConnect.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);



$error='';

$sn = $_POST['serial_number'];
print $ssn;

$snAsInt = intval($sn);
echo $snAsInt;


if(mysqli_query($dbConnect,"DELETE FROM product WHERE serial_number=$snAsInt")){
	header("location:adminPage.php");
} else {
	echo "Error deleting product";
}




?>
