<?php

defined("DS") or die;

abstract class Action
{

    protected $controller;
    protected $model;
    protected $view;

    public function __construct($controller, $model, $view)
    {
        $this->controller = $controller;
        $this->model = $model;
        $this->view = $view;
    }

    /**
     * Must be overrided
     */
    function run()
    {
        trigger_error('Must be ovverided', E_USER_ERROR);
    }

}
