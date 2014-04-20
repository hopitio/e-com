<?php

class seller extends BaseController
{

    function __construct()
    {
        parent::__construct();
        $user          = User::getCurrentUser();
        $user->id      = 1;
        $user->account = 'admin';
    }

    function dashboard()
    {
        
    }

    function show_products()
    {
        LayoutFactory::getLayout(LayoutFactory::TEMP_SELLER)
               // ->setData($data, true)
                ->render('seller/show_products');
    }

    function show_products_service()
    {
        $products = ProductFixedMapper::make();
    }

    function show_orders()
    {
        
    }

    function product_details($productID)
    {
        
    }

}
