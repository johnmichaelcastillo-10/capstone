<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'config.php';

// Check if user is not logged in, then redirect to login page
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vesion | Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body {
            background-color: #7A0505;
        }

        .topMenu {
            background-color: #1c2120;
            height: 150px;
        }

        .logo {
            display: flex;
            text-align: center;
            justify-content: center;
            height: 150px;
            width: auto;
            margin-left: 50px;

        }

        .title {
            display: flex;
            margin-left: 150px;
            margin-top: 10px;

        }

        h4 {
            font-size: 100px;
            color: whitesmoke;
            font-family: Pacifico;
        }


        a {
            color: whitesmoke;
            padding: 15px;
            font-size: 30px;
            margin-top: 50px;
            text-align: center;
        }

        .content {
            background-color: #7A0505;
            width: 100%;
        }

        .center {
            background-color: #1c2120;
            margin-top: 50px;
            margin-left: 200px;
            margin-right: 200px;
            height: auto;
            width: auto;
            padding: 20px;
            color: white;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: center;
            padding: 8px;
        }

        .btn-group {
            display: flex;
            justify-content: center;
        }

        .btn-group a {
            margin: 0 5px;
        }

        a {
            color: whitesmoke;
            padding: 15px;
            font-size: 22px;
            margin-top: 50px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    $id = $_GET['id'];
    $getName = "SELECT * FROM user_table WHERE id='$id'";
    $resultName = mysqli_query($con, $getName);
    $dataArray = mysqli_fetch_array($resultName);
    $name = $dataArray['name'];
    $contactnumber = $dataArray['contactnumber'];
    $address = $dataArray['address'];
    $password = $dataArray['password'];
    $email = $dataArray['email'];

    ?>
    <div class="container-fluid">
        <div class="topMenu row rounded-bottom-4">
            <div class="col"> <img src="img/logo-removebg-preview.png" class="logo rounded float-start" alt="...">
            </div>
            <div class="title col">
                <h4>Edit User</h4>
            </div>
            <div class="col offset-1">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" style="color:white; font-size: 22px" aria-current="page" href="home.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " style="color:white; font-size: 22px;" href="viewuser.php">View Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="color:white; font-size: 22px;" href="edit_admin_page.php">View Admin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="color:white; font-size: 22px;" href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

        </div>

    </div>

    <div class="center rounded-5">
        <div class="row h4 pb-2 mb-4 text-white border-3 border-bottom border-white">
            <div class="col">

                <h1 class="text-center">EDIT: <?php echo $name ?></h1>
            </div>
        </div>
        <form class="row g-3" action="edit.php?id=<?php echo $id ?>" method="POST">

            <div class="col-md-6 text-center" style="color: whitesmoke">
                <label for="inputEmail4" class="form-label fw-bold">Name</label>
                <input class="form-control bg-dark text-white rounded-pill text-capitalize" name="name" value="<?php echo $name ?>" id="inputEmail4">
            </div>
            <div class="col-md-6 text-center" style="color: whitesmoke">
                <label for="inputPassword4" class="form-label fw-bold">Email</label>
                <input type="email" class="rounded-pill form-control bg-dark text-white" name="email" value="<?php echo $email ?>" id="inputPassword4">
            </div>
            <div class="col-md-6 text-center" style="color: whitesmoke">
                <label for="inputEmail4" class="form-label fw-bold">Contact Number</label>
                <input class="rounded-pill form-control bg-dark text-white" type="number" name="contactnumber" maxlength="11" value="<?php echo $contactnumber ?>" id="inputEmail4">
            </div>

            <div class="col-md-6 text-center" style="color: whitesmoke">
                <label for=" inputPassword4" class="form-label fw-bold">Address</label>
                <input class="rounded-pill form-control bg-dark text-capitalize text-white" name="address" value="<?php echo $address ?>" id="inputPassword4">
            </div>
            <div class="col-md-6 text-center" style="color: whitesmoke">
                <label for="inputEmail4" class="form-label fw-bold">Password</label>
                <input class="rounded-pill form-control bg-dark text-white" name="password" value="<?php echo $password ?>" id="inputEmail4">
            </div>
            <div class="col-md-6 text-center" style="color: whitesmoke">
                <label for=" inputPassword4" class="form-label fw-bold">Confirm Password</label>
                <input class="rounded-pill form-control  bg-dark text-white" name="confirmpassword" value="<?php echo $password ?>" id="inputPassword4">
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="rounded-pill btn text-white fw-bold me-md-2" style="background-color: #7A0505;" name="submit" value="submit" type="submit">Submit</button>
            </div>
        </form>

</body>

</html>