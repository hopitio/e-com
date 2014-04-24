<?php

defined('BASEPATH') or die('no direct script access allowed');

class category extends BaseController
{

    function categories_service($parent = NULL)
    {
        $categories = CategoryMapper::make()
                ->setLanguage(User::getCurrentUser()->languageKey)
                ->filterParent($parent)
                ->findAll();
        $json = array();
        foreach ($categories as $cate)
        {
            $cate->url = site_url('category/show/' . $cate->id);
            $json[] = $cate;
        }
        header('content-type: application/json');
        echo json_encode($json);
    }

}
