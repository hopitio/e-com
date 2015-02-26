<?php
class PortalModelUserContact extends PortalModelBase
{
    protected $_constIntanceName = 'T_user_contact';
    var $id;
    var $fk_user;
    var $date_created;
    var $full_name;
    var $telephone;
    var $street_address;
    var $city_district;
    var $state_province;
    var $email_contact;
    
    /**
     * 
     * @param array $shippingIds
     */
    function getContactByContactIds($contactIds)
    {
        return parent::getWhereIn(T_user_contact::id, $contactIds);
    }
    
    function searching($user_id,$full_name,$telephone,$street_address,$city_district,$state_province){
    	$sql = "SELECT * FROM t_user_contact 
                WHERE 
                fk_user = {$user_id} AND
                full_name LIKE '%{$full_name}%' AND 
                telephone LIKE '%{$telephone}%' AND 
                street_address LIKE '%{$street_address}%' AND 
                city_district LIKE '%{$city_district}%' AND 
                state_province LIKE '%{$state_province}%'";
        $query = $this->_dbPortal->query($sql);
        return $query->result();
    }
}