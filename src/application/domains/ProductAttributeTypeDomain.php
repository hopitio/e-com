<?php

defined('BASEPATH') or die('No direct script access allowed');

class ProductAttributeTypeDomain implements DomainInterface
{

    const DT_NUMBER = 'number';
    const DT_ENUM = 'enum';
    const DT_TEXT = 'text';
    const DT_VARCHAR = 'varchar';

    public $id;
    public $codename;
    public $dataType;
    public $fkEnumRef;
    public $multiLanguage;
    public $repeatingGroup;
    public $weight;
    public $default;

    function isMutiLanguage()
    {
        return ((bool) $this->multiLanguage);
    }

    function isRepeatingGroup()
    {
        return ((bool) $this->repeatingGroup);
    }

}
