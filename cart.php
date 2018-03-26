<?php
include 'dbConnect.php';
$serial_number = $_GET['num'];
session_start();
#print $serial_number;

?>

<!DOCTYPE html>
<html>
	<body bgcolor="#66ccff">
	<center>
	<h1>Buy My Apple</h1>
	<h2>Cart Page</h2>
	<?php
		if($_SESSION['Logged_in_user']){
			print "Welcome ".$_SESSION['Logged_in_user'];
			print "<br><p><a href='logoutCustomerPage.php'>Logout?</a></p>";
		} else {
			print "	<p><a href='customerLoginPage.html'>Login?</a></p>";
			print " <br><p><a href='registerCustomer.html'>Register</a></p>";
		}
	?>

	</center>
	<br>
	<br>
	<br>
	<center>
		<h1>Product in your Cart</h1>
		<table class="list" border="1" name="Products">
			<tr>
				<th>Serial Number</th>
				<th>Name</th>
				<th>Price</th>
				<th>Color</th>
				<th>Description</th>
				<th>Ram</th>
				<th>Storage</th>
			</tr>
			<?php
			$sqlProduct = "SELECT * FROM product WHERE serial_number = ".$serial_number;
			#print $sqlProduct;
			$dataSet = mysqli_query($dbConnect, $sqlProduct);
			
			while ($data = mysqli_fetch_assoc($dataSet)) { ?>
				<tr>
					<td><?php echo ($data['serial_number']); ?></td>
					<td><?php echo ($data['name']); ?></td>
					<td><?php echo ($data['price']); ?></td>
					<td><?php echo ($data['color']); ?></td>
					<td><?php echo ($data['description']); ?></td>
					<td><?php echo ($data['ram']); ?></td>
					<td><?php echo ($data['storage']); ?></td>
				<?php } ?>
				</tr>
		</table>
	</center>	
	<br>

	<center>
		<h1>Verify your information</h1>
		<table class="list" border="1" name="customers">
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Street</th>
				<th>City</th>
				<th>State</th>
				<th>Zip</th>
				<th>Phone</th>
				<th>Email</th>
			</tr>
			<tr>
				<td><?php echo $_SESSION['first_name']; ?></td>
				<td><?php echo $_SESSION['last_name']; ?></td>
				<td><?php echo $_SESSION['street']; ?></td>
				<td><?php echo $_SESSION['city']; ?></td>
				<td><?php echo $_SESSION['state']; ?></td>
				<td><?php echo $_SESSION['zip']; ?></td>
				<td><?php echo $_SESSION['phone']; ?></td>
				<td><?php echo $_SESSION['email']; ?></td>
			</tr>
		</table>
	</center>
	</body>
</html>