<?php
/**
 * class thực hiện việc chuyển mail Confirm
 * @author ANLT
 * @since 20140330
 */
class NewPasswordMailler extends AbstractStaff{
    
    CONST MAIL_TEMP_FILE_NAME = 'NewPassword.txt';
    
    CONST NewPasswordMailler_SMTP_HOST = 'NewPasswordMailler_smtp_host';
    CONST NewPasswordMailler_SMTP_USER = 'NewPasswordMailler_smtp_user';
    CONST NewPasswordMailler_SMTP_PASS = 'NewPasswordMailler_smtp_pass';
    CONST NewPasswordMailler_SMTP_PORT = 'NewPasswordMailler_smtp_port';
    CONST NewPasswordMailler_SMTP_TIMEOUT = 'NewPasswordMailler_smtp_timeout';
    CONST NewPasswordMailler_USERAGENT = 'NewPasswordMailler_useragent';
    CONST NewPasswordMailler_PROTOCOL = 'NewPasswordMailler_protocol';
    CONST NewPasswordMailler_SMTP_FULLNAME = 'NewPasswordMailler_smtp_fullName';
    
    
    
    private $config = array(); 
    private $CI;
    
    function __construct(){
        $this->CI =& get_instance();
        $this->config = array();
        $this->config['protocol'] = $this->CI->config->item(self::NewPasswordMailler_PROTOCOL);
        $this->config['useragent'] = $this->CI->config->item(self::NewPasswordMailler_USERAGENT);
        $this->config['smtp_host'] = $this->CI->config->item(self::NewPasswordMailler_SMTP_HOST);
        $this->config['smtp_user'] = $this->CI->config->item(self::NewPasswordMailler_SMTP_USER);
        $this->config['smtp_pass'] = $this->CI->config->item(self::NewPasswordMailler_SMTP_PASS);
        $this->config['smtp_port'] = $this->CI->config->item(self::NewPasswordMailler_SMTP_PORT);
        $this->config['smtp_timeout'] = $this->CI->config->item(self::NewPasswordMailler_SMTP_TIMEOUT);
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
        $fullName = $this->CI->config->item(self::NewPasswordMailler_SMTP_FULLNAME);
        $email = $this->CI->config->item(self::NewPasswordMailler_SMTP_USER);
        $this->CI->email->from($email, $fullName);
        $this->CI->email->to($this->to);
        $mailLanguage = MultilLanguageManager::getInstance()->getLangViaScreen('mail', User::getCurrentUser()->languageKey);
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
        $temp .= User::getCurrentUser()->languageKey.'/'.self::MAIL_TEMP_FILE_NAME;
        $mailContent = read_file($temp);
        
        $mailContent = str_replace('{time}',$this->mailData['time'],$mailContent);
        $mailContent = str_replace('{password}',$this->mailData['password'],$mailContent);
        
        return $mailContent;
    }
}