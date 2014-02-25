<?php

defined('DS') or die;

class ou_Domain extends Domain_Model
{

    public $id;
    public $code_name;
    public $name;
    public $order;
    public $status;
    public $parent_id;
    public $internal_order;
    static protected $_mapper = array(
        'id' => 'PK_OU',
        'code_name' => 'C_CODE',
        'name' => 'C_NAME',
        'order' => 'C_ORDER',
        'status' => 'C_STATUS',
        'parent_id' => 'FK_PARENT',
        'internal_order' => 'C_INTERNAL_ORDER'
    );

    static function reset_query()
    {
        return parent::reset_query()
                        ->from('t_cores_ou')
                        ->where('C_STATUS=1', 'status')
                        ->order_by('C_INTERNAL_ORDER');
    }

    /**
     * 
     * @param type $id_or_code
     * @param type $fields
     * @return type
     */
    static function qry_single($id_or_code, $fields = '*')
    {
        $query = make_query()->select($fields)->from('t_cores_ou');
        $db = DB::get_instance();
        if (is_numeric($id_or_code))
        {
            return $db->GetRow($query->where('PK_OU=?'), array($id_or_code));
        }
        else
        {
            return $db->GetRow($query->where('C_CODE=?'), array($id_or_code));
        }
    }

    /**
     * 
     * @param string $fields
     * @param array $params
     * @param bool $assoc
     * @return type
     */
    static function qry_all($fields = '*', $params = array(), $assoc = false)
    {
        $db = DB::get_instance();
        static::$_query->select($fields);
        if ($assoc)
        {
            return $db->GetAssoc(static::$_query, $params);
        }
        else
        {
            return $db->GetAll(static::$_query, $params);
        }
    }

    function __construct($id_or_code = null)
    {
        parent::__construct();
        if ($id_or_code)
        {
            $this->import_array(static::qry_single($id_or_code));
        }
    }

}
