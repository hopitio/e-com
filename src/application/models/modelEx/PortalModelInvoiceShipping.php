<?php
class PortalModelInvoiceShipping extends PortalModelBase
{
    var $_constIntanceName = 'T_invoice_shipping';
    var $id,$fk_invoice,$fk_user_contact,$created_user,$display_name,$price,$status,$created_date,$ship_date,$complete_date,$shipping_type;
}