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

    if ($count > 0 && $user_type == "Admin"){
        header("Location: ./admin.php");
    }
    else if ($count > 0 && $user_type == "Student"){
        header("Location: ./student.php");
    }
    else if ($count > 0 && $user_type == "Teacher"){
        header("Location: ./teacher.php");
    }
    else {
        echo "Invalid username or password";
    }
}