<?php
/**
 * @author ANLT
 * @since 20140409
 */
class PoralInvoiceModel extends PortalBaseModel
{
    var $_constIntanceName = 'T_invoice';
    var $id ;
    var $tableName ;
    var $fk_order ;
    var $fk_customer ;
    var $date_created ;
    var $date_paid ;
    var $invoice_status ;
    var $fk_contact ;
    var $email_status ;
    var $comment ;
}