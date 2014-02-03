<?php

defined('DS') or die;

class account_Controller extends cores_Controller
{

    function login()
    {
        $this->view
                ->set_title('Đăng nhập hệ thống')
                ->set_layout(null)
                ->render('login');
    }

    function do_login()
    {
        $v_account = get_post_var('txt_account');
        $v_password = get_post_var('txt_password');

        if (!$v_account OR !$v_password)
        {
            $this->model->exec_retry('');
        }
    }

}
