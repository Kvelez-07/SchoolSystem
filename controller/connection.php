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
}

// Usage
$db = new Database('localhost', 'root', '', 'school_system');
$conn = $db->getConnection();