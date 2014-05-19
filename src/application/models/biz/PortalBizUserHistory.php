<?php

/**
 * Xử lý các liên quan đến việc xử lý history
 * @author ANLT
 * @since 20140402
 */
class PortalBizUserHistory extends PortalBizBase
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
        $portalCommon = new PortalModelCommon();
        $listSubSystem = get_instance()->config->item('sub_system_name');
        $subSystemNname = $subSystemNname == null ? 'default' : $subSystemNname;
        
        if (!isset($listSubSystem[$subSystemNname]))
        {
            throw new Lynx_RequestException(
                __CLASS__ . ' ' . __FUNCTION__ .
                     ' Sub System không hỗ trợ trong hệ thống');
        }
        $historyModel = new PortalModelUserHistory();
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
        $historyModel = new PortalModelUserHistory();
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
            $portalUserModel = new PortalModelUser();
            $portalUserModel->id = $historyModel->fk_user;
            $portalUserModel->getUserByUserId();
            return $portalUserModel;
        }else{
            return false;
        }
    }
    
    /**
     * lấy số lần đăng nhập cuối cùng 
     * @param User $user
     */
    function getLastLoginTime($userId,$countTime)
    {
        $portalHistoryModel = new PortalModelUserHistory();
        $portalHistoryModel->fk_user =  $userId;
        $portalHistoryModel->action_name = DatabaseFixedValue::USER_HISTORY_ACTION_LOGIN;
        $model = $portalHistoryModel->getMutilCondition(T_user_history::last_activity,'DESC',$countTime,0);
        return $model;
    }
    
    function getUserHistory($userId,$startDate,$endDate,$limit = 1000,$offset = 0){
        $portalModelHistory = new PortalModelUserHistory();
        return $portalModelHistory->getUserHistory($userId,$startDate, $endDate, $limit, $offset);
    }
    
    function getUserHistoryCount($userId,$startDate,$endDate){
        $portalModelHistory = new PortalModelUserHistory();
        return $portalModelHistory->getUserHistoryCount($userId,$startDate, $endDate);
    }
    
    
    
}