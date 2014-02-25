<?php

defined('DS') or die;

class cores_View extends View
{

    protected $_arr_admin_nav = array();
    protected $_active_admin_nav = null;

    function __construct($module, $controller)
    {
        parent::__construct($module, $controller);
        $this->_arr_main_nav = array(
            new Nav_item('nav_dashboard'
                    , '<i class="fa fa-dashboard"></i> ' . ucfirst(__('dashboard'))
                    , $this->get_controller_url('dashboard'))
        );
        $this->_arr_admin_nav = array(
            new Nav_item('nav_user', 'Quản trị tài khoản', $this->get_controller_url('user')),
            null,
            new Nav_item('nav_list', 'Quản trị danh mục', $this->get_controller_url('list'))
        );
        $this->_arr_langs = array(
            array('id' => 'en_us', 'flag' => 'us', 'title' => 'English US'),
            array('id' => 'kr_kr', 'flag' => 'kr', 'title' => '한국어'),
            array('id' => 'vi_vn', 'flag' => 'vn', 'title' => 'Tiếng Việt')
        );
    }

    function set_active_admin_nav($nav)
    {
        $this->_active_admin_nav = $nav;
        return $this;
    }

}
