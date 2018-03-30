<?php
session_start();

print $_POST['filter'];

$sql =  "";

$filterOption = isset($_POST['filter']) ? $_POST['filter'] : false;

if($filterOption){
	if ($filterOption == "None"){
		print "NONE";
		$sql = "SELECT * FROM product WHERE sold != 1";
	}elseif($filterOption == "Apple iPhone"){
		print "iPhone";
		$sql = "SELECT * FROM product WHERE sold != 1 AND name LIKE '%iPhone%'";
	}elseif($filterOption == "Apple TV"){
		print "Apple TV";
		$sql = "SELECT * FROM product WHERE sold !=1 AND name LIKE '%TV%'";
	}elseif($filterOption == "Apple Watch"){
		print "Apple Watch";
		$sql = "SELECT * FROM product WHERE sold != 1 AND name LIKE '%Watch%'";
	}elseif ($filterOption == "Macbook"){
		print "Macbook";
		$sql = "SELECT * FROM product WHERE sold != 1 AND name LIKE '%Macbook%'";
	}elseif ($filterOption == "Price_ASC"){
		$sql = "SELECT * FROM product WHERE sold != 1 ORDER BY price ASC";
	}elseif ($filterOption == "Price_DESC"){
		$sql = "SELECT * FROM product WHERE sold != 1 ORDER BY price DESC";
	}
}

$_SESSION['filter'] = $sql;

header('location:homePage.php');

print $sql;


?>
