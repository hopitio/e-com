<?php

class DefaultLoadLanguage extends AbstractLoadLanguage{
	/* (non-PHPdoc)
     * @see AbstractLoadLanguage::getLable()
     */
    public function getLable($key, $languageKey, $resource)
    {
        // TODO Auto-generated method stub
        
    }

	/* (non-PHPdoc)
     * @see AbstractLoadLanguage::getScreen()
     */
    public function getScreen($screenKey, $languageKey, $resource)
    {
        if(!isset($resource[$languageKey])){
            throw new LanguageNotSupported('Resource không hỗ trợ ngôn ngữ');
        }
        if(!isset($resource[$languageKey]->$screenKey)){
            throw new LableKeyNotFound('Không tìm thấy key màn hình tương ứng '.$resource[$languageKey].'->'.$screenKey);
        }
        return  $resource[$languageKey]->$screenKey;
    }
    
    /* (non-PHPdoc)
     * @see AbstractLoadLanguage::getSupportedScreen()
     */
    public function getSupportedScreen($screenKey,$languageKey,$resource){
       return isset($resource[$languageKey]->$screenKey);
    }

    
}