<?php
/**
 * base cho toàn bộ các model khác của portal
 * @author ANLT
 * @since 20140325
 */
class PortalModelBase extends CI_Model
{
    CONST PORTAL_DB_GROUP = 'portal';
    protected  $_dbPortal;
    protected  $_constIntanceName = null;
    protected  $record_status = 'ACTIVE';
    protected  $created_at;
    
    
    static protected $_date;
    /**
     *
     * @param bool $forceQuery Lấy lại date từ DB, false lấy có sẵn
     * @return string
     */
    static function getDate($forceQuery = false)
    {
        if ($forceQuery || !static::$_date)
        {
            $CI = get_instance();
            $CI->load->database();
            $query = $CI->db->query("SELECT NOW() as 'now' ");
            $result = $query->result();
            static::$_date = $result[0]->now;
        }
        return static::$_date;
    }
    
    static function getUUID()
    {
        $CI = get_instance();
        $CI->load->database();
        $query = $CI->db->query("SELECT UUID() as 'UUID' ");
        $result = $query->result();
        return $result[0]->UUID;
    }
    
    function __construct(){
        parent::__construct();
        $this->initalDatabasePortal();
    }
    
	/**
	 * Khởi tạo kết nối database và đối tượng database của framework.
	 */
    protected function initalDatabasePortal()
    {
        $this->_dbPortal = $this->load->database(self::PORTAL_DB_GROUP,true);
    }
    
    /**
     * get function
     */
    public function getOneById()
    {
        if(!isset($this->_constIntanceName) || $this->_constIntanceName == null){
            throw new Lynx_Exception('Model không hỗ trợ');
        }
        
        $refl = new ReflectionClass($this->_constIntanceName);
        $propertiesList = $refl->getConstants();
        $class = $this->_constIntanceName;
        $id = $class::id;
        $this->_dbPortal->where($id,$this->id);
        $query = $this->_dbPortal->get($class::tableName);
        $result = $query->result();
        if(count($result) > 0)
        {
            $this->autoMappingObj($result[0]);
        }
        return $this;
    }
    
    public function insert()
    {
        if(!isset($this->_constIntanceName) || $this->_constIntanceName == null){
            throw new Lynx_Exception('Model không hỗ trợ');
        }
        
        $refl = new ReflectionClass($this->_constIntanceName);
        $propertiesList = $refl->getConstants();
        $class = $this->_constIntanceName;
        $this->created_at = self::getDate();
        $this->record_status = isset($this->record_status) ? $this->record_status : 'ACTIVE';
        
        $data = array();
        foreach ($propertiesList as $property){
            
            if($property == $class::tableName || !isset($this->$property) || $this->$property == null)
            {
                continue;
            }
            $data[$property] = $this->$property;
        }
        
        $this->_dbPortal->insert($class::tableName,$data);
        return $this->_dbPortal->insert_id();
    }
    
    public function updateById(){
        if(!isset($this->_constIntanceName) || $this->_constIntanceName == null){
            throw new Lynx_Exception('Model không hỗ trợ');
        }
        
        $refl = new ReflectionClass($this->_constIntanceName);
        $propertiesList = $refl->getConstants();
        $class = $this->_constIntanceName;
        $id = $class::id;
        $data = array();
        foreach ($propertiesList as $property){
            if($property == $class::tableName || !isset($this->$property) )
            {
                continue;
            }
            $data[$property] = $this->$property;
        }
        $this->_dbPortal->where($id,$this->$id);
        $this->_dbPortal->update($class::tableName,$data);
        //echo $this->_dbPortal->last_query();die;
        return $this->_dbPortal->insert_id();
    }
    
    /**
     * 
     * @param array $array là danh sách của model tương ứng
     */
    public function bacthInsert($objects)
    {
        if(!isset($this->_constIntanceName) || $this->_constIntanceName == null){
            throw new Lynx_Exception(__CLASS__ . ' '. __FUNCTION__ . 'Model không hỗ trợ');
        }
        $ids = array();
        $refl = new ReflectionClass($this->_constIntanceName);
        $propertiesList = $refl->getConstants();
        $class = $this->_constIntanceName;
        $id = $class::id;
        
        $data = array();
        foreach ($objects as &$obj)
        {
            if(get_class($this) != get_class($obj)){
                throw new Lynx_Exception(__CLASS__ . ' '. __FUNCTION__ . ' Gói dữ liệu chưa đúng');
            }
            $oneRow = array();
            foreach ($propertiesList as $property){
                $obj->created_at = self::getDate();
                $obj->record_status = isset($obj->record_status) ? $obj->record_status : 'ACTIVE';
                if($property == $class::tableName || !isset($obj->$property) || $obj->$property == null)
                {
                    continue;
                }
                $oneRow[$property] = $obj->$property;
            }
            
            $this->_dbPortal->insert($class::tableName,$oneRow);
            $oneRow[$id] = $this->_dbPortal->insert_id();
            $obj->id = $oneRow[$id];
            array_push($data, $oneRow);
        }
        return $objects;
    }
    
