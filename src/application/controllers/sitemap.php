<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class sitemap extends BaseController
{

    protected $authorization_required = FALSE;

    public function index()
    {
        $categoryModel = $this->loadCategoryModel();
        $data['categories'] = $categoryModel->loadAllCategory(User::getCurrentUser()->languageKey);
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)
                ->setData($data)
                ->render('sitemap/index');
    }

    /**
     * Load function 
     * @return category
     */
    public function loadCategoryModel()
    {
        $this->load->model('modelEx/CategoryModel', 'category');
        return $this->category;
    }

}
