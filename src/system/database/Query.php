<?php

defined('BASEPATH') or die('No direct script access allowed');

class Query
{

    static protected $_instance;
    protected $_select;
    protected $_from;
    protected $_join = array();
    protected $_where = array();
    protected $_limit;
    protected $_offset;
    protected $_orderBy;
    protected $_groupBy;
    protected $_having;

    public static function make($options = array())
    {
        return new static($options);
    }

    protected function _getArrayVal($arr, $key, $default = null)
    {
        return isset($arr[$key]) ? $arr[$key] : $default;
    }

    public function __construct($options)
    {
        $this->select($this->_getArrayVal($options, 'select', '*'))
                ->from($this->_getArrayVal($options, 'from'))
                ->limit($this->_getArrayVal($options, 'limit'))
                ->offset($this->_getArrayVal($options, 'offset'))
                ->orderBy($this->_getArrayVal($options, 'orderBy'))
                ->groupBy($this->_getArrayVal($options, 'groupBy'));
        if (isset($options['where']))
        {
            $this->where($options['where']);
        }
    }

    public function __toString()
    {
        $sql = "SELECT {$this->_select} FROM {$this->_from}";
        if (!empty($this->_join))
        {
            $sql .= implode("\n    ", $this->_join);
        }
        if (!empty($this->_where))
        {
            $sql .= "\nWHERE " . implode("\n    AND ", $this->_where);
        }
        if ($this->_limit)
        {
            $sql .= "\nLIMIT {$this->_limit}";
            if ($this->_offset)
            {
                $sql .= " OFFSET {$this->_offset}";
            }
        }
        if ($this->_orderBy)
        {
            $sql .= "\nORDER BY {$this->_orderBy}";
        }
        if ($this->_groupBy)
        {
            $sql .= "\nGROUP BY {$this->_groupBy}";
        }
        if ($this->_having)
        {
            $sql .= "\nHAVING {$this->_having}";
        }
        return $sql;
    }

    public function select($fields = '*')
    {
        $this->_select = $fields;
        return $this;
    }

    public function from($table)
    {
        $this->_from = $table;
        return $this;
    }

    public function join($table, $on_condition, $join_type = "")
    {
        $this->_join[] = "$join_type JOIN $table ON $on_condition";
        return $this;
    }

    public function innerJoin($table, $on_condition)
    {
        return $this->join($table, $on_condition, "INNER");
    }

    public function leftJoin($table, $on_condition)
    {
        return $this->join($table, $on_condition, 'LEFT');
    }

    public function rightJoin($table, $on_condition)
    {
        return $this->join($table, $on_condition, "RIGHT");
    }

    public function fullJoin($table, $on_condition)
    {
        $this->join($table, $on_condition, "FULL");
    }

    public function where($condition, $key = null)
    {
        if ($key)
        {
            if ($condition)
            {
                $this->_where[$key] = $condition;
            }
            elseif (isset($this->_where[$key]))
            {
                unset($this->_where[$key]);
            }
        }
        else
        {
            $this->_where[] = $condition;
        }
        return $this;
    }

    public function limit($limit, $offset = null)
    {
        $this->_limit = $limit;
        if ($offset)
        {
            $this->offset($offset);
        }
        return $this;
    }

    public function offset($offset)
    {
        $this->_offset = $offset;
        return $this;
    }

    public function orderBy($field)
    {
        $this->_orderBy = $field;
        return $this;
    }

    public function groupBy($field)
    {
        $this->_groupBy = $field;
    }

    public function having($condition)
    {
        $this->_having = $condition;
    }

}
