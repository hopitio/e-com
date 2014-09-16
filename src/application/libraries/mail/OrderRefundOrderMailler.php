<?php
/**
 * class thực hiện việc chuyển mail Confirm
 * @author ANLT
 * @since 20140330
 */
class OrderRefundOrder extends AbstractStaff{
    protected $config_key = 'OrderRefundOrder';
    
    /* (non-PHPdoc)
     * @see AbstractStaff::buildContent()
     */
    protected function buildContent()
    {
        $temp = $this->CI->config->item('temp_mail_view');
        $temp .= User::getCurrentUser()->languageKey.'/'.$this->config[MAILLER_TEMP];
        
        $data = array();
        $data['orderId'] = $this->mailData['order']->id;
        $data['comment'] = $this->mailData['order']->invoice->comment;
        $order = $this->mailData['order'];
        foreach ($order->invoice->shippings as $shipping){
            $contact = $shipping->contact;
            if($shipping->status != DatabaseFixedValue::SHIPPING_STATUS_ACTIVE){
                continue;
            }
            $data['name'] = $contact->full_name;
            break;
        }
        return $this->CI->load->view($temp,$data,true);
    }

	/* (non-PHPdoc)
     * @see AbstractStaff::buildTitle()
     */
    protected function buildTitle()
    {
        $mailLanguage = MultilLanguageManager::getInstance()->getLangViaScreen('mail', $this->languageKey);
        return $mailLanguage->orderRefuned;
    }
}