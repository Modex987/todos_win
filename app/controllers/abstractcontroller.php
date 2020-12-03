<?php

namespace TODOS\CONTROLLERS;

use TODOS\MODELS\UserModel;

class AbstractController
{
    protected $_session;

    protected $_controller;
    protected $_action;
    protected $_params;

    protected $_data = array();

    protected $_template;
    protected $_lang;

    protected function notfoundAction()
    {
        $this->_view();
    }

    protected function _view()
    {
        $this->_lang->load($this->_controller, $this->_action);
        if (file_exists(VIEWS_PATH . $this->_controller . DS . $this->_action . '.view.php')){
            $user = UserModel::getByPk($this->_session->user_id);
            $this->_data['user'] = $user;
            $this->_template->_view_path = VIEWS_PATH . $this->_controller . DS . $this->_action . '.view.php';
        }else{
            $this->_template->_view_path = VIEWS_PATH . 'notfound' . DS . 'no_view.view.php';
        }
        $this->_template->_viewName = $this->_action;
        $this->_data = array_merge($this->_data, $this->_lang->dictionary);
        $this->_template->_data = $this->_data;
        $this->_template->renderTemplate();
    }

    protected function _render_html()
    {
        $this->_lang->load($this->_controller, $this->_action);
        $this->_data = array_merge($this->_data, $this->_lang->dictionary);
        extract($this->_data);
        if (file_exists(VIEWS_PATH . $this->_controller . DS . $this->_action . '.view.php')){
            require_once VIEWS_PATH . $this->_controller . DS . $this->_action . '.view.php';
        }else{
            require_once VIEWS_PATH . 'notfound' . DS . 'no_view.view.php';
        }
    }
}