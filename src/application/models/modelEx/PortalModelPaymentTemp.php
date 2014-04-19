<?php
class PortalModelPaymentTemp extends PortalModelBase
{
    var $_constIntanceName = 'T_payment_temp';
    var $id;
    var $fk_user;
    var $created_date;
    var $data;
    var $session_id;
    var $ip_address;
    var $user_agrent;
    var $processed_date;
    var $cancelled_date;
}