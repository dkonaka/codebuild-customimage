<?php
error_reporting(E_ALL);

$servername = "mr1q5vpuybgdgza.cver3nz5kxfk.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "password";
$database = "myDatabase";
try {
     	//Connect to database
    $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password) or die("Connection Refused");

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

