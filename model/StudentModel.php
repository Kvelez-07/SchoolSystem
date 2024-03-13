<?php

require_once "connection/Database.php";

class StudentModel {

    public static function getAttendance($conn) {

    }

    public static function getGrades($conn) {
        
    }

    public static function getSchedule($conn) {

    }

    public static function getTeachers($conn) {
        if(!empty($_REQUEST['school_levels']) && !empty($_REQUEST['course'])) {
            $shool_levels = filter_var($_REQUEST['school_levels'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $course = filter_var($_REQUEST['course'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $sql = "SELECT id FROM school_levels WHERE school_levels = ? AND course = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$shool_levels, $course]);
            $school_levels_id = $stmt->fetch(PDO::FETCH_ASSOC);

            $sql = "SELECT teacher_id FROM subjects WHERE school_levels_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$school_levels_id['id']]);
            $teacher_id = $stmt->fetch(PDO::FETCH_ASSOC);

            $sql = "SELECT username, email, first_name, last_name1 FROM teacher WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$teacher_id['teacher_id']]);

            $teachers_data = [];
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $teachers_data[] = $row;
            }
            return $teachers_data;
        }
    }

    public static function getClassmates($conn) {
        if(!empty($_REQUEST['school_levels']) && !empty($_REQUEST['course'])) {
            $shool_levels = filter_var($_REQUEST['school_levels'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $course = filter_var($_REQUEST['course'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $sql = "SELECT id FROM school_levels WHERE school_levels = ? AND course = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$shool_levels, $course]);
            $school_levels_id = $stmt->fetch(PDO::FETCH_ASSOC);

            $sql = "SELECT username, email, first_name, last_name1 FROM student WHERE school_levels_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$school_levels_id['id']]);

            $classmates_data = [];
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $classmates_data[] = $row;
            }
            return $classmates_data;
        }
    }
}