<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class sitemap extends BaseController
{

    protected $authorization_required = FALSE;

    public function showPage()
    {
        $categoryModel = $this->loadCategoryModel();
        $data = $categoryModel->loadAllCategory('vi');
        echo '<pre/>';
        var_dump($data);
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)->render('sitemap');
    }
    
    /**
     * Load function 
     * @return category
     */
    public function loadCategoryModel(){
        $this->load->model('category');
        return $this->category;
    }

}

