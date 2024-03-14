<?php

require_once "libs/smarty-4.4.1/Configuration.php";

class Control {
    private $model;
    private $view;

    public function __construct(){
        $this->model = null; // separate Models
        $this->view = new Configuration(); // smarty configuration
    }

    public function framework_manager(){
        if(isset($_REQUEST['login'])) {
            $this->processLogin();
        } else if(isset($_REQUEST['logUser'])) {
            $this->processUserLogin();
        } else if(isset($_REQUEST['signup'])) {
            $this->processSignup();
        } else if(isset($_REQUEST['delete_user'])) {
            $this->userDeletion(); // Call the deletion function form the model
        } else if(isset($_REQUEST['read_user'])) {
            $user_data = $this->userFetching();
            $this->view->setAssign('user_data', $user_data); // Assign the user data to Smarty variable
            $this->view->setDisplay("read_user.tpl"); // Display the read user template
        } else if(isset($_REQUEST['update_user'])) {
            $this->userUpdating(); // Call the updating function form the model
        } else if(isset($_REQUEST['create_subject'])) {
            $this->subjectCreation();
        } else if(isset($_REQUEST['delete_subject'])) {
            $this->subjectDeletion();
        } else if(isset($_REQUEST['read_subject'])) {
            $subject_data = $this->subjectFetching();
            $this->view->setAssign('subject_data', $subject_data);
            $this->view->setDisplay('read_subject.tpl');
        } else if(isset($_REQUEST['update_subject'])) {
            $this->subjectUpdating();
        } else if(isset($_REQUEST['get_classmates'])) {
            $classmates_data = $this->classmateFetching();
            $this->view->setAssign('classmates_data', $classmates_data);
            $this->view->setDisplay('my_classmates.tpl');
        } else if(isset($_REQUEST['get_teachers'])) {
            $teachers_data = $this->teacherFetching();
            $this->view->setAssign('teachers_data', $teachers_data);
            $this->view->setDisplay('my_teachers.tpl');
        } else if(isset($_REQUEST['get_students'])) {
            $students_data = $this->studentFetching();
            $this->view->setAssign('students_data', $students_data);
            $this->view->setDisplay('my_students.tpl');
        } else if(isset($_REQUEST['get_collaborators'])) {
            $collaborators_data = $this->collaboratorFetching();
            $this->view->setAssign('collaborators_data', $collaborators_data);
            $this->view->setDisplay('other_teachers.tpl');
        } else if(isset($_REQUEST['get_schedule'])) {
            $schedule_data = $this->studentSchedule();
            $this->view->setAssign('schedule_data', $schedule_data);
            $this->view->setDisplay('my_schedule.tpl');
        } else if(isset($_REQUEST['teacher_schedule'])) {
            $schedule_data = $this->teacherSchedule();
            $this->view->setAssign('schedule_data', $schedule_data);
            $this->view->setDisplay('teacher_schedule.tpl');
        } else if(isset($_REQUEST['get_attendance'])) {
            $student_attendance = $this->studentAttendance();
            $this->view->setAssign('student_attendance', $student_attendance);
            $this->view->setDisplay('my_attendance.tpl');
        } else if(isset($_REQUEST['teacher_attendance'])) {
            $student_attendance = $this->teacherAttendance();
            $this->view->setAssign('student_attendance', $student_attendance);
            $this->view->setDisplay('students_attendance.tpl');
        } else if(isset($_REQUEST['get_grades'])) {
            $student_grades = $this->studentGrades();
            $this->view->setAssign('student_grades', $student_grades);
            $this->view->setDisplay('my_grades.tpl');
        } else if(isset($_REQUEST['student_grades'])) {
            $student_grades = $this->teacherGrades();
            $this->view->setAssign('student_grades', $student_grades);
            $this->view->setDisplay('students_grades.tpl');
        }
        else if(isset($_GET['action'])) {
            $this->processAction();
        } else {
            $this->view->setDisplay("main.tpl"); // display the main page
        }
    }

    private function processLogin() {
        $this->view->setDisplay("login.tpl");
    }

    private function processUserLogin() {
        require_once "model/UserModel.php"; // call the SQL login model
        $user_type = UserModel::userLogin($conn); // Call the login function form the model
        switch($user_type) {
            case "Teacher":
                $this->view->setDisplay("teachers_dashboard.tpl");
                break;
            case "Student":
                $this->view->setDisplay("students_dashboard.tpl");
                break;
            case "Admin":
                $this->view->setDisplay("admin_dashboard.tpl");
                break;
            default:
                $this->view->setDisplay("login.tpl");
                break;
        }
    }

