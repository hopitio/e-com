<?php

defined('BASEPATH') or die('No direct script access allowed');

class CategoryAttributeDomain extends ProductAttributeTypeDomain implements Domain
{
    public $id;
    public $fkAttributeType;
    public $fkCategory;
    
}
