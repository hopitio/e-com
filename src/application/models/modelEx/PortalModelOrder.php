<?php
class PortalModelOrder extends PortalModelBase
{
    protected $_constIntanceName = 'T_order';
    var $id,$sub_key,$fk_user,$created_user,$created_date,$shiped_date,$canceled_date,$completed_date;
    
    function getOrderWithStatus($statusName = null)
    {
        $statusQuery = "AND  t_order_status.status = '{$statusName}'";
        if($statusName == null){
            $statusQuery= "";
        }
        $sql = "SELECT	t_order.*,t_order_status.status
                FROM t_order INNER JOIN t_order_status ON t_order.id = t_order_status.fk_order
                WHERE t_order.fk_user = {$this->fk_user}
                AND  t_order_status.id =
                	(SELECT t_order_status.id
                	 FROM t_order_status
                	 WHERE t_order_status.fk_order = t_order.id
                	 ORDER BY t_order_status.updated_date DESC 
                	 LIMIT 0, 1)
                {$statusQuery}";
        $query = $this->_dbPortal->query($sql);
        return $query->result();
    }
}