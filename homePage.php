<?php
include 'dbConnect.php';
session_start();
#include 'verifyCustomerLogin';
#if($_SESSION['Logged_in'] != 1) { header("location: verifyCustomerLogin.php");}
#print $_SESSION['Logged_in_user'];
#print " IS THE LOGGED IN USER'S NAME <br><br>";
#print $_SESSION['Logged_in_user'];

?>

<!DOCTYPE html>
<html>
	<body bgcolor="#66ccff">
	<center>
	<h1>Buy My Apple</h1>
	<?php
		if($_SESSION['Logged_in_user']){
			print "Welcome ".$_SESSION['Logged_in_user'];
			print "<br><p><a href='logoutPage.php'>Logout?</a></p>";
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
