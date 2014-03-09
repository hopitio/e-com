<?php

class View
{

    protected $_root_title = 'Project-e';
    protected $_title;
    protected $_breadcrums = array();
    protected $_layout = null;
    protected $_view_path;
    protected $_theme_path;
    protected $_content;

    public function set_title($title)
    {
        $this->_title = $title;
        return $this;
    }

    public function set_breadcrums($breadcrums)
    {
        $this->_breadcrums = $breadcrums;
        return $this;
    }

    public function set_layout($layout)
    {
        $this->_layout = $layout;
        return $this;
    }

    public function set_view_path($path)
    {
        $this->_view_path = $path;
        return $this;
    }

    public function set_theme_path($path)
    {
        $this->_theme_path = $path;
        return $this;
    }

    public function render($name, $view_data = array())
    {
        $layout_file = $this->_theme_path . 'layouts' . DS . $this->_layout . '.layout.php';
        $view_file = $this->_view_path . $name . '.php';

        if ($this->_layout && !file_exists($layout_file))
        {
            throw new Exception("Layout <b>{$this->_layout}</b> not exists");
        }
        if (!file_exists($view_file))
        {
            throw new Exception("View <b>{$name}</b> not exists");
        }

        foreach ($view_data as $k => $v)
        {
            $$k = $v;
        }

        if ($this->_layout)
        {
            ob_start();
            require $view_file;
            $this->_content = ob_get_clean();
            require $layout_file;
        }
        else
        {
            require $view_file;
        }
    }

}
