<?php
session_start();

if($_SESSION['adminEmail'] != ''){
        $adminEmail = $_SESSION['adminEmail'];
} else {
        $adminEmail = "NULL";
}

print $adminEmail;

define("BACKUP_PATH", "/var/www/IT350/backups/");

require '/home/webadmin/vendor/autoload.php';

use Elasticsearch\ClientBuilder;

$client = ClientBuilder::create()->build();

$date = date('l jS \of F Y h:i:s A');


$params = [
    'index' => 'my_index',
    'type' => 'my_type',
    'body' => [
        "email" => $adminEmail,
        "DBType" => "MongoDB",
        "date" =>  $date
]
];

$response = $client->index($params);


$server_name   = "localhost";
$database_name = "BuyMyApple";
$date_string   = date("Ymdhm");

$cmd = "sudo mongodump -d BuyMyApple -o ~/var/www/IT350/backups/";

exec($cmd);

print "<html>";
print "<body bgcolor='#66ccff'>";
print "<h2>";
print "<center>"; 
print "BACKUP SUCCESSFUL!!<br>";
print "Click <a href='administratorPage.pl'><b>here</b></a> to navigate back to DB Admin Page.";
print "</h2>";

?>
