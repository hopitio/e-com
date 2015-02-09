<?php
/**
 * class thực hiện việc chuyển mail Confirm
 * @author ANLT
 * @since 20140330
 */
class OrderShippingMailler extends AbstractStaff{
    protected $config_key = 'OrderShipping';
    
    /* (non-PHPdoc)
     * @see AbstractStaff::buildContent()
    */
    protected function buildContent()
    {
        $temp = $this->CI->config->item('temp_mail_view');
        $temp .= $this->languageKey.'/'.$this->config[MAILLER_TEMP];
        return $this->CI->load->view($temp,$this->mailData,true);
    }
    
    /* (non-PHPdoc)
     * @see AbstractStaff::buildTitle()
    */
    protected function buildTitle()
    {
        $mailLanguage = MultilLanguageManager::getInstance()->getLangViaScreen('mail', $this->languageKey);
        $order = $this->mailData['order'];
        $subject = $mailLanguage->OrderShipping;
        $subject = str_replace('{order_number}',$order->id,$subject);
        return $subject;
    }
}