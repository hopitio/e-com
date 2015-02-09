<?php
/**
 * class thực hiện việc chuyển mail Confirm
 * @author ANLT
 * @since 20140330
 */
class OrderRejectedMailler extends AbstractStaff{
    protected $config_key = 'OrderReject';
    
    
    /* (non-PHPdoc)
     * @see AbstractStaff::buildContent()
     */
    protected function buildContent()
    {
        $order = $this->mailData['order'];
        $temp = $this->CI->config->item('temp_mail_view');
        $temp .= $this->languageKey.'/'.$this->config[MAILLER_TEMP];
        $name = '';
        $this->preOrderInformation($order, $name);
        $mailData = array('order'=>$order,'name'=>$name);
        return $this->CI->load->view($temp,$mailData,true);;
    }

	/* (non-PHPdoc)
     * @see AbstractStaff::buildTitle()
     */
    protected function buildTitle()
    {
        $mailLanguage = MultilLanguageManager::getInstance()->getLangViaScreen('mail', $this->languageKey);
        $order = $this->mailData['order'];
        $subject = $mailLanguage->OrderRejected;
        $subject = str_replace('{order_number}',$order->id,$subject);
        return $subject;
    }
    
    
    private function preOrderInformation($order,&$name){
    
        foreach ($order->invoice->shippings as $shipping){
            $contact = $shipping->contact;
            if($shipping->status != DatabaseFixedValue::SHIPPING_STATUS_ACTIVE){
                continue;
            }
            //TODO: DEMO ĐỊA CHỈ MAIL ĐỂ TEST NÊN THỬ LẠI.
            if($this->to == $contact->email_contact ||
            $this->to == 'lethanhan.bkaptech@gmail.com')
            {
                $name = $contact->full_name;
                break;
            }
        }
    }
}