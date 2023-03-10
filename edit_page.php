<?php
session_start();

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
    <div class="container-fluid">
        <div class="topMenu row rounded-bottom-4">
            <div class="col"> <img src="img/logo-removebg-preview.png" class="logo rounded float-start" alt="...">
            </div>
            <div class="title col">
                <h4>Vesion</h4>
            </div>
            <div class="col">
                <a href="home.php" class="text-uppercase">Home</a>
                <a href="viewuser.php" class="text-uppercase">View Users</a>
                <a href="#" class="text-uppercase">View Admin</a>
                <a href="logout.php" name="logout" class="text-uppercase">Logout</a>

            </div>

        </div>

    </div>

    <div class="center rounded-5">
        <div class="row h4 pb-2 mb-4 text-white border-3 border-bottom border-white ">
            <div class="col">
                User
            </div>
        </div>
        <div class="row"></div>
    </div>

</body>

</html>