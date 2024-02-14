<?php
session_start();
require_once("connection.php");

class UserAuthenticator {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function authenticate($user_type, $username, $password) {
        $conn = $this->db->getConnection();

        // Sanitize inputs to prevent SQL injection
        $user_type = mysqli_real_escape_string($conn, $user_type);
        $username = mysqli_real_escape_string($conn, $username);
        $password = md5(mysqli_real_escape_string($conn, $password));

        // Prepare and execute the SQL query
        $sql = "SELECT * FROM users WHERE user_type = '$user_type' AND username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        // Check if user exists and redirect accordingly
        if ($count > 0){
            switch ($user_type) {
                case "Admin":
                    header("Location: ../view/admin.html");
                    exit();
                case "Student":
                    header("Location: ../view/student.html");
                    exit();
                case "Teacher":
                    header("Location: ../view/teacher.html");
                    exit();
                default:
                    echo "Invalid user type";
            }
        }
    }
}

// Create database connection
$db = new Database('localhost', 'root', '', 'school_system');

// Usage
if(isset($_POST["submit"])) {
    $userAuthenticator = new UserAuthenticator($db);
    $user_type = $_POST["user_type"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $userAuthenticator->authenticate($user_type, $username, $password);
}