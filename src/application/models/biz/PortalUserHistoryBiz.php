<?php

/**
 * Xử lý các liên quan đến việc xử lý history
 * @author ANLT
 * @since 20140402
 */
class PortalUserHistoryBiz extends PortalBaseBiz
{
    /**
     * Create new history id for user id.
     * @throws Lynx_BusinessLogicException
     */
    private function createNewIdViaUserInformation()
    {
        if(!isset(User::getCurrentUser()->last_active))
        {
            throw new Lynx_BusinessLogicException(__CLASS__.'::'.__METHOD__.' Thông tin user không đủ để thực hiện sinh id');
        }
        
    }
    
    /**
     * Create new user history
     */
    function createNewHistory($user = null,$actionName = null,
          $description = '',$subSystemNname = null,$secrectKey = null)
    {
       
        if($user == null){
            $user = User::getCurrentUser();
        }
        $session = get_instance()->session->all_userdata();
        $portalCommon = new PortalCommonModel();
        $listSubSystem = get_instance()->config->item('sub_system_name');
        if (!isset($listSubSystem[$subSystemNname]))
        {
            throw new Lynx_RequestException(
                __CLASS__ . ' ' . __FUNCTION__ .
                     ' Sub System không hỗ trợ trong hệ thống');
        }
        $historyModel = new PortalUserHistoryModel();
        $historyModel->id = $portalCommon->getUUID();
        $historyModel->action_name = $actionName == null? DatabaseFixedValue::USER_HISTORY_ACTION_NONE : $actionName;
        $historyModel->client_ip = $session['ip_address'];
        $historyModel->session_id = $session['session_id'];
        $historyModel->user_agrent =  $session['user_agent'];
        $historyModel->description = $description;
        $historyModel->fk_user = $user->id;
        $historyModel->last_activity = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
        $historyModel->sub_system_name = $subSystemNname == null ? $listSubSystem['default'] : $listSubSystem[$subSystemNname];
        $historyModel->secret_key = $secrectKey;
        $historyModel->insertNewHistory();
        return $historyModel->id;
    }
    
    /**
     * Get login history
     * @return PortalUserModel
     */
    function checkLoginHistory($secrectKey,$subSystem)
    {
        $historyModel = new PortalUserHistoryModel();
        $historyModel->sub_system_name = $subSystem;
        $historyModel->action_name = DatabaseFixedValue::USER_HISTORY_ACTION_LOGIN;
        $historyModel->action_name = $secrectKey;
        $queryStatus = $historyModel->getLastUserAction();
        $reEncry = SecurityManager::inital()->getEncrytion()->encrytSecretLogin($historyModel->fk_user, $historyModel->session_id);
        if($secrectKey != $secrectKey)
        {
            return false;
        }
        if($queryStatus){
            $portalUserModel = new PortalUserModel();
            $portalUserModel->id = $historyModel->fk_user;
            $portalUserModel->getUserByUserId();
            return $portalUserModel;
        }else{
            return false;
        }
    }
    
}