<?php
require_once APPPATH.'controllers/portalController/password.php';
/**
 * Chuyên trách xử lý các hoạt động post hoặc get liên quan đến account trong trường hợp không cần login
 * @author ANLT 
 * @since 20140403
 */
if (! defined('BASEPATH')) exit('No direct script access allowed');

class passwordUnauthen extends BasePortalController
{
    protected $authorization_required = FALSE;

    function resetPassword()
    {
        $data = $this->getQueryStringParams();
        if(!isset($data['k'])){
            throw new Lynx_RequestException('Request hệ thông khác so với yêu cầu vui lòng liên hệ admin.');
        }
        $passwordBiz = new PortalBizPassword();
        $result = $passwordBiz->resetPassword($this->obj_user, $data['k']);
        $viewdata = array();
        if(!$result){
            $viewdata['error'] = "Bạn không thể reset mật khẩu do không đảm bảo thông tin bảo mât";
        }else {
            $viewdata['msg'] ="Bạn đã reset mật khẩu thành công vui lòng kiểm tra mail để lấy mật khẩu";
        }
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData($viewdata)->render('portalaccount/resetPassword');
    }
}