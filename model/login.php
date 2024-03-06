<?php

require_once "connection/database.php";

function login($conn) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = $_POST['password'];
    $user_type = filter_var($_POST['user_type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Prepare and execute SELECT query
    $sql = "SELECT * FROM users WHERE username = ? AND user_type = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username, $user_type]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch only one row

    if($user) {
        // Verify password
        if(password_verify($password, $user['password'])) {
            switch($user_type) {
                case "Teacher":
                    return "Teacher";
                case "Student":
                    return "Student";
                default:
                    return "Invalid user type";
            }
        } else {
            return "Incorrect password";
        }
    }
    $stmt = null;
    $conn = null;
}