<?php

defined('BASEPATH') or die('No direct script access allowed');

class BestModel extends BaseModel
{

    protected $banner_location = "images/banner/";

    function loadBest()
    {
        $arr = DB::getInstance()->GetAll('SELECT fk_category,fk_product FROM t_best ORDER BY sort');
        $result = array();
        foreach ($arr as $value)
        {
            if (!isset($result[$value['fk_category']]))
            {
                $result[$value['fk_category']] = array();
            }
            $result[$value['fk_category']][] = $value['fk_product'];
        }
        return $result;
    }

    function qry_all_category()
    {
        $arr = CategoryMapper::make()->setLanguage('VN-VI')->findAll();
        return $arr;
    }

    function update()
    {
        $post = $this->input->post();
        if (!isset($post['product']))
        {
            // $post['product'] = array();
        }
        foreach ($post['product'] as $category => $json_products)
        {
            DB::delete('t_best', 'fk_category = ?', array($category));
            $products = json_decode($json_products);
            if (!is_array($products))
            {
                continue;
            }
            $arr_insert = array();
            foreach ($products as $product)
            {
                $arr_insert[] = array('fk_product' => $product, 'fk_category' => $category);
            }
            if (!empty($arr_insert))
            {
                DB::insertMany('t_best', $arr_insert);
            }
        }
    }

}
