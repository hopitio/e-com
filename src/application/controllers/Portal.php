<?php

class Portal  extends MY_Controller{
    
    /**
     * Portal Callback
     */
    public function PortalAuthen(){
        $data = $this->input->post();
        if (! isset($data['data']) || ! isset($data['redirect']))
        {
            throw new Lynx_RequestException('request login thiếu tham số');
        }
        
        $portalData = $data['data'];
        $redirectURL = $data['redirect'];
        $this->obj_user = json_decode($portalData);
        $this->set_obj_user_to_me();
        redirect($redirectURL);
    }
}