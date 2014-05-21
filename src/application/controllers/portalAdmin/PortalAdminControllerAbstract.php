<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
abstract class PortalAdminControllerAbstract extends BaseController
{
    protected $authorization_required = true;
    protected $is_admin_page = true;


}