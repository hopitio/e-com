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
    var $orginal_price ;
    var $price ;
    var $quantity ;
    var $fk_product ;
    
}