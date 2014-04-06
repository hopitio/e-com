<?php

defined('BASEPATH') or die('No direct script access allowed');

class OrderEvidenceModel extends BaseModel
{

    /**
     * 
     * @param UserAddressDomain $address
     * @param CartDomain $cartContents
     * @param string $shippingMethod
     * @param string $shippingPrice
     * @return int t_order_evidence.id
     */
    function generateEvidence(UserAddressDomain $address, $cartContents, $shippingMethod, $shippingPrice)
    {
        $user = User::getCurrentUser();
        $stringToHash = $user->account;
        $now = DB::getDate();
        $expire = date_add(date_create($now), new DateInterval('P3D'))->format('Y-m-d H:i');
        foreach (get_object_vars($address) as $item)
        {
            $stringToHash .= $item;
        }
        foreach ($cartContents as $cartInstance)
        {
            $stringToHash .= $cartInstance->id . $cartInstance->quantity . $cartInstance->calculatePrice('USD');
        }
        $stringToHash .= $shippingMethod . $shippingPrice;
        $checksum = md5($stringToHash);
        return DB::insert('t_order_evidence', array(
                    'fk_user' => $user->id,
                    'checksum' => $checksum,
                    'date_created' => $now,
                    'date_expired' => $expire
        ));
    }

}
