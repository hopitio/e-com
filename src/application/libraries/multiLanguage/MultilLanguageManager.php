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

    /**
     * @var DefaultLanguageProviders
     */
    private $_languageProviders;

    /**
     * 
     * @var mixed
     */
    protected $_resource;

    function __construct($loadLanguge, $languageProviders)
    {
        $this->_loadLanguage = $loadLanguge;
        $this->_languageProviders = $languageProviders;
    }

    /**
     * initial instance, 
     */
    static function initial($loadLanguge = null, $languageProviders = null)
    {
        if ($loadLanguge == null)
        {
            $loadLanguge = new DefaultLoadLanguage();
        }

        if ($languageProviders == null)
        {
            throw new Exception('path resource not found.');
        }

        static::$instance = new MultilLanguageManager($loadLanguge, $languageProviders);
    }

    /**
     * Lấy instance hiện tại
     */
    static function getInstance()
    {
        if (static::$instance === null)
        {
            static::initial();
        }
        return static::$instance;
    }

    /**
     * GetKey.
     * @param unknown $key
     */
    function getLabel($key, $languageKey)
    {
        return $this->_loadLanguage->getLable($key, $languageKey);
    }

    /**
     * Lấy dữ liệu đa ngôn ngữ theo màn hình
     * @param string
     */
    function getLangViaScreen($screenKey, $languageKey)
    {
        return $this->_loadLanguage->getScreen($screenKey, $languageKey, $this->_resource);
    }

    /**
     * Cung cấp phương thức load resource đa ngôn ngữ cho hệ thống.
     * @param string Path.
     */
    function loadResource()
    {
        $resource = $this->_languageProviders->loadResource();
        $this->_languageProviders->saveToCache($resource, false);
        $this->_resource = $resource;
    }

    /**
     * Cung cấp hàm thay đổi resource trong runtime.
     */
    function changeResource()
    {
        $resource = $this->_languageProviders->loadResource();
        $this->_languageProviders->saveToCache($resource, true);
        $this->_resource = $resource;
    }

    /**
     * 
     * @param string $screenName
     */
    function checkSupportScreen($screenName, $languageKey)
    {
        $this->_loadLanguage->getSupportedScreen($screenName, $languageKey, $this->_resource);
    }

}
