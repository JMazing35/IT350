#!/usr/bin/perl

# PERL MODULES
#use strict;
#use warnings;
use DBI;
use MongoDB;
use Data::Dumper;
use Search::Elasticsearch;
#use MySQL::Backup;

# HTTP HEADER
print "Content-type: text/html \n\n";

# MYSQL CONFIG VARIABLES
$host = "localhost";
$database = "BuyMyApple";
$user = "root";
$pw = "gojazz";

# PERL CONNECT()
$myConnection = DBI->connect("DBI:mysql:BuyMyApple:localhost", "root", "gojazz");

print "<html>";
print "<body bgcolor='#66ccff'>";
print "<center>";
print "<h1>Buy My Apple<br></h1>";
print "<h2>DB Owner Page</h2>";
print "Click <a href='adminPage.php'><b>here</b><a> to navigate back to Admin Page.";
print "<br>";
print "<br><br>";

#my $sth  = $myConnection->prepare("status;");
#$result = $sth->execute();

#print Dumper $result;



#print Dumper $result;

#print $result;

#print "<h1>TESTING</h1>";

if ($myConnection){
        print "<h4>Connected to MySQL Database</h4>";
	print "<p style='color:green'>Status: <b>Active</b></p>";
	print (system("sudo service mysql status"));
	print "<br>";
	print "Click <a href='MYSQLBackup.php'><b>here</b></a> to back up the MySQL Database.<br><br>";
} else {
        print "Could not connect to MySQL Database<br><br>";
        print "<p style='color:red'>Status: <b>Not Running</b></p>";
}

print "<br><br>";

#Commented out for now
my $client = MongoDB->connect();

#my $db = $client->get_database('BuyMyApple');
#my $coll = $db->get_collection("customers");


# run a command on a database
#my $res = $db->run_command();


#my $dbAdmin = $client->admin;

if($client){
	print "<h4>Connected to MongoDB Database</h4>";
        print "<p style='color:green'>Status: <b>Active</b></p>";
        print (system("mongo --version"));
	print "<br>";
	print "Click <a href='MONGODBBackup.php'><b>here</b></a> to back up the MongoDB Database.<br><br>";
} else {
	print "Could not connect to MongoDB Database<br><br>";
	print "<p style='color:red'>Status: <b>Not Running</b></p>";
}


print "<br><br>";

#my $db = $client->get_database('BuyMyApple');
#Mongo DB Command for db.serverStatus().uptime or .host or .localTime


#!$query = $db->run_command({dbStats => 1});
#!print Dumper $query;


#Elastic Search
my $e = Search::Elasticsearch->new();
if ($e){
	print "<h4>Connected to ElasticSearch</h4>";
        print "<p style='color:green'>Status: <b>Active</b></p>";
	print (system('curl localhost:9200'));
	print "<br>";
	print "Click <a href='ElasticSearchBackup.php'><b>here</b></a> to back up ElasticSearch.<br><br>";
} else {
	print "Could not connect to ElasticSearch.<br><br>";
        print "<p style='color:red'>Status: <b>Not Running</b></p>";
}

print "<br><br>";


print "For backup history, click <a href='dbBackupHistory.php'><b>here</b></a>";


print "</center>";
print "</body>";
print "</html>";


