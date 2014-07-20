<?php

class SellerMapper extends MapperAbstract
{

    protected $autoloadCategories;
    protected $user;

    function __construct($domain = 'SellerDomain')
    {
        $query = Query::make()
                ->select('s.*, sl.codename AS seller_code, sl.name AS seller_name, sl.commission', true)
                ->from('t_seller s')
                ->innerJoin('t_seller_level sl', 'sl.id = s.fk_level');

        $map = array(
            'statusDate'   => 'status_date',
            'statusReason' => 'status_reason',
            'fkManager'    => 'fk_manager',
            'sellerCode'   => 'seller_code',
            'sellerName'   => 'seller_name'
        );

        parent::__construct($domain, $query, $map);
    }

    function autoloadCategories($bool = true)
    {
        $this->autoloadCategories = $bool;
        return $this;
    }

    function setUser(User $user)
    {
        $this->user = $user;

        $this->_query->where('s.fk_manager=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $user->id;
        return $this;
    }

    /** @return SellerDomain */
    function find($callback = null)
    {
        if (!$this->user)
        {
            throw new Lynx_BusinessLogicException(get_class($this) . '::setUser()  chưa được gọi');
        }
        return parent::find($callback);
    }

    function makeDomainCallback(&$domainInstance)
    {
        parent::makeDomainCallback($domainInstance);
        if ($domainInstance->id && $this->autoloadCategories)
        {
            $categories = SellerCategoryMapper::make()
                    ->filterSeller($domainInstance->id)
                    ->setLanguage($this->user->languageKey)
                    ->findAll();
            $domainInstance->setCategories($categories);
        }
    }

}
