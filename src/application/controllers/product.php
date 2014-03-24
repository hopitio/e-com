<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class product extends BaseController
{

    function details($productID)
    {
        //query product
        DB::getInstance()->debug = 1;
        $product = ProductFixedMapper::make()->autoloadAttributes(true, 'VN-VI')->find($productID);
        $data = array('product' => $product);
        LayoutFactory::getLayout(LayoutFactory::TEMP_PORTAL_ONE_COL)
                ->setData($data, true)
                ->render('product/details');
    }

}
