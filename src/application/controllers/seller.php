<?php

class seller extends BaseController
{

    protected $authorization_required = true;

    /** @var ProductModel */
    public $productModel;

    /** @var SellerLayout */
    protected $_layout;

    /** @var FileModel */
    public $fileModel;

    /** @var SellerDomain */
    protected $sellerInstance;
    protected $userID;

    function __construct()
    {
        parent::__construct();
        $this->_layout = LayoutFactory::getLayout(LayoutFactory::TEMP_SELLER);
        $this->_layout->addMainNav(new Nav_Item('dashboard', '<i class="fa fa-dashboard"></i> Trang chủ', '/seller/dashboard'))
                ->addMainNav(new Nav_Item('sales', '<i class="fa fa-dollar"></i> Bán hàng', 'javascript:;', true, array(
                    new Nav_Item('order', 'Đơn hàng', '/seller/order/search'),
                        //new Nav_Item('invoice', 'Hóa đơn', '/seller/invoice'),
                        //new Nav_Item('shipment', 'Vận chuyển', '/seller/shipment')
                )))
                ->addMainNav(new Nav_Item('product', '<i class="fa fa-cubes"></i> Sản phẩm', '/seller/product'));
        $this->userID = User::getCurrentUser()->sub_id;
    }

    function init()
    {
        parent::init();
        $this->sellerInstance = SellerMapper::make()->autoloadCategories()->setUser(User::getCurrentUser())->find();
        if (!$this->sellerInstance->id)
        {
            throw new Lynx_AuthenticationException('Bạn không có quyền truy cập chức năng này');
        }
        Common::nocache();
    }

    function dashboard()
    {
        $this->_layout
                ->setHeading('<i class="fa fa-dashboard"></i> Trang chủ')
                ->setSidebar('dashboard_sidebar')
                ->setSelectedNav('dashboard')
                ->render('seller/dashboard');
    }

    function product()
    {
        $data['categories'] = $this->sellerInstance->getCategories();
        $this->_layout
                ->setHeading('<i class="fa fa-cubes"></i> Sản phẩm')
                ->setSelectedNav('product')
                ->setData($data)
                ->render('seller/product');
    }

    function show_products_service()
    {
        $dataTableHelper = new DataTableHelper;
        $aaData = array();
        $input = $this->input;
        /* @var $products ProductFixedDomain */
        $mapper = ProductFixedMapper::make()
                ->setLanguage('VN-VI')
                ->autoloadAttributes()
                ->filterSeller($this->sellerInstance->id)
                ->filterStatus(null);
        if ($input->get('id'))
            $mapper->filterID($input->get('id'));
        if ($input->get('name'))
            $mapper->filterName('VN-VI', $input->get('name'));
        if ($input->get('category'))
            $mapper->filterCategory($input->get('category'));
        if ($input->get('code'))
            $mapper->filterStorageCode($input->get('code'));
        $mapper->filterPriceRange($input->get('price_from') !== '' ? $input->get('price_from') : null, $input->get('price_to') !== '' ? $input->get('price_to') : null, 'VND');
        $mapper->filterStockQty($input->get('qty_from') !== '' ? $input->get('qty_from') : null, $input->get('qty_from') !== '' ? $input->get('qty_to') : null);
        if ($input->get('status') !== 'all')
            $mapper->filterStatus($input->get('status'));

        $mapper->getQuery()
                ->select('cl.name AS category_name')
                ->innerJoin('t_category c', 'c.id=p.fk_category')
                ->innerJoin('t_category_language cl', "cl.fk_category=c.id AND cl.language='VN-VI'")
                ->where('p.status > -1')
                ->limit($dataTableHelper->length)
                ->offset($dataTableHelper->start);

        $products = $mapper->findAll(function($record, $instance)
        {
            $instance->category_name = $record['category_name'];
        });
        $count = $mapper->count();
        $statusText = array(
            -1 => 'Đã xóa',
            0  => 'Không bán',
            1  => 'Đang bán'
        );

        foreach ($products as $product)
        {
            $aaData[] = array(
                $product->id,
                $product->id,
                (string) $product->getName(),
                'loai',
                $product->category_name,
                (string) $product->getStorageCode(),
                (string) $product->getPriceMoney('VND'),
                (string) $product->getQuantity(),
                $statusText[$product->status],
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

        if ($this->productModel->isOwner($this->userID, $productID) == false)
        {
            redirect('/');
        }

        try
        {


            if (!$productID || !$fileID)
            {
                throw new Lynx_RequestException('$_GET[product] & $_GET[file] không được rỗng');
            }
            if (!$language)
            {
                $language = 'EN-US';
            }
            DB::getInstance()->StartTrans();
            $this->productModel->deleteImage($productID, $fileID);
            $this->fileModel->delete($fileID);
            DB::getInstance()->CompleteTrans();
            Common::redirect_back('Xóa thành công');
        }
        catch (Exception $ex)
        {
            Common::redirect_back($ex->getMessage(), false);
        }
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
        $language = $this->input->post('hdnLanguage');

        if ($this->productModel->isOwner($this->userID, $productID) == false)
        {
            redirect('/');
        }

        $productFields = array(
            'fk_seller'    => $this->sellerInstance->id,
            'fk_category'  => $productID ? $this->input->post('radCate') : $this->input->post('hdnCategory'),
            'price'        => $this->input->post('txtPrice'),
            'price_origin' => $this->input->post('txtOriginPrice')
        );
        $files = isset($_FILES['fileImage']) && !empty($_FILES['fileImage']) ? $_FILES['fileImage'] : array();

        try
        {
            DB::getInstance()->StartTrans();
            $productID = $this->productModel->updateProduct($productID, $language, $productFields, $this->input->post('pattr'));
            $returnURL = '/seller/product_details/' . $productID . '?language=' . $language . '#/' . $this->input->post('hdnTab');
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
                    list($imgWidth, $imgHeight, $imgType, $imgAttr) = getimagesize($fileInfo['tmp_name']);
                    $fileID = $this->fileModel->handleImageUpload($fileInfo);
                    $this->productModel->addProductImage($productID, $fileID, $imgWidth);
                }
            }
            if ($sub_action == 'activate')
            {
                $this->productModel->activate($productID);
            }
            elseif ($sub_action == 'deactivate')
            {
                $this->productModel->deactivate($productID);
            }
            DB::getInstance()->CompleteTrans();
            Common::redirect_notify($returnURL);
        }
        catch (Exception $ex)
        {
            echo $ex->getMessage();
            Common::redirect_back($ex->getMessage(), false);
        }
    }

