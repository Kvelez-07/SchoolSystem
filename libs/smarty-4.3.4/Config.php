<?php
require_once("libs/smarty-4.3.4/Smarty.class.php");

class Config {
    private $smarty; // instance of Smarty class

    public function __construct() {
        $this->smarty = new Smarty(); // instance of Smarty class
        $this->setPaths(); // Routing of files
    }

    public function setPaths() {
        $this->smarty->template_dir = 'view/templates';
        $this->smarty->compile_dir = 'view/templates_c';
        $this->smarty->config_dir = '/controller/configs/';
        $this->smarty->cache_dir = '/controller/cache/';
    }

    public function setAssign($key, $value) {
        // Data assign to HTML template
        $this->smarty->assign($key, $value);
    }

    public function setDisplay($template) {
        // Display HTML template
        $this->smarty->display($template);
    }
}