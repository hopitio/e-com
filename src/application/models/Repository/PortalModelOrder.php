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
    
    function getOrderWithCurrentStatus($ordersId){
        $ordersCollection = implode(",", $ordersId);
        $sql = 
        "SELECT	t_order.*,t_order_status.status
        FROM t_order INNER JOIN t_order_status ON t_order.id = t_order_status.fk_order
        WHERE t_order.id in ({$ordersCollection})
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
    
    function getSearchSellerOrder($sellerId, $productsId, $orderStatus, $startedAt = null, $endedAt = null, $limit, $offset){
        $sql = "SELECT DISTINCT user_order.id,  
                    (SELECT t_order_status.status FROM t_order_status 
                         WHERE user_order.id = t_order_status.fk_order
                         ORDER BY t_order_status.created_at DESC LIMIT 1) AS 'status'
                FROM t_order AS user_order
                    INNER JOIN t_invoice AS invoice ON user_order.id = invoice.fk_order
                    INNER JOIN t_invoice_product ON invoice.id = t_invoice_product.fk_invoice
                    INNER JOIN t_product AS product ON t_invoice_product.fk_product = product.id
                WHERE ('' = ? OR product.sub_id IN (?))
                AND   ('' = ? OR ? = (SELECT t_order_status.status FROM t_order_status 
                            WHERE user_order.id = t_order_status.fk_order
                            ORDER BY t_order_status.created_at DESC LIMIT 1))
                AND   ('' = ? OR ? >= (SELECT t_order_status.updated_date FROM t_order_status 
                            WHERE user_order.id = t_order_status.fk_order
                            ORDER BY t_order_status.created_at DESC LIMIT 1) )
                AND   ('' = ? OR ? <= (SELECT t_order_status.updated_date FROM t_order_status 
                            WHERE user_order.id = t_order_status.fk_order
                            ORDER BY t_order_status.created_at DESC LIMIT 1) )
                AND   product.seller_id = ? 
                ORDER BY user_order.created_at DESC
                LIMIT ?,?";
        $productsId = is_array($productsId) && count($productsId) == 0 ? "" : $productsId;
        $productsId = is_array($productsId) ? implode(",",$productsId) : $productsId;
        $startedAt = $startedAt == null ? "2000-01-01 00:00:00" : $startedAt;
        $endedAt = $endedAt == null ? "2900-01-01 00:00:00" : $endedAt;
        $limit = intval($limit);
        $offset = intval($offset);
        $param = array (
                $productsId,$productsId,
                $orderStatus,$orderStatus, 
                $endedAt,$endedAt,
                $startedAt,$startedAt,
                $sellerId,
                $offset,$limit
        );
        $query = $this->_dbPortal->query($sql,$param);
        return $query->result();
    }
    
    function getSearchSellerOrderCountAllResult($sellerId, $productsId, $orderStatus, $startedAt, $endedAt){
        $sql = "SELECT DISTINCT user_order.id as 'id'
                FROM t_order AS user_order
                    INNER JOIN t_invoice AS invoice ON user_order.id = invoice.fk_order
                    INNER JOIN t_invoice_product ON invoice.id = t_invoice_product.fk_invoice
                    INNER JOIN t_product AS product ON t_invoice_product.fk_product = product.id
                WHERE ('' = ? OR product.sub_id IN (?))
                AND   ('' = ? OR ? = (SELECT t_order_status.status FROM t_order_status
                            WHERE user_order.id = t_order_status.fk_order
                            ORDER BY t_order_status.created_at DESC LIMIT 1))
                AND   ('' = ? OR ? >= (SELECT t_order_status.updated_date FROM t_order_status
                            WHERE user_order.id = t_order_status.fk_order
                            ORDER BY t_order_status.created_at DESC LIMIT 1) )
                AND   ('' = ? OR ? <= (SELECT t_order_status.updated_date FROM t_order_status
                            WHERE user_order.id = t_order_status.fk_order
                            ORDER BY t_order_status.created_at DESC LIMIT 1) )
                AND   product.seller_id = ?";
        
        $productsId = is_array($productsId) && count($productsId) == 0 ? "" : $productsId;
        $productsId = is_array($productsId) ? implode(",",$productsId) : $productsId;
        $startedAt = $startedAt == null ? "2000-01-01 00:00:00" : $startedAt;
        $endedAt = $endedAt == null ? "2900-01-01 00:00:00" : $endedAt;
        $param = array (
                $productsId,$productsId,
                $orderStatus,$orderStatus,
                $endedAt,$endedAt,
                $startedAt,$startedAt,
                $sellerId
        );
        $query = $this->_dbPortal->query($sql,$param);
        return $query->result();
    }
}