<?php
include('config.php');

// Check if user is not logged in, then redirect to login page
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("location: index.php");
    exit;
}

$id = $_GET['id'];

if (isset($_POST['confirm_delete'])) {
    $delete = "DELETE FROM user_table WHERE id = $id";
    $run_data = mysqli_query($con, $delete);

    if ($run_data) {
        header('location:viewuser.php');
    } else {
        echo "Error";
    }
}
?>

<!--A form for deleting user record-->
<form id="delete-form" method="post">
    <input type="hidden" name="confirm_delete" value="1">
</form>

<script>
    // Prompt the user to confirm before deleting the record
    var confirmed = confirm('Are you sure you want to delete this record?');
    if (confirmed) {
        // Submit the form and delete the record
        document.getElementById('delete-form').submit();
    } else {
        // Redirect to view user page without deleting the record
        window.location.href = 'viewuser.php';
    }
</script>