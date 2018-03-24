<?php
include 'dbConnect.php';
session_start();
if($_SESSION['Logged_in'] == 0) { header("location: adminLoginPage.php");}
?>

<!DOCTYPE html>
<html>
	<body bgcolor="#66ccff">
	<center>
	<h1>Buy My Apple</h1>
	<p><a href="logoutPage.php">Logout?</a></p>
	</center>
	<br>
	<br>
	<br>
	<center>
		<h1>List of Products</h1>
		<table class="list" border="1" name="Products">
			<tr>
				<th>Serial Number</th>
				<th>Name</th>
				<th>Price</th>
				<th>Color</th>
				<th>Description</th>
				<th>Ram</th>
				<th>Storage</th>
				<th>Purchase</th>
			</tr>
			<?php
			$sqlProduct = "SELECT * FROM product";
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
					<td><button type="addToCart" action="cart.php">Add to Cart</button>
				</tr>
		</table>
	</center>	
	<br>

	</body>
</html>