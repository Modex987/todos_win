<?php


define('DS', DIRECTORY_SEPARATOR);
define('PS', PATH_SEPARATOR);

define('APP_PATH', realpath(dirname(__DIR__)) . DS);

# define('PUBLIC_PATH', realpath(dirname(__DIR__)) . DS);

define('VIEWS_PATH', APP_PATH . 'views' . DS);
define('TEMPLATE_PATH', APP_PATH . 'templates' . DS);
define('LANG_PATH', APP_PATH . 'lang' . DS);

define('JS', '/inc/js/');
define('CSS', '/inc/css/');

define('SESSION_SAVE_PATH', APP_PATH . 'sessions');
define('APP_HOST_NAME', '.' . $_SERVER['HTTP_HOST']);

define('APP_KEY', 'e338108a9928aa960b84ae0345a3bc79a03e8ad87209b9faf5bfa');



#----------- Db --------------

define('DB_HOST', 'localhost');
define('DB_NAME', 'todosdb');
define('DB_USER', 'root');
define('DB_PASS', 'password');

define('DSN', 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME);

#----------- Db --------------

define('APP_DEFAULT_LANG', 'ar');