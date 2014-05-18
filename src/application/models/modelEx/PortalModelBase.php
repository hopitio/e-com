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
        return count($result);
    }
    
    public function insert()
    {
        if(!isset($this->_constIntanceName) || $this->_constIntanceName == null){
            throw new Lynx_Exception('Model không hỗ trợ');
        }
        
        $refl = new ReflectionClass($this->_constIntanceName);
        $propertiesList = $refl->getConstants();
        $class = $this->_constIntanceName;
        
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
            if($property == $class::tableName || !isset($this->$property) || $this->$property == null)
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

}