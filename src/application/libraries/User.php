<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User
 *
 * @package lynx
 * @author ANLT <lethanhan.bkaptech@gmail.com>
 * @copyright 2014
 */
class User{

    protected function load(){
        if($this->is_persistent()){
            $CI =& get_instance();
        }
    }


    protected function save(){

    }

    public function touch(){
        
    }




}
