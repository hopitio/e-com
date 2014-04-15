<?php
/**
 * Lấy tỷ giá giao dịch ngoại tệ từ ngân hàng vietcombank
 * @author anlt
 *
 */
class VietcombankRate extends  AbstractRateReaderProvides
{
    function __construct(){
        $this->path = get_instance()->config->item('rate_vietcombank_url');
        $this->readRateFromVietcomBank();
    }
	/* (non-PHPdoc)
     * @see AbstractRateReaderProvides::getRates()
     */
    public function getRates()
    {
        $mydate = $this->returnValueService['1']['value'];
        $data = array();
        if ($this->returnValueService)
        {
            foreach ($this->returnValueService as $v)
                if (isset($v['attributes']))
                {
                    $data[] = $v['attributes'];
                }
        }
        return $data;
    }

	/* (non-PHPdoc)
     * @see AbstractRateReaderProvides::getRatesConvert()
     */
    public function getRatesConvert($current = 'VND', $target)
    {
        if(!isset($target) && $target == null){
            throw new Lynx_BusinessLogicException(__CLASS__.' '.__FUNCTION__. ' Tên loại tiền định chuyển không phù hợp' );
        }
        return 1/20000;
    }

    
}