<?php

class seller extends BaseController
{

    protected $authorization_required = true;

    /** @var ProductModel */
    public $productModel;

    /** @var FileModel */
    public $fileModel;

    /** @var SellerDomain */
    protected $sellerInstance;

    function __construct()
    {
        parent::__construct();

        $this->sellerInstance = SellerMapper::make()->autoloadCategories()->setUser(User::getCurrentUser())->find();
        if (!$this->sellerInstance->id)
        {
            throw new Lynx_AccessControlException('Bạn không có quyền truy cập chức năng này');
        }
    }

    function dashboard()
    {
        echo 'coming soon';
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
                ->limit($dataTableHelper->length)
                ->offset($dataTableHelper->start);

        $products = $mapper->findAll();
        $count = $mapper->count();


        foreach ($products as $product)
        {
            $storageCode = (string) $product->getStorageCode();
            $aaData[] = array(
                $product->id,
                $product->id,
                (string) $product->getName(),
                $storageCode,
                (string) $product->getPriceMoney('VND'),
                'url' => '/seller/product_details/' . $product->id
            );
        }

        echo $dataTableHelper->response($count, $aaData);
    }

    function delete_image()
    {
        $this->getFileModel();
        $this->getProductModel();
        $productID = (int) $this->input->get('product');
        $fileID = (int) $this->input->get('file');
        $language = $this->input->get('language');
        if (!$productID || !$fileID)
        {
            throw new Lynx_RequestException('$_GET[product] && $_GET[file] cannot null');
        }
        if (!$language)
        {
            $language = 'EN-US';
        }
        DB::getInstance()->StartTrans();
        $this->productModel->deleteImage($productID, $fileID);
        $this->fileModel->delete($fileID);
        DB::getInstance()->CompleteTrans();
        redirect("/seller/product_details/{$productID}/?language={$language}#/tab_images");
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

    function delete_product()
    {
        $this->getProductModel();
        $productIDs = $this->input->post('chk');
        $this->productModel->deleteProduct($productIDs);
    }

    protected function getFileModel()
    {
        $this->load->model('modelEx/FileModel', 'fileModel');
    }

    function update_product($sub_action)
    {
        $this->getProductModel();
        $this->getFileModel();
        $productID = (int) $this->input->post('hdnProductID');

        $data = array(
            'seller'          => $this->sellerInstance->id,
            'id'              => $productID,
            'language'        => $this->input->post('hdnLanguage'),
            'storageCodeType' => $this->input->post('selCodeType'),
            'status'          => $this->input->post('chkStatus'),
            'attr'            => $this->input->post('pattr')
        );
        $data['categoryID'] = $data['id'] ? $this->input->post('radCate') : $this->input->post('hdnCategory');
        $data['storateCode'] = $data['storageCodeType'] ? $this->input->post('txtCode') : null;
        $files = isset($_FILES['fileImage']) && !empty($_FILES['fileImage']) ? $_FILES['fileImage'] : array();

        try
        {
            DB::getInstance()->StartTrans();
            $productID = $this->productModel->updateProduct($data);
            $returnURL = '/seller/product_details/' . $productID . '?language=' . $data['language'] . '#/' . $this->input->post('hdnTab');
            if (isset($files['name']))
            {
                for ($i = 0; $i < count($files['name']); $i++)
                {
                    $fileInfo = array();
                    foreach ($files as $k => $fileData)
                    {
                        $fileInfo[$k] = $fileData[$i];
                    }
                    if (!$fileInfo['name'] || !is_uploaded_file($fileInfo['tmp_name']) || !file_exists($fileInfo['tmp_name']))
                    {
                        continue;
                    }
                    $fileID = $this->fileModel->handleImageUpload($fileInfo);
                    $this->productModel->addProductImage($productID, $fileID);
                }
            }
            if ($sub_action == 'activate')
            {
                $this->productModel->activate($data['id']);
            }
            elseif ($sub_action == 'deactivate')
            {
                $this->productModel->deactivate($data['id']);
            }
            DB::getInstance()->CompleteTrans();
            Common::redirect_notify($returnURL);
        }
        catch (Exception $ex)
        {
            Common::redirect_back($returnURL, $ex->getMessage(), false);
        }
        //redirect('/seller/product_details/' . $productID . '?language=' . $data['language'] . '#/' . $this->input->post('hdnTab'));
    }

    function duplicate_product($productID)
    {
        $this->getProductModel();
        $newProductID = $this->productModel->duplicateProduct($productID);
        redirect('/seller/product_details/' . $newProductID);
    }

    function product_details($productID = 0)
    {
        Common::nocache();
        $language = $this->input->get('language');
        if (!$language)
        {
            $language = 'EN-US';
        }

        $product = ProductFixedMapper::make()
                ->filterStatus(null)
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
