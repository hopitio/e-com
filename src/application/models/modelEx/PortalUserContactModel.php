<?php
class PortalUserContactModel extends PortalBaseModel{
    protected $_constIntanceName = 'T_user_contact';
    var $id, $fk_user, $date_created, $date_used, $count_used, $prefix, $firstname, $middlename, $lastname, $suffix, $company, $street_address, $city, $country, $state_province, $zip_postal_code, $telephone, $fax, $vat_number;
    function insertNewContact(){
        return parent::insert();
    }
}