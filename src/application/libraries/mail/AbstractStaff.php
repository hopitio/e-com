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
    
    protected $to;
    protected $header;
    protected $mailData;
    protected $cc;
    protected $bcc;
    
    
    /**
     * Tự động tạo mail content từ nội dung cho trước.
     */
    protected abstract function createMailContent();
    
    /**
     * Gửi mail.
     */
    protected abstract function sendMail();
    
    /**
     * 
     * @param Array $mailData
     */
    function send($mailData){
        $this->createMailContent();
        $this->sendMail();	
    }
    
	/**
     * @param array $to
     */
    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }

	/**
     * @param array $header
     */
    public function setHeader($header)
    {
        $this->header = $header;
        return $this;
    }

	/**
     * @param array $mailData
     */
    public function setMailData($mailData)
    {
        $this->mailData = $mailData;
        return $this;
    }

	/**
     * @param array $cc
     */
    public function setCc($cc)
    {
        $this->cc = $cc;
        return $this;
    }

	/**
     * @param array $bcc
     */
    public function setBcc($bcc)
    {
        $this->bcc = $bcc;
        return $this;
    }

}