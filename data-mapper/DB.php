<?php

class DB
{

    /** @var \ADOConnection */
    static protected $_instance;

    /** @var \DB_Config */
    static protected $_config = array();

    /**
     * 
     * @param \DB_Config $config
     */
    static public function config(DB_Config $config)
    {
        static::$_config = $config;
    }

    /**
     * 
     * @global string $ADODB_CACHE_DIR
     * @return \ADOConnection
     */
    static public function get_instance()
    {
        if (static::$_instance == null)
        {
            if (!static::$_config)
            {
                throw new Exception('Chưa gọi ' . __CLASS__ . '::' . 'config()');
            }
            $config = static::$_config;
            static::$_instance = NewADOConnection($config->type);
            static::$_instance->debug = $config->debug;
            $conn_status = static::$_instance->Connect(
                    $config->host
                    , $config->user
                    , $config->password
                    , $config->database);
            if (!$conn_status)
            {
                throw new Exception('Lỗi kết nối CSDL');
            }
            global $ADODB_CACHE_DIR;
            $ADODB_CACHE_DIR = $config->cache_dir . 'ADODB/';

            static::$_instance->cacheSecs = 3600 * 24;
            static::$_instance->SetFetchMode(ADODB_FETCH_ASSOC);
        }
        return static::$_instance;
    }

    /**
     * 
     * @param string $table
     * @param array $data
     * @param string $where VD: '1=1 AND 2=2'
     * @param array $where_params 
     * @return int Số dòng được cập nhật
     */
    static public function update($table, $data, $where, $where_params = array())
    {
        $db = static::get_instance();
        $sql = "";
        $params = array_values($data);
        foreach ($data as $field => $value)
        {
            $sql .=!$sql ? "UPDATE {$table} SET {$field}={$value}" : ",{$field}={$value}";
        }
        $sql .= " Where $where";
        $params = array_merge($params, $where_params);
        $db->Execute($sql, $params);
        return $db->Affected_Rows();
    }

    /**
     * 
     * @param string $table
     * @param string $where VD: '1=1 AND 2=2'
     * @param array $where_params 
     * @param array $dependency Mảng các đối tượng phụ thuộc
     * @return int số bản ghi bị xóa
     */
    static public function delete($table, $where, $where_params = array())
    {
        $db = static::get_instance();
        $sql = "DELETE FROM {$table} WHERE $where";
        $db->Execute($sql, array_values($where_params));
        $affected = $db->Affected_Rows();
        return $affected;
    }

    /**
     * Insert một bản ghi
     * @param string $table
     * @param array $data mảng 1 chiều: array('col1' => $val1, 'col2' => $val2)
     * @return int ID vừa insert
     */
    static public function insert($table, $data)
    {
        $db = static::get_instance();
        $fields = array_keys($data);
        $values = array_values($data);

        $sql = "INSERT INTO {$table}(" . implode(',', $fields) . ')';
        $sql .= "\nVALUES(?" . str_repeat(',?', count($fields) - 1) . ')';

        $db->Execute($sql, $values);
        return $db->Insert_ID($table);
    }

    /**
     * 
     * @param string $table Tên bảng
     * @param array $data Mảng 2 chiều cần insert, VD: array(array('c1' => $v1, 'c2' => $v2), array('c1' => $v3, 'c2' => $v4))
     * @return bool Thành công hay thất bại
     */
    static public function insert_many($table, $data)
    {
        $data = array_values($data);
        $db = static::get_instance();
        $fields = array_keys($data[0]);
        $sql = "INSERT INTO $table(" . implode(',', $fields) . ") VALUES\n(?" . str_repeat(',?', count($fields) - 1) . ")";
        $params = array_values($data[0]);
        for ($i = 1; $i < count($data); $i++)
        {
            $sql .= "\n,(?" . str_repeat(',?', count($fields) - 1) . ")";
            $params = array_merge($params, $data[$i]);
        }
        $db->Execute($sql, $params);
        return ($db->ErrorNo() ? false : true);
    }

}

class DB_Config
{

    /** VD: mysql | mysqli */
    public $type;

    /** @var bool Chế độ debug */
    public $debug;

    /** Tên máy chủ */
    public $host;
    public $user;
    public $password;
    public $database;
    public $cache_dir;

}
