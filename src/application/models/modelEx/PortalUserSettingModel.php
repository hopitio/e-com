<?php
/**
 * Xử lý các database mapping và access từ tầng này
 * @author ANLT
 * @since 20140327
 */
class PortalUserSettingModel extends PortalBaseModel
{
    public $id;
    public $fk_user;
    public $setting_key;
    public $value;
    
    public function insertUserSetting(){
        
    }
    
    /**
     * portal array setting
     * @param Array $arrayPortalUserSetting
     */
    public function insertBatch($arrayPortalUserSetting){
        $data = array();
        foreach ($arrayPortalUserSetting as $userSetting)
        {
          array_push($data, array(
            T_user_setting::fk_user => $userSetting->fk_user,
            T_user_setting::setting_key => $userSetting->setting_key,
            T_user_setting::value => $userSetting->value
          ));
        }
        return $this->_dbPortal->insert_batch(T_user_setting::tableName,$data);
    }
    
    /**
     * Update one user setting
     */
    public function update(){
        $data = array(
            T_user_setting::fk_user => $this->fk_user,
            T_user_setting::setting_key => $this->setting_key,
            T_user_setting::value => $this->value,
        );
        $this->_dbPortal->where(T_user_setting::id,$this->id);
        return $this->_dbPortal->update(T_user_setting::tableName,$data);
    }
    
    /**
     * Lấy 1 dữ liệu setting của user;
     * @param string $userid
     * @param string $settingKey
     */
    public function selectOneSettingOfUser($userId,$settingKey)
    {
        $query = $this->_dbPortal->select(T_user_setting::fk_user,array(
            T_user_setting::fk_user=>$userId,
            T_user_setting::setting_key=>$settingKey
        ),1,1);
        return $query->getResult();
    }
}