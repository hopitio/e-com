<?php
/**
 * class thực hiện việc chuyển mail Confirm
 * @author ANLT
 * @since 20140330
 */
class OrderFailToDeliveredMailler extends AbstractStaff{
    protected $config_key = 'OrderFailToDelivered';
    
    
    /* (non-PHPdoc)
     * @see AbstractStaff::buildContent()
     */
    protected function buildContent()
    {
        $order = $this->mailData['order'];
        $temp = $this->CI->config->item('temp_mail_view');
        $temp .= User::getCurrentUser()->languageKey.'/'.$this->config[MAILLER_TEMP];
        $name = '';
        $this->preOrderInformation($order, $name);
        $order_status_repository = new PortalModelOrderStatus();
        $order_status_repository->fk_order = $order->id;
        $status_result = $order_status_repository->getMutilCondition(T_order_status::id,"DESC");
        $status = $status_result[0];
        $mailData = array('order'=>$order,'name'=>$name,'status' => $status);
        return $this->CI->load->view($temp,$mailData,true);;
    }

	/* (non-PHPdoc)
     * @see AbstractStaff::buildTitle()
     */
    protected function buildTitle()
    {
        $mailLanguage = MultilLanguageManager::getInstance()->getLangViaScreen('mail', $this->languageKey);
        $order = $this->mailData['order'];
        $subject = $mailLanguage->OrderFailToDelivered;
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