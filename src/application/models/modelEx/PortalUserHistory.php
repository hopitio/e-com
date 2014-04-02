<?php
/**
 * Xử lý các database mapping và access từ tầng này
 * @author ANLT
 * @since 20140402
 */
class PortalUserHistoryModel extends PortalBaseModel
{
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
    
    /**
     * insert user history.
     */
    function insertNewHistory(){
        $data = array(
            T_user_history::id => $this->id,
            T_user_history::fk_user => $this->fk_user,
            T_user_history::client_ip => $this->client_ip,
            T_user_history::secret_key => $this->secret_key,
            T_user_history::last_activity => $this->last_activity,
            T_user_history::sub_system_name => $this->sub_system_name,
            T_user_history::description => $this->description,
            T_user_history::action_name => $this->action_name,
            T_user_history::session_id => $this->session_id
        );
        $this->_dbPortal->insert(T_user_history::tableName,$data);
        return $this->_dbPortal->insert_id();
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
}