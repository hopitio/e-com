<?php

defined('BASEPATH') or die('No direct script access allowed');

class cartModel extends BaseModel
{

    /**
     * Tính chi phí vận chuyển 
     * @param type $shippingMethodCode
     * @param type $locationCode
     * @param string $toCurency Chuyển đổi tỉ giá
     * @return double
     * @throws Lynx_RequestException
     */
    function calculateShippingPrice($shippingMethodCode, $locationCode, $toCurrency = 'USD')
    {
        $query = Query::make()
                ->select('sl.price, sl.price_currency')
                ->from('t_shipping_location sl')
                ->innerJoin('t_shipping_method sm', 'sl.fk_shipping_method = sm.id AND sm.codename=?')
                ->innerJoin('t_location l', 'l.id=sl.fk_location AND l.codename=?');
        $record = DB::getInstance()->getRow($query, array($shippingMethodCode, $locationCode));
        if (!$record)
        {
            throw new Lynx_RequestException('Không tìm thấy giá cho shipping');
        }
        //TODO
        return $record['price'];
    }

}
