<?php
require_once("libs/smarty-4.3.4/Config.php");

// Communicates with the model SQL queries .php files.
// Communicates with the view .tpl files.
// Communicates with the controller .php files.

class Control {
    private $view;
    private $model;
    private $controller;
    const FrameWork = 'MVC';
    static $language = 'PHP';
    public function __construct($view, $model, $controller) {
        $this->view = new Config();
        $this->model = $model;
        $this->controller = $controller;
    }

    public function framework_manager() {
        $this->view->setAssign('framework', self::FrameWork);
        $this->view->setDisplay('test.tpl');
    }

    public function getModel() {
        return $this->model;
    }
    public function setModel($model) {
        $this->model = $model;
    }

    public function getView() {
        return $this->view;
    }
    public function setView($view) {
        $this->view = $view;
    }

    public function getController() {
        return $this->controller;
    }
    public function setController($controller) {
        $this->controller = $controller;
    }

}