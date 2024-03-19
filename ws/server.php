<?php

$http_method = $_SERVER['REQUEST_METHOD']; // URI

switch ($http_method) { // API-REST methods
    case 'GET':
        handleGET(); // $REQUEST triggers the method
        break;
    case 'POST':
        handlePOST();
        break;
    case 'PUT':
        handlePUT();
        break;
    case 'DELETE':
        handleDELETE();
        break;
    default:
        runDefault(); // Checking if main.tpl will be displayed first is pending.
        break;
}

function runDefault() {
    header("HTTP/1.1 405 Method Not Allowed");
}

function handleGET() {
    require_once "../connection/Database.php";
    header("HTTP/1.1 200 OK");
    if(isset($_REQUEST['read_user'])) {
        readUser($conn);
    } else if(isset($_REQUEST['read_subject'])) {
        readSubject($conn);
    } else if(isset($_REQUEST['get_classmates'])) {
        getClassmates($conn);
    } else if(isset($_REQUEST['get_teachers'])) {
        getTeachers($conn);
    } else if(isset($_REQUEST['get_grades'])) {
        getGrades($conn);
    } else if(isset($_REQUEST['get_schedule'])) {
        getSchedule($conn);
    } else if(isset($_REQUEST['get_attendance'])) {
        getAttendance($conn);
    } else if(isset($_REQUEST['get_students'])) {
        getStudents($conn);
    } else if(isset($_REQUEST['get_collaborators'])) {
        getCollaborators($conn);
    } else if(isset($_REQUEST['teacher_schedule'])) {
        getTeacherSchedule($conn);
    } else if(isset($_REQUEST['get_student_attendance'])) {
        getStudentAttendance($conn);
    } else if(isset($_REQUEST['student_grades'])) {
        getStudentGrades($conn);
    }
}

function handlePOST() {
    require_once "../connection/Database.php";
    header("HTTP/1.1 200 OK");
    if(isset($_REQUEST['login'])) {
        userLogin($conn);
    } else if(isset($_REQUEST['signup'])) {
        createUser($conn);
    } else if(isset($_REQUEST['create_subject'])) {
        createSubject($conn);
    } else if(isset($_REQUEST['set_student_attendance'])) {
        setStudentAttendance($conn);
    } else if(isset($_REQUEST['set_student_grades'])) {
        setStudentGrades($conn);
    }
}

function handlePUT() {
    require_once "../connection/Database.php";
    header("HTTP/1.1 200 OK");
    if(isset($_REQUEST['update_user'])) {
        updateUser($conn);
    } else if(isset($_REQUEST['update_subject'])) {
        updateSubject($conn);
    }
}

function handleDELETE() {
    require_once "../connection/Database.php";
    header("HTTP/1.1 200 OK");
    if(isset($_REQUEST['delete_user'])) {
        deleteUser($conn);
    } else if(isset($_REQUEST['delete_subject'])) {
        deleteSubject($conn);
    }
}

function userLogin($conn) { // values based on view variable names
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
            header("HTTP/1.1 400 Bad Request");
            echo "Invalid user type";
            header("Refresh: 2; url=index.php?action=admin_dashboard"); // MVC - GET redirect in 2s
            exit;
        }
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC); // for password matching
        echo json_decode($user); // JSON response
    }

    if($user) {
        if(password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['username'] = $user['username'];
            header("HTTP/1.1 200 OK");
            return $user_type;
        } else {
            header("HTTP/1.1 400 Bad Request");
            echo "Invalid username or password";
            header("Refresh: 2; url=index.php?action=admin_dashboard"); // MVC - GET redirect in 2s
        }
    }

    $stmt = null; // Close statement
    $conn = null; // Close connection
}

function createUser($conn) { // values based on view variable names
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
                header("HTTP/1.1 400 Bad Request");
                echo "All fields are required";
                header("Refresh: 2; url=index.php?action=admin_dashboard"); // MVC - GET redirect in 2s
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
        echo json_encode($user);

        $sql = "SELECT * FROM school_levels WHERE school_levels = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$school_levels]);
        $school_levels_id = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($school_levels_id);
    
        if($user) {
            header("HTTP/1.1 400 Bad Request");
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
                    header("HTTP/1.1 400 Bad Request");
                    echo "Invalid user type";
                    break;
            }
            header("HTTP/1.1 200 OK");
            echo "User created successfully";
            header("Refresh: 2; url=index.php?action=admin_dashboard"); // MVC - GET redirect in 2s
        }
    } else {
        header("HTTP/1.1 400 Bad Request");
        echo "All fields are required.";
        header("Refresh: 2; url=index.php?action=admin_dashboard"); // MVC - GET redirect in 2s
    }

    // Close statement and connection
    $stmt = null;
    $conn = null;
}

