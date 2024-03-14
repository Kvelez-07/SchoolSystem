<?php

require_once "connection/Database.php";

class StudentModel {

    public static function getAttendance($conn) {
        if (
            !empty($_REQUEST['username']) &&
            !empty($_REQUEST['password']) && 
            !empty($_REQUEST['school_levels']) && 
            !empty($_REQUEST['course']) && 
            !empty($_REQUEST['date'])
        ) {
            $username = filter_var($_REQUEST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = filter_var($_REQUEST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $school_levels = filter_var($_REQUEST['school_levels'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $course = filter_var($_REQUEST['course'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $date = filter_var($_REQUEST['date'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $sql = "SELECT * FROM student WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username]);
            $student_data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($student_data === false) {
                return []; // Return empty array if username or password is incorrect
            }

            if (!password_verify($password, $student_data['password'])) {
                return []; // Return empty array if password is incorrect
            }

            // Fetch first_name and last_name1
            $student_full_name = "{$student_data['first_name']} {$student_data['last_name1']}";

            // Fetch school level and course name
            $school_level_course = "$school_levels $course";

            $sql = "SELECT * FROM school_levels WHERE school_levels = ? AND course = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$school_levels, $course]);
            $school_levels_id = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($school_levels_id === false) {
                return []; // Return empty array if school level or course not found
            }

            $sql = "SELECT * FROM subjects WHERE school_levels_id = ? AND subject_name = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$school_levels_id['id'], $course]);
            $subject_id = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($subject_id === false) {
                return []; // Return empty array if subject not found
            }

            $sql = "SELECT * FROM attendance WHERE student_id = ? AND subject_id = ? AND date = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$student_data['id'], $subject_id['id'], $date]);

            $attendance_data = [];
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $attendance_data[] = $row;
            }

            // Combine attendance data with student username and school level course
            $student_attendance = [
                'student_username' => $username,
                'student_full_name' => $student_full_name,
                'school_level_course' => $school_level_course,
                'attendance_data' => $attendance_data
            ];

            return $student_attendance;
        }
    }

    public static function getGrades($conn) {
        if (
            !empty($_REQUEST['username']) &&
            !empty($_REQUEST['password']) && 
            !empty($_REQUEST['school_levels']) && 
            !empty($_REQUEST['course'])
        ) {
            $username = filter_var($_REQUEST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = filter_var($_REQUEST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $school_levels = filter_var($_REQUEST['school_levels'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $course = filter_var($_REQUEST['course'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $sql = "SELECT * FROM student WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username]);
            $student_data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($student_data === false) {
                return []; // Return empty array if username or password is incorrect
            }

            if (!password_verify($password, $student_data['password'])) {
                return []; // Return empty array if password is incorrect
            }

            // Fetch first_name and last_name1
            $student_full_name = "{$student_data['first_name']} {$student_data['last_name1']}";

            // Fetch school level and course name
            $school_level_course = "$school_levels $course";

            $sql = "SELECT * FROM school_levels WHERE school_levels = ? AND course = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$school_levels, $course]);
            $school_levels_id = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($school_levels_id === false) {
                return []; // Return empty array if school level or course not found
            }

            $sql = "SELECT * FROM subjects WHERE school_levels_id = ? AND subject_name = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$school_levels_id['id'], $course]);
            $subject_id = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($subject_id === false) {
                return []; // Return empty array if subject not found
            }

            $sql = "SELECT * FROM student_has_subject WHERE student_id = ? AND subject_id = ? ";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$student_data['id'], $subject_id['id']]);
            $student_has_subject_data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($student_has_subject_data === false) {
                return []; // Return empty array if student has not subject
            }

            $sql = "SELECT * FROM grades WHERE student_has_subject_student_id = ? AND student_has_subject_subject_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$student_has_subject_data['student_id'], $student_has_subject_data['subject_id']]);

            $grades_data = [];
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $grades_data[] = $row;
            }

            $student_grades = [
                'student_username' => $username,
                'student_full_name' => $student_full_name,
                'school_level_course' => $school_level_course,
                'grades_data' => $grades_data,
            ];

            return $student_grades;
        }
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