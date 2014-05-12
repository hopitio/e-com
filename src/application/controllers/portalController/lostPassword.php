<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class lostPassword extends BaseController
{
    protected $authorization_required = FALSE;
    protected  $_css = array(
        '/style/lostPassword.css'
    );
    protected $_data = array(
        
    );
    function showPage(){
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setCss($this->_css)->render('portalaccount/lostPassword');
    }
    
    function reset(){
        $email = $this->input->post();
        $biz = new PortalBizPassword();
        $isComplete = $biz->verifyAndResetPasswordEmail($email['email']);
        IF($isComplete){
            $this->_data['msg'] = "<p>Reset Mật khẩu thành công, bạn hãy kiểm tra mail để biết thêm thông tin. </p>";
        }else{
            $this->_data['msg'] = "<p style='color:red'>Email bạn vừa nhập chưa chính xác.</p>";
        }
        
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData($this->_data)->setCss($this->_css)->render('portalaccount/lostPassword');
    }
}