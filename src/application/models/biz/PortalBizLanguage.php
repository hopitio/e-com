<?php

/**
 * Xử lý các liên quan đến việc xử login
 * @author ANLT
 * @since 20140429
 */
class PortalBizLanguage extends PortalBizBase
{
    /**
     * Cập nhật dữ liệu trong database
     * @param User $user
     * @param string $languageKey
     */
    function changeLanguage($user,$languageKey)
    {
        $portalModelUserSetting = new PortalModelUserSetting();
        $portalModelUserSetting->setting_key = DatabaseFixedValue::LANGUAGE_SETTINGKEY;
        $portalModelUserSetting->fk_user = $user->id; 
        $settings = $portalModelUserSetting->getMutilCondition();
        foreach ($settings as $setting){
            $setting->value = $languageKey;
            $setting->updateById();
        }
        return true;
    }
    
}