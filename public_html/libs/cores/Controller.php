<?php

defined('DS') or die;

abstract class Controller
{

    /** @var \View */
    public $view;

    /** @var \Model */
    public $model;

    /** @var string tên controller */
    protected $_controller;

    /** module */
    protected $_module;

    public function __construct($module, $controller)
    {
        $this->_module = $module;
        $this->_controller = $controller;

        $this->_load_model();
        $this->_load_view();
    }

    protected function _load_model()
    {
        $model_class = $this->_controller . '_Model';
        $model_file = $this->_get_module_dir() . $model_class . '.php';
        if (file_exists($model_file))
        {
            require $model_file;
        }
        else
        {
            $model_class = 'Model';
        }
        $this->model = new $model_class();
    }

    protected function _load_view()
    {
        $local_view = $this->_module . '_View';
        if (class_exists($local_view))
        {
            $this->view = new $local_view($this->_module, $this->_controller);
        }
        else
        {
            $this->view = new View($this->_module, $this->_controller);
        }
    }

    protected function _get_module_dir()
    {
        return App::get_apps_dir() . $this->_module . DS;
    }

    /** action factory, khi khong co method */
    public function __call($name, $arguments)
    {
        if ($name == __FUNCTION__)
        {
            throw new InvalidArgumentException('Không gọi đệ quy');
        }
        $action_dir = $this->_get_module_dir() . 'actions' . DS . $this->_controller . DS;
        $action_class = $name . '_Action';
        $action_file = $action_dir . $action_class . '_Action.php';

        if (!file_exists($action_file))
        {
            return false;
        }
        $action = new $action_class($this->controller, $this->model, $this->view);
        call_user_func_array(array($action, 'run'), $arguments);
    }

    final function assets($filename)
    {
        $filepath = $this->_get_module_dir() . 'assets' . DS . $filename;
        if (!file_exists($filepath))
        {
            header('HTTP/1.0 404 Not Found');
            exit;
        }
        else
        {
            readfile($filepath);
        }
    }

}
