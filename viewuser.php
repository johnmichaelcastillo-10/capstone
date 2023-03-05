<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/viewuser.css">

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
            </div>

        </div>
        <div class="center rounded-5">
            <div class="row">
                <table class="table" id="myTable" style="color: white">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">#</th>
                            <th class="text-center" scope="col">First Name</th>
                            <th class="text-center" scope="col">Last Name</th>
                            <th class="text-center" scope="col">Email</th>
                            <th class="text-center" scope="col">View</th>
                            <th class="text-center" scope="col">Edit</th>
                            <th class="text-center" scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class='text-center'>1</td>
                            <td class='text-center'>John</td>
                            <td class='text-center'>Doe</td>
                            <td class='text-center'>john.doe@example.com</td>
                            <td class='text-center'>
                                <span>
                                    <a href='#' class='btn btn-success'>View</a>
                                </span>

                            </td>
                            <td class='text-center'>
                                <span>
                                    <a href='edit_page.php?id=$id' class='btn btn-warning mr-3' title='Edit'><i class='fa fa-pencil-square-o fa-lg'></i>Edit</a>


                                </span>

                            </td>
                            <td class='text-center'>
                                <span>


                                    <a href='#' class='btn btn-danger' title='Delete'>
                                        <i class='fa fa-trash-o fa-lg' aria-hidden='true'></i> Delete
                                    </a>
                                </span>

                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>