<?php

defined('BASEPATH') or die('no direct script access allowed');

class file extends BaseController
{

    function browse_file($fileType = null)
    {
        LayoutFactory::getLayout(LayoutFactory::TEMP_CONTENT_ONLY)->render('file/browse_file');
    }

}
