<?php

defined('BASEPATH') or die('No direct script access allowed');

class AdministrativeDomain implements DomainInterface
{
    

    public $id;
    public $unitname;
    public $unitlevel;
    public $codename;
    public $fkParent;

}
