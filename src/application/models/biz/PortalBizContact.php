<?php
class PortalBizContact extends PortalBizBase{
    /**
     * 
     * @param User $user
     */
    function getUserContacts($user){
        $portalContact = new PortalModelUserContact();
        $portalContact->fk_user = $user->id;
        return $portalContact->getMutilCondition(T_user_contact::date_created,'DESC');
    }
    /**
     * 
     * @param User $user
     * @param string $fullname
     * @param string $phone
     * @param string $state
     * @param string $city
     * @param string $address
     */
    function saveContact($user,$contactId,$fullname,$phone,$state,$city,$address){
        $portalModelContact = new PortalModelUserContact();
        if($contactId == null || isset($contactId) || $contactId == ''){
            $portalModelContact->full_name = $fullname;
            $portalModelContact->telephone = $phone;
            $portalModelContact->state_province = $state;
            $portalModelContact->city_district = $city;
            $portalModelContact->street_address = $address;
            $portalModelContact->fk_user = $user->id;
            $portalModelContact->date_created = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
            $id = $portalModelContact->insert();
            return true;
        }else{
            $portalModelContact->id = $contactId;
            $count = $portalModelContact->getOneById();
            if($count == 0){
                return false;
            }
            $portalModelContact->full_name = $fullname;
            $portalModelContact->telephone = $phone;
            $portalModelContact->state_province = $state;
            $portalModelContact->city_district = $city;
            $portalModelContact->street_address = $address;
            $portalModelContact->updateById();
            return true;
        }
    }
}