    // Admin methods/functions
    private function processSignup() {
        require_once "model/UserModel.php";
        UserModel::createUser($conn);
    }

    private function userFetching() {
        require_once "model/UserModel.php";
        $user_data = UserModel::readUser($conn); // Fetch user data
        return $user_data;
    }

    private function userDeletion() {
        require_once "model/UserModel.php";
        UserModel::deleteUser($conn);
    }

    private function userUpdating() {
        require_once "model/UserModel.php";
        UserModel::updateUser($conn);
    }

    private function subjectCreation() {
        require_once "model/SubjectModel.php";
        SubjectModel::createSubject($conn);
    }

    private function subjectDeletion() {
        require_once "model/SubjectModel.php";
        SubjectModel::deleteSubject($conn);
    }

    private function subjectFetching() {
        require_once "model/SubjectModel.php";
        $subject_data = SubjectModel::getSubject($conn); // Fetch subject data
        return $subject_data;
    }

    private function subjectUpdating() {
        require_once "model/SubjectModel.php";
        SubjectModel::updateSubject($conn);
    }

    // Student methods/functions
    private function classmateFetching() {
        require_once "model/StudentModel.php";
        $classmates_data = StudentModel::getClassmates($conn); // Fetch classmates data
        return $classmates_data;
    }

    private function teacherFetching() {
        require_once "model/StudentModel.php";
        $teachers_data = StudentModel::getTeachers($conn); // Fetch teachers data
        return $teachers_data;
    }

    private function studentSchedule() {
        require_once "model/StudentModel.php";
        $schedule_data = StudentModel::getSchedule($conn); // Fetch schedule data
        return $schedule_data;
    }

    private function studentAttendance() {
        require_once "model/StudentModel.php";
        $attendance_data = StudentModel::getAttendance($conn); // Fetch attendance data
        return $attendance_data;
    }

    private function studentGrades() {
        require_once "model/StudentModel.php";
        $student_grades = StudentModel::getGrades($conn); // Fetch grades data
        return $student_grades;
    }

    // Teacher methods/functions
    private function studentFetching() {
        require_once "model/TeacherModel.php";
        $students_data = TeacherModel::getStudents($conn); // Fetch students data
        return $students_data;
    }

    private function collaboratorFetching() {
        require_once "model/TeacherModel.php";
        $collaborators_data = TeacherModel::getCollaborators($conn); // Fetch collaborators data
        return $collaborators_data;
    }

    private function teacherSchedule() {
        require_once "model/TeacherModel.php";
        $schedule_data = TeacherModel::getSchedule($conn); // Fetch schedule data
        return $schedule_data;
    }

    private function teacherAttendance() {
        require_once "model/TeacherModel.php";
        $student_attendance = TeacherModel::getAttendance($conn); // Fetch attendance data
        return $student_attendance;
    }

    private function teacherGrades() {
        require_once "model/TeacherModel.php";
        $student_grades = TeacherModel::getGrades($conn); // Fetch grades data
        return $student_grades;
    }

    private function processAction() {
        $actionMap = [
            "my_grades" => "my_grades.tpl",
            "my_teachers" => "my_teachers.tpl",
            "my_schedule" => "my_schedule.tpl",
            "my_attendance" => "my_attendance.tpl",
            "my_classmates" => "my_classmates.tpl",
            "students_grades" => "students_grades.tpl",
            "other_teachers" => "other_teachers.tpl",
            "teacher_schedule" => "teacher_schedule.tpl",
            "students_attendance" => "students_attendance.tpl",
            "my_students" => "my_students.tpl",
            "students_dashboard" => "students_dashboard.tpl",
            "teachers_dashboard" => "teachers_dashboard.tpl",
            "admin_dashboard" => "admin_dashboard.tpl",
            "signup" => "signup.tpl",
            "read_user" => "read_user.tpl",
            "update_user" => "update_user.tpl",
            "delete_user" => "delete_user.tpl",
            "create_subject" => "create_subject.tpl",
            "read_subject" => "read_subject.tpl",
            "update_subject" => "update_subject.tpl",
            "delete_subject" => "delete_subject.tpl",
            "admin_login" => "admin_login.tpl",
            "logout" => "main.tpl",
        ];
    
        $action = $_GET['action'] ?? null;
        $template = $actionMap[$action] ?? "main.tpl";
        $this->view->setDisplay($template);
    }       

    public function getModel(){
        return $this->model;
    }
    public function setModel($model){
        $this->model = $model;
    }
    public function getView(){
        return $this->view;
    }
    public function setView($view){
        $this->view = $view;
    }
}