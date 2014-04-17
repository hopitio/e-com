<?php
/**
 * @author ANLT
 * @since 20140409
 */
class PoralOrderProductModel extends PortalBaseModel
{
    protected $_constIntanceName = 'T_order_product';
    var $id ;
    var $fk_order ;
    var $sub_key ;
    var $sub_id       ;
    var $product_name     ;
    var $product_image    ;
    var $short_description;
    var $price            ;
    var $quantity        ;
    var $total_price     ;
    var $actual_price ;
    
}