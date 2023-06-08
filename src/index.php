<?php
    include("./data/EmployeeService.php");
    try {
        $employeeService = new EmployeeService();

        $employeeDatas = $employeeService -> Getall();

    } catch (Exception $e) {
        echo "Error ". $e -> getMessage();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Employees Details</h2>
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Employee</a>
                    </div>                   <?php if(count($employeeDatas) > 0) { ?>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Salary</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($employeeDatas as $emp) {
                                        echo '<tr><td>'.$emp['Id'].'</td><td>'.$emp['FirstName'].' '.$emp['LastName'].'</td><td>'.$emp['Age'].'</td><td>'.$emp['Gender'].'</td><td>'.$emp['Salary'].'</td>';
                                        echo "<td>";
                                            echo '<a href="read.php?id='. $emp['Id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="update.php?id='. $emp['Id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="delete.php?id='. $emp['Id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    <?php
                        } 
                        else 
                        {
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>