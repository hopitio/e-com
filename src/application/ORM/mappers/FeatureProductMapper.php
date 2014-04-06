<?php

defined('BASEPATH') or die('No direct script access allowed');

class FeatureProductMapper extends ProductFixedMapper
{

    function __construct($domain = 'FeatureProductDomain')
    {
        parent::__construct($domain);
        $this->_query
                ->innerJoin('t_feature_product fp', 'p.id = fp.fk_product')
                ->orderBy('fp.sort');
    }

    /**
     * 
     * @param type $fields
     * @return FeatureProductDomain
     */
    function findAll()
    {
        return parent::findAll();
    }

    function select($fields = "p.*, fp.id AS fid, fp.fk_product, fp.is_on_homepage, fp.sort")
    {
        return parent::select($fields);
    }

    /**
     * 
     * @param type $feature_product_id
     * @param type $fields
     * @return FeatureProductDomain
     */
    function find()
    {
        return parent::find();
    }

    function filterID($id)
    {
        $this->_query->where('fp.id=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $id;
    }

    function filterOnHomePage($bool = true)
    {
        if ($bool)
        {
            $this->_query->where('fp.is_on_homepage=1', __FUNCTION__);
        }
        else
        {
            $this->_query->where(null, __FUNCTION__);
        }
        return $this;
    }

}
