<?php

require_once "connection/Database.php";

class UserModel {

    public static function userLogin($conn) {
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
        $stmt = null; // Close statement
        $conn = null; // Close connection
    }

    public static function createUser($conn) {
        if(isset($_POST['create'])) {
            if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['user_type']) && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['id_card']) && !empty($_POST['nationality']) && !empty($_POST['birth_date']) && !empty($_POST['blood_type']) && !empty($_POST['address']) && !empty($_POST['email']) && !empty($_POST['phone'])) {
                $user_type = filter_var($_POST['user_type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $password = password_hash($password, PASSWORD_DEFAULT);
                $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $id_card = filter_var($_POST['id_card'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $nationality = filter_var($_POST['nationality'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $birth_date = filter_var($_POST['birth_date'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $blood_type = filter_var($_POST['blood_type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $address = filter_var($_POST['address'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $phone = filter_var($_POST['phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
                $dad_name = filter_var($_POST['dad_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $dad_phone = filter_var($_POST['dad_phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $mom_name = filter_var($_POST['mom_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $mom_phone = filter_var($_POST['mom_phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
                if($user_type == "Student") {
                    if(empty($dad_name) || empty($dad_phone) || empty($mom_name) || empty($mom_phone)) {
                        echo "All fields are required";
                        die();
                    }
                }
        
                if($blood_type != "A+" && $blood_type != "A-" && $blood_type != "B+" && $blood_type != "B-" && $blood_type != "AB+" && $blood_type != "AB-" && $blood_type != "O+" && $blood_type != "O-") {
                    echo "Invalid blood type";
                    die();
                }
            
                $sql = "SELECT * FROM users WHERE first_name = ? AND last_name = ? AND user_type = ? AND username = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$first_name, $last_name, $user_type, $username]);
                $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
                if($user) {
                    echo "User already exists";
                } elseif($user_type != "Student" && $user_type != "Teacher") {
                    echo "Invalid user type";
                } else {
                    $sql = "INSERT INTO users (username, password, user_type, first_name, last_name, id_card, nationality, birth_date, blood_type, address, email, phone, dad_name, dad_phone, mom_name, mom_phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$username, $password, $user_type, $first_name, $last_name, $id_card, $nationality, $birth_date, $blood_type, $address, $email, $phone, $dad_name, $dad_phone, $mom_name, $mom_phone]);
                    echo "User created successfully";
                }
                $stmt = null;
                $conn = null;
            }
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

    public static function getUser($conn) {
        if(isset($_REQUEST['read'])) {
            $username = $_REQUEST['username'];
            $user_type = $_REQUEST['user_type'];
            $first_name = $_REQUEST['first_name'];
            $last_name = $_REQUEST['last_name'];
        
            $username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $user_type = filter_var($user_type, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $first_name = filter_var($first_name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $last_name = filter_var($last_name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
            if(empty($username) && empty($user_type) && empty($first_name) && empty($last_name)) {
                echo "All fields are required";
                exit;
            }
        
            if($user_type != "Student" && $user_type != "Teacher") {
                echo "Invalid user type";
                exit;
            }
            
            $sql = "SELECT * FROM users WHERE username = ? AND user_type = ? AND first_name = ? AND last_name = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username, $user_type, $first_name, $last_name]);
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
}