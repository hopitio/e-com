<?php

/**
 * base cho toàn bộ các model khác của subsystem
 * @author ANLT
 * @since 20140325
 */
class BaseModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->initalORM();
    }

    public function initalORM()
    {
        $this->load->driver('cache');
    }

}
