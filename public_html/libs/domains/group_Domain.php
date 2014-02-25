<?php

defined('DS') or die;

class group_Domain extends Domain_Model
{

    public $id;
    public $name;
    public $code_name;
    public $status = 1;
    protected static $_mapper = array(
        'id' => 'PK_GROUP',
        'name' => 'C_NAME',
        'code_name' => 'C_CODE_NAME',
        'status' => 'C_STATUS'
    );

    function __construct($id_or_code = null)
    {
        if ($id_or_code)
        {
            if (is_numeric($id_or_code))
            {
                $this->import_array(static::qry_single_by_id($id_or_code));
            }
            else
            {
                $this->import_array(static::qry_single_by_code($id_or_code));
            }
        }
    }

    /**
     * @param int $group_id
     * @param string $fields
     * @return array
     */
    static function qry_single_by_id($group_id, $fields = '*')
    {
        return DB::get_instance()->GetRow(make_query()->select($fields)->from('t_cores_group')->where('PK_GROUP=?'), array($group_id));
    }

    /**
     * @param string $group_code
     * @param string $fields
     * @return array
     */
    static function qry_single_by_code($group_code, $fields = '*')
    {
        return DB::get_instance()->GetRow(make_query()->select($fields)->from('t_cores_group')->where('C_CODE_NAME=?'), array($group_code));
    }

    static function reset_query()
    {
        parent::reset_query();
        static::$_query->from('t_cores_group')
                ->order_by('PK_GROUP');
    }

    /**
     * @param string $fields
     * @param array $params
     * @return array
     */
    static function qry_all($fields = '*', $params = array())
    {
        return DB::get_instance()->GetAll(static::$_query->select($fields), $params);
    }

    static function count_all($params = array())
    {
        return DB::get_instance()->GetOne(static::$_query->select('COUNT(*)'), $params);
    }

    /**
     * @param int $ou_id
     */
    static function filter_ou($ou_id)
    {
        static::$_query->where('FK_OU=' . intval($ou_id), __METHOD__);
    }

}
