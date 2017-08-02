<?php 
// db details
$dbHost = 'locahost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'nissan';


// Connect and select the database
$db = new mysqli($dbHost, $dbUsername, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
	die("Connection failed: " . $db->connect_error);
}
?>
