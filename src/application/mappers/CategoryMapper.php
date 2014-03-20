<?php

defined('BASEPATH') or die('No direct script access allowed');

class CategoryMapper extends MapperAbstract
{

    public function __construct()
    {
        $query = Query::make()
                ->from('t_category c')
                ->innerJoin('t_category_language cl', 'c.id=cl.fk_category');

        $map = array(
            'fkParent' => 'fk_parent'
        );

        parent::__construct('CategoryDomain', $query, $map);
    }

    /**
     * 
     * @param mixed $id_or_code id của category hoặc code
     * @param string $fields '*'
     * @return \CategoryDomain
     */
    public function find($id_or_code, $language, $fields = 'c.*, cl.name, cl.description, cl.language, cl.name')
    {
        $query = Query::make(array(
                    'select' => $fields,
                    'from' => 't_category c'
        ));
        $query->innerJoin('t_category_language cl', 'cl.fk_category=c.id AND cl.language=?');

        $params = array($language, $id_or_code);
        is_numeric($id_or_code) ? $query->where('c.id=?') : $query->where('c.code=?');
        $data = DB::getInstance()->GetRow($query, $params);

        return $this->makeDomain($data);
    }

    /**
     * 
     * @param type $fields
     * @return \CategoryDomain[]
     */
    public function findAll($fields = 'c.*, cl.name, cl.description, cl.language, cl.name')
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
        $this->_query->where('c.codename LIKE ?', __METHOD__);
        $this->_queryParams[__METHOD__] = "%$keywords%";
        return $this;
    }

    public function filterLanguage($language)
    {
        $this->_query->where('cl.language = ?', __METHOD__);
        $this->_queryParams[__METHOD__] = $language;
        return $this;
    }

    public function update($id, $raw_data)
    {
        return DB::update('t_category', $raw_data, 'id=?', array($id));
    }

    public function delete()
    {
        
    }

}
