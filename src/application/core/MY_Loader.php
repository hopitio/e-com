<?php
require_once 'lynx_exceptions.php';
require_once 'lynx_masters.php';

/**
 * Thêm custom loader.
 * @author LE
 *
 */
class MY_Loader extends CI_Loader{
    
    /**
     * Ghi đè hàm view nhằm mục đích ghi đè thêm data vào thằng view.
     * @see CI_Loader::view()
     */
    function view($view, $data = null,$return = FALSE){

        if($data != null){
            if(key_exists('lang', $data)){
                throw  new Lynx_ViewException('Gắn kết đa ngôn ngữ thất bại');
            }
        }else{
            $data= array('lang', );
        }
        parent::view($view,$data,$return);
    }
    
}