<?php
/**
 * class thực hiện việc chuyển mail Confirm
 * @author ANLT
 * @since 20140330
 */
class OrderPlaceMailler extends AbstractStaff{
    protected $config_key = 'NewPasswordMailler';
    
    
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
        $this->CI->email->subject($mailLanguage->newpasswordNofication);
        $msg = $this->buildMailContent();
        $this->CI->email->message($msg);
        $this->CI->email->send();
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
        $mailContent = str_replace('{password}',$this->mailData['password'],$mailContent);
        return $mailContent;
    }    
}