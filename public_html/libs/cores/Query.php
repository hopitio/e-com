<?php

defined('DS') or die;

class Query
{

    protected $_select;
    protected $_from;
    protected $_join = array();
    protected $_where = array();
    protected $_order_by;
    protected $_limit;
    protected $_offset;

    /**
     * 
     * @param type $fields
     * @return \Query
     */
    function select($fields = '*')
    {
        $this->_select = $fields;
        return $this;
    }

    /**
     * 
     * @param type $table
     * @return \Query
     */
    function from($table)
    {
        $this->_from = $table;
        return $this;
    }

    /**
     * 
     * @param type $table
     * @param type $on_conditions
     * @return \Query
     */
    function join($table, $on_conditions)
    {
        $this->_join[] = "JOIN $table ON $on_conditions";
        return $this;
    }

    /**
     * 
     * @param type $table
     * @param type $on_conditions
     * @return \Query
     */
    function inner_join($table, $on_conditions)
    {
        $this->_join[] = "INNER JOIN $table ON $on_conditions";
        return $this;
    }

    /**
     * 
     * @param type $table
     * @param type $on_conditions
     * @return \Query
     */
    function left_join($table, $on_conditions)
    {
        $this->_join[] = "LEFT JOIN $table ON $on_conditions";
        return $this;
    }

    /**
     * 
     * @param type $table
     * @param type $on_conditions
     * @return \Query
     */
    function full_join($table, $on_conditions)
    {
        $this->_join[] = "FULL JOIN $table ON $on_conditions";
        return $this;
    }

    /**
     * 
     * @param type $table
     * @param type $on_conditions
     * @return \Query
     */
    function right_join($table, $on_conditions)
    {
        $this->_join[] = "RIGHT JOIN $table ON $on_conditions";
        return $this;
    }

    /**
     * 
     * @param type $conds
     * @param type $where_key
     * @return \Query
     */
    function where($conds, $where_key = null)
    {
        if ($where_key OR $where_key === 0 OR $where_key === '0')
        {
            $this->_where[$where_key] = $conds;
        }
        else
        {
            $this->_where[] = $conds;
        }
        return $this;
    }

    /**
     * 
     * @param type $fields
     * @return \Query
     */
    function order_by($fields)
    {
        $this->_order_by = $fields;
        return $this;
    }

    /**
     * 
     * @param type $limit
     * @param type $offset
     * @return \Query
     */
    function limit($limit, $offset = null)
    {
        $this->_limit = $limit;
        $this->_offset = $offset;
        return $this;
    }

    /**
     * 
     * @param type $offset
     * @return \Query
     */
    function offset($offset)
    {
        $this->_offset = $offset;
        return $this;
    }

    /**
     * 
     * @return string
     */
    function __toString()
    {
        $sql = "SELECT {$this->_select} FROM {$this->_from}";
        if (!empty($this->_join))
        {
            $sql .= "\n" . implode("\n", $this->_join);
        }
        if (!empty($this->_where))
        {
            $sql .= "\nWHERE " . implode("\n AND ", $this->_where);
        }
        if (!empty($this->_order_by))
        {
            $sql .= "\nORDER BY {$this->_order_by}";
        }
        if (!empty($this->_limit))
        {
            $sql .= "\nLIMIT {$this->_limit}";
            if (!empty($this->_offset))
            {
                $sql .= "\nOFFSET {$this->_offset}";
            }
        }
        return $sql;
    }

}

/**
 * 
 * @return \Query
 */
function make_query()
{
    return new Query();
}
