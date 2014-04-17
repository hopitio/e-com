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
        if (! isset($data['user']) || ! isset($data['secretKey']) || !isset($data['targetPage']))
        {
            throw new Lynx_RequestException('request login thiếu tham số');
        }
        $portalData = $data['user'];
        $redirectURL = $data['targetPage'];
        $dataDecode = json_decode($portalData);
        $this->obj_user = new User();
        $this->obj_user->account = $dataDecode->account;
        $this->obj_user->date_joined = $dataDecode->date_joined;
        $this->obj_user->DOB = $dataDecode->DOB;
        $this->obj_user->firstname = $dataDecode->firstname;
        $this->obj_user->languageKey =$dataDecode->languageKey;
        $this->obj_user->last_active =$dataDecode->last_active;
        $this->obj_user->lastname =$dataDecode->lastname;
        $this->obj_user->platform_key =$dataDecode->platform_key;
        $this->obj_user->sex = $dataDecode->sex;
        $this->obj_user->status = $dataDecode->status;
        $this->obj_user->secretKey = $data['secretKey'];
        $this->obj_user->is_authorized = true;
        $this->set_obj_user_to_me($this->obj_user);
        redirect($redirectURL);
    }
}