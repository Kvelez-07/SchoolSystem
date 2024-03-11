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
            $this->userFetching(); // Call the fetching function form the model
        } else if(isset($_REQUEST['update_user'])) {
            $this->userUpdating(); // Call the updating function form the model
        } else if(isset($_GET['action'])) {
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

    private function processSignup() {
        require_once "model/UserModel.php";
        UserModel::createUser($conn);
    }

    private function userFetching() {
        require_once "model/UserModel.php";
        UserModel::readUser($conn);
    }

    private function userDeletion() {
        require_once "model/UserModel.php";
        UserModel::deleteUser($conn);
    }

    private function userUpdating() {
        require_once "model/UserModel.php";
        UserModel::updateUser($conn);
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