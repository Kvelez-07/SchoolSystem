<?php

require_once('libs/smarty-4.4.1/Smarty.class.php');

class Configuration {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
        $this->setPaths(); // set paths for smarty
    }

    public function setPaths() {
        $this->smarty->setTemplateDir('view/templates');
        $this->smarty->setCompileDir('view/templates_c');
        $this->smarty->setConfigDir('controller/configs');
        $this->smarty->setCacheDir('controller/cache');
    }

    public function setAssign($key, $value) {
        $this->smarty->assign($key, $value);
    }

    public function setDisplay($template) {
        $this->smarty->display($template);
    }
}