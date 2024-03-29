<?php

require_once "connection/Database.php";

class TeacherModel {

    public static function getStudentAttendance($conn) { // values based on view variable names
        if (
            !empty($_REQUEST['username']) &&
            !empty($_REQUEST['school_levels']) && 
            !empty($_REQUEST['course']) && 
            !empty($_REQUEST['date'])
        ) {
            $username = filter_var($_REQUEST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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

    public static function setStudentAttendance($conn) { // values based on view variable names
        
        if (
            !empty($_REQUEST['username']) &&
            !empty($_REQUEST['school_levels']) && 
            !empty($_REQUEST['course']) && 
            !empty($_REQUEST['date']) &&
            !empty($_REQUEST['justified'])
        ) {
            $username = filter_var($_REQUEST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $school_levels = filter_var($_REQUEST['school_levels'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $course = filter_var($_REQUEST['course'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $date = filter_var($_REQUEST['date'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $justified = filter_var($_REQUEST['justified'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $sql = "SELECT * FROM student WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username]);
            $student_data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($student_data === false) {
                return []; // Return empty array if username or password is incorrect
            }

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
            $attendance_data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($attendance_data !== false) {
                $sql = "UPDATE attendance SET justified = ? WHERE student_id = ? AND subject_id = ? AND date = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$justified, $student_data['id'], $subject_id['id'], $date]);
                echo "Grades updated successfully!";
                header ("Refresh: 2; url=index.php?action=students_attendance");
                return true;
            } else {
                $sql = "INSERT INTO attendance (student_id, subject_id, date, justified) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$student_data['id'], $subject_id['id'], $date, $justified]);
                echo "Grades assigned successfully!";
                header ("Refresh: 2; url=index.php?action=students_attendance");
                return true;
            }
        }
    }

    public static function getStudentGrades($conn) { // values based on view variable names
        if (
            !empty($_REQUEST['username']) &&
            !empty($_REQUEST['school_levels']) && 
            !empty($_REQUEST['course'])
        ) {
            $username = filter_var($_REQUEST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $school_levels = filter_var($_REQUEST['school_levels'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $course = filter_var($_REQUEST['course'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $sql = "SELECT * FROM student WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username]);
            $student_data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($student_data === false) {
                return []; // Return empty array if username or password is incorrect
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

            if($grades_data === false) {
                return []; // Return empty array if no grades found
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

    public static function setStudentGrades($conn) { // values based on view variable names
        if (
            !empty($_REQUEST['username']) &&
            !empty($_REQUEST['school_levels']) && 
            !empty($_REQUEST['course']) &&
            !empty($_REQUEST['trimester']) &&
            !empty($_REQUEST['grades'])
        ) {
            $username = filter_var($_REQUEST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $school_levels = filter_var($_REQUEST['school_levels'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $course = filter_var($_REQUEST['course'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $trimester = filter_var($_REQUEST['trimester'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $grades = filter_var($_REQUEST['grades'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $sql = "SELECT * FROM student WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username]);
            $student_data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($student_data === false) {
                return []; // Return empty array if username or password is incorrect
            }

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
            $subject_data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($subject_data === false) {
                return []; // Return empty array if subject not found
            }

            $sql = "SELECT * FROM grades WHERE student_has_subject_student_id = ? AND student_has_subject_subject_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$student_data['student_id'], $subject_data['subject_id']]);
            $grades_data = $stmt->fetch(PDO::FETCH_ASSOC);

            try {
                if ($grades_data !== false) {
                    $sql = "UPDATE grades SET grades = ? WHERE student_has_subject_student_id = ? AND student_has_subject_subject_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$grades, $student_data['student_id'], $subject_data['subject_id']]);
                    echo "Grades updated successfully!";
                    header ("Refresh: 2; url=index.php?action=students_grades");
                    return true;
                } else {
                    $sql = "INSERT INTO grades (student_has_subject_student_id, student_has_subject_subject_id, trimester, grades) VALUES (?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$student_data['student_id'], $subject_data['subject_id'], $trimester, $grades]);

                    $grades_id = $conn->lastInsertId(); // student_has_subject setup

                    $sql = "SELECT * FROM student_has_subject WHERE student_id = ? AND subject_id = ? AND grades_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$student_data['student_id'], $subject_data['subject_id'], $grades_id]);
                    $student_has_subject_data = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($student_has_subject_data === false) {
                        $sql = "INSERT INTO student_has_subject (student_id, subject_id, grades_id) VALUES (?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute([$student_data['student_id'], $subject_data['subject_id'], $grades_id]); 
                    } else {
                        $sql = "UPDATE student_has_subject SET grades_id = ? WHERE student_id = ? AND subject_id = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute([$grades_id, $student_data['student_id'], $subject_data['subject_id']]);
                    }

                    echo "Grades assigned successfully!";
                    header ("Refresh: 2; url=index.php?action=students_grades");
                    return true;
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
    }

    public static function getTeacherSchedule($conn) { // values based on view variable names
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

    public static function getCollaborators($conn) { // values based on view variable names
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
    
                $sql = "SELECT teacher_id FROM subjects WHERE school_levels_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$school_levels_id['id']]);
                $teacher_id = $stmt->fetch(PDO::FETCH_ASSOC);
    
                // Check if $teacher_id is false
                if ($teacher_id === false) {
                    return []; // Return empty array if no teacher found
                }
    
                $sql = "SELECT username, email, first_name, last_name1 FROM teacher WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$teacher_id['teacher_id']]);
    
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
    
            $collaborators_data = [];
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $collaborators_data[] = $row;
            }
            return $collaborators_data;
        }
    }    

    public static function getStudents($conn) { // values based on view variable names
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