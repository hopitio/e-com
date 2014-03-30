<?php

defined('BASEPATH') or die('No direct script access allowed');

class UserAddressDomain implements DomainInterface
{

    /** Địa chỉ để chuyển hàng */
    const TYPE_SHIPPING = 'shipping';

    /** Địa chỉ để thanh toán */
    const TYPE_INVOICE = 'invoice';

    public $id;
    public $fkUser;
    public $dateCreated;
    public $dateUsed;
    public $countUsed;
    public $fullname;
    public $company;
    public $streetAddress;
    public $city;
    public $country;
    public $fkStateProvince;
    public $zipPostalCode;
    public $telephone;
    public $fax;
    public $vatNumber;
    public $type;
    public $status;

}
