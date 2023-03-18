<?php
// Establish database connection
include_once 'config.php';

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Fetch user data from database
$get_user_data = "SELECT * FROM user_table";
$run_user_data = mysqli_query($con, $get_user_data);

// Store user data in an array
$user_data = array();
while ($row = mysqli_fetch_assoc($run_user_data)) {
    $user_data[] = $row;
}

// Return user data as a JSON object
header('Content-Type: application/json');
echo json_encode($user_data);
