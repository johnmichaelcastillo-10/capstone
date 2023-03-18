<?php
include_once 'config.php';

// Check if user is not logged in, then redirect to login page
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("location: index.php");
    exit;
}

$id = $_GET['id'];
if (isset($_POST['submit'])) {

    // retrieve the form input

    $name = $_POST['name'];
    $email = $_POST['email'];
    $contactnumber = $_POST['contactnumber'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // validate the form input as needed
    // ...

    // check if the password and confirm password fields match
    if ($password != $confirmpassword) {
        echo "<script>
            alert('Password not match');
            window.location.href='edit.php?id=$id';
            </script>";
        exit();
    }

    // check if the contact number is valid
    if (strlen($contactnumber) != 11) {
        echo "<script>
            alert('Invalid contact number');
            window.location.href='edit.php?id=$id';
            </script>";
        exit();
    }

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // update the database record with the new data
    $id = $_GET['id'];
    $sql = "UPDATE user_table SET name='$name', email='$email', contactnumber='$contactnumber', address='$address', password='$password' WHERE id=$id";

    if ($con->query($sql) === TRUE) {
        echo "<script>
            alert('Success! Data has been successfully updated!');
            window.location.href='viewuser.php';
            </script>";
    } else {
        echo "Error updating record: " . $con->error;
    }

    $con->close();
} else {
    // redirect the user back to the form page
    header("Location: edit_page.php?id=$id");
    exit();
}
