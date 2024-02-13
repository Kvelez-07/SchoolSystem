<?php
session_start();
include("connection.php");

if(isset($_POST["submit"])) {
    $user_type = $_POST["user_type"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $_SESSION["user_type"] = $user_type;
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;

    $sql = "SELECT * FROM users WHERE user_type = '$user_type' AND username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql); // run the query
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count > 0){
        switch ($user_type) {
            case "Admin":
                header("Location: ./admin.php");
                break;
            case "Student":
                header("Location: ./student.php");
                break;
            case "Teacher":
                header("Location: ./teacher.php");
                break;
            default:
                echo "Invalid user type";
        }
    }
}