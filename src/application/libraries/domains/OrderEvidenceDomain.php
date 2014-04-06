<?php

defined('BASEPATH') or die('No direct script access allowed');

class OrderEvidenceDomain implements DomainInterface
{

    public $id;
    public $fkUser;
    public $checksum;
    public $dateCreated;
    public $dateExpired;

}
