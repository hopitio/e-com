<?php
/**
 * class thực hiện việc chuyển mail Confirm
 * @author ANLT
 * @since 20140330
 */
class ResetPasswordRegisterMailler extends AbstractStaff{
    
    protected $config_key  = "ResetPasswordMailler";
    
    /* (non-PHPdoc)
     * @see AbstractStaff::sendMail()
     */
    protected function sendMail()
    {
        $fullName = $this->config[MAILLER_FULLNAME];
        $email = $this->config[MAILLER_USER];
        $this->CI->email->from($email, $fullName);
        $this->CI->email->to($this->to);
        $mailLanguage = MultilLanguageManager::getInstance()->getLangViaScreen('mail', $this->languageKey);
        $this->CI->email->subject($mailLanguage->registerconfirm);
        $msg = $this->buildMailContent();
        $this->CI->email->message($msg);
        $this->CI->email->send();
        //log_message('error' ,__CLASS__.' '.__METHOD__.$this->CI->email->print_debugger().' '.var_export($this->CI->email,true));
    }
    
    /**
     * AUTO BUILD.
     */
    private function buildMailContent()
    {
        $this->CI->load->helper('file');
        $temp = $this->CI->config->item('temp_mail_folder');
        $temp .= $this->languageKey.'/'. $this->config[MAILLER_TEMP];
        $mailContent = read_file($temp);
        $mailContent = str_replace('{time}',$this->mailData['time'],$mailContent);
        $mailContent = str_replace('{link}',$this->mailData['link'],$mailContent);
        return $mailContent;
    }
}