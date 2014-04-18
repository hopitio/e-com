<?php
/**
 * @author ANLT
 * @since 20140409
 */
class PortalOrderProductModel extends PortalBaseModel
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
    /**
     * 
     * @param array $orderProducts
     */
    function  insertBacthOrdeProduct($orderProducts)
    {
        $portalCommon = new PortalCommonModel();
        foreach ($orderProducts as &$product){
            $product->id = $portalCommon->getUUID();
        }
        return parent::bacthInsert($orderProducts);
    }
}