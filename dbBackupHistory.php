<?php

require '/home/webadmin/vendor/autoload.php';

use Elasticsearch\ClientBuilder;

$client = ClientBuilder::create()->build();

$json = '{"query":{"bool":{"must":[{"match_all":{}}]}}}';
$params = [
    "scroll" => "1m",
    "size" => 50,
    "index" => "my_index",
    "type" => "my_type",
    "body" => $json 
];

$response = $client->search($params);

$json_encoded = json_encode($response, JSON_PRETTY_PRINT);

$myJson = (string)$json_encoded;


$array = json_decode($myJson, true);

#Set Up Table
print "<html>";
print "<body bgcolor='#66ccff'>";
print "<center>";
print "<h1>Database Backup Page</h1>";
print "Click <a href='administratorPage.pl'><b>here</b></a> to navigate back to Database Admin Page.";
print "<br>";
print "<h3>List of All Backups:</h3>";
print "<table class='list' border='1' name='employee'>";
print "        <tr>";
print "               <th>Started by Email</th>";
print "               <th>Database Type</th>";
print "               <th>Date & Time</th>";
print "        </tr>";

foreach ($array as $innerArray){
        //
        if (is_array($innerArray)){
                //
                foreach ($innerArray as $InnerInnerArray){
                        //
                        if(is_array($InnerInnerArray)){
                                //
                                foreach($InnerInnerArray as $WayInnerArray){
                                        if (is_array($WayInnerArray)){
                                                foreach($WayInnerArray as $value){
                                                        if (strlen($value['email'])  == 1){
                                                                continue;
                                                        } else {
                                                                print "<tr>";
                                                                print "<td>".$value['email'];
                                                                print "<td>".$value['DBType'];
                                                                print "<td>".$value['date'];
                                                                echo "<tr>";
                                                        }
                                                }
                                        }
                                }
                        }
                }
        }
}


?>
