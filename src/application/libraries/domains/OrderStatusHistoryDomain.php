<?php

defined('BASEPATH') or die('No direct script access allowed');

class OrderStatusHistoryDomain
{

    public $id;
    public $fkOrder;
    public $fkStatus;
    public $dateHappened;
    public $fkCreator;
    public $dateCreated;
    public $isMailSent;

    function isMailSent()
    {
        return ((bool) $this->isMailSent);
    }

}
