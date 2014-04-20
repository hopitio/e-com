<?php

class SellerMapper extends MapperAbstract
{

    protected $autoloadCategories;
    protected $user;

    function __construct($domain = 'SellerDomain')
    {
        $query = Query::make()->from('t_seller');

        $map = array(
            'statusDate'   => 'status_date',
            'statusReason' => 'status_reason',
            'fkManager'    => 'fk_manager'
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

        $this->_query->where('fk_manager=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $user->id;
        return $this;
    }

    /** @return SellerDomain */
    function find()
    {
        if (!$this->user)
        {
            throw new Lynx_BusinessLogicException(get_class($this) . '::setUser()  chưa được gọi');
        }
        return parent::find();
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
