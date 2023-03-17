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
    <title>Vesion | Home</title>
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



        .content {
            background-color: #7A0505;
            width: 100%;
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
        <div class="content container-fluid"></div>
    </div>

</body>

</html>