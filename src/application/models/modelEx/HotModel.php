<?php

defined('BASEPATH') or die('No direct script access allowed');

class HotModel extends BaseModel
{

    protected $banner_location = "images/banner/";

    function loadHot()
    {
        $arr = array('hot_product' => array());
        $arr['hot_product'] = DB::getInstance()->GetCol('SELECT fk_product FROM t_hot ORDER BY sort');
        return $arr;
    }

    function update()
    {
        $xml = array();
        $post = $this->input->post();
        if (!isset($post['product']))
        {
            $post['product'] = array();
        }
        DB::delete('t_hot', '1=1');
        foreach ($post['product'] as $product_type => $json_products)
        {
            if (!isset($xml[$product_type]))
            {
                $xml[$product_type] = '';
            }

            $products = json_decode($json_products);
            if (!is_array($products))
            {
                continue;
            }
            $arr_insert = array();
            foreach ($products as $product)
            {
                $arr_insert[] = array('fk_product' => $product);
            }
            if (!empty($arr_insert))
            {
                DB::insertMany('t_hot', $arr_insert);
            }
        }
    }

}
