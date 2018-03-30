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
<h2>Employee List To Distribute</h2>
<p><a href="logoutPage.php">Logout?</a></p>
<p><a href="adminPage.php">Back to Admin Page</a></p>
</center>

<br>
<br>
<br>
<center>        
<h1>List of Employees</h1>
<table class="list" border="1" name="employee">
        <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Email</th>
        </tr>
        <?php
        $sqlEmployee = "SELECT * FROM employeeList";
        $dataSet = mysqli_query($dbConnect, $sqlEmployee);
        
        while ($data = mysqli_fetch_assoc($dataSet)) { 
        ?>
                <tr>
                        <td><?php echo ($data['first_name']); ?></td>
                        <td><?php echo ($data['last_name']); ?></td>
                        <td><?php echo ($data['phone']); ?></td>
                        <td><?php echo ($data['email']); ?></td>
                </tr>
        <?php } ?>
</table>
</center>
