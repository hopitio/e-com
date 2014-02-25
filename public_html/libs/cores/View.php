<?php

defined('DS') or die;

class View
{

    protected $_module;
    protected $_controller;
    protected $_theme = 'cosmo';
    protected $_layout = 'two_columns';
    protected $_sidebar = 'default_sidebar';
    protected $_title = 'ecom';
    protected $_heading;
    protected $_breadcrums = array();
    protected $_content;

    /** @var \Nav_item[] */
    protected $_arr_main_nav;
    protected $_active_main_nav;
    protected $_active_sub_nav;
    protected $_arr_langs;

    public function __construct($module, $controller)
    {
        $this->_module = $module;
        $this->_controller = $controller;
    }

    public function get_module_url($module = null)
    {
        $module = $module ? $module : $this->_module;
        return App::get_module_url($module);
    }

    public function get_module_dir()
    {
        return App::get_module_dir($this->_module);
    }

    public function get_controller_url($controller = null, $module = null)
    {
        $controller = $controller ? $controller : $this->_controller;
        $module = $module ? $module : $this->_module;
        return App::get_controller_url($module, $controller);
    }

    public function get_controller_dir()
    {
        return App::get_controller_url($this->_module, $this->_controller);
    }

    public function set_theme($theme)
    {
        $this->_theme = $theme;
        return $this;
    }

    public function set_active_main_nav($main_nav, $sub_nav = null)
    {
        $this->_active_main_nav = $main_nav;
        if ($sub_nav)
        {
            $this->set_active_sub_nav($sub_nav);
        }
        return $this;
    }

    public function set_active_sub_nav($sub_nav)
    {
        $this->_active_sub_nav = $sub_nav;
        return $this;
    }

    public function set_layout($layout)
    {
        $this->_layout = $layout;
        return $this;
    }

    public function set_sidebar($sidebar)
    {
        $this->_sidebar = $sidebar;
        return $this;
    }

    public function set_title($title)
    {
        $this->_title = $title;
        return $this;
    }

    public function set_heading($heading)
    {
        $this->_heading = $heading;
        return $this;
    }

    public function set_breadcrums($arr)
    {
        $this->_breadcrums = $arr;
        return $this;
    }

    public function get_theme_dir()
    {
        return App::get_themes_dir($this->_theme);
    }

    public function get_theme_url()
    {
        return App::get_themes_url($this->_theme);
    }

    public function render($name, $view_data = array())
    {
        $functions_file = $this->get_theme_dir() . 'functions.php';
        $layout_file = $this->get_theme_dir() . 'layouts' . DS . $this->_layout . '.php';
        $view_file = $this->get_module_dir() . 'views' . DS . $this->_controller . DS . $name . '.php';

        foreach ($view_data as $k => $v)
        {
            $$k = $v;
        }

        if (file_exists($functions_file))
        {
            require $functions_file;
        }
        ob_start();
        require $view_file;

        if ($this->_layout)
        {
            $this->_content = ob_get_clean();
            require $layout_file;
        }
        else
        {
            ob_flush();
        }
    }

    /**
     * @param type $name
     * @param type $value
     */
    function hidden($name, $value)
    {
        return "<input type=\"hidden\" name=\"$name\" id=\"$name\" value=\"$value\"/>";
    }

}
