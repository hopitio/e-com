<?php

class seller extends BaseController
{

    /** @var SellerDomain */
    protected $sellerInstance;

    function __construct()
    {
        parent::__construct();
        $user = User::getCurrentUser();
        $user->id = 1;
        $user->account = 'admin';
        $this->sellerInstance = SellerMapper::make()->autoloadCategories()->setUser($user)->find();
        if (!$this->sellerInstance->id)
        {
            throw new Lynx_AccessControlException('Bạn không có quyền truy cập chức năng này');
        }
    }

    function dashboard()
    {
        
    }

    function show_products()
    {
        LayoutFactory::getLayout(LayoutFactory::TEMP_SELLER)
                //->setData(array('categories' => $this->sellerInstance->getCategories()))
                ->setJavascript(array(
                    '/js/angular.min.js'
                ))
                ->render('seller/show_products');
    }

    function show_products_service()
    {
        $dataTableHelper = new DataTableHelper;
        $aaData = array();

        /* @var $products ProductFixedDomain */
        $mapper = ProductFixedMapper::make()
                ->setLanguage(User::getCurrentUser()->languageKey)
                ->autoloadAttributes()
                ->filterSeller($this->sellerInstance->id)
                ->limit($dataTableHelper->iDisplayLength)
                ->offset($dataTableHelper->iDisplayStart);

        $products = $mapper->findAll();
        $count = $mapper->count();


        foreach ($products as $product)
        {
            $sku = $product->getSKU() ? $product->getSKU()->getTrueValue() : '';

            $aaData[] = array(
                $product->id,
                $product->id,
                $product->getName()->getTrueValue(),
                $sku,
                $product->getPrice('USD')->getTrueValue(),
                'url' => site_url('product/details/' . $product->id)
            );
        }

        $dataTableHelper->response($count, $aaData);
    }

    function show_orders()
    {
        
    }

    function product_details($productID)
    {
        
    }

    function category_service($parentCategory = NULL)
    {
        header('Content-type: application/json');
        $categories = CategoryMapper::make()->setLanguage(User::getCurrentUser()->languageKey)->filterParent($parentCategory)->findAll();
        echo json_encode($categories);
    }

    function add_product()
    {
        LayoutFactory::getLayout(LayoutFactory::TEMP_SELLER)
                //->setData(array('categories' => $this->sellerInstance->getCategories()))
                ->setJavascript(array(
                    '/js/angular.min.js'
                ))
                ->render('seller/add_product');
    }

}
