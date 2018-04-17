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
<h2>Welcome to the Admin Webpage</h2>
<p><a href="logoutPage.php">Logout?</a></p>
<p><a href="administratorPage.pl">DB Administrator Page</a></p>
</center>

<br>
<br>
<br>
<center>
<h1>List of Employees</h1>
<table class="list" border="1" name="employee">
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
	$dataSet = mysqli_query($dbConnect, $sqlEmployee);
	
	while ($data = mysqli_fetch_assoc($dataSet)) { 
	?>
		<tr>
			<td><?php echo ($data['employee_id']); ?></td>
			<td><?php echo ($data['first_name']); ?></td>
			<td><?php echo ($data['last_name']); ?></td>
			<td><?php echo ($data['street']); ?></td>
			<td><?php echo ($data['city']); ?></td>
			<td><?php echo ($data['state']); ?></td>
			<td><?php echo ($data['zip']); ?></td>
			<td><?php echo ($data['phone']); ?></td>
			<td><?php echo ($data['email']); ?></td>
		</tr>
	<?php } ?>
</table>
</center>	
<center>
	<p>For Employee List to Distribute internally, click <a href="employeeList.php">here</a></p>
</center>
<br>
<br>
<h3>Remove Employee by ID:</h3>

<div>
  
  <form class="modal-content animate" name="removeEmployee" method="POST" action="/deleteEmployee.php">
    <div class="container">
      <label for="ID"><b>ID:</b></label>
      <input type="text" placeholder="Enter ID" id="employeeID" name="employeeID" required>
      <button type="submit">Delete</button>
    </div>
  </form>
</div>
<h3>Add Employee</h3>
<div>
  <form name="addEmployee" method="POST" action="/addEmployee.php">
    <div class="container">
      <label for="serial_number"><b>SSN: </b></label>
      <input type="int" maxlength="9" placeholder="Enter SSN" id="ssn" name="ssn" required>

      <label for="first_name"><b>First Name: </b></label>
      <input type="text" placeholder="Enter First Name" id="first_name" name="first_name" required>

      <label for=""><b>Last Name:: </b></label>
      <input type="text" placeholder="Enter Last Name" id="last_name" name="last_name" required>

      <label for="street"><b>Street: </b></label>
      <input type="text" placeholder="Enter Street" id="street" name="street" required>

      <label for="city"><b>City: </b></label>
      <input type="text" placeholder="Enter City" id="city" name="city" required>

      <label for="state"><b>State: </b></label>
      <input type="text" placeholder="Enter State" id="state" name="state" required>

      <label for="zip"><b>ZIP: </b></label>
      <input type="int" maxlength="9" placeholder="Enter Zip" id="zip" name="zip" required>

      <label for="phone"><b>Phone: </b></label>
      <input type="int" maxlength="20" placeholder="Enter Phone" id="phone" name="phone" required>

      <label for="email"><b>Email: </b></label>
      <input type="email" placeholder="Enter Email" id="email" name="email" required>

      <label for="zip"><b>Password: </b></label>
      <input type="password" placeholder="Enter Password" id="password" name="password" required>

      <button type="submit">Add Employee</button>
    </div>
  </form>
</div>
<br>
<center>
<h1>List of Products</h1>
<table class="list" border="1"  name="Products">
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
			<td><?php echo ($data['sold']); ?></td>
		</tr>
	<?php } ?>
</table>
<p>To place items on sale (25% Off), enter: CALL sale25() from BuyMyApple database. To remove items from sale, enter: CALL removeSale().</p>
</center>
<br>
<br>
<br>
<h3>Remove Product by Serial Number:</h3>

<div>
  
  <form name="removeProduct" method="POST" action="/deleteProduct.php">
    <div class="container">
      <label for="ID"><b>Serial Number: </b></label>
      <input type="text" placeholder="Enter Serial Number" id="serial_number" name="serial_number" required>
      <button type="submit">Delete</button>
    </div>
  </form>
</div>

<br>
<br>
<br>
<h3>Add Products</h3>
<div>
  <form name="addProduct" method="POST" action="/addProduct.php">
    <div class="container">
      <label for="serial_number"><b>Serial Number: </b></label>
      <input type="text" placeholder="Enter Serial Number" id="serial_number" name="serial_number" required>
      <label for="name"><b>Name: </b></label>
      <input type="text" placeholder="Enter Name" id="name" name="name" required>
      <label for=""><b>Price: </b></label>
      <input type="number" min="1" step="any" placeholder="Enter Price" id="price" name="price" required>
      <label for="color"><b>Color: </b></label>
      <input type="text" placeholder="Enter Color" id="color" name="color" required>
      <label for="description"><b>Description: </b></label>
      <input type="text" placeholder="Enter Description" id="description" name="description" required>
      <label for="ram"><b>RAM: </b></label>
      <input type="text" placeholder="Enter RAM" id="ram" name="ram" required>
      <label for="storage"><b>Storage: </b></label>
      <input type="text" placeholder="Enter Storage" id="storage" name="storage" required>
      <button type="submit">Add Product</button>
    </div>
  </form>
</div>

<br>
<br>
<br>

</body>
</html>

	
	

		

