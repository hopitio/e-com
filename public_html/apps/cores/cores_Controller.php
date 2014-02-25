<?php

defined('DS') or die;
require_once App::get_libs_dir() . 'helpers' . DS . 'Data_Table.php';

class cores_Controller extends Controller
{

    /**
     *
     * @var \cores_View
     */
    public $view;

    protected function _require_login()
    {
        $url = htmlentities(isset($_GET['url']) ? $_GET['url'] : null);
        if (Session::get_current_user() == null)
        {
            $sep = get_sep($this->view->get_controller_url('account/login'));
            $this->model->exec_done($this->view->get_controller_url('account/login') . $sep . 'goback=' . $url);
        }
    }

}
