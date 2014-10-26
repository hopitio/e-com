<?php

class SearchMapper extends ProductFixedMapper
{

    protected $searchKeywords;
    protected $union_1;
    protected $union_2;

    function filterSearchKeywords($keywords)
    {
        $this->searchKeywords = $keywords;
        return $this;
    }

    protected function onBeforeQuery()
    {
        if ($this->union_1 || $this->union_2)
        {
            return;
        }
        //attr
        $attrName = ProductAttributeTypeMapper::make()->filterCode('name')->find();
        $this->union_1 = clone $this->_query;
        $this->union_2 = clone $this->_query;
        $this->union_1->innerJoin('t_product_attribute sname', "sname.fk_product = p.id AND sname.fk_attribute_type = {$attrName->id} AND value_varchar LIKE ?");
        $this->_queryParams['s1'] = "%{$this->searchKeywords}%";
        $foundJoinSeller = false;
        foreach ($this->union_2->getJoin() as $joinString)
        {
            if (strpos($joinString, 't_seller seller') !== false)
            {
                $foundJoinSeller = true;
                break;
            }
        }
        if (!$foundJoinSeller)
        {
            $this->union_2->innerJoin('t_seller seller', 'seller.id = p.fk_seller');
        }
        $this->union_2->where('seller.name LIKE ?', 's2');
        $this->_queryParams['s2'] = "%{$this->searchKeywords}%";
        $this->_query = "$this->union_1 UNION $this->union_2";
    }

    function count($fields = 'COUNT(*)')
    {
        $union_1 = clone $this->union_1;
        $union_1->select('p.id', true)->limit(0)->orderBy(NULL);

        $union_2 = clone $this->union_2;
        $union_2->select('p.id', true)->limit(0)->orderBy(NULL);

        $sql = "SELECT $fields FROM ($union_1 UNION $union_2) temp";
        return DB::getInstance()->GetOne($sql, $this->_queryParams);
    }
    
    function find($callback = null)
    {
        $this->onBeforeQuery();
        return parent::find($callback);
    }

    function findAll($callback = null)
    {
        $this->onBeforeQuery();
        return parent::findAll($callback);
    }

}
