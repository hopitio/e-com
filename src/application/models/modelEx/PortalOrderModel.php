<?php
/**
 * @author ANLT
 * @since 20140409
 */
class PortalOrderModel extends PortalBaseModel
{
    protected $_constIntanceName = 'T_order';
    var $id;
    var $fk_customer;
    var $email_status;
    var $fk_order_status_history;
    var $comment;
    var $bonus;
    function insertNewOrder(){
       return parent::insert();
    }
}