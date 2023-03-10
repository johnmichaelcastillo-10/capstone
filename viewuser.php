<?php
session_start();

// Check if user is not logged in, then redirect to login page
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("location: index.php");
    exit;
}
include_once 'config.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/viewuser.css">
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

        label {
            color: white;
        }

        #table_info {
            color: white;
        }

        #table_next {
            color: white;
        }

        #table_previous {
            color: white;
        }

        .dataTables_empty {
            color: black;
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
                <h4>View Users</h4>
            </div>
            <div class="col">
                <a href="home.php" class="text-uppercase">Home</a>
                <a href="viewuser.php" class="text-uppercase">View Users</a>
                <a href="#" class="text-uppercase">View Admin</a>
                <a href="logout.php" name="logout" class="text-uppercase">Logout</a>
            </div>

        </div>
        <div class="center rounded-5">
            <div class="row">
                <table id="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $get_user_data = "SELECT * FROM user_table";
                        $run_user_data = mysqli_query($con, $get_user_data);
                        $i = 0;
                        while ($row = mysqli_fetch_array($run_user_data)) {
                            $sl = ++$i;
                            $name = $row['name'];
                            $email = $row['email'];
                            $contactNumber = $row['contact_number'];
                            $id = $row['id'];

                            echo "<tr>
                                                        <td style='color: black'>$sl</td>
                                                        <td style='color: black'>$name</td>
                                                        <td style='color: black'>$email</td>
                                                        <td style='color: black'>$contactNumber</td>
                                                        <td class='btn-group'>
                                                            <a href='edit_page.php?id=$id' class='btn btn-warning' title='Edit'><i class='fa fa-pencil-square-o fa-lg'></i>Edit</a>
                                                            <a href='#' class='btn btn-danger deleteuser' title='Delete'>Delete
						     <i class='fa fa-trash-o fa-lg' data-toggle='modal' data-target='#$id' style='' aria-hidden='true'></i>
						</a>
                                                        </td>
                                                    </tr>";
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php

    $get_user_data = "SELECT * FROM user_table";
    $run_user_data = mysqli_query($con, $get_user_data);

    while ($row = mysqli_fetch_array($run_user_data)) {
        $id = $row['id'];
        echo "
<div id='$id' class='modal fade' role='dialog'>
  <div class='modal-dialog'>
    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title text-center'>Are you want to sure??</h4>
      </div>
      <div class='modal-body'>
        <a href='delete.php?id=$id' class='btn btn-danger' style='margin-left:250px'>Delete</a>
      </div>
      
    </div>
  </div>
</div>
	";
    }


    ?>


    <script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();

        });
    </script>
</body>

</html>