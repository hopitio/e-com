<?php
class PortalModelInvoiceProduct extends PortalModelBase
{
    var $_constIntanceName = 'T_invoice_product';
    var $id;
    var $fk_invoice;
    var $fk_product;
    var $product_price;
    var $product_quantity;
    
    function inserts($collection)
    {
        return parent::bacthInsert($collection);
    }
    
    function getProductionByProductsId($products){
        $values = array();
        foreach ($products as $product){
            array_push($values, $product->id);
        }
        return $this->getWhereIn(T_invoice_product::fk_product, $values);
    }
    
    
    function getAvgPriceForProduct($productId){
        
    }
}