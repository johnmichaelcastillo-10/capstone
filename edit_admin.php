<?php
// Include the configuration file
include_once 'config.php';

// Check if user is not logged in, then redirect to login page
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("location: index.php");
    exit;
}

// Retrieve and sanitize the ID from the query string
$id = $_GET['id'];
$id = mysqli_real_escape_string($con, $id);

// Check if the form was submitted
if (isset($_POST['submit'])) {

    // Retrieve and sanitize the form input
    $name = $_POST['name'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // Validate the form input as needed
    // ...

    // Check if the password and confirm password fields match
    if ($password != $confirmpassword) {
        echo "<script>
            alert('Password not match');
            window.location.href='edit_admin_page.php?id=$id';
            </script>";
        exit();
    }

    // If the connection to the database fails, output an error message
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Update the relevant database record with the new data
    $sql = "UPDATE admin_tbl SET admin_name='$name', password='$password' WHERE id=$id";

    if ($con->query($sql) === TRUE) {
        echo "<script>
            alert('Success! Data has been successfully updated!');
            window.location.href='edit_admin_page.php';
            </script>";
    } else {
        echo "Error updating record: " . $con->error;
    }

    // Close the database connection
    $con->close();

    // If the form wasn't submitted, redirect back to the editing page
} else {
    header("Location: edit_admin_page.php?id=$id");
    exit();
}
