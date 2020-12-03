<?php


namespace TODOS\LIB;


class Lang
{
    private $def_lang = APP_DEFAULT_LANG;
    private $dictionary = array();

    public function __construct()
    {
        if (isset($_COOKIE['lang'])){
            $this->def_lang = $_COOKIE['lang'];
        }
    }

    public function __get($prop)
    {
        return $this->$prop;
    }

    public function __set($prop, $val)
    {
        $this->$prop = $val;
    }

    public function load($controller, $action)
    {
        if (file_exists(LANG_PATH . $this->def_lang . DS . $controller . DS . $action . '.lang.php')){
            $this->dictionary =  array_merge(require_once LANG_PATH . $this->def_lang . DS . 'common.lang.php', require_once LANG_PATH . $this->def_lang . DS . $controller . DS . $action . '.lang.php');
        }else{
            trigger_error('Sorry no language file found', E_USER_WARNING);
        }
    }

}