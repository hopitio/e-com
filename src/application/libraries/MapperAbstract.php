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
        $this->makeDomainCallback($instance);
        return $instance;
    }

    /**
     * Xử lý Instance sau khi được tạo bởi find() | findAll() | makeDomain()
     * @param DomainInterface $domainInstance
     */
    function makeDomainCallback(&$domainInstance)
    {
        
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

    public function findAll($callback = null)
    {
        $recordset = DB::getInstance()->GetAll($this->_query, $this->_queryParams);
        if (empty($recordset))
        {
            return array();
        }
        $domains = array();
        foreach ($recordset as $record)
        {
            $domain = $this->makeDomain($record);
            $domains[] = $domain;
            if (is_callable($callback))
            {
                call_user_func($callback, $record, $domain);
            }
        }
        return $domains;
    }

    /**
     * 
     * @return array key => value
     */
    function findAssoc()
    {
        return DB::getInstance()->GetAssoc($this->_query, $this->_queryParams);
    }

    function find($callback = null)
    {
        $record = DB::getInstance()->GetRow($this->_query, $this->_queryParams);
        $domain = $this->makeDomain($record);
        if (is_callable($callback))
        {
            call_user_func($callback, $record, $domain);
        }
        return $domain;
    }

    function select($fields = '*', $reset = false)
    {
        $this->_query->select($fields, $reset);
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

    function count($fields = 'COUNT(*)')
    {
        $query = clone $this->_query;
        $query->select($fields, true)->limit(0)->orderBy(NULL);
        return DB::getInstance()->GetOne($query, $this->_queryParams);
    }

    /** @return Query */
    function getQuery()
    {
        return $this->_query;
    }

}
