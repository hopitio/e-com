<?php
/**
 * Cung cấp toàn bộ hàm cho việc mã hóa và giải mã
 * @author ANLT
 * @since 20140331
 */
class EncryptionStrategy {
    
    /**
     * 
     * @var SecretLogin
     */
    private $_login;
    /**
     *
     * @var SecretOrder
     */
    private $_order;
    /**
     * 
     * @var AccountSecurity
     */
    private $_account;
    
    function __construct($login,$order,$account){
        $this->_account = $account;
        $this->_login = $login;
        $this->_order = $order;
    }
    
    /**
     * Thực hiện việc mã hóa active account id.
     * @param string $userId
     * @param string $account
     * @param string $datejoin
     * @return string
     */
    function accountActiveEncrytion($userId,$account,$datejoin){
        return $this->_account->accountActiveEncrytion($userId, $account, $datejoin);
    }
    
    /**
     * Giải mã active account id.
     * @param string $encoded
     * @return array
     */
    function accountActiveDencrytion($encoded){
        return $this->_account->accountActiveDencrytion($encoded);
    }
    
    /**
     * Thực hiện việc mã hóa secret key.
     * @param string $userid
     * @param string $subSessionId
     * @return string
     */
    function encrytSecretLogin($userid,$subSessionId){
        return $this->_login->encrytSecretLogin($userid, $subSessionId);
    }
    
    /**
     * create Ecrytion item. 
     * @param string $orderid
     * @param string $sessionSub
     * @param string $userId
     * @return string
     */
    function encrytSecretOrder($orderid,$sessionSub,$userId){
        return $this->_order->encrytSecretOrder($orderid, $sessionSub, $userId);
    }
    
    /**
     * Data of order.
     * @param mixed $data
     * @return string
     */
    function encrytOrderData($data){
        return $this->_order->encrytOrderData($data);
    }
    
    /**
     * @return EncryptionStrategy
     */
    static function inital(){
        $login = new SecretLogin();
        $order = new SecretOrder();
        $account = new AccountSecurity();
        return new EncryptionStrategy($login,$order,$account);
    }
}