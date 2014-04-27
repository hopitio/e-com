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

}
