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

    /**
     * @var ListDomain 
     */
    protected $_trueValue = false;

    function getTrueValue()
    {
        switch ($this->dataType) {
            case static::DT_ENUM:
                if ($this->_trueValue === false)
                {
                    $this->_trueValue = ListMapper::make()->findById($this->valueEnum);
                }
                return $this->_trueValue;
            case static::DT_NUMBER:
                return doubleval($this->valueNumber);
            case static::DT_TEXT:
                return strval($this->valueText);
            case static::DT_VARCHAR:
                return strval($this->valueVarchar);
            case static::DT_FILE:
                if ($this->_trueValue === false)
                {
                    $this->_trueValue = FileMapper::make()->filterID($this->valueNumber)->find();
                }
                return $this->_trueValue;
            default:
                throw new Exception("Data type not supported");
        }
    }

    function __toString()
    {
        return strval($this->getTrueValue());
    }

}
