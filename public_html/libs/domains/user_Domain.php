<?php

defined('DS') or die;

class user_Domain extends Domain_Model
{

    public $id;
    public $fullname;
    public $account;
    public $password;
    public $ou_id;
    public $status = 1;
    public $is_admin = 0;
    protected static $_mapper = array(
        'id' => 'PK_USER',
        'fullname' => 'C_FULLNAME',
        'account' => 'C_ACCOUNT',
        'password' => 'C_PASSWORD',
        'ou_id' => 'PK_OU',
        'status' => 'C_STATUS',
        'is_admin' => 'C_IS_ADMIN',
    );

    /**
     * @param type $id_or_account
     */
    function __construct($id_or_account = null)
    {
        if ($id_or_account)
        {
            if (is_numeric($id_or_account))
            {
                $this->import_array(static::qry_single_by_id($id_or_account));
            }
            else
            {
                $this->import_array(static::qry_single_by_account($id_or_account));
            }
        }
    }

    /**
     * @param int $user_id
     * @param string $fields
     * @return array
     */
    static function qry_single_by_id($user_id, $fields = '*')
    {
        return DB::get_instance()->GetRow(make_query()->select($fields)->from('t_cores_user')->where('PK_USER=?'), array($user_id));
    }

    /**
     * @param string $user_account
     * @param string $fields
     * @return array
     */
    static function qry_single_by_account($user_account, $fields = '*')
    {
        return DB::get_instance()->GetRow(make_query()->select($fields)->from('t_cores_user')->where('C_ACCOUNT=?'), array($user_account));
    }

    static function reset_query()
    {
        parent::reset_query();
        static::$_query
                ->from('t_cores_user')
                ->order_by('PK_USER');
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

    /**
     * 
     * @param array $params
     * @return int
     */
    static function count_all($params = array())
    {
        return DB::get_instance()->GetOne(static::$_query->select('COUNT(*)'), $params);
    }

}
