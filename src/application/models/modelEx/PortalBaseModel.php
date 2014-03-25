<?php
/**
 * base cho toàn bộ các model khác của portal
 * @author ANLT
 * @since 20140325
 */
class PortalBaseModel extends CI_Model
{
    CONST PORTAL_DB_GROUP = 'portal';
    protected  $_dbPortal;
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
}