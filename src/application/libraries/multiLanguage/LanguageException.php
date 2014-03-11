<?php

class LanguageException extends Exception{
    public $status_code = '500';
    public $title = 'Language Exception';
    /**
     * 
     * @param string $msg
     * @param exception $e
     */
    public function __construct($message,$e = null , $code = '9999'){
        parent::__construct($message, $code);
        $this->message = $message;
    }
}

class LanguageNotSupported extends LanguageException{
    public $status_code = '500';
    public $title = 'Language not supported Exception';
}

class LableKeyNotFound extends LanguageException{
    public $status_code = '500';
    public $title = 'Lable Key Not Found Exception';
}