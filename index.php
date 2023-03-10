<?php
session_start();
include_once 'config.php';

// Check if user is already logged in, if yes then redirect to home page
if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
    header("location: home.php");


    exit;
}

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT * FROM admin_tbl WHERE username='$username' AND password='$password'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {


        // Login successful
        // Set session variables
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        // Redirect to home page
        header("Location: home.php");
        exit();
    } else {
        // Login failed
        // Display error message
        $error = "Invalid username or password. Please try again.";
        echo $error; // Add this line to verify the error message
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
    <style>
        html,
        body {
            background-color: whitesmoke;
            color: white;
            height: 100%;
            width: 100%;

        }

        .center {
            margin-top: 200px;
            margin-left: 200px;
            margin-right: 200px;
            height: 500px;
            display: flex;
            justify-content: center;
        }

        .leftSide {
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;

        }

        .rightSide {
            color: #FEE6E6;
            background-color: #7A0505;
            padding: 20px;
            justify-content: center;
            align-items: center;
        }

        form {
            margin-top: 85px;
        }

        h3 {
            align-items: center;
            justify-content: center;
        }

        .sumbitBtn {
            margin-top: 10px;
            background-color: #7A0505;
            color: #FEE6E6;

        }

        img {
            display: block;
            margin: 0 auto;
        }
    </style>

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
                    <?php if (isset($error)) : ?>
                        <p><?php echo $error; ?></p>
                    <?php endif; ?>
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