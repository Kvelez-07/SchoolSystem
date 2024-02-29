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
        $this->view->setDisplay('sample.tpl');
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