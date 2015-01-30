<?php
/**
 * class thực hiện việc chuyển mail Confirm
 * @author ANLT
 * @since 20140330
 */
class SellerOrderRejectedMailler extends AbstractStaff{
    protected $config_key = 'SellerOrderRejected';
    
    
    /* (non-PHPdoc)
     * @see AbstractStaff::buildContent()
     */
    protected function buildContent()
    {        
        $temp = $this->CI->config->item('temp_mail_view');
        $temp .= User::getCurrentUser()->languageKey.'/'.$this->config[MAILLER_TEMP];
        
        $order = $this->mailData['order'];
        $seller_name = '';
        $order_number = $order->id;
        $buyer_name = '';
        $buyer_contact = '';
        $buyer_phone = '';
        
        $this->preOrderInformation($order, $order_number, $seller_name, $buyer_name, $buyer_contact, $buyer_phone);
        $name = '';
        $order_number = $order->id;
        $help_url = '';
        
        $mailData = array('name'=>$seller_name,'orderNumber' => $order_number,'order'=>$order,'target'=>$this->to);
        return $this->CI->load->view($temp,$mailData,true);
    }

    /* (non-PHPdoc)
     * @see AbstractStaff::buildTitle()
     */
    protected function buildTitle()
    {
        $mailLanguage = MultilLanguageManager::getInstance()->getLangViaScreen('mail', $this->languageKey);
        $subject = $mailLanguage->SellerOrderRejected;
        return $subject;
    }

    private function preOrderInformation($order,&$order_number,&$seller_name,&$buyer_name,&$buyer_contact,&$buyer_phone){
        foreach ($order->invoice->products as $product){
            if($product->seller_email == $this->to){
                $seller_name = $product->seller_name;
                break;
            }
        }
        foreach ($order->invoice->products as &$product){
            if($product->seller_email != $this->to){
                $product->is_visiable = false;
            }else{
                $product->is_visiable = true;
            }
        }
        foreach ($order->invoice->shippings as $shipping)
        {
            if($shipping->shipping_type == DatabaseFixedValue::SHIPPING_TYPE_SHIP && $shipping->status == DatabaseFixedValue::SHIPPING_STATUS_ACTIVE){
               $buyer_name = $shipping->contact->full_name;
               $buyer_contact = "{$shipping->contact->street_address} , {$shipping->contact->city_district}, {$shipping->contact->state_province}";
               $buyer_phone = $shipping->contact->telephone;
               break;
            }
        }
        
    }
}