<?php
class PortalModelTax extends PortalModelBase
{
    protected $_constIntanceName = 'T_tax';
    var $id;
    var $fk_product;
    var $sub_tax_id;
    var $sub_tax_name;
    var $sub_tax_value;
}