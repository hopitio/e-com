<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class product extends BaseController
{

    function details($productID)
    {
        //query product
        $product = ProductFixedMapper::make()->autoloadAttributes(true, 'VN-VI')->filterID($productID)->find();
        $data = array('product' => $product);
        LayoutFactory::getLayout(LayoutFactory::TEMP_ONE_COl)
                ->setData($data, true)
                ->render('product/details');
    }
    
    function test(){
    }
    
    
}
