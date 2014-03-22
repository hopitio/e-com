<?php
include_once APPPATH . 'models/BaseModels.php';
require_once APPPATH . 'libraries/Database.inc';
/**
 * Base for all models.
 * @author ANLT
 * @since 20140307
 */
class MY_Model extends CI_Model
{
    function __construct(){
        parent::__construct();
        $this->load->driver('cache');
        DB::getInstance()->debug = 1;
    }
}