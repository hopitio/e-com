<?php

defined('BASEPATH') or die('No direct script access allowed');

class HotModel extends BaseModel
{

    protected $banner_location = "images/banner/";

    function loadHot()
    {
        $query = Query::make()
                ->select('`key`,`value`', 1)
                ->from('t_setting')
                ->where("`key` = 'hot_product'");
        $result = DB::getInstance()->GetAssoc($query);
        $product = array();
        foreach ($result as $key => $value)
        {
            $product[$key] = array();
            $xml = new SimpleXMLElement($result[$key]);
            $result = $xml->xpath('product');
            for ($i = 0; $i < count($result); $i++)
            {
                $product_arr = (array) ($result[$i]);
                $product[$key][$i] = $product_arr["id"];
            }
        }
        return $product;
    }

    function update()
    {
        $xml = array();
        $post = $this->input->post();
        if (!isset($post['product']))
        {
            // $post['product'] = array();
        }
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
            foreach ($products as $product_id)
            {
                $xml[$product_type].='<product><id>' . $product_id . '</id></product>';
            }
        }

        foreach ($xml as $key => $value)
        {
            $xml[$key] = '<root>' . $value . '</root>';
        }

        foreach ($xml as $product_type => $xml_product_type)
        {
            $setting = Setting::getInstance();
            $setting->set($product_type, $xml_product_type);
            $setting->save();
        }
    }

}
