<?php

defined('BASEPATH') or die('No direct script access allowed');

class cartModel extends BaseModel
{

    /**
     * 
     * @param ShippingLocationDomain $location
     * @param double $sumWeight
     * @param Currency $toCurrency
     * @return double
     */
    function calculateShippingPrice(ShippingLocationDomain $location, $sumWeight, Currency $toCurrency)
    {
        $price = $location->basePrice;
        $bulkyWeight = max(array(0, $sumWeight - $location->bulkyWeight));
        $overWeight = max(array(0, $sumWeight - $location->baseWeight - $bulkyWeight));
        if ($location->weightStep)
        {
            $price += ceil($overWeight / $location->weightStep) * $location->weightStepPrice;
        }
        if ($location->bulkyWeightStep)
        {
            $price += ceil($bulkyWeight / $location->bulkyWeightStep) * $location->bulkyStepPrice;
        }
        $price = new Money($price, new Currency('VND'));
        return $price->convert($toCurrency)->getAmount();
    }

}
