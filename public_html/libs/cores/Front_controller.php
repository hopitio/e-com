<?php

defined('DS') or die;

class Front_controller
{

    const DEFAULT_MODULE = 'ecom';
    const DEFAULT_CONTROLLER = 'default';
    const DEFAULT_ACTION = 'main';

    /** @var \Front_controller */
    static protected $_instance;

    /**
     * Bien URL thanh cac phan nho
     * @param string $url
     * @return array module, controller, action, params
     */
    static function parse_url($url)
    {
        $url = trim($url, "/\\ ");
        @list($module, $controller, $action, $params) = explode("/", $url, 4);
        return array(
            'module' => $module,
            'controller' => $controller,
            'action' => $action,
            'params' => $params ? explode('/', $params) : array()
        );
    }

    /**
     * @return \Front_controller
     */
    public static function get_instance($url)
    {
        if (!static::$_instance)
        {
            static::$_instance = new static;
        }
        $parts = static::parse_url($url);
        static::$_instance->set_module($parts['module']);
        static::$_instance->set_controller($parts['controller']);
        static::$_instance->set_action($parts['action']);
        static::$_instance->set_params($parts['params']);
        return static::$_instance;
    }

    function __construct()
    {
        
    }

    protected $_module;
    protected $_controller;
    protected $_action;
    protected $_params = array();
    protected $_error_triggered = false;

    function set_module($module)
    {
        $this->_module = $module ? $module : static::DEFAULT_MODULE;
        return $this;
    }

    function set_controller($controller)
    {
        $this->_controller = $controller ? $controller : static::DEFAULT_CONTROLLER;
        return $this;
    }

    function set_action($action)
    {
        $this->_action = $action ? $action : static::DEFAULT_ACTION;
        return $this;
    }

    function set_params($arr)
    {
        $this->_params = $arr ? $arr : array();
        return $this;
    }

    function run()
    {
        $function_file = App::get_module_dir($this->_module) . 'functions.php';
        if (file_exists($function_file))
        {
            require $function_file;
        }
        $controller = $this->_make_controller();
        $success = call_user_func_array(array($controller, $this->_action), $this->_params);
        if ($success === false)
        {
            $this->_error($this->_module, $this->_controller, $this->_action);
        }
    }

    /** Ten module */
    function get_module()
    {
        return $this->_module;
    }

    /**
     * 
     * @return \Controller
     */
    protected function _make_controller()
    {
        $module_dir = App::get_apps_dir() . $this->_module . DS;
        $controller_class = strtolower($this->_controller) . '_Controller';
        $controller_file = $module_dir . 'controllers' . DS . $controller_class . '.php';
        if (!is_dir($module_dir))
        {
            $this->_error($this->_module);
        }
        if (!file_exists($controller_file))
        {
            $this->_error($this->_module, $this->_controller);
        }
        require_once $controller_file;
        if (!class_exists($controller_class))
        {
            $this->_error($this->_module, $this->_controller);
        }
        return new $controller_class($this->_module, $this->_controller);
    }

    protected function _error()
    {
        if ($this->_error_triggered == false) //tranh goi de quy
        {
            $this->_error_triggered = true;
            $args = func_get_args();
            $this->set_module('cores')
                    ->set_controller('error')
                    ->set_action(static::DEFAULT_ACTION)
                    ->set_params($args)
                    ->run();
            exit;
        }
        else
        {
            die('Khong du module co ban');
        }
    }

}
