<?php

namespace PHPMVC\Lib;
use PHPMVC\LIB\Template\Template;

class FrontController
{
    use Helper;

    const NOT_FOUND_CONTROLLER = 'PHPMVC\Controllers\\NotFoundController';
    const NOT_FOUND_ACTION     = 'notFoundAction';

    private $_controller = 'index';
    private $_action     = 'default';
    private $_params     = array();

    private $_registry;
    private $_template;
    private $_authentication;

    public function __construct(Template $template , Registry $registry , Authentication $auth)
    {
        $this->_template       = $template;
        $this->_registry       = $registry;
        $this->_authentication = $auth;
        $this->_parseUrl();
    }

    private function _parseUrl(){
        $url = explode('/',trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),'/'),3);
        if (isset($url[0]) && $url[0] != ''){
            $this->_controller = $url[0];
        }
        if (isset($url[1]) && $url[1] != ''){
            $this->_action = $url[1];
        }
        if (isset($url[2]) && $url[2] != ''){
            $this->_params = explode('/',$url[2]);
        }
    }

    public function dispatch(){
        $controllerClassName = 'PHPMVC\Controllers\\' . ucfirst($this->_controller) . 'Controller';
        $actionName = $this->_action .'Action';

        if (!$this->_authentication->isAuthorized()){
            if ($this->_controller != 'auth' && $this->_action != 'login'){
                $this->redirect('/auth/login');
            }
        }

        if (!class_exists($controllerClassName) || !method_exists($controllerClassName,$actionName)){
            $controllerClassName         = self::NOT_FOUND_CONTROLLER;
            $this->_action = $actionName = self::NOT_FOUND_ACTION;
        }
        $controller = new $controllerClassName();
        $controller->setController($this->_controller);
        $controller->setAction($this->_action);
        $controller->setparams($this->_params);
        $controller->setTemplate($this->_template);
        $controller->setRegistry($this->_registry);
        $controller->$actionName();
    }
}