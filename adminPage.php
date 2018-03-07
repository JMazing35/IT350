<?php
include 'dbConnect.php';

session_start();
define(ADMIN, $_SESSION['name']);
if(!session_is_registered("admin")){
	header("location:adminLoginPage.php");
} 

?>

<!DOCTYPE html>
<html>
<body>

<center>
<h1>Buy My Apple</h1>
<h2>Welcome <?php echo ADMIN?> to the Admin Webpage</h2>
<p><a href="logoutPage.php">Logout?</a></p>
</center>

<br>
<br>
<br>
	
<h1>List of Employees</h1>
<table class="list" name="employee">
	<tr>
		<th>Employee ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Street</th>
		<th>City</th>
		<th>State</th>
		<th>Zip</th>
		<th>Phone</th>
		<th>Email</th>
	</tr>
	<?php
	$sqlEmployee = "SELECT * FROM employee";
	$dbConnection = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
	$dataSet = mysqli_query($dbConnection, $sqlEmployee);
	
	while ($data = mysqli_fetch_assoc($dataSet)) { ?>
		<tr>
			<td><?php echo h($data['employee_id']); ?></td>
			<td><?php echo h($data['first_name']); ?></td>
			<td><?php echo h($data['last_name']); ?></td>
			<td><?php echo h($data['street']); ?></td>
			<td><?php echo h($data['city']); ?></td>
			<td><?php echo h($data['state']); ?></td>
			<td><?php echo h($data['zip']); ?></td>
			<td><?php echo h($data['phone']); ?></td>
			<td><?php echo h($data['email']); ?></td>
		</tr>
	<?php } ?>
</table>
	
<br>
<br>
<br>


<h1>List of Products</h1>
<table class="list" name="Products">
	<tr>
		<th>Serial Number</th>
		<th>Name</th>
		<th>Price</th>
		<th>Color</th>
		<th>Description</th>
		<th>Ram</th>
		<th>Storage</th>
		<th>Sold</th>
	</tr>
	<?php
	$sqlProduct = "SELECT * FROM product";
	$dbConnection = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
	$dataSet = mysqli_query($dbConnection, $sqlProduct);
	
	while ($data = mysqli_fetch_assoc($dataSet)) { ?>
		<tr>
			<td><?php echo h($data['serial_number']); ?></td>
			<td><?php echo h($data['name']); ?></td>
			<td><?php echo h($data['price']); ?></td>
			<td><?php echo h($data['color']); ?></td>
			<td><?php echo h($data['description']); ?></td>
			<td><?php echo h($data['ram']); ?></td>
			<td><?php echo h($data['storage']); ?></td>
			<td><?php echo h($data['sold']); ?></td>
		</tr>
	<?php } ?>
</table>
	
	

		

