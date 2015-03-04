<?php

class FeatureGroupMapper extends MapperAbstract
{

    protected $_language;
    protected $_autoloadProducts = false;

    function __construct()
    {
        $query = Query::make()->from('t_feature_group')->orderBy('sort');
        $map = array('xmlLanguage' => 'xml_language');
        parent::__construct('FeatureGroupDomain', $query, $map);
    }

    function setLanguage($lang)
    {
        $this->_language = $lang;
        return $this;
    }

    function setAutoloadProducts()
    {
        $this->_autoloadProducts = true;
        return $this;
    }

    function makeDomainCallback(&$domainInstance)
    {
        $domLanguage = simplexml_load_string($domainInstance->xmlLanguage, 'SimpleXMLElement', LIBXML_NOCDATA);
        if ($domLanguage)
        {
            $domainInstance->name = (string) Common::fetch_array($domLanguage->xpath("//language[@id=\"{$this->_language}\"]/name"), 0);
        }

        if ($this->_autoloadProducts)
        {
            $mapper = FeatureGroupDetailsMapper::make()
                    ->filterGroup($domainInstance->id)
                    ->setLanguage($this->_language)
                    ->autoloadAttributes();
            $mapper->getQuery()
                    ->select('seller.name AS seller_name', false)
                    ->leftJoin('t_seller seller', 'seller.id = p.fk_seller');
            $products = $mapper->findAll(function($record, $entity)
            {
                $entity->seller_name = $record['seller_name'];
            });
            $domainInstance->setDetails($products);
        }
    }

    /** @return FeatureGroupDomain */
    function findAll($callback = null)
    {
        return parent::findAll($callback);
    }

}
