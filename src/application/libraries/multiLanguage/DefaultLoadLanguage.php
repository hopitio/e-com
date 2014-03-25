<?php

class DefaultLoadLanguage extends AbstractLoadLanguage
{
    /* (non-PHPdoc)
     * @see AbstractLoadLanguage::getScreen()
     */

    public function getScreen($screenKey, $languageKey, $resource)
    {
        if (!isset($resource[$languageKey]))
        {
            throw new LanguageNotSupported('Resource không hỗ trợ ngôn ngữ');
        }
        $found = $resource[$languageKey]->xpath($screenKey);
        if (!isset($found[0]) || !is_object($found[0]))
        {
            throw new LableKeyNotFound('Không tìm thấy key màn hình tương ứng ' . $resource[$languageKey] . '->' . $screenKey);
        }
        return $resource[$languageKey]->$screenKey;
    }

    /* (non-PHPdoc)
     * @see AbstractLoadLanguage::getSupportedScreen()
     */

    public function getSupportedScreen($screenKey, $languageKey, $resource)
    {
        return isset($resource[$languageKey]->$screenKey);
    }

}
