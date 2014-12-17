<?php
/**
 * @author ANLT
 * @since 20140409
 */
class PortalModelProduct extends PortalModelBase
{
    protected $_constIntanceName = 'T_product';
    var $tableName;
    var $id;
    var $sub_id;
    var $name;
    var $sub_image;
    var $short_description;
    var $sell_price;
    var $seller_id;
    var $seller_name;
    var $seller_email;
    var $record_status;
    var $shipping;
    var $product_url;
    
    
    
    /**
     * 
     * @param array $products
     */
    function insertNewProducts($products){
        parent::bacthInsert($products);
    }
    
    /**
     * get all products of once invoices.
     * @param array $invoiceIdCollection
     */
    function getProductsOfInvoices($invoiceIdCollection)
    {
        $invoiceIdCollection = implode(',' , $invoiceIdCollection );
        $sql = "SELECT 
                    t_product.* ,
                    t_invoice_product.fk_invoice AS `invoice_id`,
                    t_invoice_product.id AS t_invoice_product_id,
                    t_invoice_product.product_price as product_price,
                    t_invoice_product.product_quantity as product_quantity
                  FROM 
                    t_product INNER JOIN t_invoice_product 
                    ON t_product.id = t_invoice_product.fk_product
                  WHERE 
                    `t_invoice_product`.`fk_invoice` IN  ({$invoiceIdCollection})";
        $query =  $this->_dbPortal->query($sql);
        $result = $query->result();
        return $result;
    }
    
    function getPreferOrder($productId){
        $sql = "SELECT DISTINCT t_invoice.fk_order as 'order_id' FROM t_product 
                INNER JOIN t_invoice_product ON t_product.id = t_invoice_product.fk_product 
                INNER JOIN t_invoice ON t_invoice_product.fk_invoice = t_invoice.id
                WHERE t_product.id = {$productId}";
        $query =  $this->_dbPortal->query($sql);
        $result = $query->result();
        return $result;
        
    }
}