<?php

// php connection variables
$server = "localhost";
$user = "root";
$password = "";
$database = "shool_system";

// create connection with exception handling
try {
    $conn = new PDO("mysql:host=$server;dbname=$database", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}