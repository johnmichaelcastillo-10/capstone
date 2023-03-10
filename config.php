<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Database configuration
$host     = "containers-us-west-124.railway.app"; // The host name or IP address of the database server
$username = "root"; // The database username
$password = "auw3pgwDCAszySkU5bKC"; // The database password
$dbname   = "railway"; // The name of the database to connect to
$dbport   = "5684";

// Attempt to connect to the database
$con = mysqli_connect($host, $username, $password, $dbname, $dbport);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
