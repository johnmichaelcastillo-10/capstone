<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'config.php';

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM user_table WHERE name='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Login successful
        // Redirect to dashboard page
        header("Location: home.php");
        exit();
    } else {
        // Login failed
        // Display error message
        echo "<script>alert('Invalid username or password. Please try again.');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">

</head>

<body>
    <div class="container">
        <div class="center">
            <div class="row">
                <div class="leftSide col-6 rounded-start-5 border border-danger ">
                    <img src="img/logo-removebg-preview.png" alt="" class="img-fluid">
                </div>

                <div class="col-6 rightSide rounded-end-5 border border-danger">
                    <div>
                        <h3>Welcome Admin</h3>
                    </div>
                    <div class="rightContent">
                        <form class="form-control" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Enter
                                    Credentials</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="username" placeholder="Username">
                            </div>
                            <div class="col-auto">
                                <label for="inputPassword2" class="visually-hidden">Password</label>
                                <input type="password" class="form-control" id="inputPassword2" name="password" placeholder="Password">
                            </div>
                            <div class="col-auto">
                                <input type="submit" class="sumbitBtn btn" name="submit"></input>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>