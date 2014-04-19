<?php
/**
 * Xứ lý các Dữ liệu liên quan đến common trong SQL 
 * @author ANLT
 * @since 20140402
 */
class PortalModelCommon extends PortalModelBase
{
    /**
     * Lấy key không trùng lặp
     */
    function getUUID(){
        $sql = "SELECT UUID() as ID";
        $query = $this->_dbPortal->query($sql);
        foreach($query->result() as $row)
        {
            return $row->ID;
        }
    }
}