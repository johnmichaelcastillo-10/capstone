<?php

session_start();


// Enable error reporting.
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration.
$host     = "containers-us-west-164.railway.app"; // The host name or IP address of the database server.
$username = "root"; // The database username.
$password = "pTSrdpsn4vaEFfkVVStB"; // The database password.
$dbname   = "railway"; // The name of the database to connect to.
$dbport   = "6270";

// Attempt to connect to the database.
$con = mysqli_connect($host, $username, $password, $dbname, $dbport);

// Check connection.
if (!$con) {
    die("Connection failed: " . mysqli_connect_error()); // Output error message when fails to connect.
}
