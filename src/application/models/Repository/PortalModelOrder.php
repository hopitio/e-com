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
                	 ORDER BY t_order_status.id DESC
                	 LIMIT 0, 1)
                {$statusQuery}
                ORDER BY t_order_status.updated_date DESC";
        $query = $this->_dbPortal->query($sql);
        return $query->result();
    }
    
    function getOrderWithCurrentStatus(){
        $sql = "SELECT	t_order.*,t_order_status.status
        FROM t_order INNER JOIN t_order_status ON t_order.id = t_order_status.fk_order
        WHERE t_order.id = {$this->id}
        AND  t_order_status.id =
            (SELECT t_order_status.id
            FROM t_order_status
            WHERE t_order_status.fk_order = t_order.id
            ORDER BY t_order_status.id DESC
            LIMIT 0, 1)
        ORDER BY t_order_status.updated_date DESC";
        $query = $this->_dbPortal->query($sql);
        return $query->result();
    }
    
    function findOrder($userAccount, $orderId, $createdDateStart, $createdDateEnd, $limit, $offset){
        $sql = "SELECT t_order.*,t_user.id AS t_user_id, t_user.account AS t_user_account
                                FROM t_order LEFT JOIN t_user ON t_order.fk_user = t_user.id
                                WHERE 
                                    (? = '' OR t_user.account LIKE CONCAT('%',?,'%'))
                                    AND 
                                    (? = '' OR t_order.id LIKE CONCAT('%',?,'%'))
                                    AND 
                                    (? = '1970-01-01' OR t_order.created_date > ?)
                                    AND
                                    (? = '1970-01-01' OR t_order.created_date < ?)
                                ORDER BY t_order.created_date DESC
                                LIMIT {$offset},{$limit}";
//         $sqlNonUserAccount = "SELECT t_order.*,'' AS t_user_id, '' AS t_user_account
//                               FROM t_order
//                                 WHERE 
//                                     (? = '' OR t_order.id LIKE CONCAT('%',?,'%'))
//                                     AND 
//                                     (? = '1970-01-01' OR t_order.created_date > ?)
//                                     AND
//                                     (? = '1970-01-01' OR t_order.created_date < ?)
//                                 ORDER BY t_order.created_date DESC
//                                 LIMIT {$offset},{$limit}";
//         $sql = ($userAccount == null || !isset($userAccount)) ? $sqlNonUserAccount : $sqlHaveUserAccount;
        
        $param = array(
            $userAccount,$userAccount,
            $orderId,$orderId,
            $createdDateStart,$createdDateStart,
            $createdDateEnd,$createdDateEnd
        );
        $query = $this->_dbPortal->query($sql,$param);
        return $query->result();
    }
    function findOrderCount($userAccount, $orderId, $createdDateStart, $createdDateEnd){
        $sql = "SELECT count(t_order.id) as count
                FROM t_order LEFT JOIN t_user ON t_order.fk_user = t_user.id
                WHERE
                    (? = '' OR t_user.account LIKE CONCAT('%',?,'%'))
                    AND
                    (? = '' OR t_order.id LIKE CONCAT('%',?,'%'))
                    AND
                    (? = '1970-01-01' OR t_order.created_date > ?)
                    AND
                    (? = '1970-01-01' OR t_order.created_date < ?)";
//         $sqlNonUserAccount = "SELECT count(t_order.id) as count
//                                 FROM t_order
//                                 WHERE
//                                 (? = '' OR t_order.id LIKE CONCAT('%',?,'%'))
//                                 AND
//                                 (? = '1970-01-01' OR t_order.created_date > ?)
//                                 AND
//                                 (? = '1970-01-01' OR t_order.created_date < ?)
//                                 ORDER BY t_order.created_date DESC";
//         $sql = ($userAccount == null || !isset($userAccount)) ? $sqlNonUserAccount : $sqlHaveUserAccount;
        $param = array(
            $userAccount,$userAccount,
            $orderId,$orderId,
            $createdDateStart,$createdDateStart,
            $createdDateEnd,$createdDateEnd
        );
        $query = $this->_dbPortal->query($sql,$param);

        return $query->result();
    }
    
    function getOrderByInvoices($invoices){
        $ordersId = array();
        foreach ($invoices as $invoice){
            array_push($ordersId, $invoice->fk_order);
        }
        return parent::getWhereIn(T_order::id, $ordersId);
    }
    
}