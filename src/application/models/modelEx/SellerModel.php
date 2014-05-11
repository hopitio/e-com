<?php

defined('BASEPATH') or die('No direct script access allowed');

class SellerModel extends BaseModel
{
    /**
     * 
     * @param string $userId default value = -1;
     * @param string $shopName default value = null;
     * @param number $pageSize default value = 100;
     * @param number $pageNumber default value = 1;
     */
    function findSeller($userId = '',$shopName = '',$pageSize = 100,$pageNumber = 1)
    {
        $query = Query::make()
        ->from('t_seller')
        ->where("( ? = '' OR t_seller.fk_manager  LIKE CONCAT('%', ? ,'%') ) 
                    AND
	               ( ? = '' OR t_seller.name LIKE CONCAT('%', ? ,'%') )
                ")
        ->limit($pageSize,$pageSize * $pageNumber);
        $queryInclude = array(
            $userId,
            $userId,
            $shopName,
            $shopName
        );
        
        $record = DB::getInstance()->GetAll($query,$queryInclude);
        return $record;
    }
    
    /**
     * 
     * @param unknown $userId
     * @param unknown $shopName
     * @return Ambigous <multitype:, boolean>
     */
    function findSellerCount($userId,$shopName){
        $query = Query::make()
        ->select('count(id) as total')
        ->from('t_seller')
        ->where("( ? = '' OR t_seller.fk_manager  LIKE CONCAT('%', ? ,'%') ) 
                    AND
	               ( ? = '' OR t_seller.name LIKE CONCAT('%', ? ,'%') )
                ");
        $queryInclude = array(
            $userId,
            $userId,
            $shopName,
            $shopName
        );
        $record = DB::getInstance()->getRow($query, $queryInclude);
        return $record;
    }
}
