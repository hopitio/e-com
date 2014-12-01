<?php

class TaxMapper extends MapperAbstract
{

    protected $language;
    protected $filterProductID;

    function __construct($domain = 'TaxDomain')
    {
        $query = Query::make()->select('*', true)->from('t_tax tax');

        $map = array(
            'fkSeller'    => 'fk_seller',
            'costPercent' => 'cost_percent',
            'costFixed'   => 'cost_fixed'
        );

        parent::__construct($domain, $query, $map);
    }

    function setLanguage($lang)
    {
        $this->language = $lang;

        return $this;
    }

    function filterSeller($sellerID)
    {
        $this->_query->where('tax.fk_seller=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $sellerID;
        return $this;
    }

    function filterProduct($productID)
    {
        $this->filterProductID = $productID;
        return $this;
    }

    /**
     * 
     * @return TaxDomain
     */
    function findAll($callback = null)
    {
        if (!$this->language)
        {
            throw new Lynx_BusinessLogicException('TaxMapper::setLanguage() Chưa được gọi');
        }

        $this->_query->innerJoin('t_tax_language tl', "tax.id = tl.fk_tax AND tl.language='{$this->language}'");
        if ($this->filterProductID)
        {
            $this->_query->innerJoin('t_product_tax pt', 'pt.fk_tax = tax.id AND pt.fk_product=' . intval($this->filterProductID));
        }
        return parent::findAll($callback);
    }

    /**
     * 
     * @return TaxDomain
     */
    function find($callback = null)
    {
        if (!$this->language)
        {
            throw new Lynx_BusinessLogicException('TaxMapper::setLanguage() Chưa được gọi');
        }

        $this->_query->innerJoin('t_tax_language tl', "tax.id = tl.fk_tax AND tl.language='{$this->language}'");
        return parent::find($callback);
    }

}
