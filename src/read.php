<?php
    include("./data/EmployeeService.php");

    $firstname = $lastname = '';
    $age = 0;
    $gender = 'male';
    $salary = 0;
    $id = 0;

    $employeeService = new EmployeeService();
    
    if(isset($_GET['id']) && !empty(isset($_GET['id']))) {
        $id = $_GET['id'];
        $employee = $employeeService -> GetById($_GET['id']);

        $firstname = $employee['FirstName'];
        $lastname = $employee['LastName'];
        $age = $employee['Age'];
        $gender = $employee['Gender'];
        $salary = $employee['Salary'];
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Record</h1>
                    <div class="form-group">
                        <label>First Name</label>
                        <p><b><?php echo $firstname; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <p><b><?php echo $lastname; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <p><b><?php echo $age; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <p><b><?php echo $gender; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Salary</label>
                        <p><b><?php $salary; ?></b></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>