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
        $this->_dbPortal->where($class::id,$this->$id);
        $query = $this->_dbPortal->get($class::tableName);
        
        $result = $query->result();
        if(count($result) <= 0){
            return false;
        }
        foreach($propertiesList as $property)
        {
            if(isset($this->$property))
            {
                $this->$property = $result[0]->$property;
            }
        }
        return true;
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
        
        $refl = new ReflectionClass($this->_constIntanceName);
        $propertiesList = $refl->getConstants();
        $class = $this->_constIntanceName;
        $id = $class::id;
        
        $data = array();
        foreach ($objects as $obj)
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
            array_push($data, $oneRow);
        }
        
        return $this->_dbPortal->insert_batch($class::tableName,$data);
    }
    
    /**
     * 
     * @param array $result
     */
    public function autoMappingObj($result)
    {
        $refl = new ReflectionClass($this->_constIntanceName);
        $propertiesList = $refl->getConstants();
        $class = $this->_constIntanceName;
        $data = array();
        foreach ($propertiesList as $property){
        
            if($property == $class::tableName || !isset($this->$property) )
            {
                continue;
            }
            if(isset($result->$property)){
            	continue;
            }
            $this->$property = $result->$property;
        }
    }
}