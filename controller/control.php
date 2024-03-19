<?php

require_once "libs/smarty-4.4.1/Configuration.php";

class Control {
    private $model;
    private $view;

    public function __construct(){
        $this->model = null; // separate Models
        $this->view = new Configuration(); // smarty configuration
    }

    public function framework_manager(){ // open to modular changes with functions.
        if(isset($_REQUEST['login'])) { // login page call
            $this->processLogin();
        } else if(isset($_REQUEST['logUser'])) { // login process
            $this->processUserLogin();
        } else if(isset($_REQUEST['signup'])) { // signup with admin privileges
            $this->processSignup();
        } else if(isset($_REQUEST['read_user'])) { // admin READ
            $user_data = $this->userFetching();
            $this->view->setAssign('user_data', $user_data); // Assign the user data to Smarty variable
            $this->view->setDisplay("read_user.tpl"); // Display the read user template
        } else if(isset($_REQUEST['update_user'])) { // admin UPDATE
            $this->userUpdating();
        }  else if(isset($_REQUEST['delete_user'])) { // admin DELETE
            $this->userDeletion();
        } else if(isset($_REQUEST['create_subject'])) { // admin CREATE
            $this->subjectCreation();
        } else if(isset($_REQUEST['read_subject'])) { // admin READ
            $subject_data = $this->subjectFetching();
            $this->view->setAssign('subject_data', $subject_data);
            $this->view->setDisplay('read_subject.tpl');
        } else if(isset($_REQUEST['update_subject'])) { // admin UPDATE
            $this->subjectUpdating();
        } else if(isset($_REQUEST['delete_subject'])) { // admin DELETE
            $this->subjectDeletion();
        } else if(isset($_REQUEST['get_classmates'])) { // student READ
            $classmates_data = $this->classmateFetching();
            $this->view->setAssign('classmates_data', $classmates_data);
            $this->view->setDisplay('my_classmates.tpl');
        } else if(isset($_REQUEST['get_teachers'])) { // student READ
            $teachers_data = $this->teacherFetching();
            $this->view->setAssign('teachers_data', $teachers_data);
            $this->view->setDisplay('my_teachers.tpl');
        } else if(isset($_REQUEST['get_grades'])) { // student READ
            $student_grades = $this->studentGrades();
            $this->view->setAssign('student_grades', $student_grades);
            $this->view->setDisplay('my_grades.tpl');
        } else if(isset($_REQUEST['get_schedule'])) { // student READ
            $schedule_data = $this->studentSchedule();
            $this->view->setAssign('schedule_data', $schedule_data);
            $this->view->setDisplay('my_schedule.tpl');
        } else if(isset($_REQUEST['get_attendance'])) { // student READ
            $student_attendance = $this->studentAttendance();
            $this->view->setAssign('student_attendance', $student_attendance);
            $this->view->setDisplay('my_attendance.tpl');
        } else if(isset($_REQUEST['get_students'])) { // teacher READ
            $students_data = $this->studentFetching();
            $this->view->setAssign('students_data', $students_data);
            $this->view->setDisplay('my_students.tpl');
        } else if(isset($_REQUEST['get_collaborators'])) { // teacher READ
            $collaborators_data = $this->collaboratorFetching();
            $this->view->setAssign('collaborators_data', $collaborators_data);
            $this->view->setDisplay('other_teachers.tpl');
        } else if(isset($_REQUEST['teacher_schedule'])) { // teacher READ
            $schedule_data = $this->teacherSchedule();
            $this->view->setAssign('schedule_data', $schedule_data);
            $this->view->setDisplay('teacher_schedule.tpl');
        } else if(isset($_REQUEST['get_student_attendance'])) { // teacher READ
            $student_attendance = $this->getStudentAttendance();
            $this->view->setAssign('student_attendance', $student_attendance);
            $this->view->setDisplay('students_attendance.tpl');
        } else if(isset($_REQUEST['student_grades'])) { // teacher READ
            $student_grades = $this->getStudentGrades();
            $this->view->setAssign('student_grades', $student_grades);
            $this->view->setDisplay('students_grades.tpl');
        } else if(isset($_REQUEST['set_student_grades'])) { // teacher UPDATE
            $this->setStudentGrades();
        } else if(isset($_REQUEST['set_student_attendance'])) { // teacher UPDATE
            $this->setStudentAttendance();
        } else if(isset($_GET['action'])) { // if action is set, redirect...
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
        $subject_data = SubjectModel::readSubject($conn); // Fetch subject data
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
        $schedule_data = TeacherModel::getTeacherSchedule($conn); // Fetch schedule data
        return $schedule_data;
    }

    private function getStudentAttendance() {
        require_once "model/TeacherModel.php";
        $student_attendance = TeacherModel::getStudentAttendance($conn); // Fetch attendance data
        return $student_attendance;
    }

    private function getStudentGrades() {
        require_once "model/TeacherModel.php";
        $student_grades = TeacherModel::getStudentGrades($conn); // Fetch grades data
        return $student_grades;
    }

    private function setStudentGrades() {
        require_once "model/TeacherModel.php";
        TeacherModel::setStudentGrades($conn); // Set student grades
    }

    private function setStudentAttendance() {
        require_once "model/TeacherModel.php";
        TeacherModel::setStudentAttendance($conn); // Set student attendance
    }

    private function processAction() { // Process page redirection
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
        $template = $actionMap[$action] ?? "main.tpl"; // Set template to main if action not found
        $this->view->setDisplay($template);
    }       

    // Getters and Setters
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