<?php

include('config.php');
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

<form id="delete-form" method="post">
    <input type="hidden" name="confirm_delete" value="1">
</form>

<script>
    var confirmed = confirm('Are you sure you want to delete this record?');
    if (confirmed) {
        document.getElementById('delete-form').submit();
    } else {
        window.location.href = 'viewuser.php';
    }
</script>