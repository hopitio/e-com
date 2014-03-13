<?php

class Query
{

    static protected $_instance;
    protected $_select;
    protected $_from;
    protected $_join = array();
    protected $_where = array();
    protected $_limit;
    protected $_offset;
    protected $_order_by;
    protected $_group_by;
    protected $_having;

    public static function make($options)
    {
        return new static($options);
    }

    protected function _get_arr_val($arr, $key, $default = null)
    {
        return isset($arr[$key]) ? $arr[$key] : $default;
    }

    public function __construct($options)
    {
        $this->select($this->_get_arr_val($options, 'select', '*'))
                ->from($this->_get_arr_val($options, 'from'))
                ->limit($this->_get_arr_val($options, 'limit'))
                ->offset($this->_get_arr_val($options, 'offset'))
                ->order_by($this->_get_arr_val($options, 'order_by'))
                ->group_by($this->_get_arr_val($options, 'group_by'));
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
        if ($this->_order_by)
        {
            $sql .= "\nORDER BY {$this->_order_by}";
        }
        if ($this->_group_by)
        {
            $sql .= "\nGROUP BY {$this->_group_by}";
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

    public function inner_join($table, $on_condition)
    {
        return $this->join($table, $on_condition, "INNER");
    }

    public function left_join($table, $on_condition)
    {
        return $this->join($table, $on_condition, 'LEFT');
    }

    public function right_join($table, $on_condition)
    {
        return $this->join($table, $on_condition, "RIGHT");
    }

    public function full_join($table, $on_condition)
    {
        $this->join($table, $on_condition, "FULL");
    }

    public function where($condition, $key = null)
    {
        if ($key)
        {
            $this->_where[$key] = $condition;
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

    public function order_by($field)
    {
        $this->_order_by = $field;
        return $this;
    }

    public function group_by($field)
    {
        $this->_group_by = $field;
    }

    public function having($condition)
    {
        $this->_having = $condition;
    }

}
