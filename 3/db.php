<?php
class Database {
    private $conn;
    private $servername = "localhost";
    private $username = "root";
    private $port = "8005";
    private $password = "";
    private $dbname = "phprec";

    public function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->servername};port={$this->port};dbname={$this->dbname};charset=utf8", 
                $this->username, 
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function addEmployee($name, $email, $gender, $department, $phone) {
        try {
            $query = "INSERT INTO `emp`(`name`, `email`, `gender`, `department`, `phone`) VALUES (?, ?, ?, ?, ?)";
            $run = $this->conn->prepare($query);
            $success = $run->execute([$name, $email, $gender, $department, $phone]);

            if ($success) {
                return true;
            }
            return false;
        } catch(PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }
    public function getAllEmployees() {
        try {
            $query = "SELECT * FROM `emp`";
            $run = $this->conn->prepare($query);
            $run->execute();
            $result = $run->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e) {
            throw new Exception("Database error: ". $e->getMessage());
        }
    }
   public function deleteEmployee($id) {
        try {
            $query = "DELETE FROM `emp` WHERE id = ?";
            $run = $this->conn->prepare($query);
            $success = $run->execute([$id]);
            if ($success) {
                return true;
            }
            return false;
        } catch(PDOException $e) {
            throw new Exception("Database error: ". $e->getMessage());
        }
    }

    public function updateEmployee($id, $name, $email, $gender, $department, $phone) {
        try {
            $query = "UPDATE `emp` SET `name` = ?, `email` = ?, `gender` = ?, `department` = ?, `phone` = ? WHERE `id` = ?";
            $run = $this->conn->prepare($query);
            $success = $run->execute([$name, $email, $gender, $department, $phone, $id]);
            
            return $success;
        } catch(PDOException $e) {  
            throw new Exception("Database error: " . $e->getMessage());
        }   
    }
        public function getEmployeeById($id) {
            try {
                $query = "SELECT * FROM `emp` WHERE `id` = ?";
                $run = $this->conn->prepare($query);
                $run->execute([$id]);
                $result = $run->fetch(PDO::FETCH_ASSOC);
                return $result;
            } catch(PDOException $e) {
                throw new Exception("
                ". $e->getMessage());
                }   
            }


}
?>
