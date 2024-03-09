<?php

require_once "connection/Database.php";

class UserModel {

    public static function userLogin($conn) {
        if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['user_type'])) {
            $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = $_POST['password'];
            $user_type = filter_var($_POST['user_type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if($user_type == "Student") {
                $sql = "SELECT * FROM students WHERE username = ?";
            } elseif($user_type == "Teacher") {
                $sql = "SELECT * FROM teachers WHERE username = ?";
            } elseif($user_type == "Admin") {
                $sql = "SELECT * FROM admin WHERE username = ?";
            } else {
                return "Invalid user type";
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
                return "Incorrect username or password";
            }
        }
        $stmt = null; // Close statement
        $conn = null; // Close connection
    }

    public static function createUser($conn) {
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
                $sql = "SELECT * FROM students WHERE username = ?";
            } elseif ($user_type == "Teacher") {
                $contact1_name = null;
                $contact1_phone = null;
                $contact2_name = null;
                $contact2_phone = null;
                $sql = "SELECT * FROM teachers WHERE username = ?";
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
                        $sql = "INSERT INTO students (username, password, first_name, last_name1, last_name2, id_card, nationality, birth, blood, address, email, phone, contact1_name, contact1_phone, contact2_name, contact2_phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute([$username, $password, $first_name, $last_name1, $last_name2, $id_card, $nationality, $birth, $blood, $address, $email, $phone, $contact1_name, $contact1_phone, $contact2_name, $contact2_phone]);
                        break;
                    case "Teacher":
                        $sql = "INSERT INTO teachers (username, password, first_name, last_name1, last_name2, id_card, nationality, birth, blood, address, email, phone, specialty) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute([$username, $password, $first_name, $last_name1, $last_name2, $id_card, $nationality, $birth, $blood, $address, $email, $phone, $specialty]);
                        break;
                    default:
                        echo "Invalid user type";
                        break;
                }
                echo "User created successfully";
            }
        } else {
            echo "All fields are required.";
        }
    
        // Close statement and connection
        $stmt = null;
        $conn = null;
    }    

    public static function readUser($conn) {
        if(isset($_REQUEST['read_user'])) {
            $username = filter_var($_REQUEST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $user_type = filter_var($_REQUEST['user_type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $first_name = filter_var($_REQUEST['first_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $last_name1 = filter_var($_REQUEST['last_name1'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $last_name2 = filter_var($_REQUEST['last_name2'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
            if(empty($username) && empty($user_type) && empty($first_name) && empty($last_name1) && empty($last_name2)) {
                echo "All fields are required";
                exit;
            }
            
            $sql = "SELECT * FROM users WHERE username = ? AND user_type = ? AND first_name = ? AND last_name1 = ? AND last_name2 = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username, $user_type, $first_name, $last_name1, $last_name2]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            if(empty($result)) {
                echo "User not found";
                exit;
            }
        
            $stmt = null;
            $conn = null;
        
        } else {
            echo "User not found";
        }
    }

    public static function updateUser($conn) {
        if(isset($_POST['update'])){
            if(!empty($_POST['username']) && !empty($_POST['user_type']) && !empty($_POST['password']) && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['new_username']) && !empty($_POST['new_user_type']) && !empty($_POST['new_password']) && !empty($_POST['new_first_name']) && !empty($_POST['new_last_name']) && !empty($_POST['new_email']) && !empty($_POST['new_phone'])) {
        
                $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $user_type = filter_var($_POST['user_type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $password = password_hash($password, PASSWORD_DEFAULT);
                $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); // can be updated
                $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $phone = filter_var($_POST['phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                
                $new_username = filter_var($_POST['new_username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $new_user_type = filter_var($_POST['new_user_type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $new_password = filter_var($_POST['new_password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $new_password = password_hash($new_password, PASSWORD_DEFAULT);
                $new_first_name = filter_var($_POST['new_first_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $new_last_name = filter_var($_POST['new_last_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $new_email = filter_var($_POST['new_email'], FILTER_SANITIZE_EMAIL);
                $new_phone = filter_var($_POST['new_phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
                if($user_type != "Student" && $user_type != "Teacher") {
                    echo "Invalid user type";
                    exit;
                }
        
                // Prepare and execute SELECT query
                $sql_select = "SELECT * FROM users WHERE username = ? AND user_type = ?";
                $stmt_select = $conn->prepare($sql_select);
                $stmt_select->execute([$username, $user_type]);
                $result = $stmt_select->fetchAll(PDO::FETCH_ASSOC);
        
                // If user exists, update user information
                if (count($result) > 0) {
                    $sql_update = "UPDATE users SET username = ?, user_type = ?, password = ?, email = ?, phone = ?, first_name = ?, last_name = ? WHERE username = ? AND user_type = ?";
                    $stmt_update = $conn->prepare($sql_update);
                    $stmt_update->execute([$new_username, $new_user_type, $new_password, $new_email, $new_phone, $new_first_name, $new_last_name, $username, $user_type]);
                    echo "User updated.";
                } else {
                    echo "User not found.";
                }
                
                // Close connection
                $conn = null;
                $stmt_select = null;
                $stmt_update = null;

            } else {
                echo "All fields are required.";
            }
        }
    }

    public static function deleteUser($conn) {
        if(isset($_REQUEST['delete'])) {
            $username = filter_var($_REQUEST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
            $user_type = filter_var($_REQUEST['user_type'], FILTER_SANITIZE_SPECIAL_CHARS);
            $first_name = filter_var($_REQUEST['first_name'], FILTER_SANITIZE_SPECIAL_CHARS);
            $last_name = filter_var($_REQUEST['last_name'], FILTER_SANITIZE_SPECIAL_CHARS);
        
            if(empty($username) || empty($user_type) || empty($first_name) || empty($last_name)) {
                echo "Please fill in all fields";
                exit;
            }
        
            if($user_type != "Student" && $user_type != "Teacher") {
                echo "Invalid user type";
                exit;
            }
        
            $sql = "DELETE FROM users WHERE username = ? AND user_type = ? AND first_name = ? AND last_name = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username, $user_type, $first_name, $last_name]);
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            if(!$user) {
                echo "User not found";
            } else {
                echo "User deleted successfully";
            }
            
            $stmt = null;
            $conn = null;
        }
    }
}