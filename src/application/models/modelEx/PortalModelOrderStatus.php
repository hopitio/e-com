<?php
class PortalModelOrderStatus extends PortalModelBase
{
   protected $_constIntanceName = 'T_order_status';
    var $id;
    var $fk_order;
    var $status;
    var $updated_user;
    var $updated_date;
    var $comment;
}