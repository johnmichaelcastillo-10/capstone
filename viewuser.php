<?php
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vesion | View Users</title>
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
        <div class="center rounded-5">
            <div class="row">
                <table id="table" class=" table-hover">
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
                            $contactNumber = $row['contactnumber'];
                            $id = $row['id'];

                            echo "<tr>
                                                        <td style='color: black'>$sl</td>
                                                        <td style='color: black'>$name</td>
                                                        <td style='color: black'>$email</td>
                                                        <td style='color: black'>$contactNumber</td>
                                                        <td class='btn-group'>
                                                        <a href='view.php?id=$id' class='btn btn-success' title='Edit'><i class='fa fa-pencil-square-o fa-lg'></i>View</a>
                                                            <a href='edit_page.php?id=$id' class='btn btn-warning' title='Edit'><i class='fa fa-pencil-square-o fa-lg'></i>Edit</a>
                                                            <a href='delete.php?id=$id' class='btn btn-danger' title='Delete'>Delete
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


    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-4JTBymeQv4I4X4Obgb+TkTzPT2Q/1LrDgZrxyhOYH7feNmkRFziMN9NxfxyO6lk8" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>

    <script>
        function updateTableCount() {
            $.ajax({
                url: 'get_user_data.php',
                dataType: 'json',
                success: function(data) {
                    // Update the count displayed on the table
                    $('#table-count').text(data.length);

                    // Update the table rows with the new data
                    var tableRows = '';
                    $.each(data, function(index, user) {
                        tableRows += '<tr>';
                        tableRows += '<td style="color: black">' + (index + 1) + '</td>';
                        tableRows += '<td style="color: black">' + user.name + '</td>';
                        tableRows += '<td style="color: black">' + user.email + '</td>';
                        tableRows += '<td style="color: black">' + user.contactnumber + '</td>';
                        tableRows += '<td class="btn-group">';
                        tableRows += '<a href="view.php?id=' + user.id + '" class="btn btn-success" title="Edit"><i class="fa fa-pencil-square-o fa-lg"></i>View</a>';
                        tableRows += '<a href="edit_page.php?id=' + user.id + '" class="btn btn-warning" title="Edit"><i class="fa fa-pencil-square-o fa-lg"></i>Edit</a>';
                        tableRows += '<a href="delete.php?id=' + user.id + '" class="btn btn-danger" title="Delete">Delete<i class="fa fa-trash-o fa-lg" data-toggle="modal" data-target="#' + user.id + '" style="" aria-hidden="true"></i></a>';
                        tableRows += '</td>';
                        tableRows += '</tr>';
                    });

                    // Replace the existing table rows with the new ones
                    $('#table tbody').html(tableRows);
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.error('Failed to update table count:', errorThrown);
                }
            });
        }

        // Call the updateTableCount function initially and then every 5 seconds
        updateTableCount();
        setInterval(updateTableCount, 5000);
    </script>
</body>

</html>