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

        strong {
            color: #B5CFED;
        }
    </style>
</head>

<body>
    <?php
    $id = $_GET['id'];
    $getName = "SELECT * FROM user_table WHERE id='$id'";
    $resultName = mysqli_query($con, $getName);
    $dataArray = mysqli_fetch_array($resultName);
    $getCar = "SELECT * FROM car_table WHERE user_id = '$id'";
    $resultCar = mysqli_query($con, $getCar);
    $carArray = mysqli_fetch_array($resultCar);
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
                <h4>View User</h4>
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
                                <a class="nav-link" style="color:white; font-size: 22px;" href="viewuser.php">View Admin</a>
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

                <h1 class="text-center">PROFILE: <?php echo $name ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <h3><strong>Name:</strong> <i><?php echo $name ?></i></h3>
                <h3><strong>Contact Number: </strong> <i><?php echo $contactnumber ?></i> </h3>
                <h3><strong>Email: </strong> <i><?php echo $email ?></i> </h3>
                <h3><strong>Address: </strong> <i> <?php echo $address ?></i></h3>
                <h3><strong>Registered Cars: </strong> </h3>
                <?php
                $join_user_car = "SELECT * from user_table LEFT JOIN car_table ON car_table.user_id = user_table.id WHERE car_table.user_id = $id";
                $run_join_user_car = mysqli_query($con, $join_user_car);
                $car = mysqli_fetch_all($run_join_user_car, MYSQLI_ASSOC);
                foreach ($car as $cars) {
                    echo "
          <h5 style='margin-left: 100px' class='text-capitalize'><strong>||Car Brand:</strong> {$cars['car_brand']}</h5>
          <h5 style='margin-left: 100px' class='text-capitalize'><strong>||Car Model:</strong> {$cars['car_model']}</h5>
          <h5 style='margin-left: 100px'><strong>||Car Plate:</strong> <span class='text-uppercase'>{$cars['plate_number']}</span></h5>
          <button style='margin-left: 100px; background-color: #7A0505' type='button' class='btn text-white' data-bs-toggle='modal' data-bs-target='#accident{$cars['id']}'>View Accidents</button>
          <h5 style='margin-left: 100px'>===============================</h5>
        ";
                }
                ?>
            </div>
            <?php
            foreach ($car as $cars) {
                $join_car_accident = "SELECT * FROM accident_table LEFT JOIN car_table ON accident_table.car_id = car_table.id WHERE accident_table.car_id = {$cars['id']}";
                $run_join_car_accident = mysqli_query($con, $join_car_accident);
                $accident = mysqli_fetch_all($run_join_car_accident, MYSQLI_ASSOC);
                echo count($accident);
                echo "
    <div class='modal fade' id='accident{$cars['id']}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
      <div class='modal-dialog'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h5 class='modal-title text-black text-capitalize' id='exampleModalLabel'>Accident Record for {$cars['car_brand']} {$cars['car_model']}</h5>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
          </div>
          <div class='modal-body text-black'>
            <table class='table table-bordered'>
              <thead>
                <tr>
                  <th>Latitude</th>
                  <th>Longitude</th>
                  <th>Magnitude</th>
                </tr>
              </thead>
              <tbody>
      ";
                foreach ($accident as $accident_item) {
                    echo "
      <tr>
        <td>{$accident_item['latitude']}</td>
        <td>{$accident_item['longitude']}</td>
        <td>{$accident_item['magnitude']}</td>
      </tr>
    ";
                }
                echo "
              </tbody>
            </table>
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
          </div>
        </div>
      </div>
    </div>
  ";
            }
            ?>


            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>

            <script>
                var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
                    keyboard: false
                })
            </script>

</body>

</html>