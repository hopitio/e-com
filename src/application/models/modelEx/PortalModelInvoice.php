<?php
/**
 * @author ANLT
 * @since 20140409
 */
class PortalModelInvoice extends PortalModelBase
{
    protected $_constIntanceName = 'T_invoice';
    var $id,$fk_order,$created_user,$created_date,$paid_date,$cancelled_date,$rejected_date,$comment,$payment_method,$payment_currency,$invoice_type;
    
    /**
     * 
     * @param array $orderIds Id Collection
     * @return array invoice;
     */
    function getInvociesByOrderIds($orderIds){
        return parent::getWhereIn(T_invoice::fk_order, $orderIds); 
    }
}