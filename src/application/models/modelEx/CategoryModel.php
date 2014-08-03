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

    function getAllTopLevelCategories($language)
    {
        return CategoryMapper::make()->filterParent(NULL)->setLanguage($language)->findAll();
    }

    function getProductByCategory($category, $offset, $sort = null)
    {
        $limit = $offset ? 10 : 20;
        $user = User::getCurrentUser();

        $mapper = ProductFixedMapper::make()
                ->select('p.*', true)
                ->selectCountView()
                ->autoloadAttributes()
                ->setLanguage($user->languageKey)
                ->filterCategory($category->id);
        $mapper->getQuery()
                ->select('seller.name AS seller_name')
                ->innerJoin('t_seller seller', 'p.fk_seller = seller.id')
                ->limit($limit)
                ->offset($offset);
        switch ($sort) {
            case '':
            case 'new':
                $mapper->getQuery()->orderBy('p.date_created DESC');
                break;
            case 'priceasc':
                $mapper->orderByPrice();
                break;
            case 'pricedesc':
                $mapper->orderByPrice(true);
                break;
            case 'sale':
                $mapper->orderBy('p.price_origin - p.price DESc');
                break;
        }

        $products = $mapper->findAll(function($record, ProductFixedDomain $instance)
        {
            $instance->seller_name = $record['seller_name'];
        });
        return $products;
    }

    function getBestProduct($category, $offset, $sort = null)
    {
        $limit = $offset ? 10 : 20;
        $cateID = (int) $category->id;
        $user = User::getCurrentUser();
        $sqlBest = "SELECT p.id, best.sort AS sort_best
                FROM t_product p 
                    INNER JOIN t_best best ON best.fk_product=p.id AND best.fk_category=$cateID
                WHERE p.`status`=1
                ";
        $sqlNormalProduct = "SELECT p.id, 99999 AS sort_best
                FROM t_product p
                    INNER JOIN t_category c ON c.id=p.fk_category AND c.path LIKE '{$category->path}%'
                WHERE p.`status`=1
                ";

        $sql = "SELECT p.*,(SELECT SUM(count_view) FROM t_product_view WHERE fk_product=p.id) AS count_view,
                    seller.name AS seller_name 
                FROM t_product p
                    INNER JOIN ($sqlBest UNION $sqlNormalProduct) temp ON temp.id=p.id
                    INNER JOIN t_seller seller ON p.fk_seller = seller.id
                    ORDER BY temp.sort_best
                LIMIT $limit OFFSET $offset";
        return ProductFixedMapper::make()
                        ->setLanguage($user->languageKey)
                        ->autoloadAttributes()
                        ->setQuery($sql)
                        ->findAll(function($record, ProductFixedDomain $instance)
                        {
                            $instance->seller_name = $record['seller_name'];
                        });
    }

}
