<?php

defined('BASEPATH') or die('no direct script access allowed');

class ProductModel extends BaseModel
{

    /** @return ProductFixedMapper */
    function getAllNewProduct()
    {
        $limit = get_instance()->config->item('limit_hot');
        $query = Query::make()->select('date_created, COUNT(*)', true)
                ->from('t_product')
                ->groupBy('date_created')
                ->orderBy('date_created DESC')
                ->limit(50);
        $countDate = DB::getInstance()->GetAssoc($query);
        $total = 0;
        foreach ($countDate as $date => $count)
        {
            $total += $count;
            if ($total >= $limit)
            {
                break;
            }
        }
        $mapper = ProductFixedMapper::make()
                ->select('p.*', true)
                ->autoloadAttributes()
                ->setLanguage(User::getCurrentUser()->languageKey)
                ->filterDateRange($date, null);
        $mapper->getQuery()
                ->select('seller.name AS seller_name')
                ->innerJoin('t_seller seller', 'seller.id = p.fk_seller');
        return $mapper->findAll(function($record, ProductFixedDomain $domain)
                {
                    $domain->seller_name = $record['seller_name'];
                });
    }

    function updateCountView($userID, $productID)
    {
        $app = get_instance();
        $db = DB::getInstance();
        $userID = (int) $userID;
        $sessionKey = __METHOD__ . $productID . date_create(DB::getDate())->format('d-m-Y');

        if ($app->session->userdata($sessionKey))
        {
            //chỉ cập nhật 1 lần trong ngày
            return;
        }

        $db->StartTrans();
        $recordID = $db->GetOne("SELECT id FROM t_product_view WHERE fk_user=? AND fk_product=?", array($userID, $productID));
        if (!$recordID)
        {
            DB::insert('t_product_view', array(
                'fk_product' => $productID,
                'fk_user'    => $userID,
                'count_view' => 1
            ));
        }
        else
        {
            $db->Execute("UPDATE t_product_view SET count_view = count_view + 1 WHERE fk_user=? AND fk_product=?", array($userID, $productID));
        }

        if ($db->CompleteTrans())
        {
            $app->session->set_userdata($sessionKey, true);
        }
    }

}
