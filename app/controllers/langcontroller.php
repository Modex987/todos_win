<?php


namespace TODOS\CONTROLLERS;


class LangController extends AbstractController
{
    public function changeAction()
    {
        var_dump($this->_lang->def_lang);
        if ($this->_lang->def_lang === 'ar'){
            $this->_lang->def_lang = 'en';
        }elseif ($this->_lang->def_lang === 'en'){
            $this->_lang->def_lang = 'ar';
        }
        setcookie('lang', $this->_lang->def_lang, time() + 360, '/', APP_HOST_NAME, false, true);
        \header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}