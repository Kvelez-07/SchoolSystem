<?php
class Database {
    private $conn;

    public function __construct($server_name, $uname, $password, $db_name, $port = 3306) {
        $this->conn = mysqli_connect($server_name, $uname, $password, $db_name, $port);
        if(!$this->conn){
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}

$server_name = "localhost";
$uname = "root";
$password = "";
$db_name = "school_system";
$port = 3306; // Default MySQL port

// Usage
$db = new Database($server_name, $uname, $password, $db_name, $port);
$conn = $db->getConnection();