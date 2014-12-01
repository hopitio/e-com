<?php

defined('BASEPATH') or die('No direct script access allowed');

class InvoiceDetailDomain implements DomainInterface
{

    public $id;
    public $fkInvoice;
    public $fkProduct;
    public $fkOrder;
    public $quality;

}
