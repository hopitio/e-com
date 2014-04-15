<?php

/**
 * Lấy tỷ giá giao dịch ngoại tệ.
 * @author anlt
 *
 */
class Rate
{
    CONST VIETCOMBANK_RATE = 'VIETCOMBANK_RATE';
     
    /**
     * get rates reader 
     * @param unknown $rateBank
     * @return AbstractRateReaderProvides
     */
    static function getReader($rateBank = self::VIETCOMBANK_RATE) {
        switch ($rateBank){
            case self::VIETCOMBANK_RATE :
                return new VietcombankRate();
            break;
            default:
                return new VietcombankRate();
            break;
        }
    }
}