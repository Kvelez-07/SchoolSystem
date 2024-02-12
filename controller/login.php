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

    if ($count > 0) {
        header("Location: ../view/home.html");
    } else {
        header("Location: ../view/index.html");
    }
}