function readUser($conn) { // values based on view variable names
    $username = isset($_REQUEST['username']) ? filter_var($_REQUEST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : null;
    $user_type = isset($_REQUEST['user_type']) ? filter_var($_REQUEST['user_type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : null;
    $first_name = isset($_REQUEST['first_name']) ? filter_var($_REQUEST['first_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : null;
    $last_name1 = isset($_REQUEST['last_name1']) ? filter_var($_REQUEST['last_name1'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : null;

    if(empty($username) || empty($user_type) || empty($first_name) || empty($last_name1)) {
        header("HTTP/1.1 400 Bad Request");
        echo "All fields are required";
        header("Refresh: 2; url=index.php?action=admin_dashboard");
        exit;
    }

    $sql = "SELECT * FROM $user_type WHERE username = ? AND first_name = ? AND last_name1 = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username, $first_name, $last_name1]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(empty($result)) {
        header("HTTP/1.1 404 Not Found");
        echo "User not found";
        header("Refresh: 2; url=index.php?action=admin_dashboard");
        exit;
    }

    $stmt = null;
    $conn = null;
    echo json_encode($result);
    return $result; // Return the fetched user data
}

function updateUser($conn) { // values based on view variable names
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
    echo json_encode($result);

    if (!$result) {
        header("HTTP/1.1 400 Bad Request");
        echo "Invalid username";
        header("Refresh: 2; url=index.php?action=admin_dashboard"); // MVC - GET redirect in 2s
        exit;
    }

    if (password_verify($password, $result['password'])) {
        $sql = "UPDATE $user_type SET username = ?, password = ?, first_name = ?, last_name1 = ?, last_name2 = ?, email = ?, phone = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$new_username, $new_password, $new_first_name, $new_last_name1, $new_last_name2, $new_email, $new_phone, $username]);
        header("HTTP/1.1 200 OK");
        echo "User updated successfully";
        header("Refresh: 2; url=index.php?action=admin_dashboard"); // MVC - GET redirect in 2s
    } else {
        header("HTTP/1.1 400 Bad Request");
        echo "Invalid password or username";
        header("Refresh: 2; url=index.php?action=admin_dashboard"); // MVC - GET redirect in 2s
    }

    $stmt = null;
    $conn = null;
}

function deleteUser($conn) { // values based on view variable names
    $username = filter_var($_REQUEST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
    $user_type = filter_var($_REQUEST['user_type'], FILTER_SANITIZE_SPECIAL_CHARS);
    $first_name = filter_var($_REQUEST['first_name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $last_name1 = filter_var($_REQUEST['last_name1'], FILTER_SANITIZE_SPECIAL_CHARS);
    $last_name2 = filter_var($_REQUEST['last_name2'], FILTER_SANITIZE_SPECIAL_CHARS);

    if(empty($username) || empty($user_type) || empty($first_name) || empty($last_name1) || empty($last_name2)) {
        header("HTTP/1.1 400 Bad Request");
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
    header("HTTP/1.1 200 OK");
    echo "User deleted, redirecting...";
    header("Refresh: 2; url=index.php?action=admin_dashboard"); // MVC - GET redirect in 2s
    
    $stmt = null;
    $conn = null;
}

function createSubject($conn) { // values based on view variable names
    if (!empty($_REQUEST['subject_name'])) {
        $subject_name = filter_var($_REQUEST['subject_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $begins = filter_var($_REQUEST['begins'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $ends = filter_var($_REQUEST['ends'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $day = filter_var($_REQUEST ['day'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $allowed_schedule = (($begins == "7am" && $ends == "10am") || ($begins == "10am" && $ends == "12pm") || ($begins == "2pm" && $ends == "3pm") 
        || ($begins == "3pm" && $ends == "4pm") || ($begins == "4pm" && $ends == "5pm") || ($begins == "6pm" && $ends == "7pm"));

        if (!$allowed_schedule) {
            header("HTTP/1.1 400 Bad Request");
            echo "Schedule settings not allowed.";
            header("Refresh: 2; url=index.php?action=admin_dashboard"); // Refresh page after 2 seconds
            return; // Exit function after inserting subject
        }

        // Retrieve school level ID
        $sql = "SELECT id FROM school_levels WHERE course = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$subject_name]);
        $school_levels_ids = $stmt->fetchAll(PDO::FETCH_COLUMN);
        echo json_encode($school_levels_ids);

        // Retrieve teacher ID
        $sql = "SELECT id FROM teacher WHERE specialty = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$subject_name]);
        $teacher_ids = $stmt->fetchAll(PDO::FETCH_COLUMN);
        echo json_encode($teacher_ids);

        // Check if subject already exists
        $sql = "SELECT * FROM subjects WHERE subject_name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$subject_name]);
        $existing_subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($existing_subjects);

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
                    
                    header("HTTP/1.1 200 OK");
                    echo "Subject created successfully!";
                    header("Refresh: 2; url=index.php?action=admin_dashboard"); // Refresh page after 2 seconds
                    return; // Exit function after inserting subject
                }
            }
        }
        header("HTTP/1.1 400 Bad Request");
        echo "Unable to create subject. All combinations already exist.";
        header("Refresh: 2; url=index.php?action=admin_dashboard"); // Refresh page after 2 seconds
    }
    $conn = null;
    $stmt = null;
}

function readSubject($conn) { // values based on view variable names
    if (!empty($_REQUEST['subject_name'])) {
        $subject_name = filter_var($_REQUEST['subject_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $sql = "SELECT * FROM subjects WHERE subject_name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$subject_name]);

        $subject_data = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $subject_data[] = $row;
        }
        echo json_encode($subject_data);
        return $subject_data;
    }
}

function updateSubject($conn) { // values based on view variable names
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
        header("HTTP/1.1 200 OK");
        echo "Subject updated successfully!";
    } else {
        header("HTTP/1.1 400 Bad Request");
        echo "Could not update subject.";
    }
    header("Refresh: 2; url=index.php?action=admin_dashboard"); // Refresh page after 2 seconds
    $conn = null;
    $stmt = null;
}

function deleteSubject($conn) { // values based on view variable names
    if (!empty($_REQUEST['school_levels_id']) && !empty($_REQUEST['teacher_id']) && !empty($_REQUEST['subject_name'])) {
        $school_levels_id = filter_var($_REQUEST['school_levels_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $teacher_id = filter_var($_REQUEST['teacher_id'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $subject_name = filter_var($_REQUEST['subject_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $sql = "DELETE FROM subjects WHERE school_levels_id = ? AND teacher_id = ? AND subject_name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$school_levels_id, $teacher_id, $subject_name]);
        header("HTTP/1.1 200 OK");
        echo "Subject deleted successfully!";
    } else {
        header("HTTP/1.1 400 Bad Request");
        echo "Nothing left to delete!";
    }
    header("Refresh: 2; url=index.php?action=admin_dashboard"); // Refresh page after 2 seconds
    $conn = null;
    $stmt = null;
}

function getAttendance($conn) { // values based on view variable names
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

        if ($attendance_data === false) {
            header("HTTP/1.1 400 Bad Request"); // Return 400 Bad Request if attendance data not found
            echo "Attendance data not found!";
            return []; // Return empty array if attendance data not found
        }

        header("HTTP/1.1 200 OK"); // Return 200 OK if attendance data found
        echo json_encode($student_attendance);
        return $student_attendance;
    }
}

function getGrades($conn) { // values based on view variable names
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

        if($grades_data === false) {
            return []; // Return empty array if student has no grades
        }

        $student_grades = [
            'student_username' => $username,
            'student_full_name' => $student_full_name,
            'school_level_course' => $school_level_course,
            'grades_data' => $grades_data,
        ];

        if($grades_data === false) {
            header("HTTP/1.1 400 Bad Request"); // Return 400 Bad Request if grades data not found
            echo "Grades data not found!";
            return []; // Return empty array if student has no grades
        }

        echo json_encode($student_grades);
        return $student_grades;
    }
}

function getSchedule($conn) { // values based on view variable names
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
        if ($schedule_data === false) {
            header("HTTP/1.1 400 Bad Request"); // Return 400 Bad Request if no schedule found
            echo "Schedule data not found!";
            return []; // Return empty array if no schedule found
        }

        // Encode the schedule data into JSON format
        echo json_encode($schedule_data);
        return $schedule_data;
    }
}      

function getTeachers($conn) { // values based on view variable names
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

        if ($teachers_data === false) {
            header("HTTP/1.1 400 Bad Request"); // Return 400 Bad Request if no teachers found
            echo "Teachers data not found!";
            return []; // Return empty array if no teachers found
        }

        echo json_encode($teachers_data);
        return $teachers_data;
    }
}

function getClassmates($conn) { // values based on view variable names
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

        if ($classmates_data === false) {
            header("HTTP/1.1 400 Bad Request"); // Return 400 Bad Request if no classmates found
            echo "Classmates data not found!";
            return []; // Return empty array if no classmates found
        }

        echo json_encode($classmates_data);
        return $classmates_data;
    }
}

function getStudentAttendance($conn) { // values based on view variable names
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

        if ($student_attendance === false) {
            header("HTTP/1.1 400 Bad Request"); // Return 400 Bad Request if attendance data not found
            echo "Attendance data not found!";
            return []; // Return empty array if attendance data not found
        }

        echo json_encode($student_attendance);
        return $student_attendance;
    }
}

function setStudentAttendance($conn) { // values based on view variable names
        
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
        echo json_encode($attendance_data);

        if ($attendance_data !== false) {
            $sql = "UPDATE attendance SET justified = ? WHERE student_id = ? AND subject_id = ? AND date = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$justified, $student_data['id'], $subject_id['id'], $date]);
            header("HTTP/1.1 200 OK"); // Return 200 OK if grades updated successfully
            echo "Grades updated successfully!";
            header ("Refresh: 2; url=index.php?action=students_attendance");
            return true;
        } else {
            $sql = "INSERT INTO attendance (student_id, subject_id, date, justified) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$student_data['id'], $subject_id['id'], $date, $justified]);
            header("HTTP/1.1 200 OK"); // Return 200 OK if grades assigned successfully
            echo "Grades assigned successfully!";
            header ("Refresh: 2; url=index.php?action=students_attendance");
            return true;
        }
    }
}

function getStudentGrades($conn) { // values based on view variable names
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

        if($student_grades === false) {
            header("HTTP/1.1 400 Bad Request"); // Return 400 Bad Request if no grades found
            echo "No grades found!";
            return []; // Return empty array if no grades found
        }

        echo json_encode($student_grades);
        return $student_grades;
    }
}

function setStudentGrades($conn) { // values based on view variable names
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
        echo json_encode($grades_data);

        try {
            if ($grades_data !== false) {
                $sql = "UPDATE grades SET grades = ? WHERE student_has_subject_student_id = ? AND student_has_subject_subject_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$grades, $student_data['student_id'], $subject_data['subject_id']]);
                header("HTTP/1.1 200 OK");
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
                echo json_encode($student_has_subject_data);

                if ($student_has_subject_data === false) {
                    $sql = "INSERT INTO student_has_subject (student_id, subject_id, grades_id) VALUES (?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$student_data['student_id'], $subject_data['subject_id'], $grades_id]); 
                } else {
                    $sql = "UPDATE student_has_subject SET grades_id = ? WHERE student_id = ? AND subject_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$grades_id, $student_data['student_id'], $subject_data['subject_id']]);
                }

                header("HTTP/1.1 200 OK");
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

function getTeacherSchedule($conn) { // values based on view variable names
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

        if($schedule_data === false) {
            header("HTTP/1.1 404 Not Found");
            echo "No schedule data found";
            return [];
        }
        echo json_encode($schedule_data);
        return $schedule_data;
    }
}

function getCollaborators($conn) { // values based on view variable names
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

        if($collaborators_data === false) {
            header("HTTP/1.1 404 Not Found");
            echo "No collaborators data found";
            return [];
        }
        echo json_encode($collaborators_data);
        return $collaborators_data;
    }
}

function getStudents($conn) { // values based on view variable names
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

        if($classmates_data === false) {
            header("HTTP/1.1 404 Not Found");
            echo "No classmates data found";
            return [];
        }
        echo json_encode($classmates_data);
        return $classmates_data;
    }
}