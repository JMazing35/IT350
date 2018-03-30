<?php
include 'dbConnect.php';
session_start();
#print $_SESSION['first_name'];
#print $_SESSION['ID'];
$productSQL = "";
if(isset($_SESSION['filter'])){
	$productSQL = $_SESSION['filter'];
}else {
	$productSQL = "SELECT * FROM product WHERE sold != 1";
}


?>

<!DOCTYPE html>
<html>
	<body bgcolor="#66ccff">
	<center>
	<h1>Buy My Apple</h1>
	<?php
		if($_SESSION['Logged_in_user']){
			print "Welcome ".$_SESSION['Logged_in_user'];
			print "<br><p><a href='logoutCustomerPage.php'>Logout?</a></p>";
		} else {
			print "	<p><a href='customerLoginPage.php'>Login?</a></p>";
			print " <br><p><a href='register.py'>Register</a></p>";
		}
	?>

	</center>
	<br>
	<center>
		<h2>Filter By Product Type:</h2>
		<form method="POST" action="filter.php">
			<select name="filter">
				<option value="None">None</option>
				<option value="Apple iPhone">Apple iPhone</option>
				<option value="Apple TV">Apple TV</option>
				<option value="Apple Watch">Apple Watch</option>
				<option value="Macbook">Macbook</option>
				<option value="Price_ASC">Price Low to High</option>
				<option value="Price_DESC">Price High to Low</option>
			</select>
			<br>
			<input type="submit">
		</form>
	</center>
	<br>
	<br>
	<center>
		<h1>Available Products</h1>
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
			$sqlProduct = "SELECT * FROM product WHERE sold != 1";
			$dataSet = mysqli_query($dbConnect, $productSQL);
			
			while ($data = mysqli_fetch_assoc($dataSet)) { ?>
				<tr>
					<td><?php echo ($data['serial_number']); ?></td>
					<td><?php echo ($data['name']); ?></td>
					<td><?php echo ($data['price']); ?></td>
					<td><?php echo ($data['color']); ?></td>
					<td><?php echo ($data['description']); ?></td>
					<td><?php echo ($data['ram']); ?></td>
					<td><?php echo ($data['storage']); ?></td>
				<?php
					$serial_number = $data['serial_number'];
					#print $serial_number;
					#print $_SESSION['Logged_in']."<br>";
					if($_SESSION['Logged_in'] == 1){
					print '<td><button type="submit"><a href="/cart.php?num='.$serial_number.'">Add to Cart</a></button></td>';
					} 
				} ?>
					
				</tr>
		</table>
	</center>	
	<br>

	</body>
</html>
