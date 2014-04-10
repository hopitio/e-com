<?php
/**
 * @author ANLT
 * @since 20140409
 */
class PoralOrderStatusHistoryModel extends PortalBaseModel
{
    protected $_constIntanceName = 'T_order_status_history';
    var $id ;
    var $fk_order ;
    var $fk_status ;
    var $date_happened ;
    var $fk_creator ;
    var $date_created ;
    var $is_mail_sent ;
}