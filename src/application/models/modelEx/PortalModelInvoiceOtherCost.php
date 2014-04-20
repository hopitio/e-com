<?php
class PortalModelInvoiceOtherCost extends PortalModelBase
{
    var $_constIntanceName = 'T_invoice_other_cost';
    var $id;
    var $fk_invoice;
    var $value;
    var $comment;
    function getInvoicesOtherCost($invoiceIds){
        return parent::getWhereIn(T_invoice_other_cost::fk_invoice, $invoiceIds);
    }
}