<?php
/**
 * @author ANLT
 * @since 20140409
 */
class PortalModelProduct extends PortalModelBase
{
    protected $_constIntanceName = 'T_product';
    var $id;
    var $sub_id;
    var $name;
    var $sub_image;
    var $short_description;
    var $price;
    var $quantity;
    var $totalprice;
    
    /**
     * 
     * @param array $products
     */
    function insertNewProducts($products){
        parent::bacthInsert($products);
    }
    
    /**
     * 
     * @param array<id> $arrayId
     * @return trả về false nếu như không có kết quả trả về, trả về dữ liệu nếu hoàn thành.
     */
    function getProducts($arrayId)
    {
        $this->_dbPortal->where_in(T_product::id,$arrayId);
        $queryResult = $this->_dbPortal->get(T_product::tablename);
        $result = $queryResult->result();
        if(count($result) <= 0){
            return false;
        }
        return $result;
    }
}