<?php

class FeatureGroupMapper extends MapperAbstract
{

    protected $_language;
    protected $_autoloadProducts = false;

    function __construct()
    {
        $query = Query::make()->from('t_feature_group')->orderBy('sort');
        $map = array('xmlLanguage' => 'xml_language', 'xmlImage' => 'xml_image');
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
        $domLanguage = simplexml_load_string($domainInstance->xmlLanguage);
        if ($domLanguage)
        {
            $domainInstance->name = (string) Common::fetch_array($domLanguage->xpath("//language[@id=\"{$this->_language}\"]/name"), 0);
        }
        $domImages = simplexml_load_string($domainInstance->xmlImage);
        if ($domImages)
        {
            $domImages = $domImages->xpath("//language[@id=\"{$this->_language}\"]/img");
            foreach ($domImages as $domImage)
            {
                $domainInstance->addImage((string) $domImage->attributes()->src, (string) $domImage->attributes()->title, (string) $domImage->attributes()->href);
            }
        }

        if ($this->_autoloadProducts)
        {
            $mapper = ProductFixedMapper::make()
                    ->setLanguage($this->_language)
                    ->autoloadAttributes();
            $mapper->getQuery()
                    ->select('seller.name AS seller_name')
                    ->innerJoin('t_seller seller', 'seller.id = p.fk_seller')
                    ->innerJoin('t_feature_product fp', 'fp.fk_product=p.id AND fp.fk_group=' . intval($domainInstance->id))
                    ->orderBy('fp.sort');
            $products = $mapper->findAll();
            $domainInstance->setProducts($products);
        }
    }

}
