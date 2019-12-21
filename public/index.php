<?php

namespace PHPMVC;
use PHPMVC\LIB\FrontController;
use PHPMVC\LIB\Language;
use PHPMVC\Lib\Messenger;
use PHPMVC\Lib\Registry;
use PHPMVC\LIB\SessionManager;
use PHPMVC\LIB\Template\Template;

if (!defined('DS')){
    define('DS',DIRECTORY_SEPARATOR);
}

require '..' . DS . 'app' . DS . 'config' . DS . 'config.php';
require APP_PATH . DS . 'lib' . DS . 'autoload.php';

$session = new SessionManager();
$session->start();

if(!isset($session->lang)){
    $session->lang = APP_DEFAULT_LANGUAGE;
}

$template_parts = require '..' . DS . 'app' . DS . 'config' . DS . 'templateconfig.php';

$template  = new Template($template_parts);
$language  = new Language();
$messenger = Messenger::getInstance($session);

$registry = Registry::getInstance();
$registry->session   = $session;
$registry->language  = $language;
$registry->messenger = $messenger;

$frontController = new FrontController($template,$registry);
$frontController->dispatch();