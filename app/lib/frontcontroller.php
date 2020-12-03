<?php
namespace TODOS\LIB;


use http\Header;
use TODOS\CONTROLLERS\AbstractController;

class FrontController extends AbstractController
{
    const NOT_FOUND_CONTROLLER = 'TODOS\CONTROLLERS\NotfoundController';
    const NOT_FOUND_ACTION = 'notfound';

    protected $_controller = 'todo';
    protected $_action = 'default';
    protected $_params = array();

    public function __construct(AppSessionHandler $session, Template $template, lang $lang)
    {
        $this->_lang = $lang;
        $this->_session = $session;
        $this->_template = $template;
        $this->parseUrl();
    }

    private function parseUrl()
    {
        $requestComponents = explode('/', trim($_SERVER['REQUEST_URI'], '/'), 3);
        if ($requestComponents[0] != ''){
            $this->_controller = $requestComponents[0];
            if (isset($requestComponents[1])){
                $this->_action = $requestComponents[1];
                if (isset($requestComponents[2])){
                    $this->_params = explode('/', $requestComponents[2]);
                }
            }
        }
    }

    public function dispatch()
    {
        $controllerClassName = 'TODOS\CONTROLLERS\\' . ucfirst($this->_controller) . 'Controller';
        $actionName = $this->_action . 'Action';
        if (!class_exists($controllerClassName, true)){
            $controllerClassName = self::NOT_FOUND_CONTROLLER;
            $this->_controller = 'notfound';
        }
        $controller = new $controllerClassName();

        if (!method_exists($controller, $actionName)){
            $this->_action = self::NOT_FOUND_ACTION;
            $actionName = $this->_action . 'Action';
        }

        /* ***************************************************************************** */

        if ($this->_controller === 'lang' && $this->_action === 'change'){
            $controller->$actionName();
        }elseif (!$this->_session->isValidFingerPrint() && ($this->_controller != 'user' || !in_array($this->_action, array('auth', 'login', 'signup')))){
            # check the finger print
            \Header('Location: /user/auth');
            exit();
        }

        /* ***************************************************************************** */

        $controller->_controller = $this->_controller;
        $controller->_action = $this->_action;
        $controller->_params = $this->_params;

        $controller->_lang = $this->_lang;
        $controller->_session = $this->_session;
        $controller->_template = $this->_template;

        $controller->$actionName();
    }
}