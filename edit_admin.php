<?php
include_once 'config.php';
$id = $_GET['id'];
if (isset($_POST['submit'])) {

    // retrieve the form input

    $name = $_POST['name'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // validate the form input as needed
    // ...

    // check if the password and confirm password fields match
    if ($password != $confirmpassword) {
        echo "<script>
            alert('Password not match');
            window.location.href='edit_admin_page.php?id=$id';
            </script>";
        exit();
    }

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // update the database record with the new data
    $id = $_GET['id'];
    $sql = "UPDATE admin_tbl SET admin_name='$name', password='$password' WHERE id=$id";

    if ($con->query($sql) === TRUE) {
        echo "<script>
            alert('Success! Data has been successfully updated!');
            window.location.href='edit_admin_page.php';
            </script>";
    } else {
        echo "Error updating record: " . $con->error;
    }

    $con->close();
} else {
    // redirect the user back to the form page
    header("Location: edit_admin_page.php?id=$id");
    exit();
}
