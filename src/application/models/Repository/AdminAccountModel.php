<?php
defined('BASEPATH') or die('No direct script access allowed');

class AdminAccountModel extends BaseModel
{
    /**
     * Lấy dữ liệu về admin
     * @return SimpleXMLElement
     */
    function loadAdminAccount(){
        return simplexml_load_file(APPPATH.'temp/admin/all.xml','SimpleXMLElement',LIBXML_NOCDATA);
    }
}