<?php
/**
 * class thực hiện việc chuyển mail Confirm
 * @author ANLT
 * @since 20140330
 */
class ConfirmRegisterMailler extends AbstractStaff{
    
    CONST LINK_KEY = 'link';
    CONST MAIL_TEMP_FILE_NAME = 'RegisterConfirm.txt';
    
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
    }
    
    /**
     * AUTO BUILD.
     */
    private function buildMailContent()
    {
        if(!isset($this->mailData[self::LINK_KEY]))
        {
            throw new Lynx_EmailException(__CLASS__.'::'.__METHOD__.' DATA INVALID');
            
        }
        
        $this->CI->load->helper('file');
        $temp = $this->CI->config->item('temp_mail_folder');
        $temp .= User::getCurrentUser()->languageKey.'/'.self::MAIL_TEMP_FILE_NAME;
        $mailContent = read_file($temp);
        $mailContent = str_replace('{link}',$this->mailData[self::LINK_KEY],$mailContent);
        return $mailContent;
    }
}