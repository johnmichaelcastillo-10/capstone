<?php


// Include the database connection file
include_once 'config.php';

// Query the database to get the total number of registered users
$sql = "SELECT COUNT(*) FROM user_table";
$result = mysqli_query($con, $sql);

// Fetch the result as an associative array
$row = mysqli_fetch_assoc($result);

// Return the total number of registered users as a response to the AJAX request
echo $row['COUNT(*)'];

// Close the database connection
mysqli_close($con);
