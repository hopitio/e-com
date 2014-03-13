<?php
require_once 'lynx_exceptions.php';
require_once 'lynx_masters.php';
require_once APPPATH.'libraries/multiLanguage/multiLanguage.inc';
require_once APPPATH.'libraries/layout/layout.inc';
/**
 * Thêm custom loader.
 * @author LE
 *
 */
class MY_Loader extends CI_Loader{

    /* (non-PHPdoc)
     * @see CI_Loader::view()
     */
	/**
     * Hàm cho phép inital view và auto add thêm language cho view.
     *
     * @see CI_Loader::view()
     */
    function  initalView($view, $template = TEMP_ONE_COl, $data = Array(), $return = FALSE){
        
        
        
        if(MultilLanguageManager::getInstance()->checkSupportScreen($view, 'VN-VI')){
        
            parent::view($view, $data, $return);
            return;
        }
        
        if (is_array($data) && count($data) > 0)
        {
            if (array_key_exists('lang', $data))
            {
                throw new Lynx_ViewException('Gắn kết đa ngôn ngữ thất bại');
            }
        }
        else
        {
            if (is_array($data))
            {
                array_push($data, array('language' => MultilLanguageManager::getInstance()->getLangViaScreen($view, 'VN-VI')));
            }
            else
            {
                throw new Lynx_ModelMiscException('Dữ liệu set cho view buộc phải là array');
            }
        }
        
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)->render($view,$data);
    }
}