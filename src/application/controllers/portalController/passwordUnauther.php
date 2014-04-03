<?php
/**
 * Chuyên trách xử lý các hoạt động post hoặc get liên quan đến account trong trường hợp không cần login
 * @author ANLT 
 * @since 20140403
 */
if (! defined('BASEPATH')) exit('No direct script access allowed');

class passwordUnauthen extends password
{
    protected $authorization_required = FALSE;

    function resetPassword()
    {
    
    }
}