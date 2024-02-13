<?php
$server_name = 'localhost';
$uname = 'root';
$password = '';
$db_name = 'school_system';

// create connection (port # as preventive measure)
$conn = mysqli_connect($server_name, $uname, $password, $db_name, 3306);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}