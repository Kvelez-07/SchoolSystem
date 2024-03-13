<?php

require_once "connection/Database.php";

class StudentModel {

    public static function getAttendance($conn) {

    }

    public static function getGrades($conn) {
        
    }

    public static function getSchedule($conn) {
        if(!empty($_REQUEST['school_levels']) && !empty($_REQUEST['course'])) {
    
            try {
                $school_levels = filter_var($_REQUEST['school_levels'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $course = filter_var($_REQUEST['course'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
                $sql = "SELECT id FROM school_levels WHERE school_levels = ? AND course = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$school_levels, $course]);
                $school_levels_id = $stmt->fetch(PDO::FETCH_ASSOC);
    
                // Check if $school_levels_id is false
                if ($school_levels_id === false) {
                    return []; // Return empty array if school level or course not found
                }
    
                $sql = "SELECT id FROM subjects WHERE school_levels_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$school_levels_id['id']]);
                $subject_id = $stmt->fetch(PDO::FETCH_ASSOC);
    
                // Check if $subject_id is false
                if ($subject_id === false) {
                    return []; // Return empty array if no subject found
                }
    
                $sql = "SELECT day, begins, ends FROM schedule WHERE subject_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$subject_id['id']]);
    
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
    
            $schedule_data = [];
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $schedule_data[] = $row;
            }
            return $schedule_data;
        }
    }      

    public static function getTeachers($conn) {
        if(!empty($_REQUEST['school_levels']) && !empty($_REQUEST['course'])) {
    
            try {
                $shool_levels = filter_var($_REQUEST['school_levels'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $course = filter_var($_REQUEST['course'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
                $sql = "SELECT id FROM school_levels WHERE school_levels = ? AND course = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$shool_levels, $course]);
                $school_levels_id = $stmt->fetch(PDO::FETCH_ASSOC);
    
                if (!$school_levels_id) {
                    return []; // Return empty array if school level or course not found
                }
    
                $sql = "SELECT teacher_id FROM subjects WHERE school_levels_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$school_levels_id['id']]);
                $teacher_id = $stmt->fetch(PDO::FETCH_ASSOC);
    
                if (!$teacher_id) {
                    return []; // Return empty array if no teacher found
                }
    
                $sql = "SELECT username, email, first_name, last_name1 FROM teacher WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$teacher_id['teacher_id']]);
    
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
    
            $teachers_data = [];
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $teachers_data[] = $row;
            }
            return $teachers_data;
        }
    }    

    public static function getClassmates($conn) {
        if(!empty($_REQUEST['school_levels']) && !empty($_REQUEST['course'])) {

            try {
                $shool_levels = filter_var($_REQUEST['school_levels'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $course = filter_var($_REQUEST['course'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
                $sql = "SELECT id FROM school_levels WHERE school_levels = ? AND course = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$shool_levels, $course]);
                $school_levels_id = $stmt->fetch(PDO::FETCH_ASSOC);
    
                $sql = "SELECT username, email, first_name, last_name1 FROM student WHERE school_levels_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$school_levels_id['id']]);
    
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            $classmates_data = [];
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $classmates_data[] = $row;
            }
            return $classmates_data;
        }
    }
}