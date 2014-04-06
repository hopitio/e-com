<?php
/**
 * Hỗ trợ việc gửi mail
 * @author ANLT
 * @since 20140330
 */
class MailManager {
    CONST TYPE_RESG_COMFIRM = 'RESGTER_COMFRIM';
    CONST TYPE_RESETPASSWORD_COMFRIM = 'RESETPASSWORD_COMFRIM';
    CONST TYPE_NEWPASSWORD_NOFICATION = 'NEWPASSWORD_NOFICATION';
    
    /**
     * Người dùng request gửi mail.
     * @param string $type MailManager::CONST
     * @param string $target email address
     * @param array $mailData MailData
     */
    function requestSendMail($type,$target,$mailData){
        $staff;
        switch ($type){
        	case self::TYPE_RESG_COMFIRM:
                $staff = new ConfirmRegisterMailler();
        	    break;
        	case self::TYPE_RESETPASSWORD_COMFRIM:
        	    $staff = new ResetPasswordRegisterMailler();
        	    break;
        	case self::TYPE_NEWPASSWORD_NOFICATION:
        	    $staff = new NewPasswordMailler();
        	    break;
        	default:
        	    throw new Lynx_EmailException(__CLASS__.'::requestSendMail Không hỗ trợ định dạng mail này');
        	    break;
        }
        $staff->setMailData($mailData)->setTo($target)->send();
    }
    
    /**
     * @return MailManager  
     */
    static function initalAndSend($type,$target,$mailData){
        $mail = new MailManager();
        $mail->requestSendMail($type, $target, $mailData);
    } 
}