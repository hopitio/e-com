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
}