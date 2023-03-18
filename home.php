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
    <title>Vesion | Home</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
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
        <div class="center rounded-5">
            <div class="row">
                <div class="col-6">
                    <div class="text-center">
                        <h1 style="font-weight: bold;">Recent Accident Reports</h1>
                    </div>
                    <div style="height: 400px; overflow-y: scroll;">
                        <table id="table" class="table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Magnitude</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Speed</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $get_accident_data = "SELECT * FROM accident_table ORDER BY id";
                                $run_accident_data = mysqli_query($con, $get_accident_data);
                                $i = 0;
                                while ($row = mysqli_fetch_array($run_accident_data)) {
                                    $sl = ++$i;
                                    $magnitude = $row['magnitude'];
                                    $latitude = $row['latitude'];
                                    $longitude = $row['longitude'];
                                    $speed = $row['speed'];
                                    $id = $row['id'];

                                    echo "<tr>
                <td style='color: white'>$sl</td>
                <td style='color: white'>$magnitude</td>
                <td style='color: white'>$latitude</td>
                <td style='color: white'>$longitude</td>
                <td style='color: white'>$speed</td>
            </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="text-center" style="height: 200px;">
                            <?php
                            $getTotalUser = "SELECT * FROM user_table";
                            $resultTotalUser = mysqli_query($con, $getTotalUser);
                            $fetchTotalUser = count(mysqli_fetch_all($resultTotalUser));
                            ?>
                            <h1>Total Users Registered</h1>
                            <span id="totalUsers" style="font-size: 80px;"><?php echo $fetchTotalUser ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-center" style="height: 200px;">
                            <?php
                            $getTotalCar = "SELECT * FROM car_table";
                            $resultToTalCar = mysqli_query($con, $getTotalCar);
                            $fetchTotalCar = count(mysqli_fetch_all($resultToTalCar));
                            ?>
                            <h1>Cars Registered</h1>
                            <span id="totalCars" style="font-size: 80px;"><?php echo $fetchTotalCar ?></span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-4JTBymeQv4I4X4Obgb+TkTzPT2Q/1LrDgZrxyhOYH7feNmkRFziMN9NxfxyO6lk8" crossorigin="anonymous"></script>
    <!-- <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script> -->
    <script>
        function fetchData() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Remove the existing HTML for the table
                    var tableBody = document.getElementById("table").getElementsByTagName("tbody")[0];
                    tableBody.innerHTML = "";

                    // Update the table with the new data
                    tableBody.innerHTML = this.responseText;
                }
            };
            xhr.open("POST", "get_data.php", true);
            xhr.send();
        }

        window.onload = function() {
            // Call the fetchData() function initially to populate the table with data
            fetchData();

            // Call the fetchData() function every 5 seconds to update the data
            setInterval(fetchData, 5000);
        };
    </script>
    <!-- The code is actually in JavaScript not PHP as mentioned in the prompt above -->

    <!-- This function updateTotalUsers sends an AJAX request to getTotalUsers.php file and gets the response. When the response is received without any error, it updates the HTML content of the element with ID totalUsers with the response text  -->

    <script>
        function updateTotalUsers() {
            var xhttp = new XMLHttpRequest(); // create a new instance of the XMLHttpRequest object
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) { // checks the readyState property of the response
                    document.getElementById("totalUsers").innerHTML = this.responseText; // update the HTML content of the totalUsers element with the response text
                }
            };
            xhttp.open("GET", "getTotalUsers.php", true); // specify the method, URL, and True Asynchronous for opening the request
            xhttp.send(); // send the request to the server
        }

        // call updateTotalUsers function every 5 seconds to update count automatically
        setInterval(updateTotalUsers, 5000);
    </script>


    <script>
        // This function updates the count of total cars
        function updateTotalCars() {
            var xhttp = new XMLHttpRequest(); // XMLHttp request object to make asynchronous requests 
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) { // check if the response is ready and status is OK
                    document.getElementById("totalCars").innerHTML = this.responseText; // modify the HTML content with the retrieved car count from response
                }
            };
            xhttp.open("GET", "getTotalCars.php", true); // connect with totalCars.php file asynchronously to fetch data
            xhttp.send();
        }

        // Update the count every 5 seconds using setInterval method
        setInterval(updateTotalCars, 5000);
    </script>



</body>

</html>