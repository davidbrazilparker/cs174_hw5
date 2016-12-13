<?php 
namespace roommates\hw5\configs;
//require_once './vendor/autoload.php';
$SERVERNAME = "localhost"; 
$USERNAME = "root"; 
$PASSWORD = null; 
define("DB", "hw5");

// Create connection
$mysqli = new \mysqli($SERVERNAME, $USERNAME, $PASSWORD);
// Check connection
if ($mysqli->connect_error) {
   echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} 

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS " . DB;
if ($mysqli->query($sql) !== TRUE) { 
    echo "Error creating database: " . $mysqli->error;
} else{
	$mysqli->query("use " . DB);
}

$sql = "CREATE TABLE IF NOT EXISTS Wishes(".
		"md5 CHAR(32),".
		"UserName char(32),".
		"wish TEXT,".
		"fountainNum INT,".
		"fountainName TEXT,".
		"fountainLocation TEXT".
		")";
if ($mysqli->query($sql) !== TRUE) {
	echo "Error creating table: " . $mysqli->error;
}

$mysqli->close();