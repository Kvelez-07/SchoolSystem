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
        $this->userAccountActions(); // main function (could be changed)
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

    public function userAccountActions() {
        if(isset($_REQUEST['login'])) { // form based
            $this->userLogin();
        } else if(isset($_REQUEST['signup'])){ // form based
            $this->userSignUp();
        } else {
            $this->view->setDisplay('login.tpl');
        }
    }

    public function userLogin() {
        $user_type = $_REQUEST['user_type']; // form based
        switch ($user_type) {
            case 'Student':
                $this->view->setDisplay('student.tpl');
                $user_type = null;
                break;
            case 'Teacher':
                $this->view->setDisplay('teacher.tpl');
                $user_type = null;
                break;
            case 'Admin':
                $this->view->setDisplay('admin.tpl');
                $user_type = null;
                break;
            default:
                $this->view->setDisplay('login.tpl');
                $user_type = null;
                break;
        }
    }

    public function userSignUp() {
        // could be extended.
        $this->view->setDisplay('signup.tpl');
    }
}