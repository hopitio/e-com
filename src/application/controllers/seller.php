<?php

class seller extends BaseController
{

    /** @var ProductModel */
    public $productModel;

    /** @var FileModel */
    public $fileModel;

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
            $storageCode = (string) $product->getStorageCode();

            $aaData[] = array(
                $product->id,
                $product->id,
                $product->getName()->getTrueValue(),
                $storageCode,
                format_money($product->getPriceMoney('VND')->getAmount()),
                'url' => '/seller/product_details/' . $product->id
            );
        }

        $dataTableHelper->response($count, $aaData);
    }

    function show_orders()
    {
        
    }

    function tax_product_service()
    {
        $productID = $this->input->get('productID');
        $language = $this->input->get('language');
        if (!$productID || !$language)
        {
            throw new Lynx_RequestException('$productID hoac $language null');
        }
        header('Content-type: application/json');
        $taxes = TaxMapper::make()
                ->select('tax.*, tl.name, tl.language', true)
                ->filterProduct($productID)
                ->setLanguage($language)
                ->findAll();
        echo json_encode($taxes);
    }

    protected function getProductModel()
    {
        $this->load->model('modelEx/ProductModel', 'productModel');
    }

    protected function getFileModel()
    {
        $this->load->model('modelEx/FileModel', 'fileModel');
    }

    function update_product($redirect)
    {
        $this->getProductModel();
        $this->getFileModel();
        $data = array(
            'seller'          => $this->sellerInstance->id,
            'id'              => (int) $this->input->post('hdnProductID'),
            'language'        => $this->input->post('hdnLanguage'),
            'storageCodeType' => $this->input->post('selCodeType'),
            'status'          => $this->input->post('chkStatus'),
            'attr'            => $this->input->post('pattr')
        );
        $data['categoryID'] = $data['id'] ? $this->input->post('radCate') : $this->input->post('hdnCategory');
        $data['storateCode'] = $data['storageCodeType'] ? $this->input->post('txtCode') : null;
        $files = isset($_FILES) && !empty($_FILES) ? $_FILES : array();
        $productID = $this->productModel->updateProduct($data);
        foreach ($files as $fileInfo)
        {
            if (!$fileInfo['name'] || !is_uploaded_file($fileInfo['tmp_name']) || !file_exists($fileInfo['tmp_name']))
            {
                continue;
            }
            $fileID = $this->fileModel->handleImageUpload($fileInfo);
            $this->productModel->addProductImage($productID, $fileID);
        }
        if ($redirect == 'apply')
        {
            redirect('/seller/product_details/' . $productID . '?language=' . $data['language'] . '#/' . $this->input->post('hdnTab'));
        }
        elseif ($redirect == 'save_n_quit')
        {
            redirect('/seller/show_products');
        }
    }

    function duplicate_product($productID)
    {
        $this->getProductModel();
        $newProductID = $this->productModel->duplicateProduct($productID);
        redirect('/seller/product_details/' . $newProductID);
    }

    function product_details($productID = 0)
    {
        $language = $this->input->get('language');
        if (!$language)
        {
            $language = 'VN-VI';
        }
        $product = ProductFixedMapper::make()
                ->autoloadAttributes()
                ->setLanguage($language)
                ->filterID($productID)
                ->find();
        if ($productID && !$product->id)
        {
            throw new Lynx_RoutingException("Product not found");
        }
        $categories = CategoryMapper::make()->setLanguage($language)->findAll();
        $taxes = TaxMapper::make()
                ->filterSeller(User::getCurrentUser()->id)
                ->setLanguage($language)
                ->select('tax.*, tl.language, tl.name', true)
                ->findAll();
        LayoutFactory::getLayout(LayoutFactory::TEMP_SELLER)
                ->setData(array(
                    'product'     => $product,
                    'lang'        => $language,
                    'categories'  => $categories,
                    'taxeOptions' => $taxes
                ))
                ->render('seller/product_details');
    }

    function addTax()
    {
        $this->getProductModel();
        $this->productModel->addTax($this->input->post('productID'), $this->input->post('taxID'));
    }

    function deleteTax()
    {
        $this->getProductModel();
        $this->productModel->deleteTax($this->input->post('productID'), $this->input->post('taxID'));
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
                ->render('seller/add_product');
    }

}
