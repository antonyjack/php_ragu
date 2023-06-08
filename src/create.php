<?php
    include("./data/EmployeeService.php");

    $firstname = $lastname = '';
    $age = 0;
    $gender = 'male';
    $salary = 0;

    $firstname_err = $lastname_err = $age_err = $salary_err = '';

    if($_SERVER["REQUEST_METHOD"] == 'POST') {
        $input_firstname = $_POST["firstname"];
        if(empty($input_firstname)) {
            $firstname_err = "Please enter first name";
        }
        else {
            $firstname = $input_firstname;
        }

        $input_lastname = $_POST['lastname'];
        if(empty($input_lastname)) {
            $lastname_err = "Please enter last name";
        } else {
            $lastname = $input_lastname;
        }

        $input_age = intval($_POST['age']);
        if($input_age == 0) {
            $age_err = "Please enter valid age";
        }
        else {
            $age = $input_age;
        }

        $input_salary = floatval($_POST['salary']);
        if($input_salary == 0) {
            $salary_err = "Please enter valid salary";
        }
        else {
            $salary = $input_salary;
        }

        if(!empty($firstname) && !empty($lastname) && $age > 0 && $salary > 0) {
            $employeeService = new EmployeeService();

            try {
                $employeeService -> Create($firstname, $lastname, $age, $gender, $salary);
    
                header("Location: index.php");   
                exit();
            }
            catch(Exception $e) {

            }
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="firstname" class="form-control <?php echo (!empty($firstname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $firstname; ?>">
                            <span class="invalid-feedback"><?php echo $firstname_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="lastname" class="form-control <?php echo (!empty($lastname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lastname; ?>">
                            <span class="invalid-feedback"><?php echo $lastname_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Age</label>
                            <input name="age" type="number" class="form-control <?php echo (!empty($age_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $age; ?>" />
                            <span class="invalid-feedback"><?php echo $age_err;?></span>
                        </div>
                        <div class="form-group">
                            <label class="mr-3">Gender</label>
                            <label>
                                <input type="radio" name="gender" value="male" <?php echo $gender == 'male' ? 'checked' : '' ?> /> Male
                            </label>
                            <label>
                                <input type="radio" name="gender"value="female" <?php echo $gender == 'female' ? 'checked' : '' ?> /> Female
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Salary</label>
                            <input type="number" name="salary" class="form-control <?php echo (!empty($salary_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $salary; ?>">
                            <span class="invalid-feedback"><?php echo $salary_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>