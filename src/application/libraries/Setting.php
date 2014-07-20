<?php

/**
 * Lưu các setting của hệ thống
 */
class Setting
{

    static protected $_instance;
    protected $_data = array();
    protected $_db;
    protected $_key_changed = array();

    function __construct()
    {
        $this->_db = DB::getInstance();
        $this->_data = $this->_db->GetAssoc("SELECT `key`, `value`, autoload, class FROM t_setting WHERE autoload=1");
        register_shutdown_function(array($this, 'save'));
    }

    /** @return static */
    static function getInstance()
    {
        if (!static::$_instance)
        {
            static::$_instance = new static;
        }
        return static::$_instance;
    }

    /**
     * Nếu chưa autoload hoặc loadClass, class tự động query
     * @param string $key 
     * @return mixed
     */
    function get($key)
    {
        if (!isset($this->_data[$key]))
        {
            $this->_data[$key] = $this->_db->GetRow("SELECT `value`, autoload, class FROM t_setting WHERE key=?", array($key));
        }
        return $this->_data[$key]['value'];
    }

    /**
     * 
     * @param type $class load setting theo class. VD load các setting của module User
     * @return static
     */
    function loadClass($class)
    {
        $this->_data += $this->_db->GetAssoc("SELECT `key`, `value`, autoload, class FROM t_setting WHERE class=?", array($class));
        return $this;
    }

    /**
     * 
     * @param string $key
     * @param string $value nếu muốn xóa biến để value = null
     * @param bool $autoload true nếu muốn tự động load ngay lúc đầu
     * @param string $class để load setting theo class. VD load các setting của module user.
     * @return static
     */
    function set($key, $value, $autoload = false, $class = null)
    {
        $new_array = array('value' => $value, 'autoload' => $autoload, 'class' => $class);
        if (!isset($this->_data[$key]) || $this->_data[$key] !== $new_array)
        {
            $this->_key_changed[] = $key;
        }
        $this->_data[$key] = $new_array;
        return $this;
    }

    /**
     * Tự động 
     * @return static
     */
    function save()
    {
        foreach ($this->_key_changed as $key)
        {
            if ($this->_data[$key]['value'] == null)
            {
                DB::delete('t_setting', '`key`=?', array($key));
            }
            $exists = $this->_db->GetOne("SELECT id FROM t_setting WHERE `key`=?", array($key));
            if ($exists)
            {
                DB::update('t_setting', $this->_data[$key], 'id=?', array($exists));
            }
            else
            {
                DB::insert('t_setting', $this->_data[$key] + array('key' => $key));
            }
        }
        return $this;
    }

}
