<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once 'lynx_exceptions.php';
require_once 'lynx_masters.php';
require_once APPPATH . 'libraries/multiLanguage/multiLanguage.inc';
require_once APPPATH . 'libraries/url/url.inc';
require_once APPPATH . 'libraries/mail/mail.inc';
require_once APPPATH . 'libraries/security/security.inc';
require_once APPPATH . 'libraries/Database.inc';
require_once APPPATH . 'controllers/ControllerBase.php';
require_once APPPATH . 'models/biz.inc';
require_once APPPATH . 'models/modelsLayer.inc';

/**
 * MY_Controller
 * Base Controller
 * @author anlt
 */
class MY_Controller extends CI_Controller
{

    static $not_authorized_error = array(
        'error' => true,
        'status_code' => 'not_authorized',
        'status_message' => 'LỖI XÁC MINH',
    );
    protected $_languageResource;
    protected $obj_user;
    protected $obj_setting;
    public $lynx_today; // Y-m-d
    public $lynx_tomorrow; // Y-m-d
    public $today; // Y-m-d
    public $tomorrow; //Y-m-d
    public $now; // UNIX(int)
    public $today_dow;
    public $tomorrow_dow;
    public $lynx_today_dow;
    public $lynx_tomorrow_dow;
    protected $authorization_required = false;

    /** Ten controller hien tai */
    protected $_controller;

    /**
     * __construct
     *
     * @return	string
     */
    public function __construct()
    {
        parent::__construct();
        $this->_controller = get_class($this);
    }

    /**
     * _remap
     *
     * @return void
     */
    //see http://codeigniter.jp/user_guide_ja/general/controllers.html; _remap() wrapper method
    //see http://www.asahi-net.or.jp/~ax2s-kmtn/ref/status.html; HTTP response code
    public function _remap($method, $ar_arg = array())
    {
        $is_ajax_request = self::is_ajax_request();
        $_xhr = $this->input->get('_xhr'); //backdoor to simulate XHR.
        if ($_xhr)
        {
            $is_ajax_request = true;
        }
        try
        {
            $this->config->load('paymentConfig');
            $this->config->load('maintenance');
            if ($this->config->item('under_maintenance'))
                throw new Lynx_MaintenanceException('BẢO TRÌ HỆ THỐNG');
            $this->init();
            if (preg_match('/_xhr$/', $method) && !$is_ajax_request)
            {
                throw new Lynx_RoutingException();
            }
            call_user_func_array(array($this, $method), $ar_arg);
        }
        catch (Lynx_ViewException $e)
        {
            log_message('infor', $e);
            $this->output->set_status_header($e->status_code);
            if ($is_ajax_request)
            {
                $this->output->set_content_type('application/json')->set_output(json_encode($e->to_hash()));
            }
            else
            {
                $this->load->view('errors/maintenance', array('e' => $e));
            }
        }
        catch (Lynx_RoutingException $e)
        {
            log_message('info', $e);
            $this->output->set_status_header($e->status_code);
            if ($is_ajax_request)
            {
                $this->output->set_content_type('application/json')->set_output(json_encode($e->to_hash()));
            }
            else
            {
                $this->load->view('errors/common_with_details', array('e' => $e));
            }
        }
        catch (Lynx_MaintenanceException $e)
        {
            log_message('info', $e);
            $this->output->set_status_header($e->status_code);
            if ($is_ajax_request)
            {
                $this->output->set_content_type('application/json')->set_output(json_encode($e->to_hash()));
            }
            else
            {
                $this->load->view('errors/maintenance', array('e' => $e));
            }
        }
        catch (Lynx_AuthenticationException $e)
        {
            log_message('info', $e);
            if ($is_ajax_request)
            {
                $this->output->set_status_header($e->status_code);
                $this->output->set_content_type('application/json')->set_output(json_encode($e->to_hash()));
            }
            else
            {
                $login_url = $this->platform_login_url_with_params();
                redirect($login_url);
                exit();
            }
        }
        catch (Lynx_BusinessLogicException $e)
        {
            log_message('error', $e);
            $this->output->set_status_header($e->status_code);
            if ($is_ajax_request)
            {
                $this->output->set_content_type('application/json')->set_output(json_encode($e->to_hash()));
            }
            else
            {
                $this->load->view('errors/common', array('e' => $e));
            }
        }
        catch (Lynx_ErrorException $e)
        {
            log_message('error', $e);
            $this->output->set_status_header($e->status_code);
            if ($is_ajax_request)
            {
                $this->output->set_content_type('application/json')->set_output(json_encode($e->to_hash()));
            }
            else
            {
                $this->load->view('errors/common', array('e' => $e));
            }
        }
        catch (Lynx_ModelMiscException $e)
        {
            $status_code = isset($e->status_code) ? $e->status_code : '500';
            if ($is_ajax_request)
            {
                $this->output->set_status_header($status_code)->set_content_type('application/json')->set_output(json_encode($e->to_hash()));
            }
            else
            {
                $this->output->set_status_header($status_code);
                $this->load->view('errors/common', array('e' => $e));
            }
        }
        catch (Exception $e)
        {
            log_message('error', $e);
            $status_code = isset($e->status_code) ? $e->status_code : '500';
            if ($is_ajax_request)
            {
                $this->output->set_status_header($status_code)->set_content_type('application/json')->set_output(json_encode($e->to_hash()));
            }
            else
            {
                $this->output->set_status_header($status_code);
                $this->load->view('errors/common', array('e' => $e));
            }
        }
        return;
    }

