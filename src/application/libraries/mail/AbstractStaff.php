<?php
/**
 * MAIL STAFF
 * @author ANLT
 * @since 20140327
 */
abstract class AbstractStaff 
{
    CONST MAIL_CONTENT_TYPE_HTML = 
        "MIME-Version: 1.0
         Content-type: text/html; charset=UTF-8
        ";
    CONST MAIL_CONTENT_TYPE_TEXT = "";
    
    /**
     * Hàm thực hiện việc gửi mail
     */
    protected abstract function sendMail();
    
    protected $to;
    protected $mailData;
    
	/**
     * @param field_type $to
     * @return AbstractStaff
     */
    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }
    
	/**
     * @param field_type $mailData
     * @return AbstractStaff
     */
    public function setMailData($mailData)
    {
        $this->mailData = $mailData;
        return $this;
    }

    /**
     * Thực hiện việc gửi mail
     */
    function send(){
        $this->sendMail();
    }
    
    


}