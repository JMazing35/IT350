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
<table class="list">
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
	$sql = "SELECT * FROM employee";
	$dbConnection = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
	$dataSet = mysqli_query($dbConnection, $sql);
	
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
</table>
	
	
	
	}
		