    /**
     * 
     * @param array row of query result
     */
    public function autoMappingObj($result)
    {
        $refl = new ReflectionClass($this->_constIntanceName);
        $propertiesList = $refl->getConstants();
        
        $class = $this->_constIntanceName;
        $data = array();
        foreach ($propertiesList as $property)
        {
            if($property == $class::tableName || !isset($result->$property) )
            {
                continue;
            }
            $this->$property = $result->$property;
        }
    }
    /**
     * lấy dữ liệu trong trường hợp có nhiều điều kiện. chỉ lấy từ 1 table.
     * @param string $orderProperty
     * @param string $orderLogic
     * @param number $limit
     * @param number $offset
     * @return multitype:
     */
    public function getMutilCondition($orderProperty = null,$orderLogic = 'asc',$limit = null, $offset = null)
    {
        $condition = array();
        $refl = new ReflectionClass($this->_constIntanceName);
        $propertiesList = $refl->getConstants();
        $class = $this->_constIntanceName;
        foreach ($propertiesList as $property){
            if($property == $class::tableName || !isset($this->$property) || $this->$property === null)
            {
                continue;
            }
            
            $condition[$property] = $this->$property;
        }
        if ($orderProperty != null)
        {
            $this->_dbPortal->order_by($orderProperty, $orderLogic);
        }
        if($limit != null){
            if($offset != null){
                $this->_dbPortal->limit($offset,$limit);
            }else{
                $this->_dbPortal->limit($limit);
            }
        }

        $queryResult = $this->_dbPortal->get_where($class::tableName,$condition);
        $result = $queryResult->result();
        $objCollection = array();
        foreach ($result as $row)
        {
            $item = clone $this;
            $item->autoMappingObj($row);
            array_push($objCollection, $item);
        }
        return $objCollection;
    }
    
    /**
     * Get Where in expected one col
     * @param unknown $property
     * @param unknown $values
     * @return multitype:
     */
    protected function getWhereIn($property,$values)
    {
        if(count($values) == 0)
        {
            return array();
        } 
        $class = $this->_constIntanceName;
        $this->_dbPortal->where_in($property,$values);
        $query = $this->_dbPortal->get($class::tableName);
        $result = $query->result();
        $queryResult = array();
        foreach ($result as $row)
        {
            $item = clone $this;
            $item->autoMappingObj($row);
            array_push($queryResult,$item);
        }
        return  $queryResult;
    }
    
    public function getSpeciallyColWithMutilCondition($colCollection, $orderProperty = null,$orderLogic = 'asc',$limit = null, $offset = null){
        $condition = array();
        $refl = new ReflectionClass($this->_constIntanceName);
        $propertiesList = $refl->getConstants();
        $class = $this->_constIntanceName;
        if(in_array(T_base::id, $colCollection)){
            array_push($colCollection, T_base::id);
        }
        $strSelect = "";
        foreach ($propertiesList as $property){
            if($property == $class::tableName || !isset($this->$property) || $this->$property === null)
            {
                continue;
            }
            if(in_array($property, $colCollection)){
                $strSelect .= "'{$property}',";
            }
            $condition[$property] = $this->$property;
        }
        if(strlen($strSelect) > 0){
            $strSelect =  $strSelect->substr($strSelect, 0, -1);
            $this->_dbPortal->select($strSelect);
        }
        
        if ($orderProperty != null)
        {
            $this->_dbPortal->order_by($orderProperty, $orderLogic);
        }
        if($limit != null){
            if($offset != null){
                $this->_dbPortal->limit($offset,$limit);
            }else{
                $this->_dbPortal->limit($limit);
            }
        }
        
        $queryResult = $this->_dbPortal->get_where($class::tableName,$condition);
        $result = $queryResult->result();
        return $result;
    }
    
    public function getCountOfConditions(){
        $condition = array();
        $refl = new ReflectionClass($this->_constIntanceName);
        $propertiesList = $refl->getConstants();
        $class = $this->_constIntanceName;
        foreach ($propertiesList as $property){
            if($property == $class::tableName || !isset($this->$property) || $this->$property === null)
            {
                continue;
            }
        
            $condition[$property] = $this->$property;
        }
        $this->_dbPortal->where($condition);
        $this->_dbPortal->from($class::tableName);
        return $this->_dbPortal->count_all_results();
    }

}