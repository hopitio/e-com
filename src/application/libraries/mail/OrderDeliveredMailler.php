<?php
/**
 * class thực hiện việc chuyển mail Confirm
 * @author ANLT
 * @since 20140330
 */
class OrderDeliveredMailler extends AbstractStaff{
    protected $config_key = 'OrderDelivered';
    
    /* (non-PHPdoc)
     * @see AbstractStaff::buildContent()
     */
    protected function buildContent()
    {
        $order = $this->mailData['order'];
        $temp = $this->CI->config->item('temp_mail_view');
        $temp .= User::getCurrentUser()->languageKey.'/'.$this->config[MAILLER_TEMP];
        
        $name = '';
        $order_number = $order->id;
        $help_url = '';
        $this->preOrderInformation($order, $name, $order_number,$help_url);
        $mailData = array('name'=>$name,'orderNumber' => $order_number);
        return $this->CI->load->view($temp,$mailData,true);;
        
    }

    /* (non-PHPdoc)
     * @see AbstractStaff::buildTitle()
     */
    protected function buildTitle()
    {
        $mailLanguage = MultilLanguageManager::getInstance()->getLangViaScreen('mail', $this->languageKey);
        $order = $this->mailData['order'];
        $subject = $mailLanguage->OrderDelivered;
        $subject = str_replace('{order_number}',$order->id,$subject);
        return $subject; 
    }

    private function preOrderInformation($order,&$name,&$order_number,&$help_url){

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
        $help_url = '/portal/help';
        $help_url = Common::getCurrentHost().$help_url;
    }
}