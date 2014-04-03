<?php
/**
 * class thực hiện việc chuyển mail Confirm
 * @author ANLT
 * @since 20140330
 */
class ResetPasswordRegisterMailler extends AbstractStaff{
    
CONST LINK_KEY = 'link';
    CONST MAIL_TEMP_FILE_NAME = 'ResetPassword.txt';
    
    CONST ResetPasswordMailler_SMTP_HOST = 'ResetPasswordMailler_smtp_host';
    CONST ResetPasswordMailler_SMTP_USER = 'ResetPasswordMailler_smtp_user';
    CONST ResetPasswordMailler_SMTP_PASS = 'ResetPasswordMailler_smtp_pass';
    CONST ResetPasswordMailler_SMTP_PORT = 'ResetPasswordMailler_smtp_port';
    CONST ResetPasswordMailler_SMTP_TIMEOUT = 'ResetPasswordMailler_smtp_timeout';
    CONST ResetPasswordMailler_USERAGENT = 'ResetPasswordMailler_useragent';
    CONST ResetPasswordMailler_PROTOCOL = 'ResetPasswordMailler_protocol';
    CONST ResetPasswordMailler_SMTP_FULLNAME = 'ResetPasswordMailler_smtp_fullName';
    
    
    
    private $config = array(); 
    private $CI;
    
    function __construct(){
        $this->CI =& get_instance();
        $this->config = array();
        $this->config['protocol'] = $this->CI->config->item(self::ResetPasswordMailler_PROTOCOL);
        $this->config['useragent'] = $this->CI->config->item(self::ResetPasswordMailler_USERAGENT);
        $this->config['smtp_host'] = $this->CI->config->item(self::ResetPasswordMailler_SMTP_HOST);
        $this->config['smtp_user'] = $this->CI->config->item(self::ResetPasswordMailler_SMTP_USER);
        $this->config['smtp_pass'] = $this->CI->config->item(self::ResetPasswordMailler_SMTP_PASS);
        $this->config['smtp_port'] = $this->CI->config->item(self::ResetPasswordMailler_SMTP_PORT);
        $this->config['smtp_timeout'] = $this->CI->config->item(self::ResetPasswordMailler_SMTP_TIMEOUT);
        $this->config['mailtype'] =  'html';
        $this->config['newline'] = "\r\n";
        $this->CI->load->library('email');
        $this->CI->email->initialize($this->config);
     //log_message('error' ,__CLASS__.' '.__METHOD__.$this->CI->email->print_debugger());
    }
    
    /* (non-PHPdoc)
     * @see AbstractStaff::sendMail()
     */
    protected function sendMail()
    {
        $fullName = $this->CI->config->item(self::ResetPasswordMailler_SMTP_FULLNAME);
        $email = $this->CI->config->item(self::ResetPasswordMailler_SMTP_USER);
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
        
        $mailContent = str_replace('{time}',$this->mailData['time'],$mailContent);
        $mailContent = str_replace('{link}',$this->mailData['link'],$mailContent);
        
        return $mailContent;
    }
}