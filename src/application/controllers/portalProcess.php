<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class portalProcess extends BaseController
{

    protected $authorization_required = FALSE;

    /**
     * Portal Callback
     */
    public function portalAuthen()
    {
        $data = $this->input->post();
        if (! isset($data['data']) || ! isset($data['redirect']))
        {
            throw new Lynx_RequestException('request login thiếu tham số');
        }
        
        $portalData = $data['data'];
        $redirectURL = $data['redirect'];
        $this->remove_obj_user_to_me();
        $this->obj_user->data = json_decode($portalData);
        $this->obj_user->is_authorized = true;
        log_message('DEBUG','User Login Portal'.var_export($this->obj_user,true));
        $this->set_obj_user_to_me($this->obj_user);
        redirect($redirectURL);
    }
}