<?php

defined('BASEPATH') or die('no direct script access allowed');

class PinModel extends BaseModel
{

    /**
     * 
     * @return PinDomain
     */
    function getAllPin($limit, $offset)
    {
        $mapper = PinMapper::make()
                ->autoloadAttributes()
                ->setLanguage(User::getCurrentUser()->languageKey)
                ->autoloadTaxes()
                ->setUser(User::getCurrentUser()->id)
                ->select('p.*', true);
        $mapper->getQuery()->select('seller.name AS seller_name')
                ->innerJoin('t_seller seller', 'seller.id=p.fk_seller')
                ->orderBy('pin.id DESC')
                ->limit($limit, $offset);
        return $mapper->findAll(function($rawData, $instance)
                {
                    $instance->seller_name = $rawData['seller_name'];
                });
    }

    /**
     * 
     * @param type $userID
     * @param type $productID
     * @throws Lynx_BusinessLogicException
     */
    function pin($userID, $productID)
    {
        if (!$userID || !$productID)
        {
            throw new Lynx_RequestException("UserID & productID cant be null");
        }
        DB::insert('t_pin', array(
            'fk_user'    => $userID,
            'fk_product' => $productID
        ));
    }

    function unpin($productID)
    {
        DB::delete('t_pin', 'fk_user=? AND fk_product=?', array(User::getCurrentUser()->id, $productID));
    }

}
