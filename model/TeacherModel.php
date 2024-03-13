<?php

require_once "connection/Database.php";

class TeacherModel {

    public static function getAttendance($conn) {

    }

    public static function setAttendance($conn) {
        
    }

    public static function getGrades($conn) {
        
    }

    public static function setGrades($conn) {
        
    }

    public static function getCollaborators($conn) {
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

    public static function getStudents($conn) {
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

    public static function getSchedule($conn) {
        
    }
}