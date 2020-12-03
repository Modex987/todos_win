<?php

namespace TODOS;

require_once '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';
require_once APP_PATH . 'lib' . DS .'autoload.php';
$template_components = require_once APP_PATH . 'config' . DS . 'template.config.php';

use TODOS\LIB\AppSessionHandler;
use TODOS\LIB\FrontController;
use TODOS\LIB\Lang;
use TODOS\LIB\Template;

ob_start();
##################################################################################################
$session = new AppSessionHandler();
$lang = new Lang();
$template = new Template($template_components);
##################################################################################################

$session->start();

(new FrontController($session, $template, $lang))->dispatch();

$session->checkSessionValidity();
ob_end_flush();