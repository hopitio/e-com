<?php

abstract class AbstractLanguageProviders{
    protected $_resourcePath;
    public $_resourceKey = '';
    /**
     * 
     */
    abstract function loadResource();
    
    abstract function saveToCache($resource,$override);
    /**
     * 
     * @param string $resourcePath
     */
    function __construct($resourcePath){
        $this->_resourcePath = $resourcePath;
    }
}