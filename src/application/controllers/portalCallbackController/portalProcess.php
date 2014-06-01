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
        if (! isset($data['user']) || !isset($data['targetPage']))
        {
            throw new Lynx_RequestException('request login thiếu tham số');
        }
        $portalData = $data['user'];
        $redirectURL = $data['targetPage'];
        $dataDecode = json_decode($portalData);
        
        $bizUser = new BizUser();
        $this->obj_user = $bizUser->processLoginFromPortal($dataDecode);
        
        $this->set_obj_user_to_me($this->obj_user);
        
        redirect($redirectURL);
    }
}