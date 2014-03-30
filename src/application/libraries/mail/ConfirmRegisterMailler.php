<?php
/**
 * class thực hiện việc chuyển mail Confirm
 * @author ANLT
 * @since 20140330
 */
class ConfirmRegisterMailler extends AbstractStaff{
    
    CONST CONFIRMREGISTERMAILLER_SMTP_HOST = 'ConfirmRegisterMailler_smtp_host';
    CONST CONFIRMREGISTERMAILLER_SMTP_USER = 'ConfirmRegisterMailler_smtp_user';
    CONST CONFIRMREGISTERMAILLER_SMTP_PASS = 'ConfirmRegisterMailler_smtp_pass';
    CONST CONFIRMREGISTERMAILLER_SMTP_PORT = 'ConfirmRegisterMailler_smtp_port';
    CONST CONFIRMREGISTERMAILLER_SMTP_TIMEOUT = 'ConfirmRegisterMailler_smtp_timeout';
    CONST CONFIRMREGISTERMAILLER_USERAGENT = 'ConfirmRegisterMailler_useragent';
    CONST CONFIRMREGISTERMAILLER_PROTOCOL = 'ConfirmRegisterMailler_protocol';
    CONST CONFIRMREGISTERMAILLER_SMTP_FULLNAME = 'ConfirmRegisterMailler_smtp_fullName';
    
    
    
    private $config = array(); 
    private $CI;
    
    function __construct(){
        $this->CI =& get_instance();
        $this->config = array();
        $this->config['protocol'] = $this->CI->config->item(self::CONFIRMREGISTERMAILLER_PROTOCOL);
        $this->config['useragent'] = $this->CI->config->item(self::CONFIRMREGISTERMAILLER_USERAGENT);
        $this->config['smtp_host'] = $this->CI->config->item(self::CONFIRMREGISTERMAILLER_SMTP_HOST);
        $this->config['smtp_user'] = $this->CI->config->item(self::CONFIRMREGISTERMAILLER_SMTP_USER);
        $this->config['smtp_pass'] = $this->CI->config->item(self::CONFIRMREGISTERMAILLER_SMTP_PASS);
        $this->config['smtp_port'] = $this->CI->config->item(self::CONFIRMREGISTERMAILLER_SMTP_PORT);
        $this->config['smtp_timeout'] = $this->CI->config->item(self::CONFIRMREGISTERMAILLER_SMTP_TIMEOUT);
        $this->config['mailtype'] =  'html';
        $this->config['newline'] = "\r\n";
        $this->CI->load->library('email');
        $this->CI->email->initialize($this->config);
    }
    
    /* (non-PHPdoc)
     * @see AbstractStaff::sendMail()
     */
    protected function sendMail()
    {
        $fullName = $this->CI->config->item(self::CONFIRMREGISTERMAILLER_SMTP_FULLNAME);
        $email = $this->CI->config->item(self::CONFIRMREGISTERMAILLER_SMTP_USER);
        $this->CI->email->from($email, $fullName);
        $this->CI->email->to($this->to);
        $mailLanguage = MultilLanguageManager::getInstance()->getLangViaScreen('mail', User::getCurrentUser()->languageKey);
        $this->CI->email->subject($mailLanguage->registerconfirm);
        $msg = $this->buildMailContent();
        $this->CI->email->message($msg);
        $this->CI->email->send();
        log_message('error', $this->CI->email->print_debugger());
    }
    
    /**
     * AUTO BUILD.
     */
    private function buildMailContent()
    {
        return $this->mailData['link'];;
    }
}