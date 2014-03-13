<?php

class Category_Mapper extends Mapper
{

    public function __construct()
    {
        $query = new Query(array(
            'from' => 't_category',
            'where' => 'status=1'
        ));
        parent::__construct('Category_Domain', $query);
    }

    /**
     * 
     * @param mixed $id_or_code id của category hoặc code
     * @param string $fields '*'
     * @return \Category_Domain
     */
    public function find($id_or_code, $fields = '*')
    {
        $query = Query::make(array(
                    'select' => $fields,
                    'from' => 't_category'
        ));
        $params = array($id_or_code);
        is_numeric($id_or_code) ? $query->where('id=?') : $query->where('code=?');
        $data = DB::get_instance()->GetRow($query, $params);
        return $this->make_domain($data);
    }

    /**
     * 
     * @param type $fields
     * @return \Category_Domain[]
     */
    public function find_all($fields = '*')
    {
        return parent::find_all($fields);
    }

    /**
     * 
     * @param type $keywords
     * @return \Category_Mapper
     */
    public function filter_keywords($keywords)
    {
        $this->_query->where('codename LIKE ?', __METHOD__);
        $this->_query_params[__METHOD__] = "%$keywords%";
        return $this;
    }

    public function update($id, $raw_data)
    {
        return DB::update('t_category', $raw_data, 'id=?', array($id));
    }

}
