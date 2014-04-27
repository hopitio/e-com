<?php

defined('BASEPATH') or die('no direct script access allowed');

class SectionMapper extends MapperAbstract
{

    protected $_language;
    protected $_autoloadProducts = false;

    function __construct($domain = 'SectionDomain')
    {
        $query = Query::make()->select('s.*, sl.name, sl.description')->from('t_section s');

        $map = array(
            'displayImage'      => 'display_image',
            'displayImageHref'  => 'display_image_href',
            'displayImageTitle' => 'display_image_title'
        );

        parent::__construct($domain, $query, $map);
    }

    function setLanguage($lang)
    {
        $this->_language = $lang;
        return $this;
    }

    function autoloadProducts($mode = true)
    {
        $this->_autoloadProducts = $mode;
        return $this;
    }

    /**
     * 
     * @param type $callback
     * @return SectionDomain
     */
    function findAll($callback = null)
    {
        $this->onBeforeQuery();
        return parent::findAll($callback);
    }

    function onBeforeQuery()
    {
        if (!$this->_language)
        {
            throw new Lynx_BusinessLogicException('chua setLanguage()');
        }
        $this->_query->innerJoin('t_section_language sl', "sl.fk_section=s.id AND sl.language='{$this->_language}'");
    }

    /**
     * 
     * @param SectionDomain $domainInstance
     */
    function makeDomainCallback(&$domainInstance)
    {
        if ($this->_autoloadProducts)
        {
            $mapper = ProductFixedMapper::make()
                    ->autoloadAttributes()
                    ->setLanguage($this->_language);
            $mapper->getQuery()
                    ->innerJoin('t_section_product sp', 'sp.fk_product = p.id AND sp.fk_section=' . $domainInstance->id);
            $products = $mapper->findAll();
            $domainInstance->setProducts($products);
        }
    }

    /**
     * 
     * @param type $callback
     * @return SectionDomain
     */
    function find($callback)
    {
        $this->onBeforeQuery();
        return parent::find($callback);
    }

}