    /**
     * init
     * @return void
     */
    protected function init()
    {

        //Khởi tạo trình quản lý ngôn ngữ.
        $resourcePath = APPPATH . $this->config->item('languagePath');
        $languageProviders = new DefaultLanguageProviders($resourcePath);
        $loadLanguage = new DefaultLoadLanguage();
        MultilLanguageManager::initial($loadLanguage, $languageProviders);
        MultilLanguageManager::getInstance()->loadResource();


        $this->load->helper('form');
        //TODO: Check quyền truy cập
        $this->authorization_required = $this->authorization_required;

        //Set setting hệ thống
        $this->set_obj_user_to_me();
        $this->set_datetimes_to_me();

        // authorization
        if ($this->authorization_required)
        {
            if (!$this->obj_user->is_authorized)
            {
                throw new Lynx_AuthenticationException('Không có quyền truy cập');
            }
        }
    }

    /**
     * is_ajax_request
     * XHR
     *
     * @return boolean
     */
    static function is_ajax_request()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        {
            return true;
        }
        return false;
    }

    /**
     * platform_login_url_with_params
     *
     * @return boolean
     */
    public function platform_login_url_with_params()
    {
        $dst = uri_string();
        //HOTFIX for phase 1, portal vs sub in one application
        if(strpos($dst,'portal/') !== FALSE)
        {
            return str_replace('{cp}',urlencode(base_url($dst)),$this->config->item('portal_login_url'));
        }
        return user::getCurrentUser()->getLoginAuthenUrl();
    }

    /**
     * my_url
     *
     * @return  URL
     */
    static function my_url()
    {
        if (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on')
        {
            $protocol = 'https://';
        }
        else
        {
            $protocol = 'http://';
        }
        return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    }

    public function show($template_key)
    {
        $this->load->view(strtolower(get_class($this)) . '/' . $template_key, array('obj_user' => $this->obj_user, 'obj_setting' => $this->obj_setting));
    }

    /**
     * set_obj_user_to_me
     * $this->obj_user
     *
     * @return	void
     */
    protected function set_obj_user_to_me($objUser = null)
    {
        $objUser = $objUser == null ? User::getCurrentUser() : $objUser;
        $this->obj_user = $objUser;
        $this->session->set_userdata(USER_SESSION, $objUser);
        return;
    }

    protected function remove_obj_user_to_me()
    {
        $this->session->unset_userdata(USER_SESSION);
        return;
    }

    /**
     * set_today_to_me
     * datetime
     *
     * @return void
     */
    const lynx_date_difference = -4;

    protected function set_datetimes_to_me()
    {

        $this->now = time();
        $lynx_now = $this->now + (60 * 60 * self::lynx_date_difference);

        $lynx_today = $this->session->userdata('lynx_today');
        $lynx_today = !empty($lynx_today) ? $lynx_today : date('Y-m-d', $lynx_now);
        $this->lynx_today = $lynx_today;
        $this->lynx_today_dow = date('w', strtotime($lynx_today));

        $this->today = date('Y-m-d', $this->now);
        $this->today_dow = date('w', $this->now);
        $this->tomorrow = date('Y-m-d', $this->now + 86400 + 10);
        $this->tomorrow_dow = ($this->today_dow % 6) + 1;
        $this->lynx_tomorrow = date('Y-m-d', strtotime($lynx_today) + 86400 + 10);
        $this->lynx_tomorrow_dow = date('w', strtotime($lynx_today) + 86400 + 10);

        return;
    }

}
