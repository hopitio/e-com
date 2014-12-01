<?php

defined('BASEPATH') or die('No direct script access allowed');

class InvoiceDomain implements DomainInterface
{

    public $id;
    public $fkOrder;
    public $fkCustomer;
    public $dateCreated;
    public $datePaid;
    public $invoiceStatus;
    public $fkContact;
    public $emailStatus;
    public $comment;

    
}
