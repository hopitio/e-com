<?php

defined('BASEPATH') or die('No direct script access allowed');

class OrderModel extends BaseModel
{

    /**
     * 
     * @param UserAddressDomain $address
     * @param CartDomain $cartContents
     * @param string $shippingMethod
     * @param string $shippingPrice
     * @return md5 uid
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
        $uid = md5(uniqid());
        DB::insert('t_order_evidence', array(
            'fk_user' => $user->id,
            'checksum' => $checksum,
            'date_created' => $now,
            'date_expired' => $expire,
            'unique_key' => $uid
        ));
        return $uid;
    }

    /**
     * @param string $orderEvidenceKey
     * @param string $checksum
     * @return boolean
     */
    function verifyOrderEvidence($orderEvidenceKey, $checksum)
    {
        $query = Query::make()
                ->select('id')
                ->from('t_order_evidence')
                ->where('unique_key=? AND checksum=? AND date_expired > NOW()');
        $record = DB::getInstance()->GetOne($query, array($orderEvidenceKey, $checksum));
        $ret = ((bool) $record);
        //cleanup
        DB::delete('t_order_evidence', 'unique_key=? AND checksum=? AND date_expired > NOW()', array($orderEvidenceKey, $checksum));
        return $ret;
    }

}
