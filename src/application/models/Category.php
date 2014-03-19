<?php

/**
 * Cung cấp các phương thức quản lý liên quan đến category
 * @author ANLT 
 * @since 20140319
 */
class Category extends BaseModels
{

    /**
     * Load category.
     *
     * @return CategoryData
     */
    function loadCategory()
    {
        $currentSession = $this->session->userdata(CATEGORY);
        if ($currentSession)
        {
            return $currentSession;
        }
        else
        {
            $result = CategoryMapper::make()->findAll();
            $cate = new CategoryData();
            $cate->inital($result);
            
            $this->session->set_userdata(CATEGORY, $cate);
            return $cate;
        }
    }
}