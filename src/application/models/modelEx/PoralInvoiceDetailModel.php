<?php
/**
 * @author ANLT
 * @since 20140409
 */
class PoralInvoiceDetailModel extends PortalBaseModel
{
    public  $_constIntanceName = 'T_invoice_detail'';
    public $id;
    public $tableName;
    public $fk_invoice;
    public $fk_order;
    public $quantity;
    
}