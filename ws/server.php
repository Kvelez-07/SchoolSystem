<?php

require_once "connection/Database.php";
require_once "model/UserModel.php"; // Include your UserModel

$http_method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

switch ($http_method) {
    case 'GET':
        runGET();
        break;
    case 'POST':
        runPOST();
        break;
    case 'PUT':
        runPUT();
        break;
    default:
        runDefault();
        break;
}

function runGET() {
    header("HTTP/1.1 200 OK");
    echo "Hello GET"; // Placeholder response
}

function runPOST() {
    require_once "connection/Database.php";
    $uri = $_SERVER['REQUEST_URI'];
    if ($uri === '/login') {
        handleLogin($conn);
    } elseif ($uri === '/createUser') {
        handleCreateUser($conn);
    } elseif ($uri === '/deleteUser') {
        handleDeleteUser($conn);
    } else {
        header("HTTP/1.1 404 Not Found");
        echo "Not Found";
    }
}

function runPUT() {
    header("HTTP/1.1 200 OK");
    echo "Hello PUT"; // Placeholder response
}

function runDefault() {
    header("HTTP/1.1 405 Method Not Allowed");
    echo "Method Not Allowed";
}

function handleLogin($conn) {
    if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['user_type'])) {
        $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = $_POST['password'];
        $user_type = filter_var($_POST['user_type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if($user_type == "Student") {
            $sql = "SELECT * FROM $user_type WHERE username = ?";
        } elseif($user_type == "Teacher") {
            $sql = "SELECT * FROM $user_type WHERE username = ?";
        } elseif($user_type == "Admin") {
            $sql = "SELECT * FROM admin WHERE username = ?";
        } else {
            echo "Invalid user type";
            header("Refresh: 2; url=index.php?action=admin_dashboard"); // MVC - GET redirect in 2s
            exit;
        }
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC); // for password matching
    }

    if($user) {
        if(password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['username'] = $user['username'];
            return $user_type;
        } else {
            echo "Invalid username or password";
            header("Refresh: 2; url=index.php?action=admin_dashboard"); // MVC - GET redirect in 2s
        }
    }

    $stmt = null; // Close statement
    $conn = null; // Close connection
}

function handleCreateUser($conn) {
    if(
        !empty($_POST['username']) && 
        !empty($_POST['password']) && 
        !empty($_POST['user_type']) && 
        !empty($_POST['first_name']) && 
        !empty($_POST['last_name1']) &&  // Corrected variable name
        !empty($_POST['last_name2']) &&  // Corrected variable name
        !empty($_POST['id_card']) && 
        !empty($_POST['nationality']) && 
        !empty($_POST['birth']) && 
        !empty($_POST['blood']) && 
        !empty($_POST['address']) && 
        !empty($_POST['email']) && 
        !empty($_POST['phone'])
    ) {
        $user_type = filter_var($_POST['user_type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $last_name1 = filter_var($_POST['last_name1'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $last_name2 = filter_var($_POST['last_name2'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $id_card = filter_var($_POST['id_card'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nationality = filter_var($_POST['nationality'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $birth = filter_var($_POST['birth'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $blood = filter_var($_POST['blood'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $address = filter_var($_POST['address'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $specialty = isset($_POST['specialty']) ? filter_var($_POST['specialty'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : null;

        $contact1_name = filter_var($_POST['contact1_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $contact1_phone = filter_var($_POST['contact1_phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $contact2_name = filter_var($_POST['contact2_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $contact2_phone = filter_var($_POST['contact2_phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        // Query the users table
        if($user_type == "Student") {
            if(empty($contact1_name) || empty($contact1_phone) || empty($contact2_name) || empty($contact2_phone)) {
                echo "All fields are required";
                die();
            }
            $sql = "SELECT * FROM $user_type WHERE username = ?";
        } elseif ($user_type == "Teacher") {
            $contact1_name = null;
            $contact1_phone = null;
            $contact2_name = null;
            $contact2_phone = null;
            $sql = "SELECT * FROM $user_type WHERE username = ?";
        }

        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        if($user) {
            echo "User already exists";
            die();
        } else {
            switch ($user_type) {
                case "Student":
                    $sql = "INSERT INTO $user_type (username, password, first_name, last_name1, last_name2, id_card, nationality, birth, blood, address, email, phone, contact1_name, contact1_phone, contact2_name, contact2_phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$username, $password, $first_name, $last_name1, $last_name2, $id_card, $nationality, $birth, $blood, $address, $email, $phone, $contact1_name, $contact1_phone, $contact2_name, $contact2_phone]);
                    break;
                case "Teacher":
                    $sql = "INSERT INTO $user_type (username, password, first_name, last_name1, last_name2, id_card, nationality, birth, blood, address, email, phone, specialty) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$username, $password, $first_name, $last_name1, $last_name2, $id_card, $nationality, $birth, $blood, $address, $email, $phone, $specialty]);
                    break;
                default:
                    echo "Invalid user type";
                    break;
            }
            echo "User created successfully";
            header("Refresh: 2; url=index.php?action=admin_dashboard"); // MVC - GET redirect in 2s
        }
    } else {
        echo "All fields are required.";
        header("Refresh: 2; url=index.php?action=admin_dashboard"); // MVC - GET redirect in 2s
    }

    // Close statement and connection
    $stmt = null;
    $conn = null;
}

function handleDeleteUser($conn) {
    $username = filter_var($_REQUEST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
    $user_type = filter_var($_REQUEST['user_type'], FILTER_SANITIZE_SPECIAL_CHARS);
    $first_name = filter_var($_REQUEST['first_name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $last_name1 = filter_var($_REQUEST['last_name1'], FILTER_SANITIZE_SPECIAL_CHARS);
    $last_name2 = filter_var($_REQUEST['last_name2'], FILTER_SANITIZE_SPECIAL_CHARS);

    if(empty($username) || empty($user_type) || empty($first_name) || empty($last_name1) || empty($last_name2)) {
        echo "Please fill in all fields";
        header("Refresh: 2; url=index.php?action=admin_dashboard");
        exit;
    }

    if($user_type == "Student") {
        $sql = "DELETE FROM $user_type WHERE username = ? AND first_name = ? AND last_name1 = ? AND last_name2 = ?";
    } else if($user_type == "Teacher") {
        $sql = "DELETE FROM $user_type WHERE username = ? AND first_name = ? AND last_name1 = ? AND last_name2 = ?";
    }
    
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username, $first_name, $last_name1, $last_name2]);
    echo "User deleted, redirecting...";
    header("Refresh: 2; url=index.php?action=admin_dashboard"); // MVC - GET redirect in 2s
    
    $stmt = null;
    $conn = null;
}