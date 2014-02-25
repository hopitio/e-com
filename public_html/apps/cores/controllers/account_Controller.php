<?php

defined('DS') or die;
require_once App::get_libs_dir() . 'domains' . DS . 'user_Domain.php';

class account_Controller extends cores_Controller
{

    function login()
    {
        $this->view
                ->set_title('Đăng nhập hệ thống')
                ->set_layout(null)
                ->render('login', array('goback' => get_request_var('goback')));
    }

    function do_login()
    {
        $v_account = get_post_var('txt_account');
        $v_password = get_post_var('txt_password');
        $v_goback = get_post_var('hdn_goback');

        if (!$v_account OR !$v_password)
        {
            $this->model->exec_retry('1');
        }
        //Auth
        $user = new user_Domain($v_account);
        if ($user->id == null)
        {
            $this->model->exec_retry('2');
        }
        if ($user->status == 0)
        {
            $this->model->exec_retry('3');
        }
        if ($this->_encode_password($v_password) != $user->password)
        {
            $this->model->exec_retry('4');
        }
        //done
        Session::destroy();
        Session::init();
        Session::set_current_user($user);
        if ($v_goback == null)
        {
            $this->model->exec_done($this->view->get_module_url());
        }
        else
        {
            $this->model->exec_done(App::get_site_url() . html_entity_decode($v_goback));
        }
    }

    function dsp_change_password()
    {
        $this->view
                ->set_title(ucfirst(__('change_password')))
                ->set_heading(ucfirst(__('change_password')))
                ->render('dsp_change_password');
    }

    function update_password()
    {
        $this->_require_login();
        $user = Session::get_current_user();
        $v_current_password = get_post_var('txt_current_password');
        $v_new_password = get_post_var('txt_new_password');
        $v_retype_password = get_post_var('txt_retype_password');
        //validate
        if (!$v_current_password OR !$v_new_password OR !$v_retype_password)
        {
            $this->model->exec_retry(ucfirst(__('validate_server_required')));
        }
        if ($this->_encode_password($v_current_password) != $user->password)
        {
            $this->model->exec_retry(ucfirst(__('wrong_password')));
        }
        if ($v_new_password != $v_retype_password)
        {
            $this->model->exec_retry(ucfirst(__('validate_match_password')));
        }
        //update
        $affected_rows = Model::update('t_cores_user', array('C_PASSWORD' => $this->_encode_password($v_new_password)), 'PK_USER=?', array($user->id));
        $this->view
                ->set_title(ucfirst(__('change_password')))
                ->set_heading(ucfirst(__('change_password')))
                ->render('update_password', array('success' => (bool) $affected_rows));
    }

    protected function _encode_password($str)
    {
        return md5(Config::HASH_KEY . $str);
    }

}
