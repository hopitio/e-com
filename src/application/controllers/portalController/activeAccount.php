<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');
class activeAccount extends BasePortalController
{

    protected $authorization_required = FALSE;
    
    /**
     * show information page
     */
    function showPage(){
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->render('portalaccount/account');
    }
    
    
    function active(){
        $key = $this->getQueryStringParams();
        $key = $key['k'];
        if(!isset($key) || $key == null || $key == '')
        {
            throw new Lynx_RoutingException(__CLASS__.'::'.__METHOD__.' querystring active not found');
            return;
        }
        
        $accountBiz = new PortalBizAccount();
        $activeStatus =  $accountBiz->activeUserByRequest($key);
        
        //er_actived|er_active_error|actived
        switch($activeStatus){
            case 'actived':
                break;
            case 'er_active_error':
                break;
        }
        
        $data= array(
            'activeStatus' => $activeStatus,
        );
        
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)->setData($data)->render('portalaccount/active');
    }
}