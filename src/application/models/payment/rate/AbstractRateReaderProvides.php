<?php
/**
 * Lấy tỷ giá giao dịch ngoại tệ.
 * @author anlt
 *
 */
abstract class AbstractRateReaderProvides
{
    protected  $returnValueService;
    protected  $path;
    protected function  readRateFromVietcomBank()
    {
        $xmlData = NULL;
        $p = xml_parser_create();
        xml_parse_into_struct($p,$this->path , $xmlData);
        xml_parser_free($p);
        $this->$returnValue = $xmlData;
    }
    /**
     * Lấy toàn bộ số tiền quy đổi từ VND
     */
    abstract function getRates();
    
    /**
     * Lấy tỷ giá từ số VND sang ngoại tệ 
     * eg : 1 USD = 20000 VND => tỷ giá : 1 VND = 1/20000;
     * @param string $current
     * @param string $target
     */
    abstract function getRatesConvert($current,$target);
}