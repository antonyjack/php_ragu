<?php
include("mypod.php");
class EmployeeService {
    public function Getall()
    {
        try {
            $con = DbConnection::OpenConnection();
            
            $sql = "SELECT * FROM Employee";

            $stmt = $con -> query($sql);
            
            $employees = $stmt -> fetchAll();

            if(empty($employees)){
                $employees = [];
            }

            DbConnection::CloseConnection($con);

            return $employees;
        } catch (Exception $e) {
            throw $e;
        }


    }

    public function GetById($id) {
        try {
            $con = DbConnection::OpenConnection();

            $sql = "select * from Employee Where Id = :id";

            $stmt = $con -> prepare($sql);
            $stmt -> bindParam(':id', $param_id);
            $param_id = $id;

            $stmt -> execute();

            $employee = $stmt -> fetch(PDO::FETCH_ASSOC);

            DbConnection::CloseConnection($con);
            return $employee;
        }
        catch(PDOException $e) {
            throw $e;
        }
    }

    public function Create($firstname, $lastname, $age, $gender, $salary) {
        try {
            $con = DbConnection::OpenConnection();

            $sql = "insert into Employee(FirstName, LastName, Age, Gender, Salary) VALUES (:first, :last, :age, :gender, :salary)";

            if($stmt = $con -> prepare($sql)) {
                $stmt -> bindParam(':first', $param_first);
                $stmt -> bindParam(':last', $param_last);
                $stmt -> bindParam(':age', $param_age);
                $stmt -> bindParam(':gender', $param_gender);
                $stmt -> bindParam(':salary', $param_salary);

                $param_first = $firstname;
                $param_last = $lastname;
                $param_age = $age;
                $param_gender = $gender;
                $param_salary = $salary;

                $stmt -> execute();
            }

            DbConnection::CloseConnection($con);
            return;
        }
        catch(PDOException $e) {
            throw $e;
        }
    }

    public function Update($id, $firstname, $lastname, $age, $gender, $salary) {
        try {
            $con = DbConnection::OpenConnection();

            $sql = "Update Employee SET FirstName = :first, LastName = :last, Age = :age, Gender = :gender, Salary = :salary WHERE Id = :id";

            if($stmt = $con -> prepare($sql)) {
                $stmt -> bindParam(':first', $param_first);
                $stmt -> bindParam(':last', $param_last);
                $stmt -> bindParam(':age', $param_age);
                $stmt -> bindParam(':gender', $param_gender);
                $stmt -> bindParam(':salary', $param_salary);
                $stmt -> bindParam(':id', $param_id);

                $param_first = $firstname;
                $param_last = $lastname;
                $param_age = $age;
                $param_gender = $gender;
                $param_salary = $salary;
                $param_id = $id;

                $stmt -> execute();
            }

            DbConnection::CloseConnection($con);
            return;
        }
        catch(PDOException $e) {
            throw $e;
        }
    }

    public function Delete($id) {
        try {
            $con = DbConnection::OpenConnection();

            $sql = "DELETE FROM Employee WHERE Id = :id";

            if($stmt = $con -> prepare($sql)) {
                $stmt -> bindParam(':id', $param_id);
                
                $param_id = $id;

                $stmt -> execute();
            }

            DbConnection::CloseConnection($con);
            return;
        }
        catch(PDOException $e) {
            throw $e;
        }
    }
}
?>