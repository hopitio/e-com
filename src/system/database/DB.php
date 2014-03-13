<?php

defined('BASEPATH') or die('No direct script access allowed');

require_once __DIR__ . DIRECTORY_SEPARATOR . "adodb5" . DIRECTORY_SEPARATOR . "adodb.inc.php";

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
    static public function config(DBConfig $config)
    {
        static::$_config = $config;
    }

    /**
     * 
     * @global string $ADODB_CACHE_DIR
     * @return \ADOConnection
     */
    static public function getInstance()
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
            static::$_instance->SetFetchMode(ADODB_FETCH_ASSOC);
            static::$_instance->SetCharSet('utf8');
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
    static public function insertMany($table, $data)
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

/**
 * Initialize the database
 *
 * @category	Database
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/database/
 * @param 	string
 * @param 	bool	Determines if active record should be used or not
 * @return \ADOConnection
 */
function DB($params = '', $active_record_override = NULL)
{
    // Load the DB config file if a DSN string wasn't passed
    if (is_string($params) AND strpos($params, '://') === FALSE)
    {
        // Is the config file in the environment folder?
        if (!defined('ENVIRONMENT') OR !file_exists($file_path = APPPATH . 'config/' . ENVIRONMENT . '/database.php'))
        {
            if (!file_exists($file_path = APPPATH . 'config/database.php'))
            {
                show_error('The configuration file database.php does not exist.');
            }
        }

        include($file_path);

        if (!isset($db) OR count($db) == 0)
        {
            show_error('No database connection settings were found in the database config file.');
        }

        if ($params != '')
        {
            $active_group = $params;
        }

        if (!isset($active_group) OR !isset($db[$active_group]))
        {
            show_error('You have specified an invalid database connection group.');
        }

        $params = $db[$active_group];
    }
    elseif (is_string($params))
    {

        /* parse the URL from the DSN string
         *  Database settings can be passed as discreet
         *  parameters or as a data source name in the first
         *  parameter. DSNs must have this prototype:
         *  $dsn = 'driver://username:password@hostname/database';
         */

        if (($dns = @parse_url($params)) === FALSE)
        {
            show_error('Invalid DB Connection String');
        }

        $params = array(
            'dbdriver' => $dns['scheme'],
            'hostname' => (isset($dns['host'])) ? rawurldecode($dns['host']) : '',
            'username' => (isset($dns['user'])) ? rawurldecode($dns['user']) : '',
            'password' => (isset($dns['pass'])) ? rawurldecode($dns['pass']) : '',
            'database' => (isset($dns['path'])) ? rawurldecode(substr($dns['path'], 1)) : ''
        );

        // were additional config items set?
        if (isset($dns['query']))
        {
            parse_str($dns['query'], $extra);

            foreach ($extra as $key => $val)
            {
                // booleans please
                if (strtoupper($val) == "TRUE")
                {
                    $val = TRUE;
                }
                elseif (strtoupper($val) == "FALSE")
                {
                    $val = FALSE;
                }

                $params[$key] = $val;
            }
        }
    }

    // No DB specified yet?  Beat them senseless...
    if (!isset($params['dbdriver']) OR $params['dbdriver'] == '')
    {
        show_error('You have not selected a database type to connect to.');
    }

    $config = new DBConfig;
    $config->type = $params['dbdriver'];
    $config->host = $params['hostname'];
    $config->user = $params['username'];
    $config->password = $params['password'];
    $config->database = $params['database'];
    $config->debug = false;

    DB::config($config);
    return DB::getInstance();
}
