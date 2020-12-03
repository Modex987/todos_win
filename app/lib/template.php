<?php


namespace TODOS\LIB;


class Template
{
    private $_template_components;
    private $_view_path;
    private $_data = array();
    private $_viewName;

    public function __construct($template_components)
    {
        $this->_template_components = $template_components;
    }

    public function __set($prop, $val)
    {
        $this->$prop = $val;
    }

    private function render_bloc($bloc)
    {
        extract($this->_data);
        require_once TEMPLATE_PATH . $bloc . '.template.php';
    }

    private function render_resources($part) # 'head' or 'footer'
    {
        if (array_key_exists($part . '_resources', $this->_template_components)){
            $resources = $this->_template_components[$part . '_resources'];
            $js = $resources['Js'];
            $css = $resources['Css'];
            # extract($this->_data);
            if (!empty($js)){
                foreach ($js as $name => $path) {
                    echo "<script src=$path></script>";
                }
            }
            if (!empty($css)){
                foreach ($css as $name => $path) {
                    echo "<link rel='stylesheet' href=$path>";
                }
            }
        }else{
            trigger_error('Sorry ' . $part . '_resources doesn\'t exists', E_USER_WARNING);
        }
    }

    public function render_components()
    {
        if (array_key_exists('components', $this->_template_components)){
            $components = $this->_template_components['components'];
            extract($this->_data);
            if ($this->_viewName === 'auth'){
                require_once $this->_view_path;
            }else{
                foreach ($components as $key => $path){
                    if ($key === ':view_temp'){
                        require_once $this->_view_path;
                    }else{
                        require_once $path;
                    }
                }
            }
        }else{
            trigger_error('Sorry no components found', E_USER_WARNING);
        }
    }

    public function renderTemplate()
    {
        $this->render_bloc('headstart');
        $this->render_resources('head');
        $this->render_bloc('headend');
        $this->render_bloc('containerstart');
        $this->render_components();
        $this->render_bloc('containerend');
        $this->render_resources('footer');
        $this->render_bloc('end');
    }
}