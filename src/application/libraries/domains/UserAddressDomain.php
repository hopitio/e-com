<?php

defined('BASEPATH') or die('No direct script access allowed');

class UserAddressDomain implements DomainInterface
{
    /** Địa chỉ để chuyển hàng */

    const TYPE_SHIPPING = 'shipping';

    /** Địa chỉ để thanh toán */
    const TYPE_BILLING = 'billing';

    public $fullname;
    public $streetAddress;
    public $fkCityDistrict;
    public $country;
    public $fkStateProvince;
    public $zipPostalCode;
    public $telephone;
    public $fax;
    public $vatNumber;
    public $type;
    public $status;

    function get_data_to_send()
    {
        return array(
            
        );
    }

}
