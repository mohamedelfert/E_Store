<?php

namespace PHPMVC\Lib;

class Authentication
{
    private static $_instance;
    private $_session;
    private $_excludedRoutes = [
        '/index/default',
        '/auth/logout',
        '/users/profile',
        '/users/changepassword',
        '/language/default',
        '/users/settings',
        '/accessdenied/default',
        '/test/default',
    ];

    private function __construct($session)
    {
        $this->_session = $session;
    }

    private function __clone() {}

    public static function getInstance(SessionManager $session)
    {
        if (self::$_instance === null){
            self::$_instance = new self($session);
        }
        return self::$_instance;
    }

    public function isAuthorized(){
        return isset($this->_session->user);
    }

    public function hasAccess($controller , $action){
        $url = strtolower('/' . $controller . '/' . $action);
        if (in_array($url , $this->_excludedRoutes) || in_array($url , $this->_session->user->privileges)){
            return true;
        }
    }
}