<?php

defined('DS') or die;

class Model
{

    /** @var \ADOConnection */
    public $db;

    /** @param $db \ADOConnection */
    public function __construct()
    {
        $this->db = DB::get_instance();
    }

    /**
     * Insert vào CSDL
     * @param string $table Tên bảng
     * @param array $arr_data Mảng dữ liệu
     * @param string $pk Tên khóa chính
     * @return int ID vừa tạo hoặc FALSE nếu thất bại 
     * @throws Exception
     */
    static public function insert($table, $arr_data, $pk = null)
    {
        if (!is_array($arr_data))
        {
            throw new Exception('$arr_data Phải là array $k=>$v');
        }
        if (empty($arr_data))
        {
            throw new Exception('$arr_data Không được empty()');
        }
        if ($pk != null && strval($pk) != '')
        {
            $v_id = DB::get_instance()->GenID('_' . md5($table));
            $arr_data[$pk] = $v_id;
        }
        $sql = "Insert Into $table(" . implode(',', array_keys($arr_data)) . ") Values(?" . str_repeat(',?', count($arr_data) - 1) . ")";
        $result = DB::get_instance()->Execute($sql, array_values($arr_data));
        if ($result)
        {
            return isset($v_id) ? $v_id : true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Update CSDL
     * @param string $table Tên bảng
     * @param array $arr_data Mảng dữ liệu
     * @param string $where Điều kiện. VD: '1=1'
     * @param array $params Mảng tham số
     * @return int Số bản ghi Update hoặc FALSE
     * @throws Exception
     */
    static public function update($table, $arr_data, $where, $where_params = array())
    {
        if (!is_array($arr_data))
        {
            throw new InvalidArgumentException('$arr_data Phải là array $k=>$v');
        }
        if (empty($arr_data))
        {
            throw new InvalidArgumentException('$arr_data Không được empty()');
        }
        $sql = '';
        $params = array();
        foreach ($arr_data as $k => $v)
        {
            $sql .= strlen($sql) > 0 ? ",$k=?" : "Update $table Set $k=?";
            array_push($params, $v);
        }
        $sql .= " Where $where";
        $result = DB::get_instance()->Execute($sql, array_merge($params, $where_params));
        if ($result == false)
        {
            return false;
        }
        else
        {
            return DB::get_instance()->Affected_Rows();
        }
    }

    /**
     * 
     * @param string $table Tên bảng
     * @param string $where Điều kiện
     * @param array $params Tham số
     * @return int Số bản ghi xóa hoặc FALSE
     */
    static public function delete($table, $where, $params = array())
    {
        $sql = "Delete From $table Where $where";
        $result = DB::get_instance()->Execute($sql, $params);
        if ($result == false)
        {
            return false;
        }
        else
        {
            return DB::get_instance()->Affected_Rows();
        }
    }

    /**
     * @param type $arr_opts
     * @param string $table
     * @param string $pk_col
     * @param string $order_col
     * @param string $where
     * @param string $where_params
     */
    static public function rebuild_order($arr_opts)
    {
        $db = DB::get_instance();
        //xử lý tham số
        $v_table = $arr_opts['table'];
        $v_pk_col = $arr_opts['pk_col'];
        $v_order_col = $arr_opts['order_col'];
        $v_where = isset($arr_opts['where']) ? $arr_opts['where'] : '1=1';
        $arr_where_params = isset($arr_opts['where_params']) ? $arr_opts['where_params'] : array();
        //lấy danh sách cần update
        $query = make_query()
                ->select($v_pk_col)
                ->from($v_table)
                ->order_by($v_order_col);
        if ($v_where)
        {
            $query->where($v_where);
        }
        $arr_items = $db->GetCol($query, $arr_where_params);
        //update
        foreach ($arr_items as $v_index => $v_id)
        {
            static::update($v_table, array($v_order_col => $v_index + 1), "{$v_pk_col}={$v_id}");
        }
    }

    /**
     * @param type $arr_opts
     * @param string $table
     * @param string $pk_col
     * @param string $parent_col
     * @param string $order_col
     * @param string $internal_order_col
     * @param int $start_node
     * @param string $where
     * @param string $where_params
     */
    static public function rebuild_internal_order($arr_opts)
    {
        $db = DB::get_instance();
        //xử lý tham số
        $v_table = $arr_opts['table'];
        $v_pk_col = $arr_opts['pk_col'];
        $v_parent_col = $arr_opts['parent_col'];
        $v_order_col = $arr_opts['order_col'];
        $v_internal_order_col = $arr_opts['internal_order_col'];
        $v_start_node = isset($arr_opts['start_node']) ? $arr_opts['start_node'] : null;
        $v_where = isset($arr_opts['where']) ? $arr_opts['where'] : '1=1';
        $arr_where_params = isset($arr_opts['where_params']) ? $arr_opts['where_params'] : array();

        if ($v_start_node)
        {
            $v_root_conds = $v_where . " AND $v_pk_col = $v_start_node";
        }
        else
        {
            $v_root_conds = $v_where . " AND $v_parent_col IS NULL";
            //order root
            static::rebuild_order(array(
                'table' => $v_table,
                'pk_col' => $v_pk_col,
                'order_col' => $v_order_col,
                'where' => $v_root_conds,
                $arr_where_params
            ));
            //update root internal order
            $db->Execute("UPDATE $v_table SET $v_internal_order_col = " . $db->Concat($v_order_col, "'/'")
                    . " WHERE $v_root_conds");
        }
        //query root stack
        $query = make_query()
                ->select("$v_pk_col, $v_order_col, $v_internal_order_col")
                ->from($v_table)
                ->where($v_root_conds);
        $arr_stack = $db->GetAll($query, $arr_where_params);
        if (empty($arr_stack))
        {
            return;
        }
        //duyet stack
        do
        {
            //parent
            $arr_single = array_shift($arr_stack);
            $v_id = $arr_single[$v_pk_col];
            $v_internal_order = $arr_single[$v_internal_order_col];

            //order chilren
            static::rebuild_order(array(
                'table' => $v_table,
                'pk_col' => $v_pk_col,
                'order_col' => $v_order_col,
                'where' => $v_where . " AND $v_parent_col = $v_id",
                $arr_where_params
            ));
            //update internal order
            $db->Execute("UPDATE $v_table SET $v_internal_order_col = " . $db->Concat("'$v_internal_order'", 'C_ORDER', "'/'")
                    . " WHERE $v_where AND $v_parent_col = $v_id");
            //query children
            $query = make_query()
                    ->select("$v_pk_col, $v_order_col, $v_internal_order_col")
                    ->from($v_table)
                    ->where($v_where . " AND $v_parent_col = $v_id")
                    ->order_by($v_order_col);
            $arr_children = $db->GetAll($query, $arr_where_params);
            //push stack
            $arr_stack = array_merge($arr_stack, $arr_children);
        }
        while (!empty($arr_stack));
    }

    function exec_done($url)
    {
        if (!$url)
        {
            throw new InvalidArgumentException('$url không được rỗng');
        }
        header('Location: ' . $url);
        exit;
    }

    function exec_fail($url, $msg)
    {
        if (!$url)
        {
            throw new InvalidArgumentException('$url không được rỗng');
        }
        echo '<html>'
        . '<body>'
        . '<script>'
        . 'var msg = ' . json_encode($msg) . '; alert(msg);'
        . "window.location='$url'"
        . '</script>'
        . '</body>'
        . '</html>';
        exit;
    }

    const NOTIFY_TYPE_SUCCESS = 'success';
    const NOTIFY_TYPE_WARN = 'warn';
    const NOTIFY_TYPE_INFO = 'info';
    const NOTIFY_TYPE_ERROR = 'error';

    /**
     * @param CONST $type
     * @param string $url
     * @param string $msg
     * @throws InvalidArgumentException
     */
    function exec_notify($type, $url, $msg)
    {
        if (!in_array($type, array(static::NOTIFY_TYPE_ERROR, static::NOTIFY_TYPE_INFO, static::NOTIFY_TYPE_SUCCESS, static::NOTIFY_TYPE_WARN)))
        {
            throw new InvalidArgumentException('Sử dụng Model::NOTIFY_TYPE_* truyền vào $type');
        }
        if (!$url)
        {
            throw new InvalidArgumentException('$url không được rỗng');
        }
        Session::notify($type, $msg);
        $this->exec_done($url);
    }

    function exec_retry($msg = null)
    {
        if ($msg)
        {
            Session::notify('error', $msg);
        }
        die('<html><body><script>window.history.back();</script></body></html>');
    }

}
