<?php


session_start();

if($_SESSION['adminEmail'] != ''){
        $adminEmail = $_SESSION['adminEmail'];
} else {
        $adminEmail = "NULL";
}

require '/home/webadmin/vendor/autoload.php';

use Elasticsearch\ClientBuilder;

$client = ClientBuilder::create()->build();

$date = date('l jS \of F Y h:i:s A');

$params = [
    'index' => 'my_index',
    'type' => 'my_type',
    'body' => [
        "email" => $adminEmail,
        "DBType" => "ElasticSearch",
        "date" =>  $date
]
];

$response = $client->index($params);


$cmd = "curl -XPUT 'localhost:9200/_snapshot/my_backup/snapshot_1?wait_for_completion=true&pretty'";

exec($cmd);

print "<html>";
print "<body bgcolor='#66ccff'>";
print "<h2>";
print "<center>"; 
print "Backup (Snapshot) of ElasticSearch was successful (File: /var/www/IT350/backups/elasticsearch/my_backup)<br>";
print "Click <a href='administratorPage.pl'><b>here</b></a> to navigate back to DB Admin Page.";
print "</h2>";


?>

