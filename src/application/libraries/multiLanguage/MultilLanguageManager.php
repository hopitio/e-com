<?php
/**
 * Thực hiện việc quản lý đa ngôn ngữ.
 * Using singleton, strategy.
 * @author ANLT
 * @since 20140310
 */
class MultilLanguageManager
{
    /**
     * @var MultilLanguageManager
     */
    
    private static $instance = null;
    /**
     * @var AbstractLoadLanguage
     */
    private $_loadLanguage;
    
    
    function __construct($loadLanguge){
       $this->_loadLanguage = $loadLanguge;
    }
    
    /**
     * initial instance, 
     */
    static function initial($loadLanguge = null){
        if($loadLanguge == null){
            $loadLanguge = new DefaultLoadLanguage();
        }
        static::$instance = new MultilLanguageManager($loadLanguge);
    }
    
    /**
     * Lấy instance hiện tại
     */
    static function getInstance(){
        if(static::$instance === null){
            static::initial();
        }
        return static::$instance;
    }
    
    /**
     * GetKey.
     * @param unknown $key
     */
    function getLable($key,$languageKey){
      return $this->_loadLanguage->getLable($key);
    }
    
    /**
     * Lấy dữ liệu đa ngôn ngữ theo màn hình
     * @param string
     */
    function getLangViaScreen($screenKey,$languageKey){
        return $this->_loadLanguage->getScreen($screenKey);
    }
    
    function loadResource(){
        
    }
    
}