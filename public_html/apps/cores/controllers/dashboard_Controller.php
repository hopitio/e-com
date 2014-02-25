<?php

defined('DS') or die;

class dashboard_Controller extends cores_Controller
{

    function main()
    {
        $this->view->set_heading('<i class="fa fa-dashboard"></i> Trang chủ')
                ->set_active_main_nav('nav_dashboard')
                ->set_breadcrums(array(
                    'Trang chủ' => App::get_site_url()
                ))
                ->render('main');
    }

    function change_language($lang)
    {
        Cookie::set('lang', $lang, 24 * 365);
        $this->model->exec_retry();
    }

}
