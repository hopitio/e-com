<?php
/**
 * Xử lý các database mapping và access từ tầng này
 * @author ANLT
 * @since 20140402
 */
class PortalModelUserHistory extends PortalModelBase
{
    protected $_constIntanceName = 'T_user_history';
    var $id;
    var $fk_user;
    var $secret_key;
    var $client_ip;
    var $user_agrent;
    var $last_activity;
    var $sub_system_name;
    var $description;
    var $action_name;
    var $session_id;
    var $action_date;
    /**
     * insert user history.
     */
    function insertNewHistory(){
        if(!isset($this->action_date) || $this->action_date == null ){
            $this->action_date = date(DatabaseFixedValue::DEFAULT_FORMAT_DATE);
        }
        return parent::insert();
    }
    
    /**
     * get lastest user login into system.
     * @return boolean
     */
    function getLastUserAction(){
        $condition = array(
            T_user_history::fk_user=>$this->fk_user,
            T_user_history::sub_system_name => $this->sub_system_name,
            T_user_history::action_name=>$this->action_name
        );
        $this->_dbPortal->order_by(T_user_history::last_activity,'asc');
        $queryResult = $this->_dbPortal->get_where(T_user_history::tableName,$condition,1);
        $result = $queryResult->result();
        if(count($result) <= 0){
            return false;
        }
        foreach($queryResult->result() as $row)
        {
            $this->id = $row->id;
            $this->fk_user = $row->fk_user;
            $this->client_ip = $row->client_ip;
            $this->secret_key = $row->secret_key;
            $this->sub_system_name = $row->sub_system_name;
            $this->description = $row->description;
            $this->last_activity = $row->last_activity;
            $this->user_agrent = $row->user_agrent;
            $this->action_name = $row->action_name;
            $this->session_id = $row->session_id;
            break;
        
        }
        return  true;
    }
    
    /**
     * get history thông qua key.
     */
    function getByHistoryId(){
        $condition = array(
            T_user_history::id=>$this->id,
            T_user_history::fk_user => $this->fk_user
        );
        $this->_dbPortal->order_by(T_user_history::last_activity,'asc');
        $queryResult = $this->_dbPortal->get_where(T_user_history::tableName,$condition,1);
        $result = $queryResult->result();
        if(count($result) <= 0){
            return false;
        }
        
        foreach($queryResult->result() as $row)
        {
            $this->id = $row->id;
            $this->fk_user = $row->fk_user;
            $this->client_ip = $row->client_ip;
            $this->secret_key = $row->secret_key;
            $this->sub_system_name = $row->sub_system_name;
            $this->description = $row->description;
            $this->last_activity = $row->last_activity;
            $this->user_agrent = $row->user_agrent;
            $this->action_name = $row->action_name;
            $this->session_id = $row->session_id;
            break;
        
        }
        return  true;
    }
    
    function getUserLastAction(){
        $condition = array();
        if (isset($this->secret_key))
        {
            $condition[T_user_history::secret_key] = $this->secret_key;
        }
        if (isset($this->secret_key))
        {
            $condition[T_user_history::sub_system_name] = $this->secret_key;
        }
        
        if (isset($this->secret_key))
        {
            $condition[T_user_history::action_name] = $this->action_name;
        }
        
        $this->_dbPortal->order_by(T_user_history::last_activity, 'asc');
        $queryResult = $this->_dbPortal->get_where(T_user_history::tableName, 
            $condition, 1);
        $result = $queryResult->result();
        if(count($result) <= 0)
        {
            return false;
        }else {
            $this->autoMappingObj($result);
            return true;
        }
    }
    
    function getUserHistory($userId,$startDate,$endDate,$limit,$offset = 0)
    {

        $sql = "SELECT * FROM t_user_history
                WHERE 
                    ( ? = '' OR t_user_history.action_date > ?) 
                    AND 
                    ( ? = '' OR t_user_history.action_date < ?) 
                    AND 
                    t_user_history.fk_user = ?
                ORDER BY t_user_history.action_date DESC
                LIMIT {$offset},{$limit}";
        $param = array($startDate,$startDate,$endDate,$endDate,$userId);
        $query = $this->_dbPortal->query($sql,$param);
        $results = $query->result();
        $histories = array();
        foreach ($results as $result)
        {
            $history = new PortalModelUserHistory();
            $history->autoMappingObj($result);
            $histories[] = $history;
        }
        return $histories;
    }
    
    function getUserHistoryCount($userId,$startDate,$endDate)
    {
    
        $sql = "SELECT count(id) as id FROM t_user_history
                WHERE 
                    ( ? = '' OR t_user_history.action_date > ?) 
                    AND 
                    ( ? = '' OR t_user_history.action_date < ?) 
                    AND 
                    t_user_history.fk_user = ?";
        $param = array($startDate,$startDate,$endDate,$endDate,$userId);
        $query = $this->_dbPortal->query($sql,$param);
        $results = $query->result();
        $count = 0;
        foreach ($results as $result)
        {
            $count = $result->id;
        }
        return $count;
    }
}