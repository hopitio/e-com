<?php

class SellerCategoryMapper extends CategoryMapper
{

    protected $sellerID;

    function __construct($domain = 'SellerCategoryDomain')
    {
        parent::__construct($domain);
        $this->_map['hasAccess'] = 'has_access';
        $this->_query->select('sc.id AS has_access, c.*, cl.name, cl.description, cl.language, cl.name');
    }

    function filterSeller($userID)
    {
        $this->sellerID = $userID;
        return $this;
    }

    /** @return SellerCategoryDomain */
    function find($callback = null)
    {
        return parent::find($callback);
    }

    /**
     * 
     * @return SellerCategoryDomain
     * @throws Lynx_BusinessLogicException
     */
    function findAll($callback = null)
    {
        if (!$this->sellerID)
        {
            throw new Lynx_BusinessLogicException(get_class($this) . '::filterSeller chưa được gọi');
        }
        $this->_query->leftJoin('t_seller_category sc', 'c.id = sc.fk_category AND sc.fk_seller = ' . intval($this->sellerID));
        return parent::findAll($callback);
    }

}
