<?php
/**
 * class thực hiện việc chuyển mail Confirm
 * @author ANLT
 * @since 20140330
 */
class SellerPaymentVerifiedMailler extends AbstractStaff{
    protected $config_key = 'SellerPaymentVerified';

    
    /* (non-PHPdoc)
     * @see AbstractStaff::buildContent()
     */
    protected function buildContent()
    {
        $temp = $this->CI->config->item('temp_mail_view');
        $temp .= $this->languageKey.'/'.$this->config[MAILLER_TEMP];
        $this->mailData['target'] = $this->to;
        $order = $this->mailData['order'];
        $this->mailData['order'] = $this->preOrderInformation($order);
        return $this->CI->load->view($temp,$this->mailData,true);
    }

    /* (non-PHPdoc)
     * @see AbstractStaff::buildTitle()
     */
    protected function buildTitle()
    {
        $mailLanguage = MultilLanguageManager::getInstance()->getLangViaScreen('mail', $this->languageKey);
        $subject = $mailLanguage->SellerPaymentVerified;
        return $subject;
        
    } 
    
    
    private function preOrderInformation($order){
        foreach ($order->invoice->products as &$product){
            if($product->seller_email != $this->to){
                $product->is_visiable = false;
            }else{
                $product->is_visiable = true;
            }
        }
        return $order;
    }

}