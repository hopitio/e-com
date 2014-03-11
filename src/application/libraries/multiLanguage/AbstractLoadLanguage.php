<?php
/**
 * 
 * Lớp cơ bản cho việc load language.
 * @author ANLT
 * @since 20140310
 */
abstract class AbstractLoadLanguage{
    /**
     * Lấy giá trị của nhãn
     * @param unknown $key
     */
    abstract function getLable($key);
    /**
     * lấy giá trị đa ngôn ngữ của nhiều màn hinh.
     * @param unknown $screenKey
     */
    abstract function getScreen($screenKey);
}