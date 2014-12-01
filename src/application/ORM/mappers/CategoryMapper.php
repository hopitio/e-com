<?php

defined('BASEPATH') or die('No direct script access allowed');

class CategoryMapper extends MapperAbstract
{

    protected $_autoload_children = false;

    public function __construct($domain = 'CategoryDomain')
    {
        $query = Query::make()
                ->select('c.*, cl.name, cl.description, cl.language, cl.name, cl.product_section_image', true)
                ->from('t_category c')
                ->innerJoin('t_category_language cl', 'c.id=cl.fk_category')
                ->orderBy('c.path_sort');

        $map = array(
            'fkParent'     => 'fk_parent',
            'isContainer'  => 'is_container',
            'pathSort'     => 'path_sort',
            'isShowInHome' => 'is_show_in_home'
        );

        parent::__construct($domain, $query, $map);
    }

    /** @return CategoryDomain */
    static function qry_all_child_categories()
    {
        $mapper = static::make()
                ->setLanguage('VN-VI')
                ->filterNotRoot();
        $mapper->getQuery()
                ->select('plang.name as parent_name')
                ->innerJoin('t_category parent', 'c.fk_parent=parent.id')
                ->innerJoin('t_category_language plang', 'cl.language=plang.language AND parent.id=plang.fk_category');
        return $mapper->findAll(function($record, $instance)
                {
                    $instance->parent_name = $record['parent_name'];
                });
    }

    function setAutoloadChildren($bool = true)
    {
        $this->_autoload_children = $bool;
        return $this;
    }

    function makeDomainCallback(&$domainInstance)
    {
        if ($this->_autoload_children)
        {
            $domainInstance->children = static::make()
                    ->filterParent($domainInstance->id)
                    ->setLanguage($domainInstance->language)
                    ->findAll();
        }
    }

    /**
     * @return CategoryDomain
     */
    public function find($callback = null)
    {
        return parent::find($callback);
    }

    function filterID($id)
    {
        $this->_query->where('c.id=' . intval($id), __FUNCTION__);
        return $this;
    }

    function select($fields = 'c.*, cl.name, cl.description, cl.language, cl.name, cl.slide_images, cl.side_images,cl.product_section_image', $reset = true)
    {
        return parent::select($fields, $reset);
    }

    public function filterIdOrCode($idOrCode)
    {
        is_numeric($idOrCode) ? $this->_query->where('c.id=?', __FUNCTION__) : $this->_query->where('c.code=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $idOrCode;
        return $this;
    }

    function filterNotRoot()
    {
        $this->_query->where('c.fk_parent<>0', __FUNCTION__);
        return $this;
    }

    /**
     * 
     * @param type $fields
     * @return \CategoryDomain[]
     */
    public function findAll($callback = null)
    {
        return parent::findAll($callback);
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

    public function setLanguage($language)
    {
        $this->_query->where('cl.language = ?', __METHOD__);
        $this->_queryParams[__METHOD__] = $language;
        return $this;
    }

    public function update($id, $raw_data)
    {
        return DB::update('t_category', $raw_data, 'id=?', array($id));
    }

    function filterShowInHome()
    {
        $this->_query->where('c.is_show_in_home=1');
        return $this;
    }

    function filterParent($parent_id)
    {
        $this->_query->where('c.fk_parent = ?', 'child_of');
        $this->_queryParams['child_of'] = (int) $parent_id;
        return $this;
    }

    function filterAncestor($ancestor_id)
    {
        $queryAncestorPath = Query::make()->select('path')->from('t_category')->where('id=' . intval($ancestor_id));
        $path = DB::getInstance()->GetOne($queryAncestorPath);

        if ($path !== false)
        {
            $this->_query->where('c.path LIKE ?', 'child_of');
            $this->_queryParams['child_of'] = "{$path}%";
        }
        else
        {
            trigger_error(__CLASS__ . ':' . __FUNCTION__ . ': không tìm thấy parent hoặc path parent có vấn đề');
        }

        return $this;
    }

}
