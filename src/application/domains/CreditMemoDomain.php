<?php

defined('BASEPATH') or die('No direct script access allowed');

class CreditMemoDomain implements DomainInterface
{

    public $id;
    public $fkOrder;
    public $dateCreated;
    public $dateRefunded;
    public $creditStatus;
    public $fkContact;
    public $emailStatus;
    public $comment;

}
