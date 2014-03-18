<?php

defined('BASEPATH') or die('No direct script access allowed');

class ProductAttributeDomain extends ProductAttributeTypeDomain
{

    public $id;
    public $fkProduct;
    public $fkAttributeType;
    public $language;
    public $valueNumber;
    public $valueEnum;
    public $valueText;
    public $valueVarchar;

    function getTrueValue()
    {
        switch ($this->dataType)
        {
            case static::DT_ENUM:

                return intval($this->valueEnum);
            case static::DT_NUMBER:
                return doubleval($this->valueNumber);
            case static::DT_TEXT:
            case static::DT_VARCHAR:
                return strval($this->valueText);
            default:
                throw new Exception("Data type not supported");
        }
    }

}
