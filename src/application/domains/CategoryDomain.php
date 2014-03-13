<?php

defined('BASEPATH') or die('No direct script access allowed');

class CategoryDomain extends DomainInterface
{

    public $id;
    public $codename;
    public $fk_parent;
    public $sort;
    public $path;
    public $image;
    public $status;

}
