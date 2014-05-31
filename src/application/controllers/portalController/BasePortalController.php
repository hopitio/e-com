<?php
class BasePortalController extends BaseController{
    
    protected $is_portal_controller = true;
    function init(){
        parent::init();
    }
}