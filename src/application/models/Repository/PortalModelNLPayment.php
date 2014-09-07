<?php
class PortalModelNLPayment extends PortalModelBase
{
    protected $_constIntanceName = 'T_nl_payment';
    var $tableName ;
    var $deleted_at;
    var $delete;
    var $order_id;
    var $invoice_id;
    var $token_key;
    var $expiration_at;
    
}