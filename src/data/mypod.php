<?php
class DbConnection {
    public $con;
    static public function OpenConnection() {
        $hostname = 'mysql';
        $dbname = 'EmployeeDb';
        $username = 'root';
        $password = 'mysql007';

        try {
            $con = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
            return $con;
        }
        catch(PDOException $e){
            throw $e;
        }
    }

    static public function CloseConnection($con)
    {
        $con = null;
    }
}