<?php
session_start();
include("connection.php");

if(isset($_POST["submit"])) {
    $user_type = $_POST["user_type"];
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $_SESSION["user_type"] = $user_type;
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;

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
            header("Location: ../view/index.html");
            exit();
        } else {
            header("Location: ../view/signup.html");
            exit();
        }
    }
}