<?php

require_once "libs/smarty-4.4.1/Configuration.php";

class Control {
    private $model;
    private $view;

    public function __construct(){
        $this->model = null;
        $this->view = new Configuration(); // smarty configuration
    }

    public function framework_manager(){
        if(isset($_REQUEST['login'])) {
            $this->processLogin();
        } else if(isset($_REQUEST['logUser'])) {
            $this->processUserLogin();
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
            default:
                $this->view->setDisplay("login.tpl");
                break;
        }
    }

    private function processAction() {
        switch($_GET['action']) {
            case "my_grades":
                $this->view->setDisplay("my_grades.tpl");
                break;
            case "my_teachers":
                $this->view->setDisplay("my_teachers.tpl");
                break;
            case "my_schedule":
                $this->view->setDisplay("my_schedule.tpl");
                break;
            case "my_attendance":
                $this->view->setDisplay("my_attendance.tpl");
                break;
            case "my_classmates":
                $this->view->setDisplay("my_classmates.tpl");
                break;
            case "students_grades":
                $this->view->setDisplay("students_grades.tpl");
                break;
            case "other_teachers":
                $this->view->setDisplay("other_teachers.tpl");
                break;
            case "teacher_schedule":
                $this->view->setDisplay("teacher_schedule.tpl");
                break;
            case "students_attendance":
                $this->view->setDisplay("students_attendance.tpl");
                break;
            case "my_students":
                $this->view->setDisplay("my_students.tpl");
                break;
            case "students_dashboard":
                $this->view->setDisplay("students_dashboard.tpl");
                break;
            case "teachers_dashboard":
                $this->view->setDisplay("teachers_dashboard.tpl");
                break;
            case "logout": // session destruction needed.
                $this->view->setDisplay("main.tpl");
                break;
            default:
                $this->view->setDisplay("main.tpl");
                break;
        }
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