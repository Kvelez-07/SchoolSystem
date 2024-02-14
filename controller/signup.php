<?php
session_start();
require_once("connection.php");

class UserRegistrar {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function register($user_type, $username, $password) {
        $conn = $this->db->getConnection();

        // Sanitize inputs to prevent SQL injection
        $user_type = mysqli_real_escape_string($conn, $user_type);
        $username = mysqli_real_escape_string($conn, $username);
        $password = md5(mysqli_real_escape_string($conn, $password));

        // Check if the user already exists
        $sql_check = "SELECT COUNT(*) as count FROM users WHERE user_type = '$user_type' AND username = '$username'";
        $result_check = mysqli_query($conn, $sql_check);
        $row_check = mysqli_fetch_array($result_check);
        $count = $row_check['count'];

        if($count > 0) {
            header("Location: ../view/signup.html");
            exit();
        } else {
            // Insert new user
            $sql = "INSERT INTO users (username, password, user_type) VALUES ('$username', '$password', '$user_type')";
            $result = mysqli_query($conn, $sql);
            if($result) {
                header("Location: ../view/login.html");
                exit();
            } else {
                header("Location: ../view/signup.html");
                exit();
            }
        }
    }
}

// Create database connection
$db = new Database($server_name, $uname, $password, $db_name, $port);

// Usage
if(isset($_POST["submit"])) {
    $userRegistrar = new UserRegistrar($db);
    $user_type = $_POST["user_type"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $userRegistrar->register($user_type, $username, $password);
}