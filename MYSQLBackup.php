<?php
session_start();

if($_SESSION['adminEmail'] != ''){
	$adminEmail = $_SESSION['adminEmail'];
} else {
	$adminEmail = "NULL";
}

define("BACKUP_PATH", "/var/www/IT350/backups/");

#MySQL Variables
$server_name   = "localhost";
$username      = "root";
$password      = "gojazz";
$database_name = "BuyMyApple";
$date_string   = date("Ymdhm");

#DEBUGGING-$cmd = "mysqldump --routines -h {$server_name} -u {$username} -p{$password} {$database_name} > " . BACKUP_PATH . "{$date_string}_{$database_name}.sql";

#DEBUGGING-exec($cmd);

print "<html>";
print "<body bgcolor='#66ccff'>";
print "<h2>";
print "<center>"; 
print "BACKUP SUCCESSFUL!!<br>";
print "Click <a href='administratorPage.pl'><b>here</b></a> to navigate back to DB Admin Page.";
print "</h2>";


require '/home/webadmin/vendor/autoload.php';

use Elasticsearch\ClientBuilder;

$client = ClientBuilder::create()->build();

$date = date('l jS \of F Y h:i:s A');


$params = [
    'index' => 'my_index',
    'type' => 'my_type',
    'body' => [
	"email" => $adminEmail,
	"DBType" => "MySQL",
	"date" =>  $date
]
];

#DEBUGGING-$response = $client->index($params);

$json = '{"query":{"bool":{"must":[{"match_all":{}}]}}}';
$params = [
    "scroll" => "1m",
    "size" => 50,
    "index" => "my_index",
    "type" => "my_type",
    "body" => $json 
];

$response = $client->search($params);

#echo json_encode($response, JSON_PRETTY_PRINT);
$json_encoded = json_encode($response, JSON_PRETTY_PRINT);
#print $json_encoded;

$myJson = (string)$json_encoded;

#print $myJson;

$array = json_decode($myJson, true);


#Set Up Table

print "<center>";
print "<h3>List of All Backups:</h3>";
print "<table class='list' border='1' name='employee'>";
print "        <tr>";
print "               <th>Email</th>";
print "               <th>Database Type</th>";
print "               <th>Date & Time</th>";
print "        </tr>";




foreach ($array as $innerArray){
	//
	#echo "1st For Each<br>";
	#echo $innerArray['total'];
	#echo $innerArray['_id'];
	#echo "<br>";
	if (is_array($innerArray)){
		//
		#echo "InnerArray is Array!<br>";
		foreach ($innerArray as $InnerInnerArray){
			//
			#echo "2nd For Each<br>";
			#echo $InnerInnerArray['_id'];
			#echo "<br>";
			#echo $InnerInnerArray['email'];
			if(is_array($InnerInnerArray)){
				//
				#echo "InnerInnerArray is array<br>";
				foreach($InnerInnerArray as $WayInnerArray){
					#echo "3rd For Each<br>";
					#var_dump ($value);
					#echo "<br><br>";
					#echo $value['email'];
					if (is_array($WayInnerArray)){
						#echo "TESTING<br>";
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
