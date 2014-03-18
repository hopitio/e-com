<?php
/**
 * 
 * Lớp cơ bản cho việc load language.
 * @author ANLT
 * @since 20140310
 */
abstract class AbstractLoadLanguage{
    /**
     * lấy giá trị đa ngôn ngữ của màn hinh.
     * @param unknown $screenKey
     */
    abstract function getScreen($screenKey,$languageKey,$resource);
    
    /**
     * Kiểm tra màn hình có hỗ trợ hay không.
     */
    abstract function getSupportedScreen($screenName,$languageKey,$resource);
}