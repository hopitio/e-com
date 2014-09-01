<?php

defined('BASEPATH') or die('No direct script access allowed');

require_once __DIR__ . DIRECTORY_SEPARATOR . "adodb5" . DIRECTORY_SEPARATOR . "adodb-exceptions.inc.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "adodb5" . DIRECTORY_SEPARATOR . "adodb.inc.php";

class DB
{

    const DEFAULT_INSTANCE = 'lynx';

    /** @var \ADOConnection */
    static protected $_instances = array();

    /** @var \DB_Config */
    static protected $_configs = array();
    static protected $_date;

    /**
     * 
     * @param \DB_Config $config
     */
    static public function config($name, DBConfig $config)
    {
        static::$_configs[$name] = $config;
    }

    /**
     * 
     * @global string $ADODB_CACHE_DIR
     * @return \ADOConnection
     */
    static public function getInstance($name = 'lynx')
    {
        if (!isset(static::$_instances[$name]))
        {
            if (!static::$_configs[$name])
            {
                throw new Exception('Chưa gọi ' . __CLASS__ . '::' . 'config()');
            }
            $config = static::$_configs[$name];
            static::$_instances[$name] = NewADOConnection($config->type);
            static::$_instances[$name]->debug = $config->debug;
            $conn_status = static::$_instances[$name]->Connect(
                    $config->host
                    , $config->user
                    , $config->password
                    , $config->database);
            if (!$conn_status)
            {
                throw new Exception('Lỗi kết nối CSDL');
            }
            static::$_instances[$name]->SetFetchMode(ADODB_FETCH_ASSOC);
            static::$_instances[$name]->SetCharSet('utf8');
        }
        return static::$_instances[$name];
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
        $db = static::getInstance();
        $sql = "";
        $params = array_values($data);
        foreach ($data as $field => $value)
        {
            $sql .=!$sql ? "UPDATE {$table} SET {$field}=?" : ",{$field}=?";
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
        $db = static::getInstance();
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
        $db = static::getInstance();
        $fields = array_keys($data);
        array_walk($fields, function(&$item)
        {
            $item = '`' . trim($item, '`') . '`';
        });
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
    static public function insertMany($table, $arr_data)
    {
        if (!is_array($arr_data))
        {
            throw new InvalidArgumentException('$arr_data Phải là array $k=>$v');
        }
        if (empty($arr_data))
        {
            throw new InvalidArgumentException('$arr_data Không được empty()');
        }
        $sql = "Insert Into $table(" . implode(',', array_keys($arr_data[0])) . ") Values";
        $values = '';
        $params = array();
        foreach ($arr_data as $data)
        {
            $values.= ($values ? ',' : '') . "(?" . str_repeat(',?', count($data) - 1) . ")";
            $params = array_merge($params, array_values($data));
        }
        DB::getInstance()->Execute($sql . $values, $params);
    }

    /**
     * 
     * @param bool $forceQuery Lấy lại date từ DB, false lấy có sẵn
     * @return string
     */
    static function getDate($forceQuery = false)
    {
        if ($forceQuery || !static::$_date)
        {
            static::$_date = static::getInstance()->GetOne('SELECT NOW()');
        }
        return static::$_date;
    }

}

class DBConfig
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
    public $cacheDir;

}
