<?php
/**
 * Cung cấp hàm mapping với database
 * @author ANLT
 *
 */
class PortalOrderShippingModel extends PortalBaseModel{
    protected $_constIntanceName = 'T_order_shipping';
    var $id,$fk_order,$sub_key,$sub_id,$shipping_display_name,$shipping_price;
    function insertNewShipping(){
        return parent::insert();
    }
}