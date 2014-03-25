<?php

/**
 * Cung cấp các phương thức quản lý liên quan đến category
 * @author ANLT 
 * @since 201403121
 */
class CategoryModel extends BaseModel
{

    CONST CACHE_KEY = 'CACHE_KEY';

    /**
     * get all category.
     *
     * @param string $languageKey            
     * @return CategoryDomain
     */
    function loadAllCategory($languageKey)
    {
        $category = $this->getCategoryFormCache();
        if ($category)
        {
            return $category;
        }
        else
        {
            return CategoryMapper::make()->filterLanguage($languageKey)->findAll();
        }
    }

    /**
     * Save Category to cache
     * 
     * @param CategoryDomain $category            
     * @return void
     */
    private function saveCategoryToCache($category)
    {
        $this->cache->save(self::CACHE_KEY, $category);
    }

    /**
     * Lấy dữ liệu từ cache sẽ trả về false nếu như hệ thống k lấy được dữ liệu cache.
     * 
     * @return CategoryDomain
     */
    private function getCategoryFormCache()
    {
        return $this->cache->get(self::CACHE_KEY);
    }
}