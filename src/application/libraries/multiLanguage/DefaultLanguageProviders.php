<?php
/**
 * Cung cấp fucntion cho việc load resource ngôn ngữ
 * @author ANLT
 * @since 20140310
 */
class DefaultLanguageProviders extends AbstractLanguageProviders{
    
    /* (non-PHPdoc)
     * @see AbstractLanguageProviders::loadResource()
     */
    public function loadResource()
    {
        try{
            //TODO: cần create thêm phần reading file.
            $resource = array();
            $resource['EN-US'] = simplexml_load_file($this->_resourcePath.'EN-US.xml','SimpleXMLElement',LIBXML_NOCDATA);
            $resource['VN-VI'] = simplexml_load_file($this->_resourcePath.'VN-VI.xml','SimpleXMLElement',LIBXML_NOCDATA);
        }catch(Exception $e)
        {
            throw  $e;
        }
        return $resource;
    }

    /* (non-PHPdoc)
     * @see AbstractLanguageProviders::saveToCache()
     */
    function saveToCache($resource,$override)
    {
        
    }
    
    public function __construct($resourcePath){
        parent::__construct($resourcePath);
        $this->_resourceKey = 'resourceLanguage';
    }
}