    function duplicate_product($productID)
    {
        $this->getProductModel();

        if ($this->productModel->isOwner($this->userID, $productID) == false)
        {
            redirect('/');
        }

        $newProductID = $this->productModel->duplicateProduct($productID);
        redirect('/seller/product_details/' . $newProductID);
    }

    function product_details($productID = 0)
    {
        $this->getProductModel();
        if ($this->productModel->isOwner($this->userID, $productID) == false)
        {
            redirect('/');
        }

        $language = $this->input->get('language');
        if (!$language)
        {
            $language = 'VN-VI';
        }

        $product = ProductFixedMapper::make()
                ->filterStatus(null)
                ->autoloadAttributes()
                ->setLanguage($language)
                ->filterID($productID)
                ->find();
        if ($productID && !$product->id)
        {
            throw new Lynx_RoutingException("Không có sản phẩm này");
        }
        $categories = CategoryMapper::make()->setLanguage($language)->findAll();
        $taxes = TaxMapper::make()
                ->filterSeller(User::getCurrentUser()->id)
                ->setLanguage($language)
                ->select('tax.*, tl.language, tl.name', true)
                ->findAll();
        $this->_layout
                ->setJavascript(array('/cerulean/plugins/ckeditor/ckeditor.js'))
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
        $productID = $this->input->post('productID');

        if ($this->productModel->isOwner($this->userID, $productID) == false)
        {
            redirect('/');
        }

        $this->productModel->addTax($productID, $this->input->post('taxID'));
    }

    function deleteTax()
    {
        $this->getProductModel();
        $productID = $this->input->post('productID');

        if ($this->productModel->isOwner($this->userID, $productID) == false)
        {
            redirect('/');
        }

        $this->productModel->deleteTax($productID, $this->input->post('taxID'));
    }

    function category_service($parentCategory = NULL)
    {
        header('Content-type: application/json');
        $categories = CategoryMapper::make()->setLanguage('VN-VI')->filterParent($parentCategory)->findAll();
        echo json_encode($categories);
    }

    function add_product()
    {
        $this->_layout
                ->setHeading('<i class="fa fa-folder"></i> Chọn chuyên mục cho sản phẩm')
                ->render('seller/add_product');
    }

}
