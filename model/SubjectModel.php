<?php

require_once "connection/Database.php";

class SubjectModel {

    public static function createSubject($conn) { // values based on view variable names
        if (!empty($_REQUEST['subject_name'])) {
            $subject_name = filter_var($_REQUEST['subject_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $begins = filter_var($_REQUEST['begins'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $ends = filter_var($_REQUEST['ends'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $day = filter_var($_REQUEST ['day'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $allowed_schedule = (($begins == "7am" && $ends == "10am") || ($begins == "10am" && $ends == "12pm") || ($begins == "2pm" && $ends == "3pm") 
            || ($begins == "3pm" && $ends == "4pm") || ($begins == "4pm" && $ends == "5pm") || ($begins == "6pm" && $ends == "7pm"));

            if (!$allowed_schedule) {
                echo "Schedule settings not allowed.";
                header("Refresh: 2; url=index.php?action=admin_dashboard"); // Refresh page after 2 seconds
                return; // Exit function after inserting subject
            }

            // Retrieve school level ID
            $sql = "SELECT id FROM school_levels WHERE course = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$subject_name]);
            $school_levels_ids = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
            // Retrieve teacher ID
            $sql = "SELECT id FROM teacher WHERE specialty = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$subject_name]);
            $teacher_ids = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
            // Check if subject already exists
            $sql = "SELECT * FROM subjects WHERE subject_name = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$subject_name]);
            $existing_subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            foreach ($teacher_ids as $teacher_id) {
                foreach ($school_levels_ids as $school_levels_id) {
                    $subject_exists = false;
                    foreach ($existing_subjects as $existing_subject) {
                        if ($existing_subject['school_levels_id'] == $school_levels_id &&
                            $existing_subject['teacher_id'] == $teacher_id) {
                            $subject_exists = true;
                            break;
                        }
                    }
                    if (!$subject_exists) {
                        // Insert subject
                        $sql = "INSERT INTO subjects (subject_name, school_levels_id, teacher_id) VALUES (?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute([$subject_name, $school_levels_id, $teacher_id]);

                        // Retrieve the subject_id of the last inserted subject
                        $subject_id = $conn->lastInsertId();

                        // Insert into schedule table using the retrieved subject_id
                        $sql = "INSERT INTO schedule (begins, ends, day, subject_id) VALUES (?, ?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute([$begins, $ends, $day, $subject_id]);
                        
                        echo "Subject created successfully!";
                        header("Refresh: 2; url=index.php?action=admin_dashboard"); // Refresh page after 2 seconds
                        return; // Exit function after inserting subject
                    }
                }
            }
            echo "Unable to create subject. All combinations already exist.";
            header("Refresh: 2; url=index.php?action=admin_dashboard"); // Refresh page after 2 seconds
        }
        $conn = null;
        $stmt = null;
    }

    public static function updateSubject($conn) { // values based on view variable names
        if (
            !empty($_REQUEST['school_levels_id']) && 
            !empty($_REQUEST['teacher_id']) && 
            !empty($_REQUEST['subject_name']) &&
            !empty($_REQUEST['new_subject_name']) &&
            !empty($_REQUEST['new_teacher_id']) &&
            !empty($_REQUEST['new_school_levels_id'])
            )
        {
            $school_levels_id = filter_var($_REQUEST['school_levels_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $teacher_id = filter_var($_REQUEST['teacher_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $subject_name = filter_var($_REQUEST['subject_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $new_subject_name = filter_var($_REQUEST['new_subject_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $new_teacher_id = filter_var($_REQUEST['new_teacher_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $new_school_levels_id = filter_var($_REQUEST['new_school_levels_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $sql = "UPDATE subjects SET school_levels_id = ?, teacher_id = ?, subject_name = ? WHERE school_levels_id = ? AND teacher_id = ? AND subject_name = ?"; 
            $stmt = $conn->prepare($sql);
            $stmt->execute([$new_school_levels_id, $new_teacher_id, $new_subject_name, $school_levels_id, $teacher_id, $subject_name]);
            echo "Subject updated successfully!";
        } else {
            echo "Could not update subject.";
        }
        header("Refresh: 2; url=index.php?action=admin_dashboard"); // Refresh page after 2 seconds
        $conn = null;
        $stmt = null;
    }

    public static function deleteSubject($conn) { // values based on view variable names
        if (!empty($_REQUEST['school_levels_id']) && !empty($_REQUEST['teacher_id']) && !empty($_REQUEST['subject_name'])) {
            $school_levels_id = filter_var($_REQUEST['school_levels_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $teacher_id = filter_var($_REQUEST['teacher_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $subject_name = filter_var($_REQUEST['subject_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $sql = "DELETE FROM subjects WHERE school_levels_id = ? AND teacher_id = ? AND subject_name = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$school_levels_id, $teacher_id, $subject_name]);
            echo "Subject deleted successfully!";
        } else {
            echo "Nothing left to delete!";
        }
        header("Refresh: 2; url=index.php?action=admin_dashboard"); // Refresh page after 2 seconds
        $conn = null;
        $stmt = null;
    }

    public static function getSubject($conn) { // values based on view variable names
        if (!empty($_REQUEST['subject_name'])) {
            $subject_name = filter_var($_REQUEST['subject_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $sql = "SELECT * FROM subjects WHERE subject_name = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$subject_name]);
            $subject_data = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $subject_data[] = $row;
            }
            return $subject_data;
        }
    }
}