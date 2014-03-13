<?php

defined('BASEPATH') or die('No direct script access allowed');

class CategoryMapper extends MapperAbstract
{

    public function __construct()
    {
        $query = new Query(array(
            'from' => 't_category',
            'where' => 'status=1'
        ));
        parent::__construct('CategoryDomain', $query);
    }

    /**
     * 
     * @param mixed $id_or_code id của category hoặc code
     * @param string $fields '*'
     * @return \CategoryDomain
     */
    public function find($id_or_code, $fields = '*')
    {
        $query = Query::make(array(
                    'select' => $fields,
                    'from' => 't_category'
        ));
        $params = array($id_or_code);
        is_numeric($id_or_code) ? $query->where('id=?') : $query->where('code=?');
        $data = DB::getInstance()->GetRow($query, $params);
        return $this->makeDomain($data);
    }

    /**
     * 
     * @param type $fields
     * @return \CategoryDomain[]
     */
    public function findAll($fields = '*')
    {
        return parent::findAll($fields);
    }

    /**
     * 
     * @param type $keywords
     * @return \CategoryMapper
     */
    public function filterKeywords($keywords)
    {
        $this->_query->where('codename LIKE ?', __METHOD__);
        $this->_queryParams[__METHOD__] = "%$keywords%";
        return $this;
    }

    public function update($id, $raw_data)
    {
        return DB::update('t_category', $raw_data, 'id=?', array($id));
    }

}
