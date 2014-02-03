<?php

defined('DS') or die;
require_once App::get_libs_dir() . 'domains' . DS . 'ou_Domain.php';
require_once App::get_libs_dir() . 'domains' . DS . 'group_Domain.php';
require_once App::get_libs_dir() . 'domains' . DS . 'user_Domain.php';

class user_Controller extends cores_Controller
{

    function main()
    {
        //qry ou
        ou_Domain::reset_query();
        ou_Domain::get_query()->where("C_CODE <> 'root'");
        $data['arr_all_ou'] = ou_Domain::qry_all('PK_OU, C_NAME, C_INTERNAL_ORDER');
        $data['root_ou'] = new ou_Domain('root');

        $this->view->set_sidebar(null)
                ->set_title('Quản trị tài khoản')
                ->set_heading('<i class="fa fa-user"></i> Quản trị tài khoản')
                ->set_active_admin_nav('nav_user')
                ->render('main', $data);
    }

    function svc_all_ou_children()
    {
        $this->model->db->debug = Config::DEBUG_MODE < 10 ? 0 : 1;
        header('Content-Type: application/json');

        $v_ou_id = get_reqest_var('ou_id');
        //query group
        group_Domain::reset_query();
        group_Domain::filter_ou($v_ou_id);
        $data['arr_all_group'] = group_Domain::qry_all();
        $data['v_count_group'] = group_Domain::count_all();

        $this->view->set_layout(null)->render('svc_all_ou_children', $data);
    }

    function dsp_single_group($ou_id, $group_id = 0)
    {
        $data['group'] = new group_Domain($group_id);
        $data['current_ou'] = new ou_Domain($ou_id);

        ou_Domain::reset_query();
        $data['arr_all_ou'] = ou_Domain::qry_all();

        $this->view->set_layout(null)->render('dsp_single_group', $data);
    }

    function update_group()
    {
        $v_group_id = get_post_var('hdn_group_id');
        $arr_data = array(
            'C_NAME' => get_post_var('txt_name'),
            'C_CODE_NAME' => get_post_var('txt_code_name'),
            'C_STATUS' => get_post_var('chk_status') ? 1 : 0
        );
        if ($v_group_id)
        {
            $this->model->update('t_cores_group', $arr_data, 'PK_GROUP=?', array($v_group_id));
        }
        else
        {
            $v_group_id = $this->model->insert('t_cores_group', $arr_data, 'PK_GROUP');
        }
        $this->model->exec_notify(Model::NOTIFY_TYPE_SUCCESS, get_post_var('hdn_goback'), 'Cập nhật nhóm thành công');
    }

    function dsp_single_ou($ou_id = 0)
    {
        $data['ou'] = new ou_Domain($ou_id);
        ou_Domain::reset_query();
        $data['arr_all_ou'] = ou_Domain::qry_all();
        $this->view->set_layout(null)->render(__FUNCTION__, $data);
    }

}
