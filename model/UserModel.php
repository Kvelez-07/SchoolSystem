<?php

require_once "connection/Database.php";

class UserModel {

    public static function userLogin($conn) { // values based on view variable names
        if(!empty($_REQUEST['username']) && !empty($_REQUEST['password']) && !empty($_REQUEST['user_type'])) {
            $username = filter_var($_REQUEST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = $_REQUEST['password'];
            $user_type = filter_var($_REQUEST['user_type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

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
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['password'] = $user['password'];
                return $user_type;
            } else {
                echo "Invalid username or password";
                header("Refresh: 2; url=index.php?action=admin_dashboard"); // MVC - GET redirect in 2s
            }
        }

        $stmt = null; // Close statement
        $conn = null; // Close connection
    }

    public static function createUser($conn) { // values based on view variable names
        if(
            !empty($_REQUEST['username']) && 
            !empty($_REQUEST['password']) && 
            !empty($_REQUEST['user_type']) && 
            !empty($_REQUEST['first_name']) && 
            !empty($_REQUEST['last_name1']) &&
            !empty($_REQUEST['last_name2']) &&
            !empty($_REQUEST['id_card']) && 
            !empty($_REQUEST['nationality']) && 
            !empty($_REQUEST['birth']) && 
            !empty($_REQUEST['blood']) && 
            !empty($_REQUEST['address']) && 
            !empty($_REQUEST['email']) && 
            !empty($_REQUEST['phone']) &&
            !empty($_REQUEST['school_levels'])
        ) {
            $username = filter_var($_REQUEST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = filter_var($_REQUEST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $user_type = filter_var($_REQUEST['user_type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = password_hash($password, PASSWORD_DEFAULT);
            $first_name = filter_var($_REQUEST['first_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $last_name1 = filter_var($_REQUEST['last_name1'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $last_name2 = filter_var($_REQUEST['last_name2'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $id_card = filter_var($_REQUEST['id_card'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $nationality = filter_var($_REQUEST['nationality'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $birth = filter_var($_REQUEST['birth'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $blood = filter_var($_REQUEST['blood'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $address = filter_var($_REQUEST['address'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
            $phone = filter_var($_REQUEST['phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $specialty = isset($_REQUEST['specialty']) ? filter_var($_REQUEST['specialty'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : null;
            $school_levels = filter_var($_REQUEST['school_levels'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
            $contact1_name = filter_var($_REQUEST['contact1_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $contact1_phone = filter_var($_REQUEST['contact1_phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $contact2_name = filter_var($_REQUEST['contact2_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $contact2_phone = filter_var($_REQUEST['contact2_phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
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

            $sql = "SELECT * FROM school_levels WHERE school_levels = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$school_levels]);
            $school_levels_id = $stmt->fetch(PDO::FETCH_ASSOC);
        
            if($user) {
                echo "User already exists";
                header("Refresh: 2; url=index.php?action=admin_dashboard");
                die();
            } else {
                switch ($user_type) {
                    case "Student":
                        $sql = "INSERT INTO $user_type (username, password, first_name, last_name1, last_name2, id_card, nationality, birth, blood, address, email, phone, contact1_name, contact1_phone, contact2_name, contact2_phone, school_levels_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute([$username, $password, $first_name, $last_name1, $last_name2, $id_card, $nationality, $birth, $blood, $address, $email, $phone, $contact1_name, $contact1_phone, $contact2_name, $contact2_phone, $school_levels_id['id']]);

                        $sql = "INSERT INTO parent (contact_name, contact_phone) VALUES (?, ?)"; // parents
                        $stmt = $conn->prepare($sql);
                        $stmt->execute([$contact1_name, $contact1_phone]);
                        $stmt->execute([$contact2_name, $contact2_phone]);
                        break;
                    case "Teacher":
                        $sql = "INSERT INTO $user_type (username, password, first_name, last_name1, last_name2, id_card, nationality, birth, blood, address, email, phone, specialty, school_levels_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute([$username, $password, $first_name, $last_name1, $last_name2, $id_card, $nationality, $birth, $blood, $address, $email, $phone, $specialty, $school_levels_id['id']]);
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

    public static function readUser($conn) { // values based on view variable names
        $username = isset($_REQUEST['username']) ? filter_var($_REQUEST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : null;
        $user_type = isset($_REQUEST['user_type']) ? filter_var($_REQUEST['user_type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : null;
        $first_name = isset($_REQUEST['first_name']) ? filter_var($_REQUEST['first_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : null;
        $last_name1 = isset($_REQUEST['last_name1']) ? filter_var($_REQUEST['last_name1'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : null;
    
        if(empty($username) || empty($user_type) || empty($first_name) || empty($last_name1)) {
            echo "All fields are required";
            header("Refresh: 2; url=index.php?action=admin_dashboard");
            exit;
        }
    
        $sql = "SELECT * FROM $user_type WHERE username = ? AND first_name = ? AND last_name1 = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username, $first_name, $last_name1]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        if(empty($result)) {
            echo "User not found";
            header("Refresh: 2; url=index.php?action=admin_dashboard");
            exit;
        }
    
        $stmt = null;
        $conn = null;
        return $result; // Return the fetched user data
    }    

    public static function updateUser($conn) { // values based on view variable names
        $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $user_type = filter_var($_POST['user_type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
        $new_username = filter_var($_POST['new_username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $new_password = filter_var($_POST['new_password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $new_password = password_hash($new_password, PASSWORD_DEFAULT);
        $new_first_name = filter_var($_POST['new_first_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $new_last_name1 = filter_var($_POST['new_last_name1'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $new_last_name2 = filter_var($_POST['new_last_name2'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $new_email = filter_var($_POST['new_email'], FILTER_SANITIZE_EMAIL);
        $new_phone = filter_var($_POST['new_phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
        $stmt = null;
    
        if($user_type == "Student") {
            $sql = "SELECT * FROM $user_type WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username]);
        } elseif($user_type == "Teacher") {
            $sql = "SELECT * FROM $user_type WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username]);
        }
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if (!$result) {
            echo "Invalid username";
            header("Refresh: 2; url=index.php?action=admin_dashboard"); // MVC - GET redirect in 2s
            exit;
        }
    
        if (password_verify($password, $result['password'])) {
            $sql = "UPDATE $user_type SET username = ?, password = ?, first_name = ?, last_name1 = ?, last_name2 = ?, email = ?, phone = ? WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$new_username, $new_password, $new_first_name, $new_last_name1, $new_last_name2, $new_email, $new_phone, $username]);
            echo "User updated successfully";
            header("Refresh: 2; url=index.php?action=admin_dashboard"); // MVC - GET redirect in 2s
        } else {
            echo "Invalid password";
            header("Refresh: 2; url=index.php?action=admin_dashboard"); // MVC - GET redirect in 2s
        }
    
        $stmt = null;
        $conn = null;
    }    

    public static function deleteUser($conn) { // values based on view variable names
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
}