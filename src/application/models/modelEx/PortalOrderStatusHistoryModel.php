<?php
/**
 * @author ANLT
 * @since 20140409
 */
class PortalOrderStatusHistoryModel extends PortalBaseModel
{
    protected $_constIntanceName = 'T_order_status_history';
    var $id ;
    var $fk_order ;
    var $fk_status ;
    var $date_happened ;
    var $fk_creator ;
    var $date_created ;
    var $is_mail_sent ;
    
    function insertNewHistory(){
        $this->id = (new PortalCommonModel())->getUUID();
       return parent::insert();
    }
}