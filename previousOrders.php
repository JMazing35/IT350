<?php
include 'dbConnect.php';
session_start();
$productID = $_SESSION['productID'];
#print $productID;

$date = date("l jS \of F Y h:i:s A");
#print $date;

$connection = new MongoDB\Driver\Manager("mongodb://localhost:27017");
$bulk = new MongoDB\Driver\BulkWrite;

#if ($connection){
#        print "it works mongodb driver<br>";
#}

$name = $_SESSION['p_name'];
$sn = $_SESSION['p_SN'];
$description = $_SESSION['p_description'];
$price = $_SESSION['p_price'];
$customer_ID = $_SESSION['ID'];

$document = array(
        "product_name" => $name,
        "serial_number" => $sn,
        "description" => $description,
        "price" => $price,
        "customer_ID" => $customer_ID,
        "date" =>  $date
);


$bulk->insert($document);
$connection->executeBulkWrite('BuyMyApple.orders', $bulk);



$sql = "UPDATE product SET sold = 1 WHERE serial_number = ".$productID;
#print $sql;

mysqli_query($dbConnect, $sql);

?>



<!DOCTYPE html>
<html>
        <body bgcolor="#66ccff">
        <center>
        <h1>Buy My Apple</h1>
        <h2>Order Confirmation</h2>
        <?php
                if($_SESSION['Logged_in_user']){
                        print "Thanks for your order ".$_SESSION['Logged_in_user'];
                } 
                print "<p>\nYour order was placed successfully. Navigate to <a href='/homePage.php'>BuyMyApple</a> to continue shopping!!</p>";
        ?>

        </center>
        <br>
        <center>
                <h1>Order Information</h1>
                <table class="list" border="1" name="Products">
                        <tr>
                                <th>Order Number</th>
                                <th>Product Name</th>
                                <th>Serial Number</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Customer ID</th>
                                <th>Date</th>
                        </tr>
                        <tr>
                                <td><?php echo "1111"; ?></td>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $sn; ?></td>
                                <td><?php echo $description; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $customer_ID; ?></td>
                                <td><?php echo $date;?></td>
                        </tr>
                </table>
        </center> 
        <br>
        </body>
</html>


