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

    function show($id)
    {
        $user = User::getCurrentUser();
        $category = CategoryMapper::make()->filterID($id)->setLanguage($user->languageKey)->find();
        $ancestors = explode('/', trim($category->path, '/'));
        $breadcrums = array();

        foreach ($ancestors as $cateID)
        {
            if ($cateID == $category->id)
            {
                continue;
            }
            $ancestor = CategoryMapper::make()->setLanguage($user->languageKey)->filterID($cateID)->find();
            $breadcrums[$ancestor->name] = $ancestor->getURL();
        }

        $breadcrums[$category->name] = $category->getURL();
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)
                ->setCss(array('/style/list.css'))
                ->setBreadcrums($breadcrums)
                ->render('category/show');
    }

}
