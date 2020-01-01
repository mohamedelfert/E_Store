<?php

if (!defined('DS')){
    define('DS',DIRECTORY_SEPARATOR);
}

define('APP_PATH', dirname( __FILE__) . DS . '..');
define('VIEWS_PATH', APP_PATH . DS . 'views' . DS);
define('TEMPLATE_PATH', APP_PATH . DS .'template' . DS);
define('LANGUAGES_PATH', APP_PATH . DS .'languages' . DS);

// Template
define('CSS', '/css/');
define('JS', '/js/');

// Database
defined('DATABASE_HOST_NAME')       ? null : define ('DATABASE_HOST_NAME', 'localhost');
defined('DATABASE_USERNAME')        ? null : define ('DATABASE_USERNAME', 'root');
defined('DATABASE_PASSWORD')        ? null : define ('DATABASE_PASSWORD', '');
defined('DATABASE_DB_NAME')         ? null : define ('DATABASE_DB_NAME', 'electronic_store');
defined('DATABASE_PORT_NUMBER')     ? null : define ('DATABASE_PORT_NUMBER', 3306);
defined('DATABASE_CONN_DRIVER')     ? null : define ('DATABASE_CONN_DRIVER', 1);

// Default App Language
defined('APP_DEFAULT_LANGUAGE')     ? null : define ('APP_DEFAULT_LANGUAGE', 'ar');

// Session Manager
defined('SESSION_NAME')          ? null : define ('SESSION_NAME', 'MY_ESTORE_SESSION');
defined('SESSION_LIFE_TIME')     ? null : define ('SESSION_LIFE_TIME', 0);
defined('SESSION_SAVE_PATH')     ? null : define ('SESSION_SAVE_PATH', APP_PATH . DS . '..' . DS . 'sessions');

// Salt
defined('APP_SALT')          ? null : define ('APP_SALT', '$2a$07$yeNCSNwRpYopOhv0TrrReP$');

// Check For Access Privileges
defined('CHECK_FOR_PRIVILEGES')          ? null : define ('CHECK_FOR_PRIVILEGES', 1);

// Path For Upload Files
defined('UPLOAD_DIRECTORY')              ? null : define ('UPLOAD_DIRECTORY', APP_PATH . DS . '..' . DS . 'uploads');
defined('IMAGES_UPLOAD_DIRECTORY')       ? null : define ('IMAGES_UPLOAD_DIRECTORY', UPLOAD_DIRECTORY . DS . 'images');
defined('OTHER_FILES_UPLOAD_DIRECTORY')  ? null : define ('OTHER_FILES_UPLOAD_DIRECTORY', UPLOAD_DIRECTORY . DS . 'otherfiles');