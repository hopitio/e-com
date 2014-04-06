<?php

defined('BASEPATH') or die('No direct script access allowed');

abstract class MapperAbstract
{

    static protected $_instance;
    protected $_map;
    protected $_domain;

    /** @var \Query */
    protected $_query;
    protected $_queryParams = array();

    /**
     * 
     * @return \static
     */
    static public function getInstance()
    {
        if (!static::$_instance)
        {
            static::$_instance = new static;
        }
        return static::$_instance;
    }

    /**
     * 
     * @return \static
     */
    static function make()
    {
        return new static;
    }

    /**
     * 
     * @param string $domain
     * @param Query $query
     * @param array $map
     */
    public function __construct($domain, Query $query, $map = null)
    {
        $this->_domain = $domain;
        $this->_query = $query;
        $this->_map = $map;
    }

    /**
     * 
     * @param \Domain $instance
     * @param array $record
     * @return \Domain
     */
    public function map(DomainInterface $instance, $record)
    {
        $props = array_keys(get_object_vars($instance));
        foreach ($props as $prop)
        {
            $field = isset($this->_map[$prop]) ? $this->_map[$prop] : $prop;
            if (isset($record[$field]))
            {
                $instance->{$prop} = $record[$field];
            }
        }
        return $instance;
    }

    /**
     * 
     * @param array $record
     * @return \Domain
     */
    public function makeDomain($record)
    {
        $class = $this->_domain;
        $instance = new $class;
        $this->map($instance, $record);
        return $instance;
    }

    /**
     * 
     * @param \Domain $instance
     * @return array
     */
    public function getRawData(Domain $instance)
    {
        $return = array();
        foreach (get_object_vars($instance) as $prop => $value)
        {
            if (!isset($this->_map[$prop]))
            {
                continue;
            }
            $field = $this->_map[$prop];
            $return[$field] = $value;
        }
        return $return;
    }

    /**
     * 
     * @param type $fields
     * @return Domain[]
     */
    public function findAll()
    {
        $recordset = DB::getInstance()->GetAll($this->_query, $this->_queryParams);
        if (empty($recordset))
        {
            return array();
        }
        $domains = array();
        foreach ($recordset as $record)
        {
            $domains[] = $this->makeDomain($record);
        }
        return $domains;
    }

    /**
     * 
     * @param type $fields
     * @return array(key => value)
     */
    function findAssoc()
    {
        return DB::getInstance()->GetAssoc($this->_query, $this->_queryParams);
    }

    /**
     * @param string $fields
     * @return DomainInterface 
     */
    function find()
    {
        $record = DB::getInstance()->GetRow($this->_query, $this->_queryParams);
        return $this->makeDomain($record);
    }

    function select($fields = '*')
    {
        $this->_query->select($fields);
        return $this;
    }

    function filterID($id)
    {
        $this->_query->where('id=?', __FUNCTION__);
        $this->_queryParams[__FUNCTION__] = $id;
        return $this;
    }

    public function limit($limit, $offset = 0)
    {
        $this->_query->limit($limit)->offset($offset);
        return $this;
    }

    public function offset($offset)
    {
        $this->_query->offset($offset);
        return $this;
    }

}
