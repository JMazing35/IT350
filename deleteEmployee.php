<?php
include "dbConnect.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);



$error='';

$employeeID = $_POST['employeeID'];
print $employeeID;

$eIDAsInt = intval($employeeID);
echo $eIDAsInt;


if(mysqli_query($dbConnect,"DELETE FROM employee WHERE employee_id=$eIDAsInt")){
	header("location:adminPage.php");
} else {
	echo "Error deleting employee";
}



?>
