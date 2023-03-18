<?php
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
        // Display error message using JS alert 
        echo '<script>alert("Invalid username or password. Please try again.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        html,
        body {
            background-color: whitesmoke;
            color: white;
        }

        .center {
            margin-top: 10%;
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
                <div class="leftSide col rounded-start-5 border border-danger">
                    <img src="img/logo-removebg-preview.png" alt="Logo" width="400px" height="400px">
                </div>
                <div class="rightSide col rounded-end-5 border border-danger">
                    <form action="" method="POST">
                        <h2 class="text-center">Login</h2>
                        <div class="form-floating mb-3 text-black">
                            <input class="form-control" id="floatingInput" name="username" placeholder="name@example.com">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating text-black">
                            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-block  sumbitBtn" style="background-color: white; color: #7A0505;" name="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>